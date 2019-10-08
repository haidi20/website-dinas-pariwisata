<!-- Header
    ================================================== -->
    <header class="clearfix">
        <!-- Bootstrap navbar -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">

            <!-- Top line -->
            <div class="top-line">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            
                        </div>	
                        <div class="col-md-3">
                            <ul class="social-icons">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>	
                    </div>
                </div>
            </div>
            <!-- End Top line -->

            <!-- Logo & advertisement -->
            <div class="logo-advertisement" >
                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html"><img src="{{asset('images/logo.jpg')}}" alt=""></a>
                    </div>

                    <div class="advertisement">
                        <div class="desktop-advert">
                            {{-- <span>Advertisement</span> --}}
                            {{-- <img src="{{asset('hotmagazine/upload/addsense/728x90.jpg')}}" alt=""> --}}
                        </div>
                        <div class="tablet-advert">
                            <span>Advertisement</span>
                            {{-- <img src="{{asset('hotmagazine/upload/addsense/468x60.jpg')}}" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Logo & advertisement -->

            <!-- navbar list container -->
            <div class="nav-list-container">
                <div class="container">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">

                            <li><a class="fashion" href="#">Home</a></li>

                            {{-- <li><a class="world" href="news-category4.html">World</a>
                                <div class="megadropdown">
                                    <div class="container">
                                        <div class="inner-megadropdown world-dropdown">
                                            <div class="filter-block">
                                                <ul class="filter-posts">
                                                    <li><a href="#">All</a></li>
                                                    <li><a href="#">Politics</a></li>
                                                    <li><a href="#">Business</a></li>
                                                    <li><a class="active" href="#">Lifestyle</a></li>
                                                    <li><a href="#">Economy</a></li>
                                                    <li><a href="#">Music</a></li>
                                                </ul>
                                            </div>
                                            <div class="posts-filtered-block">
                                                <div class="owl-wrapper">
                                                    <h1>Lifestyle</h1>
                                                    <div class="owl-carousel" data-num="4">
                                                    
                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('hotmagazine/upload/news-posts/art1.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros. </a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('hotmagazine/upload/news-posts/art2.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. </a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('hotmagazine/upload/news-posts/art3.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('hotmagazine/upload/news-posts/art6.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. </a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('hotmagazine/upload/news-posts/art9.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. </a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li> --}}

                            <li><a class="world" href="{{url('galery')}}">Galery</a></li>

                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <input type="text" id="search" name="search" placeholder="Search here">
                            <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
            <!-- End navbar list container -->

        </nav>
        <!-- End Bootstrap navbar -->

    </header>
    <!-- End Header -->