<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    public $timestamps = false;
    //this attribute should be hidden to arrays
    protected $hidden = ['password'];

    public function getBillingAddress(){
        return $this->hasMany('App\BillingAddress','user_id');
    }

    public function getShippingAddress(){
        return $this->hasMany('App\ShippingAddress','user_id');
    }

    public function getPayments(){
        return $this->hasMany('App\Payment', 'user_id');
    }

    public function getOrders(){
        return $this->hasMany('App\Order', 'user_id');
    }

    public function getShoppingCart(){
        return $this->hasOne('App\ShoppingCart','user_id');
    }

    public function getDefaultPayment(){
        return $this->belongsTo('App\Payment','default_payment_id');
    }

}
