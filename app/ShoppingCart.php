<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'shopping_carts';
    public $timestamps = false;

    public function getUser(){
        return $this->belongsTo('App\User','user_id');
    }

    public function getCartItems(){
        return $this->hasMany('App\CartItem','shopping_cart_id');
    }
}
