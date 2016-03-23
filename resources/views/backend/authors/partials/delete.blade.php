
{!!Form::open(['route'=>['author.authors.destroy',$author],'method'=>'DELETE'])!!}
     <div class="form-group">
        <div class="col-md-6 col-md-offset-1">
            <button type="submit" class="btn btn-danger">Eliminar Autor</button>
        </div>   
     </div>  
    {!!Form::close()!!}
