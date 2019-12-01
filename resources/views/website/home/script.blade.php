<script>
	$(function(){
        $('.send-search').click(function(){
            form = $('.search-form').serializeArray();

            data = [];

            $.each(form, function(index, item){
                data[item.name] = item.value;
            });

            link = "{{url('post')}}/"+data['category']+"?search="+data['search'];

            window.location.href = link;
        });

        scrolling();
    });

    function scrolling()
    {
        var endSearch       = $('.section-popular');
        var endGallery      = $('.section-galleries');
        var endPostPopular  = $('.post-popular');

        var status = {
            showNewPosts: 0,
            showLatestPosts: 0,
            showPopularPosts: 0,
        };

        $(window).on('scroll', function() { 
            spacePopular        = endSearch.offset().top + endSearch.outerHeight() - window.innerHeight;
            spaceNewPost        = endPostPopular.offset().top + endPostPopular.outerHeight() - window.innerHeight;
            spaceLatestPost     = endGallery.offset().top + endGallery.outerHeight() - window.innerHeight;
            
            if ($(window).scrollTop() >= spacePopular && status.showPopularPosts == 0){
                status.showPopularPosts = 1;

                showPopularPosts();

                showRightSidePosts();
            }
            else if($(window).scrollTop() >= spaceNewPost && status.showNewPosts == 0){
                status.showNewPosts = 1;

                showNewPosts();

                showGalleries();
            }
            else if($(window).scrollTop() >= spaceLatestPost && status.showLatestPosts == 0){
                status.showLatestPosts = 1;

                showLatestPosts();
            }
        });
    }

    function showPopularPosts()
    {
        url     = "{{url('home/popular-posts')}}"
        popular = ''

        $.ajax({
            type: 'get',
            url: url,
            cache: false,
            beforeSend: function(){
                loading = '<div style="text-align:center"><i class="fa fa-spinner fa-spin big-loading"></i></div>';

                listPost= $('.section-popular > .container').find('.post-popular');
                listPost.append(loading);
            },
            success: function(data){
                popular = popular+'<div class="features-today-box owl-wrapper ">';
                    popular = popular+'<div class="owl-carousel"  data-num="4">';
                    $.each(data, function(index, item){
                        popular = popular+'<div class="item news-post standard-post" onClick="gotolink(\''+item.gotolink+'\')">';
                            popular = popular+'<div class="post-gallery">';
                                popular = popular+'<a href="'+item.gotolink+'">';
                                    popular = popular+item.preview_popular_post;
                                popular = popular+'</a>'
                                popular = popular+'<a href="'+item.link_category+'" class="category-post world" style="background-color:'+item.color_category+'" onClick="gotolink(\''+item.link_category+'\')">';
                                    popular = popular+ item.display_category_name;
                                popular = popular+'</a>';
                            popular = popular+'</div>';
                            popular = popular+'<div class="post-content">';
                                popular = popular+'<h2><a href="'+item.gotolink+'" onClick="gotolink(\''+item.gotolink+'\')">'+item.show_title+'</a></h2>';
                                popular = popular+'<ul class="post-tags">';
                                    popular = popular+'<li><i class="fa fa-clock-o"></i>'+item.long_date+'</li>';
                                    popular = popular+'<li>'+item.viewed+'</li>';
                                popular = popular+'</ul>';
                            popular = popular+'</div>';
                        popular =popular+'</div>';
                    });
                    popular = popular+'</div>';
                popular =popular+'</div>';

                listPost= $('.section-popular > .container').find('.post-popular');
                listPost.empty();
                listPost.append(popular);

                source();
                status.showPopularPosts = 0;
            },
            error: function(xhr){ 
                console.log(xhr.statusText + xhr.responseText);
            },
        });
    }

    function showRightSidePosts()
    {
        url     = "{{url('home/right-side-posts')}}"
        popular = ''

        $.ajax({
            type: 'get',
            url: url,
            cache: false,
            async : true,
            start_time: new Date().getTime(),
            beforeSend: function(){
                
            },
            success: function(data){
                $('.loading-right-side-posts').hide();
                $('.right-side-posts').show();
            },
            error: function(xhr){ 
                console.log(xhr.statusText + xhr.responseText);
            },
        }); 
    }

    function showNewPosts()
    {
        var url             = "{{url('home/new-posts')}}";
        var newPosts        = '';
        var detailNewPosts  = '';

        $.ajax({
            type: 'get',
            url: url,
            cache: false,
            beforeSend: function(){
                loading = '<div style="text-align:center"><i class="fa fa-spinner fa-spin big-loading"></i></div>';

                listPost= $('.section-new-posts');
                listPost.append(loading);
            },
            success: function(data){
                detailNewPosts = detailNewPosts+'<div class="col-md-6">';
                        detailNewPosts = detailNewPosts+'<ul class="list-posts">';
                $.each(data.limitThreePosts, function(index, item){
                    detailNewPosts = detailNewPosts+'<li onClick="gotolink(\''+item.gotolink+'\')">';
                        detailNewPosts = detailNewPosts+'<a href="'+item.gotolink+'">';
                            detailNewPosts = detailNewPosts+item.preview_three_post;
                        detailNewPosts = detailNewPosts+'</a>';
                        detailNewPosts = detailNewPosts+'<div class="post-content">';
                            detailNewPosts = detailNewPosts+'<a href="'+item.link_category+'">';
                                detailNewPosts = detailNewPosts+item.display_category_name;
                            detailNewPosts = detailNewPosts+'</a>';
                            detailNewPosts = detailNewPosts+'<h2 style="color:white"><a href="'+item.gotolink+'" onClick="gotolink(\''+item.gotolink+'\')">'+item.show_title+'</a></h2>';
                            detailNewPosts = detailNewPosts+'<ul class="post-tags">';
                                detailNewPosts = detailNewPosts+'<li><i class="fa fa-clock-o"></i>'+item.long_date+'</li>';
                                detailNewPosts = detailNewPosts+'<li>'+item.viewed+'</li>';
                            detailNewPosts = detailNewPosts+'</ul>';
                        detailNewPosts = detailNewPosts+'</div>';
                    detailNewPosts = detailNewPosts+'</li>';
                });
                    detailNewPosts = detailNewPosts+'</ul>';
                detailNewPosts = detailNewPosts+'</div>';
               
                newPosts = newPosts+'<div class="row">';
                        newPosts = newPosts+'<a href="'+data.firstPost.gotolink+'">';
                    newPosts = newPosts+'<div class="col-md-6">';
                        newPosts = newPosts+'<div class="news-post image-post2" onClick="gotolink(\''+data.firstPost.gotolink+'\')">';
                            newPosts = newPosts+'<div class="post-gallery">';
                                newPosts = newPosts+data.firstPost.preview_first_post;
                                newPosts = newPosts+'<div class="hover-box">';
                                    newPosts = newPosts+'<div class="inner-hover">';
                                        newPosts = newPosts+'<a class="category-post tech" href="'+data.firstPost.link_category+'">';
                                            newPosts = newPosts+data.firstPost.display_category_name;
                                        newPosts = newPosts+'</a>';
                                        newPosts = newPosts+'<h2 style="color:white"><a href="'+data.firstPost.gotolink+'" onClick="gotolink(\''+data.firstPost.gotolink+'\')">'+data.firstPost.show_title+'</a></h2>';
                                        newPosts = newPosts+'<ul class="post-tags">';
                                            newPosts = newPosts+'<li><i class="fa fa-clock-o"></i>'+data.firstPost.long_date+'</li>';
                                            newPosts = newPosts+'<li>'+data.firstPost.viewed+'</li>';
                                        newPosts = newPosts+'</ul>';
                                    newPosts = newPosts+'</div>';
                                newPosts = newPosts+'</div>';
                            newPosts = newPosts+'</div>';
                        newPosts = newPosts+'</div>';
                    newPosts = newPosts+'</div>';
                        newPosts = newPosts+'</a>';
                    newPosts = newPosts+detailNewPosts;
                newPosts = newPosts+'</div>';

                listPost= $('.section-new-posts');

                listPost.empty();
                listPost.append(newPosts);


                source();
                // status.showNewPosts = 0;
            },
            error: function(xhr){ 
                console.log(xhr.statusText + xhr.responseText);
            },
        });
    }

    function showGalleries()
    {
        var url         = "{{url('home/galleries')}}";
        var galleries   = '';

        $.ajax({
            type: 'get',
            url: url,
            cache: false,
            beforeSend: function(){
                loading = '<div style="text-align:center"><i class="fa fa-spinner fa-spin big-loading"></i></div>';

                listGalleries= $('.list-galleries');
                listGalleries.append(loading);
            },
            success: function(data){
                galleries = galleries+'<div class="owl-carousel" data-num="3">';
                $.each(data, function(index, item){
                    galleries = galleries+'<div class="item news-post image-post3">';
                        galleries = galleries+item.preview_original;  
                    galleries = galleries+'</div>';
                })
                galleries = galleries+'</div>';

                listGalleries= $('.list-galleries');
                listGalleries.empty();
                listGalleries.append(galleries);

                $('.button-gallery').show();

                source();
                status.showNewPosts = 0;
            },
            error: function(xhr){ 
                console.log(xhr.statusText + xhr.responseText);
            },
        });
    }

    function showLatestPosts()
    {
        var url      = "{{url('home/latest-posts')}}";
        var latest   = '';

        $.ajax({
            type: 'get',
            url: url,
            cache: false,
            beforeSend: function(){
                loading = '<div style="text-align:center"><i class="fa fa-spinner fa-spin big-loading"></i></div>';

                latestPosts= $('.section-latest-posts');
                latestPosts.append(loading);
            },
            success: function(data){
                latest = latest+'<div class="latest-articles iso-call">';
                $.each(data, function(index, item){
                    var default_size = index == 0 ? 'default-size' : '';
                    
                    latest = latest+'<div class="news-post standard-post2 '+default_size+'" onClick="gotolink(\''+item.gotolink+'\')">';
                        latest = latest+'<div class="post-gallery">';
                            latest = latest+'<a href="'+item.gotolink+'">';
                                latest = latest+item.preview_last_post;
                            latest = latest+'</a>';
                        latest = latest+'</div>';
                        latest = latest+'<div class="post-title">';
                            latest = latest+'<h2><a href="'+item.gotolink+'" onClick="gotolink(\''+item.gotolink+'\')">'+item.show_limit_title+'</a></h2>';
                                latest = latest+'<ul class="post-tags">';
                                    latest = latest+'<li><i class="fa fa-clock-o"></i>'+item.long_date+'</li>';
                                    latest = latest+'<li>'+item.viewed+'</li>';
                                latest = latest+'</ul>';
                        latest = latest+'</div>';
                    latest = latest+'</div>';
                });
                latest = latest+'</div>';

                latestPosts= $('.section-latest-posts');

                latestPosts.empty();
                latestPosts.append(latest);

                source();
                status.showLatestPosts = 0;
            },
            error: function(xhr){ 
                console.log(xhr.statusText + xhr.responseText);
            },
        });
    }
</script>