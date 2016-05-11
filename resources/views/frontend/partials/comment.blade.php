                 @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                 @if (Auth::check())
                  <form action="{{ route('book/submit', $book->id) }}" method="POST" accept-charset="UTF-8">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="comment">Comentarios:</label>
                        <textarea rows="4" class="form-control" name="comment" cols="50" id="comment">{{ old('comment') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar comentario</button>
                </form> 
                  @endif
                  <h3>Comentarios ({{ count($book->comments) }})</h3>

                @foreach ($book->comments as $comment)
                    <div class="well well-sm">
                        <p><strong>{{ $comment->user->name }} {{ $comment->user->lastname }}</strong></p>
                        <p>{{ $comment->comment }}</p>

                        <p class="date-t">
                            <span class="glyphicon glyphicon-time"></span>
                            {{ $comment->created_at->format('d/m/Y h:ia') }}
                        </p>
                    </div>
                @endforeach

