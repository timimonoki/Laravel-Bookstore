<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Order extends Model
{
    public function user(){
        return $this->belongsTo('App\User','order_id');
    }

    public function shippingAddress(){
        return $this->belongsTo('App\ShippingAddress', 'shipping_address_id');
    }

    public function cartItems(){
        return $this->hasMany('App\CartItem', 'order_id');
    }

    public function payment(){
        return $this->belongsTo('App\Payment');
    }
}
