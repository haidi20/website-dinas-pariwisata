@extends('website._layouts.default')

@section('script-top')
    <style>
        ul.post-tags li p, ul.post-tags li i {
            color: #606060;
            font-size:15px;
            padding-top:10px;
        }

        ul.post-tags li i {
            margin-left:15px;
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
                        <div class="col-md-8">
                            <iframe 
                                src="{{$video->youtube_link}}" 
                                frameborder="0"
                                width="100%"
                                height="400px"
                            ></iframe>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"> {{$video->format_date}}</i></li>
                                <li>{!! $video->viewed !!}</li>
                            </ul>
                            <hr>
                        </div>
        
                        <div class="col-md-4">
                            recomend video
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