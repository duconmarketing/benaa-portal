<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use PDF;

class ShopController extends Controller {

    public function addToCart(Request $request){
        // $validatedData = $request->validate(['item' => 'required']);
        \Cart::setGlobalTax(5);
        
        $rowId = $request->get('id');
        $name = $request->get('name');
        $price = $request->get('price');
        $image = $request->get('image');
        $link = $request->get('link');
        $qty = $request->has('quantity') ? $qty = $request->get('quantity') : 1;

        \Cart::add($rowId, $name, $qty, $price, 0, ['image' => $image, 'link' => $link]);
        return redirect()->back();
    }

    public function deleteItem(Request $request){
        $rowId = $request->get('rowId');
        if($request->submit == 'delete'){
            \Cart::remove($rowId);
        }
        return redirect()->back();
    }

    public function updateCart(Request $request){
        if($request->submit == 'update'){
            foreach(\Cart::content() as $item){
                \Cart::update($item->rowId, $request->get($item->rowId));
            }
        }
        return redirect()->back();
    }

    public function checkout(Request $request){
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/regions', [
            '' => ''
        ]);
        $regions = $response->json();
        $data['myForm'] = '';
        $data['regions'] = $regions['data'];
        return view('checkout', $data);
    }

    public function checkoutSubmit(Request $request){
        session(['formValues' => $request->all()]);

        if($request->region != '' && (!$request->btnSubmit  == 'submit')){
            $region = $request->get('region');
            $shippingInfo["shippingCity"] = $region;
            foreach(\Cart::content() as $row){
                $temp["pricebookEntryId"] = $row->id;
                $temp["quantity"] = $row->qty;
                $shippingInfo["entries"][] = $temp;
            }
            $postArray['shippingInfo'] = $shippingInfo;
            $response = Http::withBody(json_encode($postArray), 'application/json')->post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/shippingcharges');
            $result = $response->json();
            $shippingCharge = $result['data'];
            session(['shippingCharge' => $shippingCharge]);
            session(['cartTotal' => $shippingCharge + (str_replace(',', '', \Cart::total()) + $shippingCharge)]);
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'region' => 'required',
            'email' => ['required', 'email:rfc,dns'],
            'phone' => 'required',
            'terms' => 'required',            
            ]);

        if($request->btnSubmit  == 'quote'){
            // $pdf = PDF::loadView('getquote', ['details' => $request]);
            // return $pdf->download('getQuote.pdf');
            // return redirect()->back();

            $leadInfo = array(
                "firstName" => $request->firstname,
                "lastName" => $request->lastname,
                "mobilephone" => $request->phone,
                "email" => $request->email,
                "company" => $request->company
            );
            $orderInfo = array(
                "Shipping_City__c" => $request->region,
                "Shipping_Cost__c" => session('shippingCharge'),
                "Shipping_Country__c" => $request->country,
                "Shipping_Street__c" => $request->street,
                "P_O_Box__c" => $request->postcode,
                "Payment_Mode__c" => 'Cash on Delivery'
            );

            foreach(\Cart::content() as $row){
                $temp["pricebookEntryId"] = $row->id;
                $temp["quantity"] = $row->qty;
                $info["entries"][] = $temp;
            }
            $info['leadInfo'] = $leadInfo;
            $info['orderInfo'] = $orderInfo;
            $postArray['checkoutInfo'] = $info;

            $response = Http::withBody(json_encode($postArray), 'application/json')->post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/placeorder');
            $result = $response->json();
            session(['requestId' => $result['data']]);

            $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/getquote',[
                'requestId' => $result['data'],
            ]);
            $resultQuote = $response->json();            
            if($resultQuote['success'] == true){
                \Session::flash('msg','Please check your email for the quotation...');
                \Session::flash('msg-class','alert-success');
            }
            return redirect()->back();
        }

        if($request->btnSubmit  == 'submit'){            
            $leadInfo = array(
                "firstName" => $request->firstname,
                "lastName" => $request->lastname,
                "mobilephone" => $request->phone,
                "email" => $request->email,
                "company" => $request->company
            );
            if(session('requestId') !== NULL){
                $statusKey = "id";
                $statusValue = session('requestId');
            }else{
                $statusKey = "status__c";
                $statusValue = 'Submitted';
            }
            $orderInfo = array(
                $statusKey => $statusValue,
                "Shipping_City__c" => $request->region,
                "Shipping_Cost__c" => session('shippingCharge'),
                "Shipping_Country__c" => $request->country,
                "Shipping_Street__c" => $request->street,
                "P_O_Box__c" => $request->postcode,
                "Payment_Mode__c" => $request->checkout_payment_method == 'creditcard'? 'Credit Card' : 'Cash on Delivery',
            );

            foreach(\Cart::content() as $row){
                $temp["pricebookEntryId"] = $row->id;
                $temp["quantity"] = $row->qty;
                $info["entries"][] = $temp;
            }
            $info['leadInfo'] = $leadInfo;
            $info['orderInfo'] = $orderInfo;
            $postArray['checkoutInfo'] = $info;
            if($request->checkout_payment_method == 'creditcard'){
                
            }else{
                $response = Http::withBody(json_encode($postArray), 'application/json')->post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/placeorder');
                $result = $response->json();
                if($result['success'] == true){
                    session()->flush();
                    return redirect('order-complete');                
                }
            }            
            return json_encode($result['message']);
        }
    }    

    public function makePayment(){
        $outletRef = '33c4ddf7-d153-4320-ab94-e19e58714fe1';
        $apikey = 'Njc5Yzg0NmMtMDI2My00YzU1LWIyMzYtYzI2OTVhNmY4OTJiOmYwNjI3ZjczLWFmMGYtNDkyZS1iZmE5LTI5ZjA4YmEwODc2Mw==';
        $idServiceURL = "https://api-gateway.sandbox.ngenius-payments.com/identity/auth/access-token";
        $txnServiceURL = "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/" . $outletRef . "/orders";
        $tokenHeaders = array("accept: application/vnd.ni-identity.v1+json", "authorization: Basic " . $apikey, "content-type: application/vnd.ni-identity.v1+json");
        $tokenResponse = $this->curlRequest("POST", $idServiceURL, $tokenHeaders, "{\"realmName\":\"ni\"}");
        $tokenResponse = json_decode($tokenResponse);
        $access_token = $tokenResponse->access_token;
        $redirectURL = URL::to('/checkout/networkresponse');

        
    }

    public function getCart(){
        $cart = array();
        $temp = array();
        foreach(\Cart::content() as $row){
            $temp['subtotal'] = $row->subtotal();
            $temp['total'] = $row->total();
            $temp['qty'] = $row->qty;
            $temp['name'] = $row->name;
            $cart[] = $temp;
        }
        $result['cart'] = $cart;
        $result['subtotal'] = \Cart::subtotal();
        $result['total'] = \Cart::total();
        $result['tax'] = \Cart::tax();
        $result['shippingCharge'] = round(session('shippingCharge'), 2);
        return json_encode($result);
    }

    public function getRegions(){
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/regions', [
            '' => ''
        ]);
        $result = $response->json();
        return json_encode($result['data']);
    }

    public function updateShipping(Request $request){
        session(['formValues' => $request->all()]);
        $region = $request->get('region');
        $shippingInfo["shippingCity"] = $region;
        foreach(\Cart::content() as $row){
            $temp["pricebookEntryId"] = $row->id;
            $temp["quantity"] = $row->qty;
            $shippingInfo["entries"][] = $temp;
        }
        $postArray['shippingInfo'] = $shippingInfo;
        $response = Http::withBody(json_encode($postArray), 'application/json')->post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/shippingcharges');
        $result = $response->json();
        $shippingCharge = $result['data'];
        session(['shippingCharge' => $shippingCharge]);
        session(['cartTotal' => $shippingCharge + (str_replace(',', '', \Cart::total()) + $shippingCharge)]);
        $ajaxReturn = array('shippingCharge' => $shippingCharge ? 'AED '. number_format($shippingCharge, 2) : 'NA', 'cartTotal' => 'AED ' . ($shippingCharge + (str_replace(',', '', \Cart::total()))));
        return json_encode($ajaxReturn);
    }
}