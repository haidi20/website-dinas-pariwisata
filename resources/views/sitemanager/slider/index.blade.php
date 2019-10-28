@extends('sitemanager._layout.default', ['moduleTitle'])

@section('script-top')
<style>
#screenshot{
    position:absolute;
    border:1px solid #ccc;
    background:#333;
    padding:3px;
    display:none;
    color:#fff;   
}
</style>
@endsection

@section('script-bottom')
<script>
this.screenshotPreview = function(){	
	/* CONFIG */
		
		xOffset = 10;
		yOffset = 30;
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	$("a.screenshot").hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		$("body").append("<p id='screenshot'><img src='"+ this.rel +"' alt='No Picture' />"+ c +"</p>");								 
		$("#screenshot")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;	
		$("#screenshot").remove();
    });	
	$("a.screenshot").mousemove(function(e){
		$("#screenshot")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};


// starting the script on page load
$(document).ready(function(){
	screenshotPreview();
});

$(".btn-delete-img").click(function() {
    element = $(this);
    url = element.data('url');
    imgname = element.data('name');
    img = element.data("src");
    src = '<center><img width="100%" height="400" src="' + img + '" class="img-responsive" /></center>';
	
    bootbox.confirm({
        title: imgname,
        message: src + "<br>Anda yakin ingin menghapus slider ini?",
        callback: function(result){
            if(result){
                window.location.href = url;
            }
        }
    });
});

</script>
@endsection

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>{{ $moduleTitle }}</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        <a href="{{ url($moduleUrl, 'create') }}" class="btn btn-primary">@fa('plus') Tambah {{ $moduleTitle }}</a>
			    </div>
			</div>
        </div>

        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-2"></div>
				<div class="col-md-8">

					{!! session()->get('message') !!}
					
					<div id="carousel-example-captions" class="carousel slide">
						<ol class="carousel-indicators">
							@forelse($slider as $index => $item)
							<li data-target="#carousel-example-captions" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
							@empty
							<li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-captions" data-slide-to="1" class=""></li>
							@endforelse
						</ol>
						<div class="carousel-inner">
							@forelse($slider as $index => $item)
							<div class="item {{ $index === 0 ? 'active' : '' }}">
								{!! $item->preview !!}
								<div class="carousel-caption">
									<h3>{{ $item->caption }}</h3>
									<p>{{ $item->description }}</p>
								</div>
							</div>
							@empty
							<div class="item active">
								<img src="http://placehold.it/2000x906" alt="Demolition">
								<div class="carousel-caption">
									<h3>First slide label</h3>
									<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
								</div>
							</div>
							<div class="item">
								<img src="http://placehold.it/2000x906" alt="River">
								<div class="carousel-caption">
									<h3>Second slide label</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
								</div>
							</div>
							@endforelse
						</div>
						<a class="left carousel-control" href="#carousel-example-captions" data-slide="prev">
							<i class="fa fa-prev icon-prev"></i>
						</a>
						<a class="right carousel-control" href="#carousel-example-captions" data-slide="next">
							<i class="fa fa-next icon-next"></i>
						</a>
					</div>

				</div>
				<div class="col-md-2"></div>
        	</div>
        	<hr>
        	<div class="row">
	        	<div class="panel">
					<div class="panel-body panel-no-padding">
						<table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>
									<th>Image</th>
									<th class="text-center">Title</th>
									<th class="text-center" width="100">Status</th>
									<th class="text-center" width="140">Actions</th>
								</tr>
							</thead>
							<tbody>
							@forelse($slider as $index => $item)
								<tr>
									<td>
										<a href="{{ url($moduleUrl, ['edit', $item->id]) }}" class="screenshot" rel="{{ $item->preview_fit }}">{{ $item->image->name }}</a>
									</td>
									<td class="text-center">{{ $item->caption }}</td>
									<td class="text-center">{!! $item->status_label !!}</td>
									<td class="text-center">
										<a href="{{ url($moduleUrl, ['edit', $item->id]) }}" class="btn btn-success btn-xs btn-label">@fa('pencil')Edit</a>
										<a href="javascript:void(0)" class="btn btn-danger btn-xs btn-label btn-delete-img" data-url="{{ url($moduleUrl, ['delete', $item->id]) }}" data-name="{{ $item->caption }}" data-src="{{ $item->preview_fit }}">@fa('trash-o')Delete</a>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="4" class="alert alert-info">
										<center>Data Kosong!</center>
									</td>
								</tr>
							@endforelse
							</tbody>
						</table>
					</div>
				</div>

				<div class="text-right">
					
				</div>
			</div>
			
        </div> <!-- .container-fluid -->

        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
    </div> <!-- #page-content -->
</div>
@endsection