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
                            <h1><span>Postingan Terbaru</span></h1>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="news-post image-post2">
                                    <div class="post-gallery">
                                        {!!$firstPost->preview_single!!}
                                        <div class="hover-box">
                                            <div class="inner-hover">
                                                <a class="category-post tech">{{$firstPost->display_category_name}}</a>
                                                <h2 style="color:white"><a href="{{url('post', $firstPost->slug)}}" >{{$firstPost->title}}</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>{{$firstPost->long_date}}</li>
                                                    <li><a href="javascript:void(0)">
                                                        {!! $firstPost->viewed !!}
                                                    </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-posts">
                                    @foreach ($limitThreePosts as $index => $item)
                                        <li>
                                            <a href="{{url('post', $item->slug)}}" >
                                                {!!$item->preview_single!!}
                                                <div class="post-content">
                                                    {{$item->display_category_name}}
                                                    <h2>{{$item->title}}</h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                                        <li>
                                                            {!! $firstPost->viewed !!}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="center-button">
                            <a href="{{url('/post')}}"> Show More </a>
                        </div>

                    </div>
                    <!-- End grid box -->

                    <!-- carousel box -->
                        <div class="carousel-box owl-wrapper">
                            <div class="title-section">
                                <h1><span>Gallery</span></h1>
                            </div>
                            <div class="owl-carousel" data-num="3">
                            
                                @foreach ($image as $index => $item)
                                <div class="item news-post image-post3">
                                        {!!$item->preview_original!!}
                                    </div>
                                @endforeach

                            </div>

                            <div class="center-button">
                                <a href="{{url('/galerry')}}"> Show More </a>
                            </div>
                        </div>
                        <!-- End carousel box -->
                </div>
                <!-- End block content -->

                <!-- block content -->
                <div class="block-content">

                    <!-- masonry box -->
                    <div class="masonry-box">

                        <div class="title-section">
                            <h1><span>Latest Articles</span></h1>
                        </div>

                        <div class="latest-articles iso-call">

                            @foreach ($lastPosts as $index => $item)
                                <div class="news-post standard-post2 {{$index == 0 ? 'default-size' : ''}}">
                                    <div class="post-gallery">
                                        <a href="{{url('post', $item->slug)}}"> 
                                            {!!$item->preview_single!!}
                                        </a>
                                    </div>
                                    <div class="post-title">
                                        <h2><a href="{{url('post', $item->slug)}}">{{$item->title}}</a></h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                            <li><a href="#">
                                                <li>{!! $item->viewed !!}</li>
                                            </a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <!-- End masonry box -->

                </div>
                <!-- End block content -->

            </div>

           {{-- sisi kanan postingan  --}}
           @include('website.support.side-right-post')
            
        </div>

    </div>
</section>
<!-- End block-wrapper-section -->