@extends('layoutbackend')
@section('content')
<div class='container'>
    <div class='row'>
        
        <div class='col-md-10 col-md-offset-1'>  
            <div class='panel panel-default'>
                <div class='panel-heading'>Editar Libro {{$book->title}}</div>
                <div class='panel-body'>
                     @include('backend.books.partials.errors')
                   {!!Form::model($book,['route'=>['book.books.update',$book],'method'=>'PUT','files'=>'true','class'=>'form-horizontal'])!!}
                   
                     @include('backend.books.partials.fields')
                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                         <button type="submit" class="btn btn-default">Editar Libro</button>
                       </div> 
                     </div> 
                   {!!Form::close()!!}
                   
                    

                </div> 
            </div>
            @include('backend.books.partials.delete')
        </div>
    </div> 
</div> 
@endsection


