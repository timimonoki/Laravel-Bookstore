<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    public function getBillingAddress(){
        return $this->belongsTo('App\BillingAddress', 'billing_address_id');
    }

    public function getShippingAddress(){
        return $this->belongsTo('App\ShippingAddress', 'shipping_address_id');
    }

    public function getPayment(){
        return $this->belongsTo('App\Payment','payment_id');
    }

    public function  getUser(){
        return $this->belongsTo('App\User','user_id');
    }

    public function getCartItems(){
        return $this->hasMany('App\CartItem','order_id');
    }
}
