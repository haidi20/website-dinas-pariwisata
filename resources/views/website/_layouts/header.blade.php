<!-- Header
    ================================================== -->
    <header class="clearfix">
        <!-- Bootstrap navbar -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">

            <!-- Logo & advertisement -->
            <div class="logo-advertisement" style="background-color:white">
                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('images/logo-keren.png')}}" style="height:90px; weidth: 400px;"  alt="">
                        </a>
                    </div>

                    <div class="advertisement">
                        <div class="desktop-advert">
                            {{-- <span>Advertisement</span> --}}
                            {{-- <img style="margin-top: 50px" src="{{asset('hotmagazine/upload/addsense/background-custom.jpg')}}" alt=""> --}}
                        </div>
                        <div class="tablet-advert">
                            {{-- <span>Advertisement</span> --}}
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

                            <li><a class="tech" href="{{url('/')}}">Home</a></li>
                            <li><a class="fashion" href="{{url('/post')}}">Post</a></li>

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