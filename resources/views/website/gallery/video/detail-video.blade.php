@extends('website._layouts.default')

@section('script-top')
    @include('website.gallery.video.style')
@endsection
@section('script-bottom')
    @include('website.gallery.video.script')
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
                            <br><br>
                            @include('website.gallery.video.comment')
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