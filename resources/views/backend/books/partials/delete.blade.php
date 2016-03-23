
{!!Form::open(['route'=>['book.books.destroy',$book],'method'=>'DELETE'])!!}
     <div class="form-group">
        <div class="col-md-6 col-md-offset-1">
            <button type="submit" class="btn btn-danger">Eliminar Libro</button>
        </div>   
     </div>  
    {!!Form::close()!!}
