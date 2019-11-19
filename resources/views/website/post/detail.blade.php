@extends('website._layouts.default')

@section('open-grap')
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:url" content="{{ Request::fullUrl() }}" />
<meta property="og:type" content="{{ ucfirst($post->display_category_name) }}" />
<meta property="og:description" content="{!! strip_tags(str_limit($post->content, 100)) !!}" />
<meta property="og:image" content="{{ $post->preview_url }}" />
@endsection

@section('script-top')
    @include('website.post.style')
@endsection

@section('script-bottom')
   @include('website.post.script')
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

                            
                            @include('website.post.suggest')

                            @include('website.post.comment')

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