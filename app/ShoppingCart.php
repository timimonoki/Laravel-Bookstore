<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function cart_item(){
        return $this->hasMany('App\CartItem');
    }
}
