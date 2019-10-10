@extends('website._layouts.default')

@section('content')
<!-- block-wrapper-section
	================================================== -->
<section class="block-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">

				<!-- block content -->
				<div class="block-content">

					<!-- grid box -->
					<div class="grid-box">
						<div class="title-section">
							<h1><span class="world">World</span></h1>
						</div>

						<div class="news-post large-post">
							<div class="post-gallery">
								<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" alt="">
								<a class="category-post world" href="world.html">Business</a>
							</div>
							<div class="post-title">
								<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. </a></h2>
								<ul class="post-tags">
									<li><i class="fa fa-clock-o"></i>27 may 2013</li>
									<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
									<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
									<li><i class="fa fa-eye"></i>872</li>
								</ul>
							</div>
							<div class="post-content">
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
								<a href="-content">
                                            <h2><a href="{{url('/post/detail')}}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
							</div>
						</div>
						

					</div>
					<!-- End grid box -->

					<!-- grid box -->
					<div class="grid-box">
						<div class="title-section">
							<h1><span class="world">World</span></h1>
						</div>

						<div class="news-post large-post">
							<div class="post-gallery">
								<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-02.jpg')}}" alt="">
								<a class="category-post world" href="world.html">Business</a>
							</div>
							<div class="post-title">
								<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. </a></h2>
								<ul class="post-tags">
									<li><i class="fa fa-clock-o"></i>27 may 2013</li>
									<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
									<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
									<li><i class="fa fa-eye"></i>872</li>
								</ul>
							</div>
							<div class="post-content">
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
								<a href="-content">
                                            <h2><a href="{{url('/post/detail')}}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
							</div>
						</div>
						

					</div>
					<!-- End grid box -->

					<!-- grid box -->
					<div class="grid-box">
						<div class="title-section">
							<h1><span class="world">World</span></h1>
						</div>

						<div class="news-post large-post">
							<div class="post-gallery">
								<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-03.jpg')}}" alt="">
								<a class="category-post world" href="world.html">Business</a>
							</div>
							<div class="post-title">
								<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. </a></h2>
								<ul class="post-tags">
									<li><i class="fa fa-clock-o"></i>27 may 2013</li>
									<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
									<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
									<li><i class="fa fa-eye"></i>872</li>
								</ul>
							</div>
							<div class="post-content">
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
								<a href="-content">
                                            <h2><a href="{{url('/post/detail')}}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
							</div>
						</div>
						

					</div>
					<!-- End grid box -->

					<!-- pagination box -->
					<div class="pagination-box">
						<ul class="pagination-list">
							<li><a class="active" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><span>...</span></li>
							<li><a href="#">9</a></li>
							<li><a href="#">Next</a></li>
						</ul>
						<p>Page 1 of 9</p>
					</div>
					<!-- End Pagination box -->

				</div>
				<!-- End block content -->

			</div>

			<div class="col-sm-4">

				<!-- sidebar -->
				<div class="sidebar">

					<div class="widget tab-posts-widget">

						<ul class="nav nav-tabs" id="myTab">
							<li class="active">
								<a href="#option1" data-toggle="tab">Popular</a>
							</li>
							<li>
								<a href="#option2" data-toggle="tab">Recent</a>
							</li>
							<li>
								<a href="#option3" data-toggle="tab">Top Reviews</a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="option1">
								<ul class="list-posts">
									<li>
										<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-06.jpg')}}" alt="">
										<div class="post-content">
											<h2>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam</h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Sed arcu. Cras consequat. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-02.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Phasellus ultrices nulla quis nibh. Quisque a lectus.  </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-03.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-04.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
							<div class="tab-pane" id="option2">
								<ul class="list-posts">

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw3.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Phasellus ultrices nulla quis nibh. Quisque a lectus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw4.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw5.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>
									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw1.jpg')}}" alt="">
										<div class="post-content">
											<h2>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam</h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw2.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Sed arcu. Cras consequat.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>
								</ul>										
							</div>
							<div class="tab-pane" id="option3">
								<ul class="list-posts">

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw4.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw1.jpg')}}" alt="">
										<div class="post-content">
											<h2>Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam</h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw3.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Phasellus ultrices nulla quis nibh. Quisque a lectus.  </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw2.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Sed arcu. Cras consequat.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw5.jpg')}}" alt="">
										<div class="post-content">
											<h2><a href="-content">
                                            <h2><a href="{{url('/post/detail')}}">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>
								</ul>										
							</div>
						</div>
					</div>

					<div class="widget tags-widget">

						<div class="title-section">
							<h1><span>Popular Tags</span></h1>
						</div>

						<ul class="tag-list">
							<li><a href="#">News</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Politics</a></li>
							<li><a href="#">Sport</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Videos</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Travel</a></li>
							<li><a href="#">World</a></li>
							<li><a href="#">Music</a></li>
						</ul>

					</div>
				</div>
				<!-- End sidebar -->

			</div>

		</div>

	</div>
</section>
<!-- End block-wrapper-section -->
@endsection