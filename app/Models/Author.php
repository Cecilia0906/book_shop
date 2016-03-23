<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Entity
{
     protected $table = 'authors';
     
     protected $fillable = ['name','lastname','birthdate','nationality'];
     
     
     public function scopeName($query,$name)
    {
       if(trim($name) != ""){
      
        $query->where('name',"LIKE","%$name%");
       }
    } 
    
    public static function filterAndPaginate($name){
        return  Author::name($name)->orderBy('id','ASC')->paginate(6);   
    }
    
    
     public function books()
    {
        return $this->belongsToMany(Books::getClass(), 'book_authors')->withTimestamps();
    }
     
     
}
