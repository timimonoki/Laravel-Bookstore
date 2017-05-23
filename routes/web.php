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
    return view('templates.index');
})->name('index');

Route::get('/sign-in', function(){
    return view('templates.myAccount');
})->name('myAccount');

Route::get('/my-profile', function (){
    return view('templates.myProfile');
})->name('myProfile');

Route::get('/books', function (){
    return view('templates.bookshelf');
})->name('bookshelf');

Route::get('/faq', function (){
    return view('templates.faq');
})->name('faq');

Route::get('/hours-and-directions', function (){
    return view('templates.hours');
})->name('hours');
Route::get('/shopping-cart', function (){
    return view('templates.shoppingCart');
})->name('shoppingCart');

Route::get('/checkout', function (){
    return view('templates.checkout');
})->name('checkout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
