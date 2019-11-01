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
                url     = image.data('link')

                $(".modal-gallery").attr('src', url);
            });

            // mematikan video youtube ketika modal tertutup
            $('button.close').click(function(){
                thumbnail = $('.modal-gallery')
                thumbnail.attr('src', '');
            });
        })
        
        // review gambar
        // function action (id){
        //     $('#show-gallery').modal('show');
        //     youtube = $('.modal-gallery')
        //     link     = $('.img-'+id).data('link')

        //     youtube.attr('src', link)
        // }
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
                        <h1><span class="world">Video</span></h1>
                    </div>

                    @forelse ($data as $index => $item)
                        @if($index + 1 % 2)
                            <div class="col-md-6">
                                {{-- <a href="{{$item->youtube_link}}" class="video-link"> --}}
                                <iframe class="modal-gallery" src="{{$item->youtube_link}}" id="video" width="500" height="400" frameborder="0" allowFullScreen></iframe>
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
        <br><br>
        <div class="center-button">
            <a href="#"><i class="fa fa-refresh"></i> More from featured</a>
        </div>
        <br><br>
    </section>
<!-- End block-wrapper-section -->
@endsection