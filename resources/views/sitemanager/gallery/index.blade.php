@extends('sitemanager._layout.default')

@section('script-bottom')
{!! Html::script('avenger/assets/plugins/shufflejs/modernizr.custom.min.js') !!}
{!! Html::script('avenger/assets/plugins/shufflejs/jquery.shuffle.min.js') !!}
<script>
    /* initialize shuffle plugin */
    var $grid = $('.gallery');
 
    $grid.shuffle({
        itemSelector: '.item-wrapper' // the selector for the items in the grid
    });
 
    $('#galleryfilter button').click(function (e) {
        e.preventDefault();
     
        // set active class
        $('#galleryfilter button').removeClass('active');
        $(this).addClass('active');
     
        // get group name from clicked item
        var groupName = $(this).attr('data-group');
     
        // reshuffle grid
        $grid.shuffle('shuffle', groupName );
    });

    $('#gallerysort button').click(function (e) {
        e.preventDefault();

        // set active class
        $('#gallerysort button').removeClass('active');
        $(this).addClass('active');
     
        // set sorts
        var opts = {};

        if ($(this).attr('data-order')=="desc") {
            opts = {
                by: function($el) {
                    return $el.data('name').toLowerCase();
                }
            }
        } else {
            opts = {
                reverse: true,
                by: function($el) {
                    return $el.data('name').toLowerCase();
                }
            }
        }

        $grid.shuffle('sort', opts);

    });

    $(".item-wrapper").click(function(e) {
        element = $(this);
        url_edit = element.find("img").data('url-edit');
        url_delete = element.find("img").data('url-delete');
        link = element.find("img").data('link');
        category = element.find("img").data('category');

        console.log(link);

        e.preventDefault();
        var img = $(this).find('img').attr("src");
        var imgname = $(this).closest(".item-wrapper").attr("data-name");
        if(category == 'video'){
            if(link){
                src = '<iframe width="100%" height="400" src="'+link+'" allowfullscreen></iframe> ';
            }else{
                src = '<img width="100%" height="400" src="http://placehold.it/600x400">';
            }
        }else{
            src = "<center><img src='" + img + "' class='img-responsive' /></center>";
        }

        bootbox.dialog({
            message: src,
            title: imgname,
            buttons: {
                success: {
                    label: "<i class='fa fa-pencil'></i> edit",
                    className: "btn-success",
                    callback: function(){
                        window.location.href = url_edit;
                    }
                },
                danger: {
                    label: "<i class='fa fa-trash-o'></i> delete",
                    className: "btn-danger",
                    callback: function(){
                        bootbox.confirm({
                            title: imgname,
                            message: src + "<br>Anda yakin ingin menghapus gallery ini?",
                            callback: function(result){
                                if(result){
                                    window.location.href = url_delete;
                                }
                            }
                        });
                    }
                },
                close: {
                    label: "Close",
                    className: "btn-default"
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
            <h1>List {{ $moduleTitle }} {{ ucfirst($type) }}</h1>
            <div class="options">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-auto-collapse="false">
                            {!! fa('filter') !!} Show <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" data-auto-collapse="false">
                            <li><a href="{{ url($moduleUrl, ['type', 'all']) }}">Semua </a></li>
                            <li><a href="{{ url($moduleUrl, ['type', 'image']) }}">Gambar </a></li>
                            <li><a href="{{ url($moduleUrl, ['type', 'video']) }}">Video </a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" data-auto-collapse="false">
                            {!! fa('plus') !!} Tambah <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" data-auto-collapse="false">
                            <li><a href="{{ url($moduleUrl, ['create', 'image']) }}">Image</a></li>
                            <li><a href="{{ url($moduleUrl, ['create', 'video']) }}">Video</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">

                    {!! session()->get('message') !!}

					<div class="panel panel-default">
                        <div class="panel-heading"><h2>Gallery {{$type}}</h2></div>
                        <div class="panel-body pb0">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="clearfix">
                                        <div class="btn-group pull-left" id="galleryfilter">
                                            <button class="btn btn-default active" data-group="all">All</button>
                                            @foreach($tags as $tag)
                                                <button class="btn btn-default" data-group="{{ $tag }}">{{ ucfirst($tag) }}</button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="clearfix">
                                        <div class="btn-group pull-right" id="gallerysort">
                                            <button class="btn btn-default" data-order="desc"><i class="fa fa-sort-alpha-asc"></i><span class="hidden-xs"> Name</span></button>
                                            <button class="btn btn-default" data-order="asc"><i class="fa fa-sort-alpha-desc"></i><span class="hidden-xs"> Name</span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <hr style="mt0 mb10">

                                    <ul class="gallery row">
                                    @foreach($gallery as $item)
                                        <div data-groups='{{ $item->gallery_tags }}' class="item-wrapper col-md-3" style="padding-bottom:20px" data-name="{{ $item->caption }}">
                                            <div class="item">
                                                {!! $item->preview_original !!}
                                                <h3>{{ str_limit($item->caption, 18) }}</h3>
                                            </div>
                                        </div>
                                    @endforeach
                                    </ul>
                                    <div class="text-right">
                                        {!! str_replace('/?', '?', $gallery->links()) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

				</div>
        	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection