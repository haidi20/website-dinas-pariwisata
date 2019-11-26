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

                        <div class="section-new-posts">
                            
                        </div>

                    </div>
                    <!-- End grid box -->

                    <!-- carousel box -->
                        <div class="carousel-box owl-wrapper section-galleries">
                            <div class="title-section">
                                <h1><span>Gallery</span></h1>
                            </div>
                            <div class="list-galleries">
                                {{-- codingannya ada di script.blade.php --}}
                            </div>
                            {{-- <div class="owl-carousel" data-num="3">
                            
                                @foreach ($image as $index => $item)
                                    <div class="item news-post image-post3">
                                        {!!$item->preview_original!!}
                                    </div>
                                @endforeach

                            </div> --}}

                            <div class="center-button button-gallery" style="display:none">
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
                            <h1><span>Postingan Terlama</span></h1>
                        </div>

                        <div class="section-latest-posts">

                        </div>

                        {{-- <div class="latest-articles iso-call">

                            @foreach ($lastPosts as $index => $item)
                                <div 
                                    class="news-post standard-post2 {{$index == 0 ? 'default-size' : ''}}"
                                    onClick="gotolink('{{$item->gotolink}}')"
                                >
                                    <div class="post-gallery">
                                        {!!$item->preview_last_post!!}
                                    </div>
                                    <div class="post-title">
                                        <h2><a onClick="gotolink('{{$item->gotolink}}')">{{$item->show_limit_title}}</a></h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                            <li>{!! $item->viewed !!}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div> --}}
                        <div class="center-button button-latest-posts" style="display:none">
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