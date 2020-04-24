<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/books', 'BookController@index')->name('books');
Route::get('/books/create', 'BookController@create')->name('create_book');
Route::get('/books/{id}', 'BookController@show')->name('book');
Route::post('/books/store', 'BookController@store')->name('store_book');
Route::post('/books/order/{id}', 'BookController@order')->name('order_book');
