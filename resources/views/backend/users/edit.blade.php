@extends('layoutbackend')
@section('content')
<div class='container'>
    <div class='row'>
        
        <div class='col-md-10 col-md-offset-1'>  
            <div class='panel panel-default'>
                <div class='panel-heading'>Editar Usuario {{$user->first_name}}</div>
                <div class='panel-body'>
                     @include('backend.users.partials.errors')
                   {!!Form::model($user,['route'=>['admin.users.update',$user],'method'=>'PUT','class'=>'form-horizontal'])!!}
                   
                     @include('backend.users.partials.fields')
                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                         <button type="submit" class="btn btn-default">Editar Usuario</button>
                       </div> 
                     </div> 
                   {!!Form::close()!!}
                   
                    

                </div> 
            </div>
            @include('backend.users.partials.delete')
        </div>
    </div> 
</div> 
@endsection


