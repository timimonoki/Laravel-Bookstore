<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    public function orders(){
        return $this->hasMany('App\User_Order', 'shipping_address_id');
    }
}
