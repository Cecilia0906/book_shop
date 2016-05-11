
           

                        @foreach($books as $book)
                        
                        <div class="media">
                        <div class="media-left">
             
                          <a href="{{ route('book/details',$book) }}">
                            <img class="media-object img-rounded" src="{{ asset('/storage/'.$book-> photo) }}"  alt="clic para mas información">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Título: {{$book->title}}</h4>
                          <p>Editorial:{{$book->editorials->name}}</p>
                          <p>Categoría:{{$book->categories->name}}</p>
                         
                        </div>
                      </div>
                        <p> 
                       
                            <span class="votes-count">{{ $book->num_votes }} votos</span>
                            - <span class="comments-count">{{ $book->num_comments }} comentarios</span>.
                       
                        </p>

                         @if (Auth::check())
                            @if ( ! currentUser()->hasVoted($book))
                                {!! Form::open(['route' => ['votes/submit', $book->id], 'method' => 'POST']) !!}
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                                </button>
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['route' => ['votes/destroy', $book->id], 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-primary" >
                                    <span class="glyphicon glyphicon-thumbs-down"></span> Quitar voto
                                </button>
                                {!! Form::close() !!}
                            @endif
                        @endif
                        
                        
                          <hr>

                        @endforeach
           
                   

