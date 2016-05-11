<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;


use App\Models\Author;

use App\Http\Requests;
use App\Repositories\AuthorRepository;
use Illuminate\Support\Facades\Request as Req;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;


use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\EditAuthorRequest;

class AuthorController extends Controller
{
    
    private $authorRepository;
    
        public function __construct(AuthorRepository $authorRepository)
   {

        $this->middleware('auth');
        $this->beforeFilter('@findAuthor',['only'=>['show','edit','update','destroy']]);
        
         $this->authorRepository = $authorRepository;
    }
    
      public function findAuthor(Route $route)
    {
        $this->author = Author::findOrFail($route->getParameter('authors'));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors = Author::filterAndPaginate($request->get('name'));
        return view('backend/authors/index',compact('authors'));
    }
    
     public function lista()
   {

        $authors = $this->authorRepository->paginateLista();
       
       /* $arr = Editorial::selectEditorialsList()->toArray();
        $arr2 = Category::selectCategoriesList()->toArray();
       
        
  
        $editorials = $this->bookRepository->searchCombo($arr,'editorials','editorial');
        $categories = $this->bookRepository->searchCombo($arr2,'categories','categoría');*/
   
 
       return view('backend/authors/index',compact('authors'));      
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAuthorRequest $request)
    {
          $author = new Author($request->all());
          $author->fullname = $author->name.' '.$author->lastname;
          $author->save();
          return \Redirect::route('author.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        

        
        return view('backend.authors.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAuthorRequest $request, $id)
    {
                $this->author->fill(Req::all());

          
                $this->author->save();
  
                return \Redirect::route('author.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
                 $this->author->delete();
                
                $message = $this->author->name .' fue eliminado';
                
                if($request->ajax()){
                    
                    return response()->json(['message'=>$message]);
                    
                   
                }
                

                \Session::flash('message',$message);
              
                 return \Redirect::route('author.list');
    }
}
