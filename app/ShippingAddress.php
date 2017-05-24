<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'shipping_address';
    public $timestamps = false;

    public function getUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getShippingAddress(){
        return $this->hasMany('App\Order','shipping_address_id');
    }
}
