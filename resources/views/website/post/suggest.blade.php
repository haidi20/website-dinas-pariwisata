<!-- carousel box -->
<div class="carousel-box owl-wrapper">
        <div class="title-section">
            <h1><span>Artikel Terkait Lainnya</span></h1>
        </div>
        <div class="owl-carousel" data-num="3">
        
            @foreach ($suggests as $index => $item)
                <div class="item news-post image-post3" onClick="gotolink('{{$item->slug}}', 'post')">
                    {!!$item->preview_original!!}
                    <div class="hover-box">
                        <h2><a onClick="gotolink('{{$item->slug}}', 'post')">{{$item->title}}</a></h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- End carousel box -->