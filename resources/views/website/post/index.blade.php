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
							<div class="news-post large-post" onClick="gotolink('{{$item->gotolink}}')">
								<div class="post-gallery">
									{!!$item->preview_original!!}
									<a 
										class="category-post" 
										style="background-color:{{$item->color_category}}" 
										href="{{url('post/'.$item->display_category_name)}}"
									>
										{{$item->display_category_name}}
									</a>
								</div>
								<div class="post-title">
									<h2><a>
									<h2><a onClick="gotolink('{{$item->gotolink}}')">{{$item->show_title}}</a></h2>
									<ul class="post-tags">
										<li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
										<li>{!! $item->viewed !!}</li>
									</ul>
								</div>
								<div class="post-content">
									{!! $item->display_limit_content_large !!}
									<a onClick="gotolink('{{$item->gotolink}}')">
										<h2><a onClick="gotolink('{{$item->gotolink}}')" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More
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