
{!!Form::open(['route'=>['admin.users.destroy',$user],'method'=>'DELETE'])!!}
     <div class="form-group">
        <div class="col-md-6 col-md-offset-1 pad">
            <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
        </div>   
     </div>  
    {!!Form::close()!!}
