<script>
    $(function(){
        // heading news
        $('.image-post').click(function(){
            link = $(this).find('.hover-box > .inner-hover > h2 > a').attr('href');
            
            window.location.href = link;
        });

        // post popular
        //new post > file main-body
        $('.news-post').click(function(){
            linkPopular = $(this).find('.post-content > h2 > a').attr('href');
            linkNewPost = $(this).find('.hover-box > .inner-hover > h2 > a').attr('href');
            linkLastPost= $(this).find('.post-title > h2 > a').attr('href')

            if(linkPopular){
                link = linkPopular;
            }else if(linkNewPost){
                link = linkNewPost;
            }else if(linkLastPost){
                link = linkLastPost;
            }

            window.location.href = link;
        });

        $('.send-search').click(function(){
            form = $('.search-form').serializeArray();

            data = []

            $.each(form, function(index, item){
                data[item.name] = item.value
            });

            link = "{{url('post')}}/"+data['category']+"?search="+data['search']

            window.location.href = link
        });
    });

    // list posts > file main-body
    // right side post
    function gotolink(link){
        window.location.href = link;
    }
</script>