<?php

Route::get('book.list',
        
        ['uses'=>'Book\BookController@lista',
          'as'=>'book.list'
            
        ]);


  Route::group(['prefix'=>'book'],function(){
    
    Route::resource('books','Book\BookController');
    
});

