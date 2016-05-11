<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use App\Repositories\BookRepository;


use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    
    private $bookRepository;
    
    public function __construct(BookRepository $bookRepository)
   {


         $this->bookRepository = $bookRepository;
    }
      public function index()
    {
           // $books = $this->bookRepository->paginateLista();
            $books = $this->bookRepository->paginateLatest();
            
            $combo =  $this->getCombo();
            $editorials = $combo['editorials'];
            $categories = $combo['categories'];
            
            
           
            return view('frontend/book',compact('editorials','categories','books'));      
    }
    
    public function lista(Request $request)
   {
 
        $books = $this->bookRepository->paginateLatest($request->get('title'),$request->get('category_id'),$request->get('editorial_id'));
         
        $combo =  $this->getCombo();
        $editorials = $combo['editorials'];
        $categories = $combo['categories'];  


       return view('frontend/book',compact('editorials','categories','books')); 
            
    }
    
    
     public function details($id)
    {
        $objbook = Book::findOrFail($id);
        
         $book = $this->bookRepository->selectBooksFull($id);
         $book =$book [0];

       //$comments = $book->comments;
       
       //$votes = $book->voted->toArray();
      //$comments = $comments->toArray();
      // dd($comments[0]['comment']);
   // dd($votes);
       
       $authors = $objbook->authors->toArray();
       
       $totalauthors = count($authors);
       $nameautor = $totalauthors > 1 ? 'Autores': 'Autor';
       $i = 1;
       
       //Verifico antes que el usuario esté logueado:
       if(Auth::check()){
            $solicitado = $this->getBookInCart($id);
            return view('frontend/details',compact('book','authors','nameautor','totalauthors','i','solicitado'));
        } else {
            return view('frontend/details',compact('book','authors','nameautor','totalauthors','i'));
        }
    }
    
    private function getBookInCart($id){        
        $cart = Cart::where('user_id',Auth::user()->id)->first();       
        if(!$cart){
           return false;
        }       
        $items = $cart->cartItems;

        foreach($items as $item){
           
            if($item->book_id == $id ){ 
            return true; }          
        }      
        return false;
    }
    
    private function getCombo(){
        $arr = Editorial::selectEditorialsList()->toArray();
        $arr2 = Category::selectCategoriesList()->toArray();
        
  
        $editorials = $this->bookRepository->searchCombo($arr,'editorials','editorial');
        $categories = $this->bookRepository->searchCombo($arr2,'categories','categoría');
        
        return array('editorials'=>$editorials, 'categories'=>$categories);
        
    }
    
    private function getComboSelect($book){
        
        $vec = $book->authors->toArray();
         
        $authors = $this->bookRepository->searchComboSimple($vec);
        return $authors;
    }
}
