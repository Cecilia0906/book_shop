@extends('layoutbackend')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-md-10 col-md-offset-1'>  
            <div class='panel panel-default'>
                <div class='panel-heading'>Libros</div>
                @if(Session::has('message'))
                <p class='alert alert-success'>{{Session::get('message')}}</p>
                @endif
                <div class='panel-body'>
                   
                      {!!Form::model(Request::all(),['route'=>'book.books.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
                      
                        <div class="form-group">

                            {!!Form::text('title',null,['class'=>'form-control','placeholder'=>'Título del Libro'])!!}
                           
                            {!!Form::select('editorial_id',$editorials,null,['class'=>'form-control'])!!}
                             {!!Form::select('category_id',$categories,null,['class'=>'form-control'])!!}
                          

                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                      {!!Form::close()!!}
                    
                    <p>
                    <a class="btn btn-info" href="{{route('book.books.create')}}" role="button">Nuevo Libro</a>
                    </p>
                    Hay {{ $books->total()}} libros.
                 @include('backend.books.partials.table')

                    {!! $books->appends(Request::only(['title','editorial_id','category_id']))->render()!!}

                </div> 
            </div>
        </div>
    </div> 
</div> 
{!!Form::open(['route'=>['book.books.destroy',':BOOK_ID'],'method'=>'DELETE','id'=>'form-delete'])!!}             
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
       var url = form.attr('action').replace(':BOOK_ID',id);
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


