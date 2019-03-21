<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">
		<title>T.I.G Public Schools | Home</title>
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="{{ URL::asset('frontend\\css\\bootstrap.min.css') }}">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="{{ URL::asset('frontend\\css\\owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('frontend\\css\\owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('frontend\\css\\animate.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('frontend\\css\\style.css') }}">

		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	</head>
	<body id="page-top">

@include('includes.frontend.topnav')
		



@yield('content')



@include('includes.frontend.contact')

@include('includes.frontend.footer')

		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


		<script src="{{ URL::asset('frontend\\js\\bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('frontend\\js\\owl.carousel.min.js') }}"></script>
		<script src="{{ URL::asset('frontend\\js\\cbpAnimatedHeader.js') }}"></script>
		<script src="{{ URL::asset('frontend\\js\\jquery.appear.js') }}"></script>
		<script src="{{ URL::asset('frontend\\js\\SmoothScroll.min.js') }}"></script>
		<script src="{{ URL::asset('frontend\\js\\theme-scripts.js') }}"></script>

	</body>
</html>