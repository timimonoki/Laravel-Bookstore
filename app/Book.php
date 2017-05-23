<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public  function cart_item(){
        return $this->belongsTo('App\CartItem');
    }
}
