<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', 'welcomeController@index');
Route::get('/categoryView/{id}', 'welcomeController@category');
Route::get('/product/details/{id}', 'welcomeController@detailsProduct');

Route::post('/product/search', 'welcomeController@searchProduct');



/* Cart Info Starts */
Route::post('/add-to-cart', 'cartController@add_to_cart');
Route::get('/show-cart', 'cartController@show_cart');
Route::post('/delete-from-cart', 'cartController@delete_from_cart');
Route::post('/update-cart', 'cartController@update_cart');
/* Cart Info Ends */

/* Checkout Info Starts */
Route::get('/checkout', 'checkoutController@index');
Route::post('/checkout/sign-up', 'checkoutController@customerRegistration');
Route::get('/checkout/shipping', 'checkoutController@showShippingForm');
Route::post('/checkout/save-shipping', 'checkoutController@saveShippingInfo');
Route::get('/checkout/payment', 'checkoutController@showPaymentForm');
Route::post('/checkout/save-order', 'checkoutController@saveOrderInfo');
Route::get('/checkout/my-home', 'checkoutController@orderConfirmation');
/* Checkout Info Ends */



Auth::routes();

Route::get('/home_new', 'HomeController@index')->name('home');


Route::group(['middleware' => 'AuthenticateMiddleware'], function() {

    /* Category Info Starts */
    Route::get('/category/add', 'cateController@addCategory');
    Route::post('/category/save', 'cateController@saveCategory');
    Route::get('/category/manage', 'cateController@manageCategory');
    Route::get('/category/edit/{id}', 'cateController@editCategory');
    Route::post('/category/update', 'cateController@updateCategory');
    Route::get('/category/delete/{id}', 'cateController@deleteCategory');
    /* Category Info Ends */

    /* Sub Category Info Starts */
    Route::get('/subcategory/add', 'subcategoryController@addSubCategory');
    Route::post('/subcategory/save', 'subcategoryController@saveSubCategory');
    Route::get('/subcategory/manage', 'subcategoryController@manageSubCategory');
    Route::get('/subcategory/edit/{id}', 'subcategoryController@editSubCategory');
    Route::post('/subcategory/update', 'subcategoryController@updateSubCategory');
    Route::get('/subcategory/delete/{id}', 'subcategoryController@deleteSubCategory');
    /* Sub Category Info Ends */

    /* Manufacturer Info Starts */
    Route::get('/manufacturer/add', 'manufacturerController@addManufacturer');
    Route::post('/manufacturer/save', 'manufacturerController@saveManufacturer');
    Route::get('/manufacturer/manage', 'manufacturerController@manageManufacturer');
    Route::get('/manufacturer/edit/{id}', 'manufacturerController@editManufacturer');
    Route::post('/manufacturer/update', 'manufacturerController@updateManufacturer');
    Route::get('/manufacturer/delete/{id}', 'manufacturerController@deleteManufacturer');
    /* Manufacturer Info Ends */

    /* Product Info Starts */
    Route::get('/product/add', 'productInfoController@addProduct');
    Route::post('/product/save', 'productInfoController@saveProduct');
    Route::get('/product/manage', 'productInfoController@manageProducts');
    Route::get('/product/view/{id}', 'productInfoController@viewProducts');
    Route::get('/product/edits/{id}', 'productInfoController@editProducts');
    Route::post('/product/update', 'productInfoController@updateProducts');
    Route::get('/product/delete/{id}', 'productInfoController@deleteProducts');
    /* Product Info Ends */


    /* User Info Starts */
    Route::get('/user/manages', 'userController@manageUser');

    /* User Info Ends */
});
