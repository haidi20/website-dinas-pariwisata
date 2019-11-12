<!-- features-today-section
================================================== -->
<section class="features-today">
    <div class="container">

        <div class="title-section">
            <h1><span>Postingan Terpopuler</span></h1>
        </div>

        <div class="features-today-box owl-wrapper">
            <div class="owl-carousel" data-num="4">
            
                @foreach ($popularPosts as $index => $item)
                    <div class="item news-post standard-post" onClick="gotolink('{{$item->gotolink}}')">
                        <div class="post-gallery">
                            {!!$item->preview_single!!}
                            <a 
                                class="category-post world" 
                                style="background-color:{{$item->color_category}}"
                                onClick="gotolink('{{$item->gotolink}}')"
                            >
                                {{$item->display_category_name}}
                            </a>
                        </div>
                        <div class="post-content">
                            <h2><a onClick="gotolink('{{$item->gotolink}}')">{{$item->show_title}}</a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                <li>{!! $item->viewed !!}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</section>
<!-- End features-today-section -->