<html lang="en" class="no-js">

<!-- Mirrored from nunforest.com/hotmagazine/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Oct 2019 08:40:58 GMT -->
<head>
	<title>Dispar Kaltim</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	@yield('open-grap')

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="{{asset('hotmagazine/css/bootstrap.min.css')}}" media="screen">	
	<link rel="stylesheet" type="text/css" href="{{asset('hotmagazine/css/jquery.bxslider.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{asset('hotmagazine/css/font-awesome.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{asset('hotmagazine/css/magnific-popup.css')}}" media="screen">	
	<link rel="stylesheet" type="text/css" href="{{asset('hotmagazine/css/owl.carousel.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('hotmagazine/css/owl.theme.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{asset('hotmagazine/css/ticker-style.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('hotmagazine/css/style.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{asset('css/website.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{asset('css/mobile.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{asset('css/tablet.css')}}" media="screen">
	{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" media="screen"> --}}

	@yield('script-top')

</head>
<body>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=526419284127691";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>

	@include('website._layouts.header')

	<!-- Container -->
	<div id="container">

		@yield('content')

		@include('website._layouts.footer')

	</div>
	<!-- End Container -->	
	
	<script type="text/javascript" src="{{asset('hotmagazine/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/jquery.migrate.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/jquery.bxslider.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/jquery.magnific-popup.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/jquery.ticker.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/jquery.imagesloaded.min.js')}}"></script>
  	<script type="text/javascript" src="{{asset('hotmagazine/js/jquery.isotope.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/retina-1.1.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/plugins-scroll.js')}}"></script>
	<script type="text/javascript" src="{{asset('hotmagazine/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/lazy/jquery.lazy.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/gravatar/md5.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/gravatar/jquery.gravatar.js')}}"></script>

	<script type="text/javascript">

			$(function() {
				jQuery("img.lazy").lazy({
					asyncLoader: function(element, response) {
						setTimeout(function() {
							element.html('element handled by "asyncLoader"');
							response(true);
						}, 1000);
					}
				});
			});

			function gotolink(link, type = null){
				window.location.href = link;
			}
	</script>

	{{-- @include('website._layouts.script') --}}

	@yield('script-bottom')
</body>

<!-- Mirrored from nunforest.com/hotmagazine/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Oct 2019 08:42:53 GMT -->
</html>