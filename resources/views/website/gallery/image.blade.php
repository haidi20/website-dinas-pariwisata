@extends('website._layouts.default')

@section('script-top')
    <style>
        img{
            cursor: pointer;
        }
    </style>
@endsection

@section('script-bottom')
    <script>
        $(function(){
            $('.img-responsive').click(function(){
                $('#show-gallery').modal('show');

                image   = $(this)
                url     = image.data('url-original')

                $(".modal-gallery").attr('src', url);
            });
        })
    </script>
@endsection

@section('content')
@include('website.gallery.modal')
<!-- block-wrapper-section
    ================================================== -->
    <section class="block-wrapper">
        <div class="container">

            <!-- block content -->
            <div class="block-content non-sidebar">

                <!-- grid box -->
                <div class="grid-box">
                    <div class="title-section">
                        <h1><span class="world">Image</span></h1>
                    </div>

                    @forelse ($data as $index => $item)
                        @if($index + 1 % 2)
                            <div class="col-md-6">
                                <div class="news-post image-post2">
                                    <div class="post-gallery">
                                        {{-- <img 
                                            src='{{asset("images/$item->name")}}' 
                                            class="image" data-source='{{asset("images/$item->name")}}'
                                        /> --}}

                                        {!!$item->preview_original!!}
                                    </div>
                                </div>
                            </div>
                        @else 
                            
                        @endif
                    @empty
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Image Empty</h3>
                        </div>
                    </div>
                    @endforelse

                </div>
                <!-- End grid box -->

            </div>
            <!-- End block content -->
        </div>

        <div class="center-button">
            <a href="#"><i class="fa fa-refresh"></i> More from featured</a>
        </div>
        <br><br>
    </section>
<!-- End block-wrapper-section -->
@endsection