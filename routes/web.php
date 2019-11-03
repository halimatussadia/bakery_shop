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
// Route::get('/', function (){
//    return view('welcome');

// });



Route::group( ['middleware' => 'auth'], function() {

Route::get('/admin','backend\BackendController@dashboard')->name('dashboard');

Route::get('/logout', 'frontend\LoginController@logout')->name('logout');

Route::get('/add_to_cart/{id}/{type}','frontend\CartController@addToCart')->name('cart.add');

Route::post('customize/add_to_cart/{id}','frontend\CartController@customizeAddToCart')->name('customize.cart.add');

Route::get('/cart','frontend\CartController@showCart')->name('Carts');
Route::get('/cart/delete/{id}','frontend\CartController@deleteCart')->name('delete.Cart');

//<--Order-page-->
Route::get('/orders','frontend\OrderController@showOrder')->name('orders');
Route::post('/postorders','frontend\OrderController@doOrder')->name('orders.post');
Route::get('/orders/delete/{id}','frontend\OrderController@deleteOrder')->name('delete.order');

Route::get('/product/customize/{id}','frontend\ProductController@productcustomize')->name('productcustomize');


Route::get('/profile','frontend\ProfileController@profileform')->name('profile');
Route::get('/profile/edit/{id}', 'frontend\ProfileController@editprofile')->name('edit.profile');
Route::post('/profile/update/{id}', 'frontend\ProfileController@updateprofile')->name('update.profile');
});

Route::get('/login', 'frontend\LoginController@Loginform')->name('login');
Route::post('/do_login', 'frontend\LoginController@doLogin')->name('user.login');

Route::get('/add_detail/{id}','frontend\DetailsController@detailProduct')->name('details');

Route::get('/', 'frontend\ProductController@UserPanel')->name('user');

Route::get('/registration', 'frontend\ProductController@registerForm')->name('show.form');
Route::get('/category','frontend\CategoryController@showcategory')->name('category');
Route::get('/products','frontend\ProductController@showProduct')->name('products');
Route::get('/products/category/{id}','frontend\ProductController@categoryWiseProduct')->name('category.products');


Route::group(['prefix' => 'admin' ], function()
{

Route::post('/registration','backend\BackendController@registarUser')->name('registar');

Route::get('/order','backend\OrderController@showOrders')->name('order');

Route::get('/order/delete/{id}', 'backend\OrderController@deleteOrders')->name('delete.order');
Route::post('/order/completed/{id}', 'backend\OrderController@completeOrder')->name('complete.order');
Route::post('/order/paid/{id}', 'backend\OrderController@paid')->name('paid');


Route::get('/users', 'backend\BackendController@showUsers')->name('users');
Route::get('/users/delete/{id}', 'backend\BackendController@deleteUsers')->name('delete.user');
Route::get('/users/edit/{id}', 'backend\BackendController@editUsers')->name('edit.user');
Route::post('/users/update/{id}', 'backend\BackendController@updateUsers')->name('update.user');


Route::get('/categories', 'backend\CategoryController@showCategories')->name('categories');
Route::post('/categories','backend\CategoryController@categoryform')->name('categoryform');
Route::get('/categories/edit/{id}','backend\CategoryController@editCategory')->name('edit.category');
Route::post('/categories/update/{id}','backend\CategoryController@postCategory')->name('update.category');


Route::get('/product','backend\ProductController@showProduct')->name('product');
Route::post('/product','backend\ProductController@productform')->name('productform');
Route::get('/product/edit/{id}','backend\ProductController@editProduct')->name('edit.product');
Route::post('/product/update/{id}','backend\ProductController@updateProduct')->name('update.product');

Route::get('/order/details/{id}.php','backend\OrderdetailController@showdetails')->name('detail');

Route::get('/customize/{id}','backend\CustomizeController@customize')->name('customize');
Route::get('/report','backend\ReportController@reportgenerate')->name('report');


Route::get('/payments/{id}','backend\PaymentController@index')->name('payments');
Route::get('/payments/details/{id}','backend\PaymentController@show');


});



Route::get('/home', 'HomeController@index')->name('home');
