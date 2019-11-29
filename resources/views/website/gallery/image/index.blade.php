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
        a.disabled{
            background:#FFFFFF;
            pointer-events: none;
        }
    </style>
@endsection

@section('script-bottom')
    <script>
        $(function(){
            $('.more-images').click(function(){
                count = $('.list-images .row-image').length

                if(count !== {{$countImages}}){
                    icon = $(this).find('i')
                    icon.removeClass('fa-refresh')
                    icon.addClass('fa-spinner fa-spin')

                    $.get("{{url('image', ['more'])}}?skip="+count, function(data){
                        row = '';
                        $.each(data, function(index, item){
                            row =   row + '<div class="col-md-3 row-image">';
                            row =       row +'<div class="image-content">';
                            row =           row +'<div class="image-place zoom" href="'+item.preview_url+'">';
                            row =               row + item.preview_original;                                   
                            row =               row +'<div class="hover-image">';
                            row =                   row +'<a class="zoom" href="'+item.preview_url+'">';
                            row =                       row +'<i class="fa fa-arrows-alt icon-show"></i>';
                            row =                   row +'</a>';
                            row =               row +'</div>';
                            row =           row +'</div>';
                            row =        row +'</div>';
                            row =   row +'</div>';
                        })

                        $('.list-images').append(row);
                        lazyImage();
                        showImage();
                    }).done(function(){
                        icon.removeClass('fa-spinner fa-spin')
                        icon.addClass('fa-refresh')
                        count = $('.list-images .row-image').length

                        if(count === {{$countImages}}){
                            $('a.more-images').addClass('disabled');
                        }
                    });
                }
            });
        })
    </script>
@endsection

@section('content')
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

                            <div class="title-section">
                                <h1><span class="world">Foto</span></h1>
                            </div>

                            <div class="article-inpost list-images">
                                @foreach ($data as $index => $item)
                                    <div class="col-md-3 row-image">
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
                                @endforeach
                            </div>

                        </div>
                        <!-- End single-post box -->
                        <div class="center-button">
                            <a href="javascript:;" class="more-images"><i class="fa fa-refresh"></i> Lebih Banyak Foto</a>
                            {{-- <a href="#"><i class="fa fa-spinner fa-spin"></i> Lebih Banyak Foto</a> --}}
                        </div>
                        <br><br>
                    </div>
                    <!-- End block content -->
                </div>
            </div>
        </div>
    </section>
    <!-- End block-wrapper-section -->
@endsection