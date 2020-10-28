<?php

namespace App\Http\Controllers;

use Exception;
use Facade\FlareClient\View;
use Gloudemans\Shoppingcart\Facades\Cart;
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
        }elseif($request->submit == 'clear'){
            \Cart::destroy();
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
                try{
                    $payLink = $this->makePayment($request);                       
                    session(['postArray' => $postArray]);
                    return redirect($payLink);
                } catch(Exception $e){                    
                    return back()->withError($e->getMessage());
                }                
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

    public function makePayment(Request $request){
        try{
            $outletRef = config('benaa.OUTLET');
            $apikey = config('benaa.APIKEY');
            $idServiceURL = config('benaa.TOKENURL');
            $txnServiceURL = config('benaa.ORDERURL') . $outletRef . "/orders";
            $tokenHeaders = array(
                "Content-Type" => "application/vnd.ni-identity.v1+json",
                "Authorization" => "Basic " . $apikey
            );
            $tokenResponse = Http::withHeaders($tokenHeaders)->post($idServiceURL, [
                'realmName' => config('benaa.REALNAME'),
            ]);
            $tokenResponse = json_decode($tokenResponse);
            $access_token = $tokenResponse->access_token;
            $redirectURL = \URL::to('/checkout/networkresponse');
            
            $order = new \stdClass();
            $order->action = "SALE";  // Transaction mode ("AUTH" = authorize only, no automatic settle/capture, "SALE" = authorize + automatic settle/capture)
            $order->amount = new \stdClass();
            $order->amount->currencyCode = "AED";
            $order->amount->value = (floatval(\Cart::total()) + floatval(session('shippingCharge'))) * 100;   // Minor units (1000 = 10.00 AED)
    //        $order->language = "en";                                        // Payment page language ('en' or 'ar' only)
            $order->merchantOrderReference = date('Ymdhis');
            $order->merchantAttributes = new \stdClass();
            $order->merchantAttributes->redirectUrl = $redirectURL;
            $order->merchantAttributes->skipConfirmationPage = true;
            $order->billingAddress = new \stdClass();
            $order->billingAddress->firstName = $request->firstname;
            $order->billingAddress->lastName = $request->lastname;
            $order->billingAddress->address1 = $request->street;
            $order->billingAddress->city = $request->region;    
            $order->billingAddress->countryCode = $request->country;
            $order->merchantDefinedData = new \stdClass();
            $order->merchantDefinedData->website = $_SERVER['SERVER_NAME'];
            $order = json_encode($order);

            $orderCreateHeaders = array(
                'Authorization' => 'Bearer '. $access_token,
                // 'Content-Type' => 'application/vnd.ni-payment.v2+json',
                'Accept' => 'application/vnd.ni-payment.v2+json',
            );
            $orderCreateResponse = Http::withHeaders($orderCreateHeaders)->withBody($order, 'application/vnd.ni-payment.v2+json')->post($txnServiceURL);
            $orderCreateResponse = json_decode($orderCreateResponse);
            $paymentLink = $orderCreateResponse->_links->payment->href;     // the link to the payment page for redirection (either full-page redirect or iframe)
            $orderReference = $orderCreateResponse->reference;              // the reference to the order, which you should store in your records for future interaction with this order
            return $paymentLink;
        }catch(Exception $e){
            $msg = $e->getMessage();
            $msg .= ' ' . ($tokenResponse->errors[0]->message?? '');
            $msg .= ' ' . ($orderCreateResponse->errors[0]->message?? '');
            throw new Exception($msg);
        }        
    }

    public function networkResponse(){
        $raw_get_data = $_GET;
        $outletRef = config('benaa.OUTLET');
        $apikey = config('benaa.APIKEY');
        $idServiceURL = config('benaa.TOKENURL');
        $txnServiceURL = config('benaa.ORDERURL') . $outletRef . "/orders/" . $raw_get_data['ref'];

        $tokenHeaders = array(
            "accept" => "application/vnd.ni-identity.v1+json",
            "authorization" => "Basic " . $apikey,
            "content-type" => "application/vnd.ni-identity.v1+json"
        );
        $tokenResponse = Http::withHeaders($tokenHeaders)->post($idServiceURL, [
            'realmName' => config('benaa.REALNAME'),
        ]);
        $tokenResponse = json_decode($tokenResponse);
        $access_token = $tokenResponse->access_token;

        $orderStatusHeaders = array(
            "Authorization" => "Bearer " . $access_token,
            "Content-Type" => "application/vnd.ni-payment.v2+json",
            "Accept" => "application/vnd.ni-payment.v2+json"
        );
        $orderStatusResponse = Http::withHeaders($orderStatusHeaders)->get($txnServiceURL);
        $orderStatusResponse = json_decode($orderStatusResponse);
        $orderStatus = $orderStatusResponse->_embedded->payment[0]->state;
        
        if ($orderStatus == 'CAPTURED') {
            $orderNumber= $orderStatusResponse->merchantOrderReference;
            $postArray = session('postArray');
            $response = Http::withBody(json_encode($postArray), 'application/json')->post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/placeorder');
            $result = $response->json();
            if($result['success'] == true){
                session()->flush();
                return redirect('order-complete');
            }            
        } else {
            return redirect('/checkout')->withError('Payment Failed!');
        }
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
        $emirate = $request->emirate;
        $shippingInfo["shippingCity"] = $region;
        $shippingInfo["emirate"] = $emirate;
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

    public function AJAXAddtoCart(Request $request){
        \Cart::setGlobalTax(5);
        $rowId = $request->get('id');
        $name = $request->get('name');
        $price = $request->get('price');
        $image = $request->get('image');
        $link = $request->get('link');
        $qty = $request->has('quantity') ? $qty = $request->get('quantity') : 1;
        \Cart::add($rowId, $name, $qty, $price, 0, ['image' => $image, 'link' => $link]);
        $cartHtml = (string) view('drop-cart');
        return response()->json(['msg' => 'Product Added to the cart', 'class' => 'success', 'cartHtml' => $cartHtml]);
    }
}