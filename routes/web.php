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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['admin']], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('checkout', 'CheckoutController');
	Route::get('/dashboard', function () {
	    return view('master');
	});
});
	
Auth::routes();
// Route::get('/checkout', 'CheckoutController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('shop', 'FrontEndController');
Route::get('/checkout_product', 'FrontEndController@checkout');
// Route::get("/categories_all/{id}", 'FrontEndController@call_cat');
Route::get("/product/{id}", 'FrontEndController@show');
Route::get("/single_product/{id}", 'FrontEndController@show_single_product');
Route::get("/modal_product/{id}", 'FrontEndController@modal_product');
Route::post('/checkout_products_list', 'FrontEndController@checkout_products_list');
// Route::post("/checkout", 'FrontEndController@checkout');


Route::get('/testing_helper', function () {
	$items = array('id' => 23, 'name' => 'product1', 'quantity' => 5, 'price' => 10);
	$products = array(array('id' => 23, 'name' => 'product1', 'quantity' => 5, 'price' => 10),
		array('id' => 24, 'name' => 'product1', 'quantity' => 5, 'price' => 10),
		array('id' => 25, 'name' => 'product1', 'quantity' => 5, 'price' => 10));
	// Cart::add_to_cart($items);
    Cart::empty_cart();
    // Cart::remove_from_cart(24);
    // Cart::update_cart($products);	
});

Route::get('/display', function(){
	Cart::get_cart();
});