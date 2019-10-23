@extends('website._layouts.default')

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
                        @if($index + 1 % 2)
                            <div class="col-md-6">
                                <div class="news-post image-post2">
                                    <div class="post-gallery">
                                        <img src='{{asset("images/pemerintah/$item->name")}}' alt="">
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

                    <div class="center-button">
                        <a href="#"><i class="fa fa-refresh"></i> More from featured</a>
                    </div>

                </div>
                <!-- End grid box -->

            </div>
            <!-- End block content -->
        </div>
    </section>
<!-- End block-wrapper-section -->
@endsection