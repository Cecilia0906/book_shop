<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_author extends Entity
{
     protected $table = 'book_authors';
     
     protected $fillable = ['book_id','author_id'];
     
     
     
     public function book()
    {
        return $this->belongsTo(Book::getClass());
    }

    public function author()
    {
        return $this->belongsTo(Author::getClass());
    }
    
    
  
    
}
