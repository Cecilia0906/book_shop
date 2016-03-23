<?php

namespace App\Repositories;
use App\Models\BookVote;
use App\Models\Book;
use App\Models\User;
use App\Repositories\BaseRepository;

class VoteRepository extends BaseRepository{
    
    public function getModel(){
        return new BookVote();
    }
    

    public function vote(User $user, Book $book)
    {
        if ($user->hasVoted($book)) return false;

        $user->voted()->attach($book);
        return true;
    }

    public function unvote(User $user, Book $book)
    {
        if ( ! $user->hasVoted($book)) return false;

        $user->voted()->detach($book);
        return true;
    }

}