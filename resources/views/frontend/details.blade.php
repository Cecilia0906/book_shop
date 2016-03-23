@extends('layoutfrontend')

@section('content')

  <div class="container">

 <div class="starter-template">
        <h1>Detalle del libro</h1>
       
      </div>
      

      <hr>
      <div class='container'>
    <div >
        <div>  
            
            
    
                @if(Session::has('message'))
                <p class='alert alert-success'>{{Session::get('message')}}</p>
                @endif
               <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object" src="{{ asset('/storage/'.$book-> photo) }}" class="img-rounded" alt="clic para mas información">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Título: {{$book->title}}</h4>
                          <p>Editorial:{{$book->editorials->name}}</p>
                          <p>Categoría:{{$book->categories->name}}</p>
                          <p>{{$nameautor}}:
                             
                           @foreach($authors as $author)
                           {{$author['name']}} {{ $author['lastname']}}
                            @if($totalauthors != $i)
                             ,
                           
                            <?php $i++; ?>
                            @endif
                            @endforeach
                            </p>
                            @if(isset($book->description))
                             <p>Descripción:{{$book->description}}</p>
                            @endif
                            
                             @include('frontend.partials.comment')
                        </div>
                </div>
        </div>
       
    </div> 
</div> 
      




      <footer>
        <p>&copy; 2016 Company, BooksShop.</p>
      </footer>
      </div>
      
@endsection

@section('script')

@endsection







