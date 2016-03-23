<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookVote extends Entity
{
    protected $table = 'book_votes';
    
     public function book()
    {
        return $this->belongsTo(Book::getClass());
    }

    public function user()
    {
        return $this->belongsTo(User::getClass());
    }
}
