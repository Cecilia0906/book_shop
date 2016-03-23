<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Repositories\BookRepository;
use App\Repositories\VoteRepository;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class VotesController extends Controller
{
    
    private $bookRepository;
    private $voteRepository;

    public function __construct(
        BookRepository $bookRepository,
        VoteRepository $voteRepository
    )
    {
        $this->bookRepository = $bookRepository;
        $this->voteRepository = $voteRepository;
    }

    public function submit($id, Request $request)
    {
        $book = $this->bookRepository->findOrFail($id);
        $success = $this->voteRepository->vote(currentUser(), $book);

        if ($request->ajax()) {
            return response()->json(compact('success'));
        }

        return redirect()->back();
	}

    public function destroy($id, Request $request)
    {
        $book = $this->bookRepository->findOrFail($id);
        $success = $this->voteRepository->unvote(currentUser(), $book);

        if ($request->ajax()) {
            return response()->json(compact('success'));
        }

        return redirect()->back();
    }
}
