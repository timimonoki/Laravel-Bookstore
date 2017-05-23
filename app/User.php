<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    public function orders(){
        return $this->hasMany('App\User_Order', 'order_id');
    }

    public function user_payment(){
        return $this->hasMany('App\UserPayment');
    }

    public function user_shipping(){
        return $this->hasMany('App\UserShipping');
    }

    public function user_billing(){
        return $this->hasMany('App\UserBilling');
    }

    public function shopping_cart(){
        return $this->hasOne('App\ShoppingCart');
    }

}
