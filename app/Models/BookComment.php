<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookComment extends Entity
{
    
     protected $fillable = ['comment'];
     
     protected $table = 'book_comments';
     
     public function book()
    {
        return $this->belongsTo(Book::getClass());
    }

    public function user()
    {
        return $this->belongsTo(User::getClass());
    }
}
