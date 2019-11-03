<div class="col-md-3 col-sm-4">
    <!-- sidebar -->
    <div class="sidebar large-sidebar">

        <div class="widget features-slide-widget">
            <div class="title-section">
                <h1 class="coba"><span>Postingan</span></h1>
            </div>
            <div class="image-post-slider">
                <ul class="bxslider">
                    @foreach ($rightSidePosts as $index => $item)
                        <li>
                            <div class="news-post image-post2" onClick="gotolink('{{$item->slug}}', 'post')">
                                <div class="post-gallery">
                                    {!!$item->preview_right_side_post!!}
                                    <div class="hover-box">
                                        <div class="inner-hover">
                                            <h2><a href="{{url('post/tags', $item->slug)}}">{{$item->title}} </a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                                <li>{!! $item->viewed !!}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <ul class="list-posts">

               @foreach ($rightSidePosts as $index => $item)
                    <li onClick="gotolink('{{$item->slug}}', 'post')">
                        {!!$item->preview_right_side_post_two!!}
                        <div class="post-content">
                            <h2><a href="{{url('post/tags', $item->slug)}}">{{$item->title}}</a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                <li>{!! $item->viewed !!}</li>
                            </ul>
                        </div>
                    </li>
               @endforeach

            </ul>
        </div>

        <div class="widget tab-posts-widget">

            <ul class="nav nav-tabs" id="myTab">
                <li class="active">
                    <a href="#option1" data-toggle="tab">Popular</a>
                </li>
                <li>
                    <a href="#option2" data-toggle="tab">Recent</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="option1">
                    <ul class="list-posts">
                        @foreach ($rightSidePopularPosts as $index => $item)
                        <li onClick="gotolink('{{$item->slug}}', 'post')">
                                {!!$item->preview_right_side_popular_post!!}
                                <div class="post-content">
                                    <h2><a onClick="gotolink('{{$item->slug}}', 'post')">{{$item->title}}</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                        {{-- <li class="right-side-viewed">{!! $item->viewed !!}</li> --}}
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane" id="option2">
                    <ul class="list-posts">

                        @foreach ($rightSideRecentPosts as $index => $item)
                            <li onClick="gotolink('{{$item->slug}}', 'post')">
                                {!!$item->preview_right_side_popular_post!!}
                                <div class="post-content">
                                    <h2><a onClick="gotolink('{{$item->slug}}', 'post')">{{$item->title}} </a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                        {{-- <li class="right-side-viewed">{!! $item->viewed !!}</li> --}}
                                    </ul>
                                </div>
                            </li>
                        @endforeach

                    </ul>										
                </div>
            </div>
        </div>

        <div class="widget post-widget">
            <div class="title-section">
                <h1><span>Video</span></h1>
            </div>
            <div class="news-post video-post">
                <img src="{{asset('images/loading.gif')}}" data-src="{{$rightSideVideo->thumbnail}}" class="lazy">
                <a href="{{$rightSideVideo->link}}" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                <div class="hover-box">
                    <h2><a href="single-post.html">{{$rightSideVideo->caption}}</a></h2>
                    <ul class="post-tags">
                        {{-- <li><i class="fa fa-clock-o"></i>27 may 2013</li> --}}
                    </ul>
                </div>
            </div>

            <div class="center-button">
                <a href="{{url('/video')}}"> Show More </a>
            </div>
        </div>


    </div>
    <!-- End sidebar -->

</div>