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

//Route::get('make_order', 'OrderController@home')->name('make_order');
Route::get('order', 'OrderController@order')->name('order');
Route::post('place_order', 'OrderController@placeOrder')->name('place.order');


Route::get('dashboard',function (){
    $data['title']='Dashboard';
    return view('admin.dashboard',$data);
})->name('dashboard');

//Route::get('cart',function (){
//    $data['title']="cart";
//    return view('cart',$data);
//})->name('cart');
//Route::resource('user',UserController::class);
Route::get('user/create','UserController@create')->name('user.create');
Route::post('user/store','UserController@store')->name('user.store');
Route::get('user/index','UserController@index')->name('user.index');
Route::get('user/{id}/edit','UserController@edit')->name('user.edit');
Route::put('user/{id}/update','UserController@update')->name('user.update');
Route::delete('user/{id}/delete','UserController@destroy')->name('user.destroy');
Route::get('user/getdata','UserController@getData')->name('user.getdata');
Route::resource('beverage_category',BeverageCategoryController::class);
Route::resource('beverage_size',BeverageSizeController::class);
Route::resource('snacks_category',SnacksCategoryController::class);
Route::resource('snacks_size',SnacksSizeController::class);
Route::resource('beverage_flavor',BeverageFlavorController::class);
Route::resource('snacks_flavor',SnacksFlavorController::class);
Route::resource('stock',StockController::class);
Route::resource('beverage_type',BeverageTypeController::class);
Route::resource('snacks_type',SnacksTypeController::class);
//Route::post('stock/store/{id}','StockController@store')->name('stock.store');


Route::get('inventory/{category}/create','InventoryController@create')->name('inventory.create');
Route::post('inventory/store','InventoryController@store')->name('inventory.store');
Route::get('inventory/index','InventoryController@index')->name('inventory.index');
Route::get('inventory/{type}/{id}/edit','InventoryController@edit')->name('inventory.edit');
Route::get('inventory/{id}/show','InventoryController@show')->name('inventory.show');
Route::put('inventory/{id}/update','InventoryController@update')->name('inventory.update');
Route::delete('inventory/{id}/delete','InventoryController@destroy')->name('inventory.destroy');
//Route::post('add_to_cart','InventoryController@AddToCart')->name('add_to_cart');
//Route::get('cart_list','InventoryController@cartList')->name('cart_list');
//Route::get('remove_cart/{id}','InventoryController@cartRemove')->name('remove_cart');
Route::resource('area',AreaController::class);
Route::resource('shop_registration',ShopRegistrationController::class);
Route::resource('shopkeeper',ShopkeeperController::class);
Route::resource('area_manager',AreaManagerController::class);
Route::resource('employee',EmployeeController::class);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
