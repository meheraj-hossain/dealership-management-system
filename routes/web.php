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
Route::get('dashboard',function (){
    $data['title']='Dashboard';
    return view('admin.dashboard',$data);
})->name('dashboard');

Route::resource('user',UserController::class);
Route::resource('beverage_category',BeverageCategoryController::class);
Route::resource('beverage_size',BeverageSizeController::class);
Route::resource('snacks_category',SnacksCategoryController::class);
Route::resource('snacks_size',SnacksSizeController::class);

Auth::routes();
