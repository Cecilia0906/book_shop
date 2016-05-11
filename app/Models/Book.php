<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Entity
{
    
    protected $table = 'books';
     
    protected $fillable = ['title','editorial_id','category_id','photo'];
                                  
/*
    public function categories(){
        
        return $this->hasMany(Category::getClass());
        
        
    }
   */ 
        public function editorials(){
        
        return $this->belongsTo(Editorial::getClass(),'editorial_id');
        
        
    }
    
     public function categories()
    {
        return $this->belongsTo(Category::getClass(), 'category_id');
    }
    
    
     public function scopeTitle($query,$name)
    {
       if(trim($name) != ""){
      
        $query->where('title',"LIKE","%$name%");
       }
    }

    public function scopeCategory_id($query, $category_id){
        
        if($category_id!="0" ){
          
            $query->where('category_id','=',$category_id);
        }

    }

    public function scopeEditorial_id($query, $editorial_id){
       
        if($editorial_id!="0" ){
           $editorial_id = (int)$editorial_id;
            $query->where('editorial_id','=',$editorial_id);
            //$query->where('editorial_id',"=","1");
                                                             
        }

    }

    public  function filterAndPaginate($title,$category_id,$editorial_id){

        return  Book::title($title)->category_id($category_id)->editorial_id($editorial_id)->orderBy('id','ASC')->paginate(3);
       
        
    }
    
    
    public function authors()
    {
        return $this->belongsToMany(Author::getClass(), 'book_authors')->withTimestamps();
    }
    
     public function comments()
    {
        return $this->hasMany(BookComment::getClass());
    }
    
    
     public function voted()
    {
        return $this->belongsToMany(User::getClass(), 'book_votes')->withTimestamps();
    }
    

    

    
    
    
    
    
        
}