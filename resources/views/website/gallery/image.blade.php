@extends('website._layouts.default')

@section('script-top')
    <style>
        img, .zoom{
            cursor: pointer;
        }
        .icon-show{
            transform: translate(0px, 18px);
        }
        .mfp-content img.mfp-img {
            max-height: 500px;
            width: 100%;
            height: 500px;
        }
    </style>
@endsection

@section('script-bottom')
    <script>
        $(function(){
            
        })
    </script>
@endsection

@section('content')
@include('website.gallery.modal')
<!-- block-wrapper-section
    ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <!-- block content -->
                    <div class="block-content">

                        <!-- single-post box -->
                        <div class="single-post-box">

                            <div class="article-inpost">
                                @foreach ($data as $index => $item)
                                    @if($index % 2)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="image-content">
                                                <div class="image-place zoom" href="{{url($item->preview_url)}}">
                                                    {!! $item->preview_original !!}
                                                    <div class="hover-image">
                                                        <a class="zoom" href="{{url($item->preview_url)}}">
                                                            <i class="fa fa-arrows-alt icon-show"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-md-6">
                                        <div class="image-content">
                                            <div class="image-place zoom" href="{{url($item->preview_url)}}">
                                                {!! $item->preview_original !!}
                                                <div class="hover-image">
                                                    <a class="zoom" href="{{url($item->preview_url)}}">
                                                        <i class="fa fa-arrows-alt icon-show"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                        <!-- End single-post box -->

                    </div>
                    <!-- End block content -->

                </div>

            </div>

        </div>
    </section>
    <!-- End block-wrapper-section -->
@endsection