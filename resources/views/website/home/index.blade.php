@extends('website._layouts.default')

@section('content')

	@if($firstPost)
		@include('website.home.heading-news')

		<section class="ticker-news">
			<div class="container">
				<div class="ticker-news-box">
					<span class="breaking-news">breaking news</span>
					<span class="new-news">New</span>
					<ul id="js-news">
						@foreach($breakingNewsPosts as $index => $item)
						<li class="news-item">
							<span class="time-news">{{$item->long_date}}</span>   
							{{$item->title}}
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</section>
	
		@include('website.home.search')

		@include('website.home.post-popular')
	
		@include('website.home.main-body')
	@endif
	
@endsection