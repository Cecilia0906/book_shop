@extends('layoutbackend')

@section('content')

  <div class="container">

 <div class="starter-template">
        <h1>Bienvenidos al Backend del sistio BooksShop!</h1>
        <p class="lead">Espero que la navegación les resulta muy amena.<br> No duden en contactarnos si creer agregar alguna funcionalidad para facilitarles su estadía.</p>
      </div>
      
      <img src="{{ asset('/img/Carro1.jpg') }}"  class="img-responsive" alt="Responsive image">
 

      <hr>
      
      <!-- 16:9 aspect ratio -->
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="{{ asset('/videos/2016-03-14-133446.webm') }}"></iframe>
    </div>



      <footer>
        <p>&copy; 2016 Company, BooksShop.</p>
      </footer>
      </div>
      
@endsection

@section('script')

@endsection



