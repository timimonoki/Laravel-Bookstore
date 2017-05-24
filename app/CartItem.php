<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    protected $table = 'cart_items';
    public $timestamps = false;

    public function getShoppingCart(){
        return $this->belongsTo('App\ShoppingCart','shopping_cart_id');
    }

    public function getBooks(){
        return $this->belongsTo('App\Book','book_id');
    }

    public function getOrder(){
        return $this->belongsTo('App\Order','order_id');
    }
}
