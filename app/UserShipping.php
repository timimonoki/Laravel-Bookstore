<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShipping extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }
}
