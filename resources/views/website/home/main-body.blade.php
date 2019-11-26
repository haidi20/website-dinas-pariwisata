<!-- block-wrapper-section
================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <!-- block content -->
                <div class="block-content">

                    <!-- grid box -->
                    <div class="grid-box">

                        <div class="title-section">
                            <h1><span>Postingan Terbaru</span></h1>
                        </div>

                        <div class="section-new-posts">
                            
                        </div>

                    </div>
                    <!-- End grid box -->

                    <!-- carousel box -->
                        <div class="carousel-box owl-wrapper section-galleries">
                            <div class="title-section">
                                <h1><span>Gallery</span></h1>
                            </div>
                            <div class="list-galleries">
                                {{-- codingannya ada di script.blade.php --}}
                            </div>

                            <div class="center-button button-gallery" style="display:none">
                                <a href="{{url('/image')}}"> Show More </a>
                            </div>
                        </div>
                        <!-- End carousel box -->
                </div>
                <!-- End block content -->

                <!-- block content -->
                <div class="block-content">

                    <!-- masonry box -->
                    <div class="masonry-box">

                        <div class="title-section">
                            <h1><span>Postingan Terlama</span></h1>
                        </div>

                        <div class="section-latest-posts">
                            {{-- codingannya ada di script.blade.php --}}
                        </div>
                        <div class="center-button button-latest-posts" style="display:none">
                            <a href="{{url('/post?last=1')}}"> Show More </a>
                        </div>

                    </div>
                    <!-- End masonry box -->

                </div>
                <!-- End block content -->

            </div>

            {{-- sisi kanan postingan  --}}
            <div class="loading-right-side-posts" style="text-align:center; padding-top:50px;">
                <i class="fa fa-spinner fa-spin big-loading"></i>
            </div>
            <div class="right-side-posts" style="display:none">
                @include('website.support.side-right-post')
            </div>
            
        </div>

    </div>
</section>
<!-- End block-wrapper-section -->