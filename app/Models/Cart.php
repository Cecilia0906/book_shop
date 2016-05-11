<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Entity
{
    protected $table = 'carts';
    
    protected $fillable = ['user_id','user_id'];
    
    public function users(){       
        return $this->belongsTo(User::getClass(),'user_id');   
        
    }
    
    public function cartItems(){       
        //return $this->hasMany(CartItem::getClass(),'cart_id'); 
         return $this->hasMany(CartItem::getClass());   
    }
}
