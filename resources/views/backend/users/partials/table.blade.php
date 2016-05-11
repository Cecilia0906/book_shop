
                    <table class="table table-striped">
                        <tr>
                            <th># </th>  
                              <th>Nombre</th>  
                              <th>Email</th>  
                               <th>Rol</th>
                              <th>Acciones</th>  
 
                        </tr>
                        @foreach($users as $user)
                        <tr data-id="{{$user->id}}">
                            
                            <td>{{$user->id}}</td>
                             <td>{{$user->name}}</td>
                             <td>{{$user->email}}</td>
                             <td>{{$user->role}}</td>
                             <td>
                                 <a href='{{route('admin.users.edit',$user)}}'>Editar</a> 
                                 <a href="#"
                                    class="btn-delete"'>Eliminar</a> 
                                                 
                                
                             </td>
                        </tr>
                        @endforeach
                    </table>

