<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $table = 'payments';
    public $timestamps = false;

    public function getUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getOrder(){
        return $this->hasMany('App\Order','payment_id');
    }
}
