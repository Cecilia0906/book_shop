<?php



namespace App\Repositories;

use App\Models\Book;

/**
 * Description of BookRepository
 *
 * @author cecilia
 */
class BookRepository extends BaseRepository {
   
     public function getModel()
    {
        return new Book();
    }
    
     protected function selectBooksList()
    {
        return $this->newQuery()->selectRaw(
            'books.* ');
           
       
    }
    
      public function paginateLista()
    {
        return $this->selectBooksList()
            ->orderBy('id', 'ASC')
            ->paginate(6);
    }
    

    
     protected function getCountBookCommentsQuery()
    {
        return '( SELECT COUNT(*) FROM book_comments WHERE book_comments.book_id = books.id )';
    }

    protected function getCountBookVotesQuery()
    {
        return '( SELECT COUNT(*) FROM book_votes WHERE book_votes.book_id = books.id )';
    }
    
     protected function getFilterSeachQuery($name,$category_id,$editorial_id)
    {
       $sql = 1;  
          if(trim($name) != ""){
            $sql = ' title LIKE \'%'.$name.'%\'';
          }
          
           if($category_id!="0" ){
               $sql .= ' AND category_id = '.$category_id; 
           }
           
            if($editorial_id!="0" ){
                $sql .= ' AND editorial_id = '.$editorial_id; 
            }
           
            return $sql;
    }
    
    
     public function selectBooksFull($id)
    {
        return $this->newQuery()->selectRaw(
            'books.*, '
            . $this->getCountBookCommentsQuery() . ' as num_comments,'
            . $this->getCountBookVotesQuery() . ' as num_votes'
               )->where('books.id', $id)
                 ->with('authors')
                ->get();
                
       
    }
    
     protected  function selectBooksListFull($title ,$category_id ,$editorial_id )
    {
         
         $valor = $this->getFilterSeachQuery($title,$category_id,$editorial_id);
        return $this->newQuery()->selectRaw(
            'books.*, '           
            . $this->getCountBookCommentsQuery() . ' as num_comments,'
            . $this->getCountBookVotesQuery() . ' as num_votes '
             )->whereRaw($this->getFilterSeachQuery($title,$category_id,$editorial_id));
               
  
    }
    
     public function paginateLatest($title = "",$category_id = "0",$editorial_id = "0")
    {
        return $this->selectBooksListFull($title ,$category_id ,$editorial_id )  
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        
        
        //return $this->getModel()->filterAndPaginate($title,$category_id,$editorial_id);

    }
    
    
   
     public function  searchCombo(array $model,$combo,$word){ 
         
         if($combo == 'authors'){
           //dd($model);
         }
         
        $arr = [];        
        $arr[$combo][] = 'Seleccione una '.$word;
        foreach($model as $ar){  
            $arr[$combo][$ar['id']] = $ar['name'];          
        } 
        
         if($combo == 'authors'){
           //dd($arr);
         }
        return $arr;
     }
     
     public function  searchComboSimple(array $model){  
        $arr = [];        
        foreach($model as $ar){  
            $arr[] = $ar['id'];             
        } 
        return $arr;
     }
}
