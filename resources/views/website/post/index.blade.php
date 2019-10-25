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

						@foreach ($posts as $index => $item)
							<div class="news-post large-post">
								<div class="post-gallery">
									<img src='{{asset("images/$item->image")}}' alt="">
									<a class="category-post" style="background-color:{{$item->colorCategory}}" href="world.html">{{$item->nameCategory}}</a>
								</div>
								<div class="post-title">
									<h2><a href="-content">
									<h2><a href="{{url('post', $item->slug)}}">{{$item->title}}</a></h2>
									<ul class="post-tags">
										<li><i class="fa fa-clock-o"></i>{{$item->date}}</li>
										<li><i class="fa fa-eye"></i>{{$item->read}}</li>
									</ul>
								</div>
								<div class="post-content">
									<p>{{$item->limitContentLarge}}</p>
									<a href="-content">
										<h2><a href="{{url('post', $item->slug)}}" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More
									</a>
								</div>
							</div>
						@endforeach
						

					</div>
					<!-- End grid box -->

					<!-- pagination box -->
					<div class="pagination-box">
						{!! $posts->appends([
							'perpage' => request('perpage'),
							'by'      => request('by'),
							'q'       => request('q')
						])->links() !!}
					</div>
					<!-- End Pagination box -->

				</div>
				<!-- End block content -->

			</div>

			@include('website.support.side-right-post')

		</div>

	</div>
</section>
<!-- End block-wrapper-section -->
@endsection