<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;

use App\Models\Book;
use App\Models\BookComment;
use App\Repositories\CommentRepository;
use App\Repositories\BookRepository;

class CommentsController extends Controller
{
    protected $commentRepository;
    protected $bookRepository;


    public function __construct(
        BookRepository $bookRepository,
        CommentRepository $commentRepository
    )
    {
        $this->commentRepository = $commentRepository;
        $this->bookRepository = $bookRepository;
    }
    
        public function submit($id, Request $request, Guard $auth)
    {
        $this->validate($request, [
            'comment' => 'required|max:250'
            
        ]);

        $book = $this->bookRepository->findOrFail($id);

        $this->commentRepository->create(
            $book,
            auth()->user(),
            $request->get('comment')
            
        );

        session()->flash('success', 'Tu comentario fue guardado exitosamente');
        return redirect()->back();
    }
}