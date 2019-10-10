@extends('website._layouts.default')

@section('script-top')
    <style>
		
    </style>
@endsection

@section('content')
	<!-- heading-news-section
	================================================== -->
	<section class="heading-news">

		<div class="iso-call heading-news-box">

			<div class="news-post image-post default-size">
				<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" alt="">
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post travel" href="travel.html">Travel</a>
						<h2><a href="{{url('/post/detail')}}">Lorem ipsum dolor sit amet, consectetuer</a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li>
							<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
						</ul>
						<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
					</div>
				</div>
			</div>

			<div class="image-slider snd-size">
				<span class="top-stories">TOP STORIES</span>
				<ul class="bxslider">
					<li>
						<div class="news-post image-post">
							<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-02.jpg')}}" alt="">
							<div class="hover-box">
								<div class="inner-hover">
									<a class="category-post world" href="world.html">Business</a>
									<h2><a href="{{url('/post/detail')}}">Franca do të bashkëpunojë me Kosovën në ekonomi. </a></h2>
									<ul class="post-tags">
										<li><i class="fa fa-clock-o"></i>27 may 2013</li>
										<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
										<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
										<li><i class="fa fa-eye"></i>872</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="news-post image-post">
							<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-03.jpg')}}" alt="">
							<div class="hover-box">
								<div class="inner-hover">
									<a class="category-post sport" href="sport.html">Sport</a>
									<h2><a href="{{url('/post/detail')}}">Phasellus ultrices nulla quis nibh. Quisque a lectus. </a></h2>
									<ul class="post-tags">
										<li><i class="fa fa-clock-o"></i>27 may 2013</li>
										<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
										<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
										<li><i class="fa fa-eye"></i>872</li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="news-post image-post">
							<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-04.jpg')}}" alt="">
							<div class="hover-box">
								<div class="inner-hover">
									<a class="category-post sport" href="sport.html">sport</a>
									<h2><a href="{{url('/post/detail')}}">Donec odio. Quisque volutpat mattis eros. </a></h2>
									<ul class="post-tags">
										<li><i class="fa fa-clock-o"></i>27 may 2013</li>
										<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
										<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
										<li><i class="fa fa-eye"></i>872</li>
									</ul>
									<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<div class="news-post image-post">
				<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-05.jpg')}}" alt="">
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post food" href="food.html">food &amp; Health</a>
						<h2><a href="{{url('/post/detail')}}">Nullam malesuada erat ut turpis.</a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li>
							<li><a href="#"><i class="fa fa-comments-o"></i><span>20</span></a></li>
						</ul>
						<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
					</div>
				</div>
			</div>

			<div class="news-post image-post">
				<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-06.jpg')}}" alt="">
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post travel" href="travel.html">Travel</a>
						<h2><a href="{{url('/post/detail')}}">Lorem ipsum dolor sit amet, consectetuer</a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li>
							<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
						</ul>
						<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
					</div>
				</div>
			</div>

			<div class="news-post image-post">
				<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-07.jpg')}}" alt="">
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post sport" href="sport.html">sport</a>
						<h2><a href="{{url('/post/detail')}}">Donec odio. </a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li>
							<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
						</ul>
						<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
					</div>
				</div>
			</div>

			<div class="news-post image-post">
				<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-08.jpg')}}" alt="">
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post fashion" href="fashion.html">fashion</a>
						<h2><a href="{{url('/post/detail')}}">Quisque volutpat mattis </a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li>
							<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
						</ul>
						<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
					</div>
				</div>
			</div>

			<div class="news-post image-post">
				<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-09.jpg')}}" alt="">
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post sport" href="sport.html">sport</a>
						<h2><a href="{{url('/post/detail')}}">Donec odio. </a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li>
							<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
						</ul>
						<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
					</div>
				</div>
			</div>

			<div class="news-post image-post">
				<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-10.jpg')}}" alt="">
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post fashion" href="fashion.html">fashion</a>
						<h2><a href="{{url('/post/detail')}}">Quisque volutpat mattis </a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li>
							<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
						</ul>
						<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
					</div>
				</div>
			</div>

			<div class="news-post image-post">
				<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-11.jpg')}}" alt="">
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post food" href="food.html">food &amp; Health</a>
						<h2><a href="{{url('/post/detail')}}">Nullam malesuada erat ut turpis.</a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li>
							<li><a href="#"><i class="fa fa-comments-o"></i><span>20</span></a></li>
						</ul>
						<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
					</div>
				</div>
			</div>

		</div>

	</section>
	<!-- End heading-news-section -->

	<!-- ticker-news-section
	================================================== -->
	<section class="ticker-news">

		<div class="container">
			<div class="ticker-news-box">
				<span class="breaking-news">breaking news</span>
				<span class="new-news">New</span>
				<ul id="js-news">
					<li class="news-item"><span class="time-news">11:36 pm</span>  <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a> Donec odio. Quisque volutpat mattis eros... </li>
					<li class="news-item"><span class="time-news">12:40 pm</span>  <a href="#">Dëshmitarja Abrashi: E kam parë Oliverin në turmë,</a> ndërsa neve na shpëtoi “çika Mille” </li>
					<li class="news-item"><span class="time-news">11:36 pm</span>  <a href="#">Franca do të bashkëpunojë me Kosovën në fushën e shëndetësisë. </a></li>
					<li class="news-item"><span class="time-news">01:00 am</span>  <a href="#">DioGuardi, kështu e mbrojti Kosovën në Washington, </a> para serbit Vejvoda </li>
				</ul>
			</div>
		</div>

	</section>
	<!-- End ticker-news-section -->

	@include('website.home.post-popular')

