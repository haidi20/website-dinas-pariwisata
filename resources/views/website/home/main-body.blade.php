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
                                        {!!$firstPost->preview_first_post!!}
                                        <div class="hover-box">
                                            <div class="inner-hover">
                                                <a 
                                                    class="category-post tech"
                                                    href="{{url('post/'.$firstPost->display_category_name)}}"
                                                >
                                                    {{$firstPost->display_category_name}}
                                                </a>
                                                <h2 style="color:white" data-link="" ><a href="{{url('post/tags', $firstPost->slug)}}" >{{$firstPost->show_title}}</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>{{$firstPost->long_date}}</li>
                                                    <li>{!! $firstPost->viewed !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-posts">
                                    @foreach ($limitThreePosts as $index => $item)
                                        <li onClick="gotolink('{{url('post/tags', $item->slug)}}')">
                                            {!!$item->preview_three_post!!}
                                            <div class="post-content">
                                                <a 
                                                    href="{{url('post/'.$item->display_category_name)}}"
                                                >
                                                    {{$item->display_category_name}}
                                                </a>
                                                <h2><a href="{{url('post/tags', $item->slug)}}">{{$item->show_title}}</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                                    <li>
                                                        {!! $item->viewed !!}
                                                    </li>
                                                </ul>
                                            </div>
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
                                <a href="{{url('/image')}}"> Show More </a>
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
                                        {!!$item->preview_last_post!!}
                                    </div>
                                    <div class="post-title">
                                        <h2><a href="{{url('post/tags', $item->slug)}}">{{$item->show_limit_title}}</a></h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                            <li>{!! $item->viewed !!}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="center-button">
                            <a href="{{url('/post?last=1')}}"> Show More </a>
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