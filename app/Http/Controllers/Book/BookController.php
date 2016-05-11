<?php

namespace App\Http\Controllers\Book;


use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;

use Illuminate\Http\Request;

use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Request as Req;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\EditBookRequest;


class BookController extends Controller
{
    
     private $bookRepository;
    
        public function __construct(BookRepository $bookRepository)
   {

        $this->middleware('auth');
        $this->beforeFilter('@findBook',['only'=>['show','edit','update','destroy']]);
        
         $this->bookRepository = $bookRepository;
    }
    
      public function findBook(Route $route)
    {
        $this->book = Book::findOrFail($route->getParameter('books'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $books = Book::filterAndPaginate($request->get('title'),$request->get('category_id'),$request->get('editorial_id'));
           
           //dd($books);
           // dd($request->get('editorial_id'));
        $arr = Editorial::selectEditorialsList()->toArray();
        $arr2 = Category::selectCategoriesList()->toArray();
        
  
        
        $editorials = $this->bookRepository->searchCombo($arr,'editorials','editorial');
        $categories = $this->bookRepository->searchCombo($arr2,'categories','categoría');
  
 
       return view('backend/books/index',compact('editorials','categories','books'));    
    }
    
    public function lista()
   {

        $books = $this->bookRepository->paginateLista();
       
        $arr = Editorial::selectEditorialsList()->toArray();
        $arr2 = Category::selectCategoriesList()->toArray();
       
        
  
        $editorials = $this->bookRepository->searchCombo($arr,'editorials','editorial');
        $categories = $this->bookRepository->searchCombo($arr2,'categories','categoría');
   
 
       return view('backend/books/index',compact('editorials','categories','books'));      
   }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $arr = Editorial::selectEditorialsList()->toArray();
        $arr2 = Category::selectCategoriesList()->toArray();
        
  
        $editorials = $this->bookRepository->searchCombo($arr,'editorials','editorial');
        $categories = $this->bookRepository->searchCombo($arr2,'categories','categoría');
        $bookselect = [];
        
        return view('backend.books.create',compact('bookselect','editorials','categories'));
    }
    
    private function saveAuthors($book, $authors){
        
            $ant  = count($book->authors);
            
            $cur_ids = array();
            foreach($book->authors as $auth){
              $cur_ids[] = $auth->id;
            }

            if($ant > 0){
               $book->authors()->detach($cur_ids);  
            }

           $book->authors()->attach($authors);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $book = new Book($request->all());
        
        

          //foto:
          
          $file = $request->file('photo');
          
          if(isset($file)){
            $nombre = $file->getClientOriginalName();
            
            $book->photo = $nombre;
            \Storage::disk('local')->put($nombre,  \File::get($file));
          } 
          

           $book->save();
           
            //guardo los autores:
           $valores = $request->all();
           $this->saveAuthors($book,$valores['authors']);
        
           return \Redirect::route('book.list');
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
        $book = Book::findOrFail($id);

       $combo =  $this->getCombo();
       $editorials = $combo['editorials'];
       $categories = $combo['categories'];
       $bookselect = $this->getComboSelect($book);
       

        return view('backend.books.edit',compact('book','bookselect','categories','editorials'));
    }
    
    private function getComboSelect($book){
        
        $vec = $book->authors->toArray();
         
        $authors = $this->bookRepository->searchComboSimple($vec);
        return $authors;
    }
    
    
    private function getCombo(){
        $arr = Editorial::selectEditorialsList()->toArray();
        $arr2 = Category::selectCategoriesList()->toArray();
        
  
        $editorials = $this->bookRepository->searchCombo($arr,'editorials','editorial');
        $categories = $this->bookRepository->searchCombo($arr2,'categories','categoría');
        
        return array('editorials'=>$editorials, 'categories'=>$categories);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBookRequest $request, $id)
    {
                $this->book->fill(Req::all());
                
                //foto:
          
                $file = $request->file('photo');
              
                if(isset($file)){
                  $nombre = $file->getClientOriginalName();
                  $this->book->photo = $nombre;
                  \Storage::disk('local')->put($nombre,  \File::get($file));
                } 
          
                $this->book->save();
                //guardo los autores:
                $valores = $request->all();
                if(isset($valores['authors'])){
                    $this->saveAuthors($this->book,$valores['authors']);
                }
  
                 return \Redirect::route('book.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
         $this->book->delete();
                
                $message = $this->book->title .' fue eliminado';
                
                if($request->ajax()){
                    
                    return response()->json(['message'=>$message]);
                    
                   
                }
                

                \Session::flash('message',$message);
              
                 return \Redirect::route('book.list');
    }
}
