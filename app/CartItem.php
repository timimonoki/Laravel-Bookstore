<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function books(){
        return $this->hasMany('App\Books');
    }

    public function shopping_cart(){
        return $this->belongsTo('App\ShoppingCart');
    }
}
