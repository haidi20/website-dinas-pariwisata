@extends('website._layouts.default')

@section('script-bottom')
	<script>
		$(function(){
			$('.image-post').click(function(){
				link = $(this).find('.hover-box > .inner-hover > h2 > a').attr('href');
				
				window.location.href = link;
			});

			$('.send-search').click(function(){
				form = $('.search-form').serializeArray();

				data = []

				$.each(form, function(index, item){
					data[item.name] = item.value
				});

				link = "{{url('post')}}/"+data['category']+"?search="+data['search']

				window.location.href = link
			});
		});
	</script>
@endsection

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