@extends('website._layouts.default')

@section('content')
    <!-- Container -->
	<div id="container">

		<!-- block-wrapper-section
			================================================== -->
		<section class="block-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">

						<!-- block content -->
						<div class="block-content">

							<!-- masonry box -->
							<div class="masonry-box">

								<div class="title-section">
									<h1><span>Latest Articles</span></h1>
								</div>

								<div class="latest-articles iso-call">

									<div class="news-post standard-post2 default-size">
										<div class="post-gallery">
											<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-06.jpg')}}" alt="">
										</div>
										<div class="post-title">
											<h2><a href="{{url('/post/detail')}}">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
												<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
												<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
											</ul>
										</div>
									</div>

									<div class="news-post standard-post2">
										<div class="post-gallery">
											<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" alt="">
										</div>
										<div class="post-title">
											<h2><a href="{{url('/post/detail')}}">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
												<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
												<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
											</ul>
										</div>
									</div>

									<div class="news-post standard-post2">
										<div class="post-gallery">
											<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-03.jpg')}}" alt="">
										</div>
										<div class="post-title">
											<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
												<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
												<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
											</ul>
										</div>
									</div>

									<div class="news-post standard-post2">
										<div class="post-gallery">
											<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-04.jpg')}}" alt="">
										</div>
										<div class="post-title">
											<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
												<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
												<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
											</ul>
										</div>
									</div>

									<div class="news-post standard-post2">
										<div class="post-gallery">
											<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-05.jpg')}}" alt="">
										</div>
										<div class="post-title">
											<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
												<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
												<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
											</ul>
										</div>
									</div>

									<div class="news-post standard-post2">
										<div class="post-gallery">
											<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-07.jpg')}}" alt="">
										</div>
										<div class="post-title">
											<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
												<li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
												<li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
											</ul>
										</div>
									</div>

								</div>

							</div>
							<!-- End masonry box -->

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
							<!-- End pagination box -->

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
													<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Sed arcu. Cras consequat. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-02.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus.  </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-03.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-04.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi. </a></h2>
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
													<h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('hotmagazine/upload/news-posts/listw4.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('hotmagazine/upload/news-posts/listw5.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>
											<li>
												<img src="{{asset('hotmagazine/upload/news-posts/listw1.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('hotmagazine/upload/news-posts/listw2.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
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
													<h2><a href="single-post.html">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('hotmagazine/upload/news-posts/listw1.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('hotmagazine/upload/news-posts/listw3.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus.  </a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('hotmagazine/upload/news-posts/listw2.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
													<ul class="post-tags">
														<li><i class="fa fa-clock-o"></i>27 may 2013</li>
													</ul>
												</div>
											</li>

											<li>
												<img src="{{asset('hotmagazine/upload/news-posts/listw5.jpg')}}" alt="">
												<div class="post-content">
													<h2><a href="single-post.html">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</a></h2>
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

		<!-- footer 
			================================================== -->
		<footer>
			<div class="container">
				<div class="footer-widgets-part">
					<div class="row">
						<div class="col-md-3">
							<div class="widget text-widget">
								<h1>About</h1>
								<p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. </p>
								<p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. </p>
							</div>
							<div class="widget social-widget">
								<h1>Stay Connected</h1>
								<ul class="social-icons">
									<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
									<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#" class="vimeo"><i class="fa fa-vimeo-square"></i></a></li>
									<li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
									<li><a href="#" class="flickr"><i class="fa fa-flickr"></i></a></li>
									<li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget posts-widget">
								<h1>Random Post</h1>
								<ul class="list-posts">
									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw4.jpg')}}" alt="">
										<div class="post-content">
											<a href="travel.html">travel</a>
											<h2><a href="single-post.html">Pellentesque odio nisi, euismod in ultricies in, diam. </a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-06.jpg')}}" alt="">
										<div class="post-content">
											<a href="business.html">business</a>
											<h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>

									<li>
										<img src="{{asset('hotmagazine/upload/news-posts/listw3.jpg')}}" alt="">
										<div class="post-content">
											<a href="tech.html">tech</a>
											<h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus.</a></h2>
											<ul class="post-tags">
												<li><i class="fa fa-clock-o"></i>27 may 2013</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget categories-widget">
								<h1>Hot Categories</h1>
								<ul class="category-list">
									<li>
										<a href="#">Business <span>12</span></a>
									</li>
									<li>
										<a href="#">Sport <span>26</span></a>
									</li>
									<li>
										<a href="#">LifeStyle <span>55</span></a>
									</li>
									<li>
										<a href="#">Fashion <span>37</span></a>
									</li>
									<li>
										<a href="#">Technology <span>62</span></a>
									</li>
									<li>
										<a href="#">Music <span>10</span></a>
									</li>
									<li>
										<a href="#">Culture <span>43</span></a>
									</li>
									<li>
										<a href="#">Design <span>74</span></a>
									</li>
									<li>
										<a href="#">Entertainment <span>11</span></a>
									</li>
									<li>
										<a href="#">video <span>41</span></a>
									</li>
									<li>
										<a href="#">Travel <span>11</span></a>
									</li>
									<li>
										<a href="#">Food <span>29</span></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget flickr-widget">
								<h1>Flickr Photos</h1>
								<ul class="flickr-list">
									<li><a href="#"><img src="{{asset('hotmagazine/upload/flickr/1.jpg')}}" alt=""></a></li>
									<li><a href="#"><img src="{{asset('hotmagazine/upload/flickr/2.jpg')}}" alt=""></a></li>
									<li><a href="#"><img src="{{asset('hotmagazine/upload/flickr/3.jpg')}}" alt=""></a></li>
									<li><a href="#"><img src="{{asset('hotmagazine/upload/flickr/4.jpg')}}" alt=""></a></li>
									<li><a href="#"><img src="{{asset('hotmagazine/upload/flickr/5.jpg')}}" alt=""></a></li>
									<li><a href="#"><img src="{{asset('hotmagazine/upload/flickr/6.jpg')}}" alt=""></a></li>
								</ul>
								<a href="#">View more photos...</a>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-last-line">
					<div class="row">
						<div class="col-md-6">
							<p>&copy; COPYRIGHT 2015 hotmagazine.com</p>
						</div>
						<div class="col-md-6">
							<nav class="footer-nav">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><a href="index.html">Purchase Theme</a></li>
									<li><a href="about.html">About</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->
@endsection