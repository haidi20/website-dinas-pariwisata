@extends('website._layouts.default')

@section('script-bottom')
    <script>
        $(function(){
            $('.article-post').click(function(){
                link = $(this).data('link');

                window.location.href = link;
            });
        }); 
    </script>
@endsection

@section('script-top')
    <style>
        ul.post-main li p, ul.post-main li i {
            color: #B4A9B4;
            font-size:12px;
            padding-top:10px;
        }
        ul.post-main li i {
            margin-left:15px;
            /* font-family: 'Lato', sans-serif; */
        }
        .post-side > li > p{
            font-size:11px;
            color: #B4A9B4;
        }
        .title-post-side {
            font-size: 11px;
        }
        .article-post{
            cursor:pointer;
        }
        .caption{
            margin-left:18px;
        }
    </style>
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

                    <div class="row">
                        <div class="col-sm-8">
                            <iframe 
                                src="{{$video->youtube_link}}" 
                                frameborder="0"
                                width="100%"
                                height="400px"
                            ></iframe>
                            <h4 class="caption">{{$video->caption}}</h4>
                            <ul class="post-tags post-main">
                                <li><i class="fa fa-clock-o"></i>{{$video->format_date}}</li>
                                <li>{!! $video->viewed !!}</li>
                            </ul>
                            <hr>
                        </div>
        
                        <div class="col-sm-4">
                            <div class="article-box">
                                <div class="title-section">
                                    <h1><span>Video Lainnya</span></h1>
                                </div>

                                @foreach ($videos as $index => $item)
                                    <div 
                                        class="news-post article-post" 
                                        data-link="{{url('video', [$item->slug])}}"
                                    >
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="post-gallery">
                                                    <img alt="" src="{{$item->thumbnail}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="post-content">
                                                    <h2><a href="javascript:void(0)" class="title-post-side">{{$item->caption}}</a></h2>
                                                    <ul class="post-tags post-side">
                                                        <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                                        <li>{!! $item->viewed !!}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
                <!-- End grid box -->

            </div>
            <!-- End block content -->
            
        </div>
    </section>
<!-- End block-wrapper-section -->
@endsection