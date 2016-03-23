@extends('layoutbackend')
@section('content')
<div class='container'>
    <div class='row'>
        
        <div class='col-md-10 col-md-offset-1'>  
            <div class='panel panel-default'>
                <div class='panel-heading'>Editar Libro {{$author->name}}</div>
                <div class='panel-body'>
                     @include('backend.authors.partials.errors')
                   {!!Form::model($author,['route'=>['author.authors.update',$author],'method'=>'PUT','class'=>'form-horizontal'])!!}
                   
                     @include('backend.authors.partials.fields')
                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                         <button type="submit" class="btn btn-default">Editar Autor</button>
                       </div> 
                     </div> 
                   {!!Form::close()!!}
                   
                    

                </div> 
            </div>
            @include('backend.authors.partials.delete')
        </div>
    </div> 
</div> 
@endsection


