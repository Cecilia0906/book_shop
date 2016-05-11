<?php

use App\Http\routes\books;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 
//  [
//    'uses' => 'HomeController@index',
//    'as' => 'home'
//    
//    
//]);

Route::get('/',
        
        ['uses'=>'FrontEnd\FrontendController@index',
          'as'=>'home'
            
        ]);



// Authentication routes...
Route::get('login',
        
        ['uses'=>'Auth\AuthController@getLogin',
          'as'=>'login'
            
        ]);


Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', [
    
    'uses'=>'Auth\AuthController@getLogout',
    'as'=>'logout'
    
    ]);

// Registration routes...
Route::get('register',
        
        ['uses'=>'Auth\AuthController@getRegister',
          'as'=>'register'
            
        ]);

Route::post('register', 'Auth\AuthController@postRegister');

/**
 * 
 * 
 */
Route::get('administration',
        
        ['uses'=>'BackendController@index',
          'as'=>'administration'
            
        ]);


Route::get('user.list',
        
        ['uses'=>'Admin\UserController@lista',
          'as'=>'user.list'
            
        ]);



// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


/** llamadas json **/



Route::get('provinces/{country_id}',function($country_id){
    $pais =  \App\Models\Province::where('id_pais',$country_id)
            ->select('id as value','nombre as text')
            ->OrderBy ('nombre','ASC')
            ->get()
            ->toArray();
    array_unshift($pais,['value'=>'','text'=>'Seleccione su provincia']);
    
    return $pais;
    
} );

Route::get('cities/{id}',function($id){
    $ciudad =  \App\Models\City::where('id_provincia',$id)
            ->select('id as value','nombre as text')
            ->OrderBy ('nombre','ASC')
            ->get()
             ->toArray();
    
             array_unshift($ciudad,['value'=>'','text'=>'Seleccione su ciudad']);
             
             return $ciudad;
    
} );


//Route::group(['prefix'=>'admin','middleware'=>['auth'],'namespace'=>'Admin'],function(){
  Route::group(['prefix'=>'admin'],function(){
    
    Route::resource('users','Admin\UserController');
    
});

/****
 * 
 * Rutas para libros:
 * 
 */
Route::get('book.list',
        
        ['uses'=>'Book\BookController@lista',
          'as'=>'book.list'
            
        ]);


  Route::group(['prefix'=>'book'],function(){
    
    Route::resource('books','Book\BookController');
    
});


/****
 * 
 * Rutas para autores:
 * 
 */
Route::get('author.list',
        
        ['uses'=>'Author\AuthorController@lista',
          'as'=>'author.list'
            
        ]);


  Route::group(['prefix'=>'author'],function(){
    
    Route::resource('authors','Author\AuthorController');
    
});


//prueba imagenes:

Route::get('formulario', 'StorageController@index');
Route::post('storage/create', 'StorageController@save');


Route::get('storage/{archivo}', function ($archivo) {
     $public_path = storage_path('app');
     $url = $public_path.'/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
 
});



/**
 * 
 * FRONTEND:
 */
Route::get('site',
        
        ['uses'=>'FrontEnd\FrontendController@index',
          'as'=>'site'
            
        ]);



  Route::group(['prefix'=>'FrontEnd'],function(){
      
      Route::get('book',
        
        ['uses'=>'FrontEnd\BookController@index',
          'as'=>'book'
            
        ]);
      
       Route::get('book/details/{id}',
        
        ['uses'=>'FrontEnd\BookController@details',
          'as'=>'book/details'
            
        ]);
       
        Route::get('book/lista',       
        ['uses'=>'FrontEnd\BookController@lista',
          'as'=>'book/lista'
            
        ]);
        
});
        
        Route::group(['prefix'=>'FrontEnd','middleware' => 'auth'], function () {
            
                   // Votar
                    Route::post('votar/{id}', [
                       'as'   => 'votes/submit',
                       'uses' => 'FrontEnd\VotesController@submit'
                    ]);
                    Route::delete('votar/{id}', [
                        'as'   => 'votes/destroy',
                        'uses' => 'FrontEnd\VotesController@destroy'
                    ]);
    
            
                    Route::post('comentar/{id}', [
                    'as'    => 'book/submit',
                    'uses'  => 'FrontEnd\CommentsController@submit',
                    
        
    
        ]);
                    
         
    
});


         //SOCIAL MEDIA:          
          Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
          Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
          
          
          //SHOPPING CART:
          
          Route::get('/addProduct/{productId}', 'Shop\CartController@addItem');
          Route::get('/removeItem/{productId}', 'Shop\CartController@removeItem');
          Route::get('/cart', 'Shop\CartController@showCart');