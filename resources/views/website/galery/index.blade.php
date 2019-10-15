@extends('website._layouts.default')

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
                        <h1><span class="world">World</span></h1>
                    </div>

                    <div class="image-slider">
                        <ul class="bxslider">
                            <li>
                                <div class="news-post image-post2">
                                    <div class="post-gallery">
                                        <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" alt="">
                                        {{-- <div class="hover-box">
                                            <div class="inner-hover">
                                                <a class="category-post world" href="world.html">business</a>
                                                <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                    <li><i class="fa fa-eye"></i>872</li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="news-post image-post2">
                                    <div class="post-gallery">
                                        <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-02.jpg')}}" alt="">
                                        {{-- <div class="hover-box">
                                            <div class="inner-hover">
                                                <a class="category-post world" href="world.html">Lifestyle</a>
                                                <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                    <li><i class="fa fa-eye"></i>872</li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-03.jpg')}}" alt="">
                                    {{-- <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post world" href="world.html">Business</a>
                                            <h2><a href="single-post.html">Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="post-content">
                                    <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat. </p>
                                    <a href="single-post.html" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-04.jpg')}}" alt="">
                                    {{-- <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post world" href="world.html">Business</a>
                                            <h2><a href="single-post.html">QMorbi in sem quis dui placerat ornare.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="post-content">
                                    <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat. </p>
                                    <a href="single-post.html" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-05.jpg')}}" alt="">
                                    {{-- <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post world" href="world.html">Business</a>
                                            <h2><a href="single-post.html">Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="post-content">
                                    <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. </p>
                                    <a href="single-post.html" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-06.jpg')}}" alt="">
                                    {{-- <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post world" href="world.html">Business</a>
                                            <h2><a href="single-post.html">QMorbi in sem quis dui placerat ornare.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="post-content">
                                    <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat. </p>
                                    <a href="single-post.html" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-07.jpg')}}" alt="">
                                    {{-- <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post world" href="world.html">Business</a>
                                            <h2><a href="single-post.html">Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="post-content">
                                    <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat. </p>
                                    <a href="single-post.html" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-08.jpg')}}" alt="">
                                    {{-- <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post world" href="world.html">Business</a>
                                            <h2><a href="single-post.html">QMorbi in sem quis dui placerat ornare.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="post-content">
                                    <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. </p>
                                    <a href="single-post.html" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-09.jpg')}}" alt="">
                                    {{-- <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post world" href="world.html">Business</a>
                                            <h2><a href="single-post.html">Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="post-content">
                                    <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat. </p>
                                    <a href="single-post.html" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="news-post image-post2">
                                <div class="post-gallery">
                                    <img src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-10.jpg')}}" alt="">
                                    {{-- <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post world" href="world.html">Business</a>
                                            <h2><a href="single-post.html">QMorbi in sem quis dui placerat ornare.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="post-content">
                                    <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat. </p>
                                    <a href="single-post.html" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="center-button">
                        <a href="#"><i class="fa fa-refresh"></i> More from featured</a>
                    </div>

                </div>
                <!-- End grid box -->

            </div>
            <!-- End block content -->
        </div>
    </section>
<!-- End block-wrapper-section -->
@endsection