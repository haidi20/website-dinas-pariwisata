<script>
    $(function(){
         comments = @json($comments);

         $.each(comments, function(index, item){
             // console.log(item)
             $('#avatar_'+item.id).empty().append($.gravatar(item.email, {
                 image: 'mp'
             }));
         });
         
         list   = $('.list-comment')
         
         status         = 0;
         newComments    = '';
         countComments  = 0
         
         $(window).on('scroll', function() { 
             endComments = list.offset().top + list.outerHeight() - window.innerHeight
             countList = $('ul.list-comment li').length
             
             if ($(window).scrollTop() >= endComments && status == 0){ 
                 status = 1
                 url = '{{$urlShowComment}}?skip='+countList
                 console.log('countlist = '+countList)
                 console.log('status = '+status)
                 console.log('url = '+url)
                 
                if(countComments != countList){
                    showComments(newComments)
                }
                countComments = countList
            }
        }); 
    });

    function showComments(newComments)
    {
        $.ajax({
            type: 'get',
            url: url,
            beforeSend: function(){
                status = 1
            },
            success: function(data){
                if(data != null){
                    $.each(data, function(index, item){
                        // console.log(item)
                        newComments = newComments +  '<li class="place-comment">';
                            newComments = newComments +  '<div id="avatar_'+item.id+'">';
                                newComments = newComments +     $.gravatar(item.email, {image: 'mp'}, 'html');
                            newComments = newComments +  '</div>';
                            newComments = newComments +  '<div class="post-content">';
                                newComments = newComments +   '<div class="name">';
                                    newComments = newComments +   '<h2>'+item.name+'</h2> <p>'+item.detail_date_time+'</p>';
                                newComments = newComments +   '</div>';
                                newComments = newComments +    '<br>';
                                newComments = newComments +    '<div class="comment">';
                                    newComments = newComments +    '<p>'+item.text+'</p>';
                                newComments = newComments +    '</div>';
                            newComments = newComments +   '</div>';
                        newComments = newComments +   '</li>';
                    });
                    list.append(newComments)
                }
            },
            error: function(xhr){ 
                console.log(xhr.statusText + xhr.responseText);
            },
            complete: function(){
                status = 0
            }
        });
    }
 </script>