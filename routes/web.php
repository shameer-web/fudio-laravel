<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');

 //Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');



Route::group(array('middleware' => 'auth','middleware' => 'is_admin','prefix'=>'admin','namespace'=>'Admin'), function()
{   
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
    Route::resource('user','UserController');
    Route::resource('vendor','VendorController');
    Route::resource('category','CategoryController');
    Route::resource('slide','SlideController');
    Route::resource('item','ItemController');
    Route::resource('menus','MenuController');
    Route::resource('offer','OfferController');
    Route::resource('order','OrderController');



	});


Route::group(array('middleware' => 'auth','middleware' => 'is_vendor','prefix'=>'vendor','namespace'=>'Vendor'), function()
{ 

Route::get('/', 'DashboardController@index')->name('vendor.dashboard.index');

 Route::resource('items','ItemController');
 Route::resource('menu','MenuController');
 Route::resource('orders','OrderController');

  

	});



Route::get('assets/image/offer/banners/{filename}', function ($filename)
{
    $path = storage_path('app/offer/banners/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});




Route::get('assets/image/category/{filename}', function ($filename)
{
    $path = storage_path('app/category/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});





Route::get('assets/image/item/{filename}', function ($filename)
{
    $path = storage_path('app/item/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});


Route::get('assets/image/vendor/vendor/{filename}', function ($filename)
{
    $path = storage_path('app/vendor/vendor/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});


Route::get('assets/image/vendor/banner/{filename}', function ($filename)
{
    $path = storage_path('app/vendor/banner/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});
