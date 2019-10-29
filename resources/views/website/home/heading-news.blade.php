<!-- heading-news-section
	================================================== -->
	<section class="heading-news">

		<div class="iso-call heading-news-box">

			<div class="news-post image-post default-size">
				{!!$firstPost->preview_single!!}
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post" style="background-color:{{$firstPost->colorCategory}}" href="#">{{$firstPost->display_category_name}}</a>
						<h2><a href="{{url('post', $firstPost->slug)}}">{{$firstPost->title}}</a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>{{$firstPost->long_date}}</span></li>
							<li><a href="#"><i class="fa fa-eye"></i><span>{{$firstPost->read}}</span></a></li>
						</ul>
						<p>{{$firstPost->limitContent}}</p>
					</div>
				</div>
			</div>

			<div class="image-slider snd-size">
				{{-- <span class="top-stories">TOP STORIES</span> --}}
				<ul class="bxslider">
					@foreach ($limitThreePosts as $index => $item)
						<li>
							<div class="news-post image-post">
								{!!$item->preview_single!!}
								<div class="hover-box">
									<div class="inner-hover">
										<a class="category-post" style="background-color:{{$item->color_category}}" href="#">{{$item->display_category_name}}</a>
										<h2><a href="{{url('post', $item->slug)}}">{{$item->title}}</a></h2>
										<ul class="post-tags">
											<li><i class="fa fa-clock-o"> {{$item->long_date}}</i></li>
											{{-- <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li> --}}
											<li><i class="fa fa-eye"></i>{{$item->read}}</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div>

			@for ($i = 1; $i <= 2; $i++)
				<div class="news-post image-post">
					<img src="" alt="">
					<div class="hover-box">
						<div class="inner-hover">
							<a class="category-post"  href="#"></a>
							<h2><a href="#"></a></h2>
							<ul class="post-tags">
								<li><i class="fa fa-clock-o"></i><span></span></li>
								<li><i class="fa fa-eye"></i><span></span></li>
							</ul>
							<p></p>
						</div>
					</div>
				</div>
			@endfor

			@foreach ($limitSixPosts as $index => $item)
				@if($index == 5 && $index == 6)
					@for ($i = 1; $i <= 2; $i++)
						<div class="news-post image-post">
							<img src="" alt="">
							<div class="hover-box">
								<div class="inner-hover">
									<a class="category-post"  href="#"></a>
									<h2><a href="#"></a></h2>
									<ul class="post-tags">
										<li><i class="fa fa-clock-o"></i><span></span></li>
										<li><i class="fa fa-eye"></i><span></span></li>
									</ul>
									<p></p>
								</div>
							</div>
						</div>
					@endfor
				@else

					<div class="news-post image-post">
						{!!$item->preview_single!!}
						<div class="hover-box">
							<div class="inner-hover">
								<a class="category-post" style="background-color:{{$item->colorCategory}}" href="#">{{$item->display_category_name}}</a>
								<h2><a href="{{url('post', $item->slug)}}">{{$item->title}}</a></h2>
								<ul class="post-tags">
									<li><i class="fa fa-clock-o"></i><span>{{$item->long_date}}</span></li>
									<li><i class="fa fa-eye"></i><span>{{$item->read}}</span></li>
								</ul>
								<p>{{$item->limitContent}}</p>
							</div>
						</div>
					</div>

				@endif
			@endforeach

		</div>

	</section>
	<!-- End heading-news-section -->