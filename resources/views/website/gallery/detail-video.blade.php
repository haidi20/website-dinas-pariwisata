@extends('website._layouts.default')

@section('script-top')
    <style>
        ul.post-main li p, ul.post-main li i {
            color: #B4A9B4;
            font-size:12px;
            padding-top:10px;
        }
        ul.post-main li i {
            margin-left:15px;
            /* font-family: 'Lato', sans-serif; */
        }
        .post-side > li > p{
            font-size:11px;
            color: #B4A9B4;
        }
        .title-post-side {
            font-size: 11px;
        }
        .article-post{
            cursor:pointer;
        }
        .caption{
            margin-left:18px;
        }

        .name > p, .name > h2{
        display: inline;
        margin:10px;
        }
        .place-comment{
            /* background: #f2f2f2; */
            padding: 10px 10px;
        }
        .place-comment > div > img{
            margin-top:6px;
        }
        .list-comment{
            cursor: default;
            text-align: justify;
        }
        .comment{
            margin-left:120px;
        }
        .single-post-box .share-post-box ul.share-box li a{
            width:40px;
        }
        .single-post-box .share-post-box ul.share-box li a.facebook{
            padding-left: 16px;
        }
        ul.list-posts > li {
            list-style: none;
            padding-bottom: 10px;
            margin-bottom: 10px;
            border-bottom: 0px solid #f0f0f0;
            overflow: hidden;
        }
    </style>
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

                    <div class="row">
                        <div class="col-sm-8">
                            <iframe 
                                src="{{$video->youtube_link}}" 
                                frameborder="0"
                                width="100%"
                                height="400px"
                            ></iframe>
                            <h4 class="caption">{{$video->caption}}</h4>
                            <ul class="post-tags post-main">
                                <li><i class="fa fa-clock-o"></i>{{$video->format_date}}</li>
                                <li>{!! $video->viewed !!}</li>
                            </ul>
                            <hr>
                        @include('website.gallery.comment')
                        </div>
        
                        <div class="col-sm-4">
                            <div class="article-box">
                                <div class="title-section">
                                    <h1><span>Video Lainnya</span></h1>
                                </div>

                                @foreach ($videos as $index => $item)
                                    <div 
                                        class="news-post article-post" 
                                        data-link="{{url('video', [$item->slug])}}"
                                    >
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="post-gallery">
                                                    <img alt="" src="{{$item->thumbnail}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="post-content">
                                                    <h2><a href="javascript:void(0)" class="title-post-side">{{$item->caption}}</a></h2>
                                                    <ul class="post-tags post-side">
                                                        <li><i class="fa fa-clock-o"></i>{{$item->long_date}}</li>
                                                        <li>{!! $item->viewed !!}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>


                </div>
                <!-- End grid box -->                

            </div>
            <!-- End block content -->
            
        </div>
    </section>
<!-- End block-wrapper-section -->
@endsection

@section('script-bottom')
    <script>
        $(function(){
            $('.article-post').click(function(){
                link = $(this).data('link');

                window.location.href = link;
            });

            let comments = '';
            const bulan = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agust', 'Sept', 'Okt', 'Nov', 'Des' ];

            url = 'https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&videoId={{explode("v=",$video->link)[1]}}&key=AIzaSyDHy18clWdaVSoLKhwxAI24XSotdc-Ucqo';
            $.ajax({
                url: url,
                type: 'get',
                success:function(response){
                    response.items.map(comment => {
                        let date = new Date(comment.snippet.topLevelComment.snippet.updatedAt).getDate();
                        let _month = bulan[new Date(comment.snippet.topLevelComment.snippet.updatedAt).getMonth()];
                        let _year = (new Date(comment.snippet.topLevelComment.snippet.updatedAt).getYear() < 1000) ? new Date(comment.snippet.topLevelComment.snippet.updatedAt).getYear() + 1900 : new Date(comment.snippet.topLevelComment.snippet.updatedAt).getYear();
                        let _hours = (new Date(comment.snippet.topLevelComment.snippet.updatedAt).getHours() > 10) ? new Date(comment.snippet.topLevelComment.snippet.updatedAt).getHours() : '0' + new Date(comment.snippet.topLevelComment.snippet.updatedAt).getHours();
                        let _minutes = (new Date(comment.snippet.topLevelComment.snippet.updatedAt).getMinutes() > 10) ? new Date(comment.snippet.topLevelComment.snippet.updatedAt).getMinutes() : '0' + new Date(comment.snippet.topLevelComment.snippet.updatedAt).getMinutes();
                        let time = `${_hours}:${_minutes}`;


                        comments += `<li class="place-comment">
                            <div id="avatar_id"> 
                                <img src="${comment.snippet.topLevelComment.snippet.authorProfileImageUrl}" alt="user_image" >
                            </div>
                            <div class="post-content">
                                <div class="name">
                                    <h2>${comment.snippet.topLevelComment.snippet.authorDisplayName}</h2> <p>${date} ${_month} ${_year} ${time}</p>
                                </div>
                                <br>
                                <div class="comment">
                                    <p>
                                        ${comment.snippet.topLevelComment.snippet.textOriginal}
                                    </p>
                                </div>
                            </div>
                        </li>`;
                    });

                    $('#list-comments').append(comments);
                    $('#comment_thread_id').val(response.items[0].id);
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(xhr, ajaxOptions, thrownError)
                }
            });
        }); 
    </script>
@endsection