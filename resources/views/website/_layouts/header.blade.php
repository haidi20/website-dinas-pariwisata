<!-- Header
    ================================================== -->
    <header class="clearfix">
        <!-- Bootstrap navbar -->
        <nav class="navbar navbar-default navbar-static-top"  role="navigation">

            <!-- Logo & advertisement -->
            <div class="logo-advertisement" style="
                --custom-bg-website:url('{{asset('images/bg3.png')}}');
                --custom-bg-mobile:url('{{asset('images/bg-mobile.png')}}');
                --custom-bg-tablet:url('{{asset('images/bg-tablet.png')}}');
            ">
                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{asset('/')}}">
                            {{-- <img src="{{asset('images/logo-keren.png')}}" style="height:90px; weidth: 400px;"  alt=""> --}}
                            <img src="{{asset('images/logo-disparr.png')}}" class="logo-dispar"  alt="">
                            <div class="title-logo-dispar">
                                <h2>Kalimantan Timur</h2>
                                <p>The Beauty of Culture and Nature</p>
                            </div>
                        </a>
                        <img src="{{asset('images/wonderful-indonesia-transparent.png')}}" class="logo-burung"  alt="">
                    </div>

                    <div class="advertisement">
                        <div class="desktop-advert">
                            {{-- <img src="{{asset('images/wonderful-indonesia-transparent.png')}}" class="logo-burung"  alt=""> --}}
                        </div>
                        <div class="tablet-advert">
                            
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

                            @if($menu)
                                @foreach ($menu as $index => $item)
                                    @if(!count($item->child))
                                        <li>
                                            <a class="nav-custom" style="--custom-color:{{ $item->color }}" href="{{$item->display_link}}">{{$item->name}}</a>
                                        </li>
                                    @else
                                        {!! render_menu_child($item) !!}
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
            <!-- End navbar list container -->

        </nav>
        <!-- End Bootstrap navbar -->

    </header>
    <!-- End Header -->