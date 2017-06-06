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
Auth::routes();
Route::get('/', function () {
    return view('templates.index');
})->name('index');

Route::get('/sign-in', function(){
    return view('templates.myAccount');
})->name('myAccount');

Route::get('/faq', function (){
    return view('templates.faq');
})->name('faq');

Route::get('/hours-and-directions', function (){
    return view('templates.hours');
})->name('hours');
Route::get('/shopping-cart', function (){
    return view('templates.shoppingCart');
})->name('shoppingCart');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/my-profile', ['as' => 'myProfile', 'uses' => 'MyProfileController@goToMyProfile']);
Route::post('/edit-myProfile', ['as' => 'editMyProfile', 'uses' => 'MyProfileController@editOnMyProfile']);
Route::get('/orders-myProfile/{username}', ['as' => 'ordersMyProfile', 'uses' => 'MyProfileController@ordersOnMyProfile']);
Route::get('/orderDetails-myProfile/{username}/{orderId}', ['as' => 'orderDetailsMyProfile', 'uses' => 'MyProfileController@orderDetailsOnMyProfile']);
Route::get('/listOfCreditCards/{username}', ['as' => 'listOfCreditCards', 'uses' => 'MyProfileController@listOfCreditCards']);
Route::post('/setDefaultCreditCard/{username}', ['as' => 'setDefaultCreditCard', 'uses' => 'MyProfileController@setDefaultCreditCard']);
Route::post('/addUpdateCreditCard/{username}', ['as' => 'addUpdateCreditCard', 'uses' => 'MyProfileController@addUpdateCreditCard']);


Route::get('/listOfShippingAddresses/{username}', ['as' => 'listOfShippingAddresses', 'uses' => 'MyProfileController@listOfShippingAddresses']);
Route::post('/setDefaultShippingAddress/{username}', ['as' => 'setDefaultShippingAddress', 'uses' => 'MyProfileController@setDefaultShippingAddress']);
Route::post('/addUpdateShippingAddress/{timi}', ['as' => 'addUpdateShippingAddress', 'uses' => 'MyProfileController@addUpdateShippingAddress']);


Route::get('/books', ['as' => 'bookshelf', 'uses' => 'BooksController@goToBrowseTheBookshelf']);
Route::get('/allBooks',['as' => 'allBooks', 'uses' => 'BooksController@allBooks']);
Route::get('/bookDetails/{id}', ['as' => 'bookDetails', 'uses' => 'BooksController@bookDetails']);
Route::post('/addToShoppingCart/{username}',['as' => 'addToShoppingCart' , 'uses' =>'BooksController@addToShoppingCart']);
Route::get('/bookInStockNumber/{id}', ['uses' => 'BooksController@bookInStockNumber']);

Route::get('/checkout', ['as' => 'checkout', 'uses' => 'BooksController@checkout']);
Route::get('/allShoppingCartItems/{username}', ['uses' => 'ShoppingCartController@allShoppingCartItems']);

Route::post('/deleteShoppingCartItem/{username}', ['uses' => 'ShoppingCartController@deleteShoppingCartItem']);
Route::post('/checkout/{username}',['uses' => 'ShoppingCartController@checkout']);












Route::get('/testGetDbFacade', ['as' => 'testGetDbFacade', 'uses' => 'MyProfileController@testGetDbFacade']);
