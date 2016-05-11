@extends('layoutbackend')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-10 col-md-offset-1'>  
            <div class='panel panel-default'>
                <div class='panel-heading'>Autores</div>
                @if(Session::has('message'))
                <p class='alert alert-success'>{{Session::get('message')}}</p>
                @endif
                <div class='panel-body'>
                   
                      {!!Form::model(Request::all(),['route'=>'author.authors.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                      
                        <div class="form-group">

                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del Autor'])!!}
                           
    

                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                      {!!Form::close()!!}
                    
                    <p>
                    <a class="btn btn-info" href="{{route('author.authors.create')}}" role="button">Nuevo Autor</a>
                    </p>
                    Hay {{ $authors->total()}} authores.
                 @include('backend.authors.partials.table')

                    {!! $authors->appends(Request::only(['name']))->render()!!}

                </div> 
            </div>
        </div>
    </div> 
</div> 
{!!Form::open(['route'=>['author.authors.destroy',':AUTHOR_ID'],'method'=>'DELETE','id'=>'form-delete'])!!}             
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
       var url = form.attr('action').replace(':AUTHOR_ID',id);
       var data = form.serialize();
       
       row.fadeOut();
      
       $.post(url,data,function(result){
           
            alert(result.message);
       }).fail(function(){
           
           alert('El libro no fue eliminado');
           row.show();
           
       });
       
       
    });
  
  });

</script>
@endsection


