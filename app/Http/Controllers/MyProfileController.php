<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class MyProfileController extends Controller
{
    public function goToMyProfile(){
        return view('templates.myProfile');
    }

    public function editOnMyProfile(Request $request){
       // dd($request);
        $firstName = $request['firstName'];
        $lastName = $request['lastName'];
        $username = $request['username'];
        $currentPassword = $request['password'];
        $email = $request['email'];
        $newPassword = $request['newPassword'];
        $confirmPassword = $request['txtConfirmPassword'];

        $uncorrespondingPassword = 0;
        $unexisitngUser = 0;

        $user = User::where('username', $username )->get();

        if(sizeof($user) > 1){
            throw new Exception("More than one user with the same username");
        }elseif (sizeof($user) == 0){
            $unexisitngUser = 1;
        }
        else{
            $user = $user->first();
            if(strcmp($user->password, $currentPassword) == 0) {
                if(preg_match('/\S/', $firstName) == 1){
                    $user->first_name = $firstName;
                }
                if (preg_match('/\S/', $lastName) == 1){
                    $user->last_name = $lastName;
                }
                if(preg_match('/\S/', $newPassword) == 1 && strcmp($newPassword, $confirmPassword) == 0){
                    $user->password = $newPassword;
                }
                if(preg_match('/\S/', $email) == 1){
                    $user->email = $email;
                }
                $user->save();
            }else{
                $uncorrespondingPassword = 1;
            }
        }

        return view('templates.myProfile', ['uncorrespondingPassword' => $uncorrespondingPassword, 'unexisitngUser' => $unexisitngUser]);
    }

    public function ordersOnMyProfile($username){
        $orderDetails = DB::table('orders')
                            ->join('users', 'orders.user_id', '=', 'users.id')
                            ->select('orders.order_date', 'orders.id', 'orders.order_total', 'orders.order_status')
                            ->where('users.username', '=', $username)
                            ->get();


        return Response::json(['orderDetails' => $orderDetails]);
    }


    public function orderDetailsOnMyProfile($username, $orderId){
        $billingDetails = DB::table('billing_address')
            ->join('users', 'billing_address.user_id', '=', 'users.id')
            ->join('orders','orders.billing_address_id','=','billing_address.id')
            ->select('billing_address.*')
            ->where('users.username', '=', $username,'and')
            ->where('orders.id', '=', $orderId)
            ->first();

        $paymentInformation = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.id')
            ->join('orders','orders.payment_id', '=','payments.id')
            ->select('payments.card_name', 'payments.card_number', 'payments.expiry_year', 'payments.expiry_month')
            ->where('users.username','=', $username)
            ->where('orders.id', '=', $orderId)
            ->first();

        $shippingDetails = DB::table('shipping_address')
            ->join('users', 'shipping_address.user_id', '=', 'users.id')
            ->join('orders','orders.shipping_address_id','=','shipping_address.id')
            ->select('shipping_address.*')
            ->where('users.username', '=', $username)
            ->where('orders.id', '=', $orderId)
            ->first();

        $orderSummary = DB::table('orders')
            ->join('users', 'orders.user_id','=','users.id')
            ->join('cart_items', 'cart_items.order_id', '=', 'orders.id')
            ->join('books', 'cart_items.book_id','=','books.id')
            ->select('books.title', 'books.our_price', 'cart_items.quantity', 'cart_items.subtotal', 'orders.order_total')
            ->where('users.username','=', $username)
            ->where('orders.id', '=', $orderId)
            ->get();

        return Response::json(['billingDetails' => $billingDetails,
            'paymentInformation' => $paymentInformation,
            'shippingDetails' => $shippingDetails,
            'orderSummary' => $orderSummary]);
    }


   public function listOfCreditCards($username){
       $creditCards = DB::table('payments')
           ->join('users', 'payments.user_id', '=', 'users.id')
           ->select('payments.*')
           ->where('users.username','=', $username)
           ->get();

       return Response::json(['creditCards' => $creditCards]);
   }

   public function setDefaultCreditCard($username, Request $request){
        $cardNumber = $request['cardNumber'];

        $paymentId = DB::table('payments')
                    ->select('payments.id')
                    ->where('payments.card_number', '=', $cardNumber)
                    ->first();

        $user = DB::table('users')
                    ->select('users.*')
                    ->where('users.username','=',$username)
                    ->first();

       $user->default_payment_id = $paymentId;
       $user->save();
   }
}
