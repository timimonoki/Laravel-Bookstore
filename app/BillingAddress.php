<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    protected $table = 'billing_address';
    public $timestamps = false;

    public function getUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getOrder(){
        return $this->hasMany('App\Order','billing_address_id');
    }

    public function getPayment(){
    	return $this->hasOne('App\Payment');
    }

}
