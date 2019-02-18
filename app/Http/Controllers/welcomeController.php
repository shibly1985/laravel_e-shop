<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Manufacturer;
use DB;

class welcomeController extends Controller {

    public function index() {
        $products = Product::where('publicationStatus', 1)->get();
        return view('frontEnd.home.index', ['products' => $products]);
    }

    public function category($id) {
        //echo $id;
        $categoryWiseProducts = Product::where('publicationStatus', 1)
                ->where('subCategoryId', $id)
                ->paginate(8);
        //->get();
        return view('frontEnd.category.categoryContent', ['categoryWiseProducts' => $categoryWiseProducts]);
    }

    public function detailsProduct($id) {
        $detailsIndividualProducts = Product::where('id', $id)->first();
        //print_r($detailsIndividualProducts);
        return view('frontEnd.product.detailsIndividualProduct', ['detailsIndividualProducts' => $detailsIndividualProducts]);
    }

    public function searchProduct(Request $request) {
        $productName = $request->searchValue;
        //$categoryId = $request->categoryId;
        //$products = Product::where('productName', $productName)->get();
        $searchProducts = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->where('productName', $productName)
                ->orwhere('productName', 'like', '%' . $productName . '%')
                //->where('categoryId', $categoryId)
                ->paginate(8);
                //->get();
        
        return view('frontEnd.home.searchContent', ['searchProducts' => $searchProducts]);
    }

}
