<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function orders(){
        return $this->belongsTo('App\User_Order', 'order_id');
    }
}
