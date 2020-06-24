<?php
namespace App\Http\Middleware;
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
})->name('/');
Route::get('/login', function () {
    return view('login');
});

Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'administrator'], function () {
  
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('admin');
    Route::get('product', 'ProductController@index')->name('products');
    Route::post('product/post', 'ProductController@store')->name('product');
    Route::get('markAsread','ProductController@markread');
    Route::get('product/show/{product}', 'ProductController@show')->name('product.show');
    Route::post('product/update', 'ProductController@update')->name('product.update');
    Route::post('product/delete', 'ProductController@delete')->name('product.delete');

    Route::get('user', 'UserController@index')->name('user');
    Route::get('user/show/{user}', 'UserController@show')->name('user.show');
    Route::post('user/post', 'UserController@store')->name('user.add');;
    Route::post('user/update', 'UserController@update')->name('user.update');
    Route::post('user/delete', 'UserController@delete')->name('user.delete');
});