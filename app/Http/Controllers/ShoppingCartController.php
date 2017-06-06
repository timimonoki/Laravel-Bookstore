<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CartItem;
use App\Order;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
    public function allShoppingCartItems2($username){

      $shoppingCartId = DB::table('shopping_carts')
                    ->join('users', 'shopping_carts.user_id','=','users.id')
                    ->where('users.username','=',$username)
                    ->select('shopping_carts.id')
                    ->first();


    	$cartItems = DB::table('cart_items')
                    ->join('shopping_carts','cart_items.shopping_cart_id','=','shopping_carts.id')
                    ->where('cart_items.shopping_cart_id','=', $shoppingCartId->id)
                    ->where('cart_items.order_id','=',null)
                    ->select('cart_items.*')
                    ->get();

      $books = DB::table('books')
                    ->join('cart_items', 'books.id', '=','cart_items.book_id')
                    ->where('cart_items.shopping_cart_id','=', $shoppingCartId->id)
                    ->where('cart_items.order_id','=',null)
                    ->get();

      $result = array();

      for($i = 0; $i < sizeof($cartItems); $i++){
        $result[$i] = array('cart_item'=> $cartItems[$i], 'get_books' => $books[$i], 'get_order' => null);
      }

    	$json = array('iTotalRecords' => sizeof($cartItems),
   					'iTotalDisplayRecords' => sizeof($cartItems),
   					'sEcho' => 10,
   					'aaData' => $result

   					);					

    for($i = 0; $i < sizeof($cartItems); $i++){
      $resultSize = sizeof($json['aaData']);
        for($j = 1; $j < $resultSize; $j++){
          if($json['aaData'][$j-1]['get_books']->title == $json['aaData'][$j]['get_books']->title){
            $json['aaData'][$j-1]['cart_item']->quantity = $json['aaData'][$j-1]['cart_item']->quantity + 
                  $json['aaData'][$j]['cart_item']->quantity;
            array_splice($json['aaData'],$j,$j);
            break;
          }
      } 
      $json['iTotalRecords'] = sizeof($json['aaData']); 
      $json['iTotalDisplayRecords'] = sizeof($json['aaData']);      
    }

     return $json;
}


    public function allShoppingCartItems($username){

      $shoppingCartId = DB::table('shopping_carts')
                    ->join('users', 'shopping_carts.user_id','=','users.id')
                    ->where('users.username','=',$username)
                    ->select('shopping_carts.id')
                    ->first();


      $cartItems = CartItem::with('getShoppingCart')
                ->with('getBooks')
                ->with('getOrder')
                ->where('shopping_cart_id','=',$shoppingCartId->id)
                ->where('order_id', null)
                ->get();

      $json = array('iTotalRecords' => sizeof($cartItems),
            'iTotalDisplayRecords' => sizeof($cartItems),
            'sEcho' => 10,
            'aaData' => $cartItems

            );          

      return $json;
    }

    public function deleteShoppingCartItem($username, Request $request){
        $cartItem = CartItem::where('id', $request['cartItemId'])->first();

        $cartItem->delete();
    }

    public function checkout($username, Request $request){
        $shoppingCartId = DB::table('shopping_carts')
                    ->join('users', 'shopping_carts.user_id','=','users.id')
                    ->where('users.username','=',$username)
                    ->select('shopping_carts.id')
                    ->first();

        $cartItems = CartItem::where('shopping_cart_id','=',$shoppingCartId->id)
                ->where('order_id', null)
                ->get();

        $shippingAddressId = DB::table('shipping_address')
                            ->join('users', 'users.id','=', 'shipping_address.user_id')
                            ->where('users.username','=', $username)
                            ->select('shipping_address.id')
                            ->first();

        $billingAddressId = DB::table('billing_address')
                            ->join('users', 'users.id','=', 'billing_address.user_id')
                            ->where('users.username','=', $username)
                            ->select('billing_address.id')
                            ->first();

        $paymentId = DB::table('payments')
                            ->join('users', 'users.id','=', 'payments.user_id')
                            ->where('users.username','=', $username)
                            ->select('payments.id')
                            ->first();

        $userId = DB::table('users')
                            ->where('username', $username)
                            ->select('users.id')
                            ->first();

        $shoppingCart = ShoppingCart::where('user_id', $userId->id)->first();


        $newOrder = new Order;
        $newOrder->order_date = date('Y-m-d H:i:s');
        $newOrder->order_status = 'on the way';
        $newOrder->order_total = 155;
        $newOrder->shipping_date = date('Y-m-d', strtotime(' +1 day'));
        $newOrder->shipping_method = 'car';
        $newOrder->shipping_address_id = $shippingAddressId->id;
        $newOrder->billing_address_id = $billingAddressId->id;
        $newOrder->payment_id = $paymentId->id;
        $newOrder->user_id = $userId->id;

        $shoppingCart->grand_total = $newOrder->order_total;

        $newOrder->save();
        $shoppingCart->save();

        $savedOrderId = DB::table('orders')->max('id');

        for($i = 0; $i < sizeof($cartItems); $i++){
          $cartItems[$i]->order_id = $savedOrderId;
          $cartItems[$i]->save();
        }
    }
}
