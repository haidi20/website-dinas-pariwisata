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
                    <div class="item news-post standard-post">
                        <div class="post-gallery">
                            <img src='{{asset("images/$item->image")}}' alt="">
                            <a class="category-post world" style="background-color:{{$item->colorCategory}}">{{$item->nameCategory}}</a>
                        </div>
                        <div class="post-content">
                            <h2><a href="{{url('/post/detail')}}">{{$item->title}}</a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>{{$item->date}}</li>
                                <li><a href="#">
                                    <li><i class="fa fa-eye"></i>{{$item->read}}</li>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</section>
<!-- End features-today-section -->