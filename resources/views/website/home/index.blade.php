@extends('website._layouts.default')

@section('script-top')
	<style>
		.big-loading{
			font-size:60px;
			text-align: center;
		}
		div.block-content{
			padding:30px 0px 0px;
		}
	</style>
@endsection

@section('script-bottom')
	@include('website.home.script')
@endsection

@section('content')

	@if($firstPost)
		@include('website.home.heading-news')

		@if(!$breakingNewsPosts->isEmpty())
			<section class="ticker-news">
				<div class="container">
					<div class="ticker-news-box">
						<span class="breaking-news">breaking news</span>
						<span class="new-news">New</span>
						<ul id="js-news">
							@foreach($breakingNewsPosts as $index => $item)
							<li class="news-item" >
								{{-- <span class="time-news">{{$item->long_date}}</span>    --}}
								<a href="{{$item->gotolink}}" onClick="gotolink('{{$item->gotolink}}')" style="cursor:pointer">
									{{$item->title}}
								</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</section>
		@endif
	
		@include('website.home.search')

		@include('website.home.post-popular')
	
		@include('website.home.main-body')
	@endif
	
@endsection