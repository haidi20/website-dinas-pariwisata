@extends('website._layouts.default')

@section('content')
<!-- block-wrapper-section
================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <!-- block content -->
                    <div class="block-content non-sidebar">

                        <!-- single-post box -->
                        <div class="single-post-box">

                            <div class="title-post">
                                <h2>Belum Ada Isi</h2>
                                {{-- <h1>{{$page->title}}</h1> --}}
                                {{-- <ul class="post-tags">
                                    <li><i class="fa fa-clock-o"></i>{{$page->detail_datetime}}</li>
                                    <li>{!! $page->viewed !!}</li>
                                </ul> --}}
                            </div>

                            <div class="post-content">

                                {{-- {!!$page->content!!} --}}
                                
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