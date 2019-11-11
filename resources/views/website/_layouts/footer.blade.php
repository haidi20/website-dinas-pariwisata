<!-- footer 
    ================================================== -->
    <footer>
        <div class="container">
            <div class="footer-widgets-part">
                <div class="row">
                    <div class="col-md-3">
                        <div class="widget text-widget">
                            
                        </div>
                        <div class="widget social-widget">
                            <h1>Stay Connected</h1>
                            <ul class="social-icons">
                                @forelse ($footerMedsos as $index => $item)
                                    <li><a href="{{$item->link}}" target="_blank" class="{{$item->name}}"><i class="fa fa-{{$item->name}}"></i></a></li>
                                @empty
                                    
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget posts-widget">
                            <h1>Random Post</h1>
                            <ul class="list-posts">
                                @foreach ($footerPosts as $index => $item)
                                    <li>
                                        {!!$item->preview_footer_post!!}
                                        <div class="post-content">
                                            <a href="travel.html">{{$item->display_category_name}}</a>
                                            <h2><a href="{{url('post/detail')}}">{{$item->title}}</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget categories-widget">
                            <h1>Categories</h1>
                            <ul class="category-list">
                                @foreach($footerCategories as $index => $item)
                                    <li>
                                        <a href="{{url('post', [$item->name])}}">{{$item->name}} <span>{{$item->total_post}}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget flickr-widget">
                            <h1>Photos</h1>
                            <ul class="flickr-list">
                                @foreach ($footerImages as $index => $item)
                                    <li>
                                        <a href="javascript:void(0)">
                                            {!!$item->preview_original!!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{url('/image')}}">View more photos...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-last-line">
                <div class="row">
                    <div class="col-md-6">
                        {{-- <p>&copy; COPYRIGHT 2015 hotmagazine.com</p> --}}
                    </div>
                    <div class="col-md-6">
                        <nav class="footer-nav">
                            <ul>
                                {{-- <li><a href="index.html">Home</a></li>
                                <li><a href="index.html">Purchase Theme</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer -->