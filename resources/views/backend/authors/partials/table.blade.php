
                    <table class="table table-striped">
                        <tr>
                            <th># </th>  
                              <th>Nombre</th>  
                              <th>Apellido</th>  
                               <th>Nacionalidad</th>
                              <th>Acciones</th>  
 
                        </tr>
                        @foreach($authors as $author)
                        <tr data-id="{{$author->id}}">
                            
                            <td>{{$author->id}}</td>
                             <td>{{$author->name}}</td>
                             <td>{{$author->lastname}}</td>
                             <td>{{$author->nationality}}</td>
                             <td>
                                 <a href='{{route('author.authors.edit',$author)}}'>Editar</a> 
                                 <a href="#"
                                    class="btn-delete"'>Eliminar</a> 
                                                 
                                
                             </td>
                        </tr>
                        @endforeach
                    </table>

