@extends('website._layouts.default')

@section('script-top')
    <style>
        .fa{
            padding-right: 0px;
            padding-left: 11px;
        }
    </style>
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
                                <h1>{{$post->title}}</h1>
                                <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>{{$post->time}}</li>
                                    <li><i class="fa fa-eye"></i>{{$post->read}}</li>
                                </ul>
                            </div>

                            <div class="share-post-box">
                                <ul class="share-box">
                                    @foreach ($shares as $index => $item)
                                        <li><a class="{{$item->name == 'google-plus' ? 'google' : $item->name}}" href="#"><i class="fa fa-{{$item->name}}" style="position:center"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="post-gallery">
                                <img src='{{asset("images/$post->image")}}' alt="">
                                <span class="image-caption">{{$post->title}}</span>
                            </div>

                            <div class="post-content">

                                {{$post->content}}
                                
                            </div>

                            <div class="post-tags-box">
                                <ul class="tags-box">
                                    <li><i class="fa fa-tags"></i><span>Tags:</span></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Politics</a></li>
                                    <li><a href="#">Sport</a></li>
                                </ul>
                            </div>

                            <div class="share-post-box">
                                <ul class="share-box">
                                    @foreach ($shares as $index => $item)
                                        <li><a class="{{$item->name == 'google-plus' ? 'google' : $item->name}}" href="#"><i class="fa fa-{{$item->name}}" style="position:center"></i></a></li>
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
                                <form id="comment-form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="name">Name*</label>
                                            <input id="name" name="name" type="text">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="mail">E-mail*</label>
                                            <input id="mail" name="mail" type="text">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="website">Website</label>
                                            <input id="website" name="website" type="text">
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