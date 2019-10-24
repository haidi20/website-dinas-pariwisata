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
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src='{{asset("images/$item->image")}}' alt="">
                                    <div class="hover-box">
                                        <div class="inner-hover">
                                            <h2><a href="{{url('/post/detail')}}">{{$item->title}} </a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{$item->date}}</li>
                                                <li><a href="#">
                                                    <li><i class="fa fa-eye"></i>{{$item->read}}</li>
                                                </a></li>
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
                    <li>
                        <img src='{{asset("images/$item->image")}}' alt="">
                        <div class="post-content">
                            <h2><a href="{{url('/post/detail')}}">{{$item->title}}</a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>{{$item->date}}</li>
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
                            <li>
                                <img src='{{asset("images/$item->image")}}' alt="">
                                <div class="post-content">
                                    <h2><a href="{{url('/post/detail')}}">{{$item->title}}</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{$item->date}}</li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane" id="option2">
                    <ul class="list-posts">

                        @foreach ($rightSideRecentPosts as $index => $item)
                            <li>
                                <img src='{{asset("images/$item->image")}}' alt="">
                                <div class="post-content">
                                    <h2><a href="{{url('/post/detail')}}">{{$item->title}} </a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{$item->date}}</li>
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
                    <img src="{{$rightSideVideo->thumbnail}}">
                    {{-- <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a> --}}
                    <a href="{{$rightSideVideo->link}}" class="video-link">{{$rightSideVideo->name}}</a>
                <div class="hover-box">
                    {{-- <h2><a href="{{url('/post/detail')}}">Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. </a></h2> --}}
                    <ul class="post-tags">
                        <li><i class="fa fa-clock-o"></i>{{$rightSideVideo->date}}</li>
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