@extends('layoutbackend')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-10 col-md-offset-1'>  
            <div class='panel panel-default'>
                <div class='panel-heading'>Nuevo Libro</div>
                <div class='panel-body'>
                    @include('backend.users.partials.errors')
                   {!!Form::open(['route'=>'book.books.store','files'=>'true','method'=>'POST','class'=>'form-horizontal'])!!}
                   
                  
                       
         
                    @include('backend.books.partials.fields')
                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                          <button type="submit" class="btn btn-default">Crear Libro</button>
                        </div> 
                    </div> 
                   {!!Form::close()!!}

                </div> 
            </div>
        </div>
    </div> 
</div> 
@endsection


