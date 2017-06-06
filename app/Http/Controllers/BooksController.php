<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB;
use App\CartItem;

class BooksController extends Controller
{
   
   public function goToBrowseTheBookshelf(){
   		return view('templates.bookshelf');
   }

   public function allBooks(){

   		$books = Book::all();

   		$json = array('iTotalRecords' => sizeof($books),
   					'iTotalDisplayRecords' => sizeof($books),
   					'sEcho' => 10,
   					'aaData' => $books

   					);

   		return $json;
    }

    public function addToShoppingCart($username, Request $request){

    	$shoppingCartId = DB::table('shopping_carts')
    					->join('users', 'users.id', '=', 'shopping_carts.user_id')
    					->select('shopping_carts.id')
    					->where('users.username','=',$username)
    					->first();

    	$cartItem = CartItem::where('book_id', $request['bookId'])
                          ->where('shopping_cart_id', $shoppingCartId->id)
                          ->where('order_id', null)
                          ->first();
      echo $cartItem;
      if(sizeof($cartItem) == 0){
        $cartItem = new CartItem;
        $cartItem->quantity = $request['quantity'];
        $cartItem->subtotal = (double)$request['quantity']*(double)$request['price'];
        $cartItem->book_id = $request['bookId'];
        $cartItem->shopping_cart_id = $shoppingCartId->id;
      }elseif (sizeof($cartItem) == 1) {
        $cartItem->quantity = $cartItem->quantity + $request['quantity'];
        $cartItem->subtotal = (double)$cartItem->subtotal + ((double)$request['quantity']*(double)$request['price']);
      }	
    
    	$cartItem->save();

    	$book = Book::where('id', $request['bookId'])->first();
    	$book->in_stock_number = (int)$book->in_stock_number - (int)$request['quantity'];

    	$book->save();

      $savedBook = Book::where('id', $request['bookId'])->first();
    }


    public function bookDetails($id){

    	$books = Book::where('id', $id)->first();    
    	return view('templates.bookDetail',['books' => $books]);
    }


    public function bookInStockNumber($id){
    	$books = Book::where('id', $id)->first();
    	return (int)$books['in_stock_number'];
    }


    public function checkout(){
    	return view('templates.checkout');
    }


}
