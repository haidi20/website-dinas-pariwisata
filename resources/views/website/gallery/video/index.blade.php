@extends('website._layouts.default')

@section('script-top')
    <style>
        img{
            cursor: pointer;
        }
        a.disabled{
            background:#FFFFFF;
            pointer-events: none;
        }
    </style>
@endsection 

@section('script-bottom')
    <script>
        $(function(){
            gotolinkvideo();

            $('.more-videos').click(function(){
                count = $('.video').length

                if(count !== {{$countVideos}}){
                    icon = $(this).find('i')
                    icon.removeClass('fa-refresh')
                    icon.addClass('fa-spinner fa-spin')

                    $.get("{{url('video', ['more'])}}?skip="+count, function(data){
                        row = '';
                        $.each(data, function(index, item){
                            row =   row+'<div class="col-md-3 video" data-detail="{{url("video")}}/'+item.slug+'">';
                            row =       row+'<img src="'+item.thumbnail+'"'; 
                            row =           row+'width="250"';
                            row =           row+'height="200"';
                            row =           row+'style="margin-bottom:30px" >';
                            row =   row+'</div>';
                        })

                        $('.list-videos').append(row);
                        lazyImage();
                        showImage();
                    }).done(function(){
                        gotolinkvideo();

                        icon.removeClass('fa-spinner fa-spin')
                        icon.addClass('fa-refresh')
                        count = $('.video').length

                        if(count === {{$countVideos}}){
                            $('a.more-videos').addClass('disabled');
                        }
                    });
                }                
            });
        });

        function gotolinkvideo()
        {
            $('.video').click(function(){
                link = $(this).data('detail');

                window.location.href = link
            });
        }
    </script>
@endsection

@section('content')
<!-- block-wrapper-section
    ================================================== -->
    <section class="block-wrapper">
        <div class="container">

            <!-- block content -->
            <div class="block-content non-sidebar">

                <!-- grid box -->
                <div class="grid-box">
                    <div class="title-section">
                        <h1><span class="world">Video</span></h1>
                    </div>

                    <div class="list-videos">
                    @forelse ($data as $index => $item)
                        <div 
                            class="col-md-3 video"
                            data-detail="{{url('video', [$item->slug])}}"
                        >
                            <img 
                                src="{{$item->thumbnail}}" 
                                alt=""
                                width="250"
                                height="200"
                                style="margin-bottom:30px"
                            >
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Image Empty</h3>
                            </div>
                        </div>
                    @endforelse
                    </div>

                </div>
                <!-- End grid box -->

            </div>
            <!-- End block content -->
            
        </div>
        <br><br>
        <div class="center-button">
            <a href="javascript:;" class="more-videos"><i class="fa fa-refresh"></i> Lebih Banyak Video</a>
        </div>
        <br><br>
    </section>
<!-- End block-wrapper-section -->
@endsection