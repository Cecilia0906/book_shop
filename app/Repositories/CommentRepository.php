<?php


namespace App\Repositories;

use App\Models\Book;



use App\Models\BookComment;
use App\Models\User;

class CommentRepository extends BaseRepository {

    public function getModel()
    {
        return new BookComment();
    }

    public function create(Book $book, User $user, $comment)
    {
        $comment = new BookComment(compact('comment'));
        $comment->user_id = $user->id;
        $book->comments()->save($comment);
    }

}