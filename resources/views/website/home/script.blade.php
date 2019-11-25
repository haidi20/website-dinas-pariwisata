<script>
	$(function(){
        $('.send-search').click(function(){
            form = $('.search-form').serializeArray();

            data = []

            $.each(form, function(index, item){
                data[item.name] = item.value
            });

            link = "{{url('post')}}/"+data['category']+"?search="+data['search']

            window.location.href = link
        });

        endSearch   = $('.section-popular')

        status              = 0;

        $(window).on('scroll', function() { 
            spacePopular = endSearch.offset().top + endSearch.outerHeight() - window.innerHeight
            
            if ($(window).scrollTop() >= spacePopular && status == 0){ 
                status = 1

                showPopularPosts()
            }
        });
    });

    function showPopularPosts()
    {
        url     = "{{url('popular-posts')}}"
        popular = ''

        $.ajax({
            type: 'get',
            url: url,
            beforeSend: function(){
                
            },
            success: function(data){
                popular = popular+'<div class="features-today-box owl-wrapper ">';
                    popular = popular+'<div class="owl-carousel"  data-num="4">';
                $.each(data, function(index, item){
                    popular = popular+'<div class="item news-post standard-post" onClick="gotolink('+item.gotolink+')">';
                        popular = popular+'<div class="post-gallery">';
                            popular = popular+item.preview_popular_post;
                            popular = popular+'<a class="category-post world" style="background-color:'+item.color_category+'" onClick="gotolink('+item.gotolink+')">';
                                popular = popular+ item.display_category_name;
                            popular = popular+'</a>';
                        popular = popular+'</div>';
                        popular = popular+'<div class="post-content">';
                            popular = popular+'<h2><a onClick="onClick="gotolink('+item.gotolink+')"">'+item.show_title+'</a></h2>';
                            popular = popular+'<ul class="post-tags">';
                                popular = popular+'<li><i class="fa fa-clock-o"></i>'+item.long_date+'</li>';
                                popular = popular+'<li>'+item.viewed+'</li>';
                            popular = popular+'</ul>';
                        popular = popular+'</div>';
                    popular =popular+'</div>';
                });
                    popular = popular+'</div>';
                popular =popular+'</div>';

                
                h1 = '<h1> coba </h1>';

                listPost= $('.section-popular > .container').find('.post-popular')
                listPost.append(popular);

                owlWrap();
                lazyImage();
                showImage();
            },
            error: function(xhr){ 
                console.log(xhr.statusText + xhr.responseText);
            },
            complete: function(){
                
            }
        });
    }
</script>