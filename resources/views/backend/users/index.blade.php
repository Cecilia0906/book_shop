@extends('layoutbackend')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-10 col-md-offset-1'>  
            <div class='panel panel-default'>
                <div class='panel-heading'>Usuarios</div>
                @if(Session::has('message'))
                <p class='alert alert-success'>{{Session::get('message')}}</p>
                @endif
                <div class='panel-body'>
                   
                      {!!Form::model(Request::all(),['route'=>'admin.users.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                      
                        <div class="form-group">
                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Usuario'])!!}
                            {!!Form::select('role',config('options.types'),null,['class'=>'form-control'])!!}
                          

                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                      {!!Form::close()!!}
                    
                    <p>
                    <a class="btn btn-info" href="{{route('admin.users.create')}}" role="button">Nuevo Usuario</a>
                    </p>
                    Hay {{ $users->total()}} usuarios.
                 @include('backend.users.partials.table')

                    {!! $users->appends(Request::only(['name','role']))->render()!!}

                </div> 
            </div>
        </div>
    </div> 
</div> 
{!!Form::open(['route'=>['admin.users.destroy',':USER_ID'],'method'=>'DELETE','id'=>'form-delete'])!!}             
{!!Form::close()!!}
@endsection


    

@section('script')
<script>
  $(document).ready(function(){
   
    $('.btn-delete').click(function(e){
      
       e.preventDefault;
       var row = $(this).parents('tr');
       var id = row.data('id');
       var form = $('#form-delete');
       var url = form.attr('action').replace(':USER_ID',id);
       var data = form.serialize();
       
       row.fadeOut();
      
       $.post(url,data,function(result){
           
            alert(result.message);
       }).fail(function(){
           
           alert('El usuario no fue eliminado');
           row.show();
           
       });
       
       
    });
  
  });

</script>
@endsection


