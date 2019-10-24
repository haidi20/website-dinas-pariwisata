<!-- heading-news-section
	================================================== -->
	<section class="heading-news">

		<div class="iso-call heading-news-box">

			<div class="news-post image-post default-size">
				<img src='{{asset("images/$firstPost->image")}}' alt="">
				<div class="hover-box">
					<div class="inner-hover">
						<a class="category-post" style="background-color:{{$firstPost->colorCategory}}" href="#">{{$firstPost->nameCategory}}</a>
						<h2><a href="{{url('/post/detail')}}">{{$firstPost->title}}</a></h2>
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><span>{{$firstPost->date}}</span></li>
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
								<img src='{{asset("images/$item->image")}}' alt="">
								<div class="hover-box">
									<div class="inner-hover">
										<a class="category-post" style="background-color:{{$item->colorCategory}}" href="#">{{$item->nameCategory}}</a>
										<h2><a href="{{url('/post/detail')}}">{{$item->title}}</a></h2>
										<ul class="post-tags">
											<li><i class="fa fa-clock-o"> {{$item->date}}</i></li>
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

			@foreach ($limitSixPosts as $index => $item)
				<div class="news-post image-post">
					<img src='{{asset("images/$item->image")}}' alt="">
					<div class="hover-box">
						<div class="inner-hover">
							<a class="category-post" style="background-color:{{$item->colorCategory}}" href="#">{{$item->nameCategory}}</a>
							<h2><a href="{{url('/post/detail')}}">{{$item->title}}</a></h2>
							<ul class="post-tags">
								<li><i class="fa fa-clock-o"></i><span>{{$item->date}}</span></li>
								<li><i class="fa fa-eye"></i><span>{{$item->read}}</span></li>
							</ul>
							<p>{{$item->limitContent}}</p>
						</div>
					</div>
				</div>
			@endforeach

		</div>

	</section>
	<!-- End heading-news-section -->