@extends('layoutbackend')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-10 col-md-offset-1'>  
            <div class='panel panel-default'>
                <div class='panel-heading'>Nuevo Author</div>
                <div class='panel-body'>
                    @include('backend.authors.partials.errors')
                   {!!Form::open(['route'=>'author.authors.store','method'=>'POST','class'=>'form-horizontal'])!!}
                    @include('backend.authors.partials.fields')
                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                          <button type="submit" class="btn btn-default">Crear Author</button>
                        </div> 
                    </div> 
                   {!!Form::close()!!}
                                    
                   <br />
                    <br />
                     <br />
                      <br /> <br />

                </div> 
            </div>
        </div>
    </div> 
</div> 
@endsection


