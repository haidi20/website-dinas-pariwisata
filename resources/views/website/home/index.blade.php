@extends('website._layouts.default')

@section('script-top')
    <style>
        
    </style>
@endsection

@section('content')
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
													<h2>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</h2>
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
													<h2>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam.</h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</div>

							<div class="row">
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

							</div>
							<div class="center-button">
								<a href="{{url('/post')}}"> Show More </a>
							</div>

						</div>
						<!-- End grid box -->
						
						<!-- grid-box -->
					<div class="grid-box">

						<div class="title-section">
							<h1><span class="world">News in Video</span></h1>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="news-post video-post">
									<img alt="" src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-09.jpg')}}">
									{{-- <a href="#" class="video-link"><i class="fa fa-play-circle-o"></i></a> --}}
									<div class="hover-box">
										<h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros.</a></h2>
										<ul class="post-tags">
											<li><i class="fa fa-clock-o"></i>27 may 2013</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- End grid-box -->

					</div>
					<!-- End block content -->

				</div>

			</div>

		</div>
	</section>
	<!-- End block-wrapper-section -->
@endsection