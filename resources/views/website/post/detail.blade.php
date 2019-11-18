@extends('website._layouts.default')

@section('open-grap')
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:url" content="{{ Request::fullUrl() }}" />
<meta property="og:type" content="{{ ucfirst($post->display_category_name) }}" />
<meta property="og:description" content="{!! strip_tags(str_limit($post->content, 100)) !!}" />
<meta property="og:image" content="{{ $post->preview_url }}" />
@endsection

@section('script-top')
    <style>
        .icon-bar {
            position: fixed;
            top: 50%;
            left: -40px;
            z-index: 100;
        }
        ul.icon-bar li {
            list-style-type: none;
        }
        .icon-bar a {
            display: block;
            text-align: center;
            padding: 10px;
            transition: all 0.3s ease;
            color: white;
            font-size: 20px;
        }
        .icon-bar a:hover {
            background-color: #000;
        }
        .facebook {
            background: #3B5998;
            color: white;
        }
        .twitter {
            background: #55ACEE;
            color: white;
        }
        .google {
            background: #dd4b39;
            color: white;
        }
        .linkedin {
            background: #007bb5;
            color: white;
        }
        .youtube {
            background: #bb0000;
            color: white;
        }
    </style>
@endsection

@section('script-bottom')
    <script>
       
    </script>
@endsection

@section('content')
<!-- block-wrapper-section
================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <!-- block content -->
                    <div class="block-content">

                        <!-- single-post box -->
                        <div class="single-post-box">

                            <div class="title-post">
                                <h1>{{$post->show_title}}</h1>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>{{$post->detail_datetime}}</li>
                                    <li>{!! $post->viewed !!}</li>
                                </ul>
                            </div>

                            <div class="share-post-box">
                                <ul class="icon-bar">
                                    @foreach ($shares as $index => $item)
                                        <li>
                                            <a 
                                                class="{{$item->name}}" 
                                                href="{{$item->setShareMedsos(Request::url())}}"
                                                target="_blank"
                                            ><i class="fa fa-{{$item->name}}" style="position:center"></i>
                                        </a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="post-gallery">
                                    {!!$post->preview_original!!}
                                <span class="image-caption">{{$post->show_title}}</span>
                            </div>

                            <div class="post-content">

                                {!!$post->content!!}
                                
                            </div>

                            <div class="post-tags-box">
                                <ul class="tags-box">
                                    <li><i class="fa fa-tags"></i><span>Tags:</span></li>
                                    @foreach ($tags as $item)
                                        <li><a href="#">{{$item}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="share-post-box">
                                <ul class="share-box">
                                    @foreach ($shares as $index => $item)
                                        <li>
                                            <a 
                                                class="{{$item->name}}" 
                                                href="{{$item->setShareMedsos(Request::url())}}"
                                                target="_blank"
                                            ><i class="fa fa-{{$item->name}}" style="position:center"></i>
                                        </a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="contact-form-box">
                                @include('website.post.suggest')
                            </div>

                            <!-- contact form box -->
                            <div class="contact-form-box">
                                <div class="title-section">
                                    <h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
                                </div>
                                {{-- <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-numposts="5" data-width="100%"></div> --}}
                                <form id="comment-form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="name">Name*</label>
                                            <input id="name" name="name" type="text">
                                        </div>
                                    </div>
                                    <label for="comment">Comment*</label>
                                    <textarea id="comment" name="comment"></textarea>
                                    <button type="submit" id="submit-contact">
                                        <i class="fa fa-comment"></i> Post Comment
                                    </button>
                                </form>                               
                            </div>
                            <!-- End contact form box -->

                        </div>
                        <!-- End single-post box -->

                    </div>
                    <!-- End block content -->

                </div>

                @include('website.support.side-right-post')

            </div>

        </div>
    </section>
<!-- End block-wrapper-section -->
@endsection