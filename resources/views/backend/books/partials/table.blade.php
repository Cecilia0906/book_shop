
                    <table class="table table-striped">
                        <tr>
                            <th># </th>  
                              <th>Título</th>  
                              <th>Editorial</th>  
                               <th>Categoría</th>
                              <th>Acciones</th>  
 
                        </tr>
                        @foreach($books as $book)
                        <tr data-id="{{$book->id}}">
                            
                            <td>{{$book->id}}</td>
                             <td>{{$book->title}}</td>
                             <td>{{$book->editorials->name}}</td>
                             <td>{{$book->categories->name}}</td>
                             <td>
                                 <a href='{{route('book.books.edit',$book)}}'>Editar</a> 
                                 <a href="#"
                                    class="btn-delete"'>Eliminar</a> 
                                                 
                                
                             </td>
                        </tr>
                        @endforeach
                    </table>

