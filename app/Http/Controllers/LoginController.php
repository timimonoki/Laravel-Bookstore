<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
   

    public function login(Request $request)
    {
        if(Auth::attempt(['username' => $request['username'], 'password' => bcrypt($request['password'])])){
            // Authentication passed...
            return redirect()->intended('templates.index');
        }else{
            return redirect()->route('myAccount');
        }
    }

    public function logout(){
        Auth::logout();
    }

    public function register(Request $request){
        $user = new User;
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);

        $user->save();

        return redirect()->route('myAccount');
    }
}
