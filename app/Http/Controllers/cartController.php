<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Redirect;

class cartController extends Controller {

    public function add_to_cart(Request $request) {
        $quantity = $request->qty;
        $productId = $request->productId;
        $product_info = DB::table('products')
                ->where('products.id', $productId)
                ->first();
        $data['id'] = $product_info->id;
        $data['name'] = $product_info->productName;
        $data['price'] = $product_info->productPrice;
        $data['qty'] = $quantity;
        $data['options']['image'] = $product_info->productImage;
        //Cart::destroy();
        Cart::add($data);
        return redirect('/show-cart');
    }

    public function show_cart() {
        return view('frontend.cart.addToCart');
    }

    public function delete_from_cart(Request $request) {
        $rowId = $request->rowId;
        Cart::update($rowId, 0);
        return redirect('/show-cart');
    }
    
    public function update_cart(Request $request) {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return redirect('/show-cart');
    }

}
