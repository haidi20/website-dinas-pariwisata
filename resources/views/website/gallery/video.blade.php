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
            $('.video').click(function(){
                link = $(this).data('detail');

                window.location.href = link
            });
        });
    </script>
@endsection

@section('content')
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
                        <div 
                            class="col-md-3 video"
                            data-detail="{{url('video', [$item->slug])}}"
                        >
                            <img 
                                src="{{$item->thumbnail}}" 
                                alt=""
                                width="250"
                                height="200"
                                style="margin-bottom:30px"
                            >
                        </div>
                    @empty
                    <div class="row">
                        <div class="col-md-12">
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
            <a href="#"><i class="fa fa-refresh"></i> Lebih Banyak Video</a>
        </div>
        <br><br>
    </section>
<!-- End block-wrapper-section -->
@endsection