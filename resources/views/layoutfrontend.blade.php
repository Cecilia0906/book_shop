<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximun-scale=1.0,minimun-scale=1.0">

        <title>@yield('title', 'BooksShop')</title>

        
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two' rel='stylesheet' type='text/css'>
        

	<!--<link href="{{ asset('/css/frontend.css') }}" rel="stylesheet">-->
        <!--<link href="{{ asset('/css/pickmeup.min.css') }}" rel="stylesheet">-->
        <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <div class="contenedor">
     @include('partials.nav')

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

       
     </div>
     @include('partials.footer')
        @yield('script')
</body>
</html>

