<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\User;
use UserDAO;

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
        echo $user;

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

    public function ordersOnMyProfile(){
        return view('templates.myProfile');

    }

    public function billingOnMyProfile(){

    }

    public function shippingOnMyProfile(){}
}
