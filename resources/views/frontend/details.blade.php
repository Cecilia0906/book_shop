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
                <div class="col-md-8">
               <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object img-border" src="{{ asset('/storage/'.$book-> photo) }}" class="img-rounded" alt="clic para mas información">
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
                            <div class="text">
                            @if(isset($book->description))
                             <p>Descripción:{{$book->description}}</p>
                            @endif
                             </div>
                             @include('frontend.partials.comment')
                        </div>
                </div>
             </div>
                <div class="col-md-4">
                   
                    <div class="sidebar-module sidebar-module-inset">
                    <h4>Precio</h4>
                    <p>${{$book->price}}.</p>
                    @if(isset($solicitado))
                        @if(!$solicitado)
                        <p><a class="btn btn-primary" href="{{url('addProduct/'.$book->id) }}" role="button">Agregar a la órden</a></p>
                        @else
                         <p><a class="btn btn-primary" href="" role="button">Libro ya agregado</a></p>

                        @endif
                    @endif
                  </div>
                </div>
        </div>
       
    </div> 
</div> 

</div>
      
@endsection

@section('script')

@endsection







