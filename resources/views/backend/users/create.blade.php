@extends('layoutbackend')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-10 col-md-offset-1'>  
            <div class='panel panel-default'>
                <div class='panel-heading'>Nuevo Usuario</div>
                <div class='panel-body'>
                    @include('backend.users.partials.errors')
                   {!!Form::open(['route'=>'admin.users.store','method'=>'POST','class'=>'form-horizontal'])!!}
                    @include('backend.users.partials.fields')
                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                          <button type="submit" class="btn btn-default">Crear Usuario</button>
                        </div> 
                    </div> 
                   {!!Form::close()!!}

                </div> 
            </div>
        </div>
    </div> 
</div> 
@endsection


