<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use PDF;

class CategoryController extends Controller {

    public function getCategories() {
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/categories', [
                    '' => ''
        ]);
        $result = $response->json();
        return json_encode($result['data']);
    }

    public function showSubcategories(Request $request, $category) {
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/subcategories', [
                    'categoryId' => $category
        ]);
        $result = $response->json();
        if(!count($result['data'])){

            //call the subcategory API with the category name, to get the products
            $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/fetchProducts', [
                    'subcategoryId' => $category
            ]);
            $result = $response->json();
            $parentCat = $result['data'][0]['Product2']['Portal_Category__r']['Name'];

            $currentPage = $request->input("page") ?? 1;
            $perPage = 12;
            $currentItems = array_slice($result['data'], $perPage * ($currentPage -1 ), $perPage);
            $paginator = new LengthAwarePaginator($currentItems, count($result['data']), $perPage, $currentPage);
            $paginator->setPath('');
            $CategoryName = $paginator[0]['Product2']['Portal_Category__r']['Name'];

            return view('category-product-list', ['results' => $paginator, 'category' => $CategoryName]);
        }else{
            $parentCat = $result['data'][0]['Parent_Category__r']['Name'];
        }
        return view('category', ['results' => $result['data'], 'category' => $parentCat]);
    }

    public function showSubcategoryProducts(Request $request, $category, $subCategory) {
        $subcategoryString = $subCategory;
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/fetchProducts', [
                    'subcategoryId' => $subcategoryString
        ]);
        $result = $response->json();

        $currentPage = $request->input("page") ?? 1;
        $perPage = 12;
        $currentItems = array_slice($result['data'], $perPage * ($currentPage -1 ), $perPage);
        $paginator = new LengthAwarePaginator($currentItems, count($result['data']), $perPage, $currentPage);
        $paginator->setPath('');
        $subCategoryName = $paginator[0]['Product2']['Portal_Subcategory__r']['Name'];
        $CategoryName = $paginator[0]['Product2']['Portal_Category__r']['Name'];

        return view('sub-category', ['results' => $paginator, 'category' => $CategoryName, 'subCategory' => $subCategoryName]);
    }

    public function showProductDetails($category, $subCategory, $product){
        // $productString = $category . '#'. $subCategory .'#'. $product;
        // dd(str_replace('-',' ', $category. ' '. $subCategory.' '. $product));
        $productString = $product;
        // die($productString);
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/productDetail', [
                    'pricebookEntryId' => $productString,
        ]);
        $result = $response->json();
        // dd($result);

        return view('product-details', ['details' => $result['data'], 'product' => 'Check']);
    }

    public function shop(){
        $response = Http::post(config('benaa.sf_url').'/services/apexrest/DuconSiteFactory/categories', [
                    '' => ''
        ]);
        $result = $response->json();
        return view('shop', ['categories' => $result['data']]);
    }
}
