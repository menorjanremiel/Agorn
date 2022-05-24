<!DOCTYPE html>
<html>
<head>
	<title>Agorn</title>
	    <script  src="{{ asset('js/app.js') }}"defer  ></script>
    
	@include('/partials.head')
</head>
<body>
	@include('/partials.nav')

<br><br>
<br><br><br>
@yield('content')

	@include('/partials.footer')
 
</body>
</html>