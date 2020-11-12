<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller {

    public function index() {
        return view('index');
    }

    public function search(Request $request, $page = 1) {
        $key = $request->input('searchKey');
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/search', [
            'key' => $key,
        ]);
        $result = $response->json();
        if(count($result['data'])){
            $currentPage = $request->input("page") ?? 1;
            $perPage = 12;
            $currentItems = array_slice($result['data'], $perPage * ($currentPage -1 ), $perPage);
            $paginator = new LengthAwarePaginator($currentItems, count($result['data']), $perPage, $currentPage);
            $paginator->setPath('');    
            $subCategoryName = $paginator[0]['Product2']['Portal_Subcategory__r']['Name'];
            $CategoryName = $paginator[0]['Product2']['Portal_Category__r']['Name'];
            return view('searchResult', ['results' => $paginator, 'category' => $CategoryName, 'subCategory' => $subCategoryName, 'key' => $key]);
        }else{
            $paginator = array();
            return view('searchResult', ['results' => $paginator, 'key' => $key]);
        }        
    }

    public function ajaxSearch(Request $request){
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/search', [
            'key' => $request->key,
        ]);
        $subCategoryName ='';
        $CategoryName = '';
        $suggestion = array();
        if(count($response['data'])){
            $subCategoryName = isset($response['data'][0]['Product2']['Portal_Subcategory__r']['Name']) ? $response['data'][0]['Product2']['Portal_Subcategory__r']['Name'] : 'subcat';
            $CategoryName = isset($response['data'][0]['Product2']['Portal_Category__r']['Name']) ? $response['data'][0]['Product2']['Portal_Category__r']['Name'] : 'cat';

            $key = $request->key;
            $cat = '';
            $brand = '';
            foreach($response['data'] as $row){
                if(stripos($row['Name'], $key) == 0){
                    $prod = implode(' ', array_slice(explode(' ', $row['Name']), 0, 2));                    
                }else{
                    $prod = substr($row['Name'], 0, stripos($row['Name'], ' ', stripos($row['Name'], $key)));
                }
                if(isset($row['Product2']['Portal_Category__r']['Name'])){
                    $cat = $row['Product2']['Portal_Category__r']['Name'];
                    $Id = $row['Product2']['Portal_Category__r']['Id'];
                }
                if(isset($row['Product2']['Brand_Name__c'])){
                    $brand = $row['Product2']['Brand_Name__c'];
                }
                $suggestion['products'][] = preg_replace('/[^A-Za-z0-9\- ]/', '', $prod); // to remove some commas
                $suggestion['categories'][] = array('Name'=>$cat, 'Id'=>$Id);
                $suggestion['brands'][] = $brand;
            }
            $suggestion['products'] = array_unique($suggestion['products']);
            $suggestion['categories'] = array_map("unserialize", array_unique(array_map("serialize", $suggestion['categories'])));
            $suggestion['brands'] = array_unique($suggestion['brands']);
        }        
        return view('search-suggestions', ['result' => array_slice($response['data'], 0, 6), 'category' => $CategoryName, 'subCategory' => $subCategoryName, 'suggestion' => $suggestion]);
    }

    public function fastTrackSubmit(Request $request){
        $response = Http::asForm()->post(config('benaa.fast_track_action'), $request->all());
        $result = $response->json();        
        return $result;
    }

    public function contactUsSubmit(Request $request){
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/createlead', [
            'lead' => $request->all(),
        ]);
        $result = $response->json();        
        return $result;
    }
}
