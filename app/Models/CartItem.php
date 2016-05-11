<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Entity
{
    public function cart(){       
        return $this->belongsTo(Cart::getClass(),'cart_id');   
    }
    
    public function product(){       
        return $this->belongsTo(Book::getClass(),'book_id');   
    }
}
