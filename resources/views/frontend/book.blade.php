

@extends('layoutfrontend')

@section('content')

  <div class="container">

 <div class="starter-template">
        <h1>Bienvenidos al listado de libros de  BooksShop!</h1>
        <p class="lead">Espero que encuentren los libros de su interés.<br> No duden en contactarnos si creer agregar alguna funcionalidad para facilitarles su estadía.</p>
      </div>
      


      <hr>
     
            
       
           
             
                @if(Session::has('message'))
                <p class='alert alert-success'>{{Session::get('message')}}</p>
                @endif
               <div class='search'>  
                       {!!Form::model(Request::all(),['route'=>'book/lista','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                      
                        <div class="form-group">

                            {!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Título del Libro'])!!}
                           
                            {!!Form::select('editorial_id',$editorials,null,['class'=>'form-control'])!!}
                             {!!Form::select('category_id',$categories,null,['class'=>'form-control'])!!}
                          

                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                      {!!Form::close()!!}
                </div>
              
                <hr>
                 
                <div class='panel-body'>     
                   
                    <h4>Hay {{ $books->total()}} libros.</h4>
                 @include('frontend.partials.table')

                    {!! $books->appends(Request::only(['title','editorial_id','category_id']))->render()!!}

                </div> 
            </div>
       
    </div> 
   
@endsection

@section('script')

@endsection






