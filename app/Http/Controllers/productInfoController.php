<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Category;
use App\Product;
use App\Subcategory;
use DB;

class productInfoController extends Controller {

    public function addProduct() {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturer = Manufacturer::where('publicationStatus', 1)->get();
        $subCategory= Subcategory::where('publicationStatus', 1)->get();
        return view('admin.home.product.addProduct',['categories' => $categories,'subCategories' => $subCategory, 'manufacturer' => $manufacturer]);
    }

    public function saveProduct(Request $request) {
        //dd($request->all());
        //return $request->all();
        $productImage = $request-> file('productImage');
        $imageName = $productImage-> getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage-> move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this-> saveProductInfo($request, $imageUrl);
        return redirect('/product/add')->with('message', 'Product Saved Succesfully');
    }

    protected function saveProductInfo(Request $request, $imageUrl) {
        $product = new Product();
        $product-> productName = $request-> productName;
        $product-> categoryId = $request-> categoryId;
        $product-> subCategoryId = $request-> subCategoryId;
        $product-> manufacturerId = $request-> manufacturerId;
        $product-> productPrice = $request-> productPrice;
        $product-> productQuantity = $request-> productQuantity;
        $product-> proLongDescription = $request-> proLongDescription;
        $product-> proShortDescription = $request-> proShortDescription;
        $product-> productImage = $imageUrl;
        $product-> publicationStatus = $request-> publicationStatus;
        $product->save();
    }

    public function manageProducts() {

        $products = DB::table('products')
                  ->join('categories', 'products.categoryId', '=', 'categories.id')
                  ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                  ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                  ->get();
        //$products = Product::where('publicationStatus', 1)-> get();
        return view('admin.home.product.manageProducts', ['products' => $products]);
    }

    public function viewProducts($id) {
	
        $products = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first();
        return view('admin.home.product.viewProducts', ['products' => $products]);
    }

    public function editProducts($id) {
	
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturer = Manufacturer::where('publicationStatus', 1)->get();
        $productById = Product::where('id', $id)->first();
        return view('admin.home.product.editProducts', ['categories' => $categories, 'manufacturer' => $manufacturer, 'productById' => $productById]);
    }

    public function updateProducts(Request $request) {

        $imageUrl = $this-> imageExistStatus($request);
		
        $product = Product::find($request->productId);
		
        $product-> productName = $request-> productName;
        $product-> categoryId = $request-> categoryId;
        $product-> manufacturerId = $request-> manufacturerId;
        $product-> productPrice = $request-> productPrice;
        $product-> productQuantity = $request-> productQuantity;
        $product-> proLongDescription = $request-> proLongDescription;
        $product-> proShortDescription = $request-> proShortDescription;
        $product-> productImage = $imageUrl;
        $product-> publicationStatus = $request->publicationStatus;
        $product-> save();
        return redirect('/product/manage')-> with('message', 'Product Delete Succesfully');
		
    }

    private function imageExistStatus($request) {
        $productById = Product::where('id', $request-> productId)-> first();
        $productImage = $request-> file('productImage');
        if ($productImage) {
            $oldImageUrl = $productById-> productImage;
            unlink($oldImageUrl);
            $imageName = $productImage-> getClientOriginalName();
            $uploadPath = 'public/productImage/';
            $productImage-> move($uploadPath, $imageName);
            $imageUrl = $uploadPath.$imageName;
        } else {
            $imageUrl = $productById-> productImage;
        }
        return $imageUrl;
    }

    public function deleteProducts($id) {
        $products = Product::find($id);
        $products-> delete();
        return redirect('/product/manage')-> with('message', 'Product Delete Succesfully');
    }

}