<!-- block-wrapper-section
	================================================== -->
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<!-- block content -->
					<div class="block-content">

						<!-- grid box -->
						<div class="grid-box">

							<div class="title-section">
								<h1><span>Postingan Terbaru</span></h1>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="news-post image-post2">
										<div class="post-gallery">
											<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" alt="" >
											<div class="hover-box">
												<div class="inner-hover">
													<a class="category-post tech">Pariwisata</a>
													<h2 style="color:white"><a href="{{url('/post/detail')}}" >Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
														<li><i class="fa fa-user"></i>by <a>John Doe</a></li>
														<li><a><i class="fa fa-comments-o"></i><span>23</span></a></li>
														<li><i class="fa fa-eye"></i>872</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<ul class="list-posts">
										<li>
											<a href="{{url('/post/detail')}}" >
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-02.jpg')}}" alt="">
												<div class="post-content">
													Pariwisata
													<h2>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</a>
										</li>

										<li>
											<a href="{{url('/post/detail')}}" >
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-03.jpg')}}" alt="">
												<div class="post-content">
													Pariwisata
													<h2 >Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</a>
										</li>

										<li>
											<a href="{{url('/post/detail')}}" >
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-04.jpg')}}" alt="">
												<div class="post-content">
													Pariwisata
													<h2 >Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</div>

							{{-- <div class="row">
								<div class="col-md-6">
									<div class="news-post image-post2">
										<div class="post-gallery">
											<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-05.jpg')}}" alt="" >
											<div class="hover-box">
												<div class="inner-hover">
													<a class="category-post tech">Pariwisata</a>
													<h2 ><a href="{{url('/post/detail')}}" >Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
														<li><i class="fa fa-user"></i>by <a>John Doe</a></li>
														<li><a><i class="fa fa-comments-o"></i><span>23</span></a></li>
														<li><i class="fa fa-eye"></i>872</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<ul class="list-posts">
										<li>
											<a href="{{url('/post/detail')}}" >
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-06.jpg')}}" alt="">
												<div class="post-content">
													Pariwisata
													<h2>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</a>
										</li>

										<li>
											<a href="{{url('/post/detail')}}" >
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-07.jpg')}}" alt="">
												<div class="post-content">
													Pariwisata
													<h2>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</a>
										</li>

										<li>
											<a href="{{url('/post/detail')}}" >
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-08.jpg')}}" alt="">
												<div class="post-content">
													Pariwisata
													<h2>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</a>
										</li>
									</ul>
								</div>

							</div> --}}

							<div class="center-button">
								<a href="{{url('/post')}}"> Show More </a>
							</div>

						</div>
						<!-- End grid box -->
						
						<!-- grid-box -->
					<div class="grid-box">

						<div class="title-section">
							<h1><span class="world">Galery</span></h1>
						</div>

						<div class="row">
							<div class="col-md-4">
								<a href="{{url('/galery')}}">
									<div class="news-post video-post">
										<img alt="" src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-09.jpg')}}">
										{{-- <a href="#" class="video-link"><i class="fa fa-play-circle-o"></i></a> --}}
										<div class="hover-box">
											<h2 style="color:white">Donec odio. Quisque volutpat mattis eros.</h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-4">
								<a href="{{url('/galery')}}">
									<div class="news-post video-post">
										<img alt="" src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-10.jpg')}}">
										{{-- <a href="#" class="video-link"><i class="fa fa-play-circle-o"></i></a> --}}
										<div class="hover-box">
											<h2 style="color:white">Donec odio. Quisque volutpat mattis eros.</h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-4">
								<a href="{{url('/galery')}}">
									<div class="news-post video-post">
										<img alt="" src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-08.jpg')}}">
										{{-- <a href="#" class="video-link"><i class="fa fa-play-circle-o"></i></a> --}}
										<div class="hover-box">
											<h2 style="color:white">Donec odio. Quisque volutpat mattis eros.</h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</div>
								</a>
							</div>
						</div>

					</div>
					<!-- End grid-box -->
						<div class="center-button">
							<a href="{{url('/galery')}}"> Show More </a>
						</div>
					</div>
					<!-- End block content -->

				</div>

			</div>

		</div>
	</section>
	<!-- End block-wrapper-section -->
@endsection