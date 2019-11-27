<script>
    $(function(){
        $('.article-post').click(function(){
            link = $(this).data('link');

            window.location.href = link;
        });

        show_comments();
    }); 

    function show_comments()
    {
        let comments = '';
        const bulan = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agust', 'Sept', 'Okt', 'Nov', 'Des' ];

        url = 'https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&videoId={{explode("v=",$video->link)[1]}}&key=AIzaSyDHy18clWdaVSoLKhwxAI24XSotdc-Ucqo';
        $.ajax({
            url: url,
            type: 'get',
            success:function(response){
                response.items.map(comment => {
                    var date = new Date(comment.snippet.topLevelComment.snippet.updatedAt).getDate();
                    var month = bulan[new Date(comment.snippet.topLevelComment.snippet.updatedAt).getMonth()];
                    var year = (new Date(comment.snippet.topLevelComment.snippet.updatedAt).getYear() < 1000) ? new Date(comment.snippet.topLevelComment.snippet.updatedAt).getYear() + 1900 : new Date(comment.snippet.topLevelComment.snippet.updatedAt).getYear();
                    var hours = (new Date(comment.snippet.topLevelComment.snippet.updatedAt).getHours() > 10) ? new Date(comment.snippet.topLevelComment.snippet.updatedAt).getHours() : '0' + new Date(comment.snippet.topLevelComment.snippet.updatedAt).getHours();
                    var minutes = (new Date(comment.snippet.topLevelComment.snippet.updatedAt).getMinutes() > 10) ? new Date(comment.snippet.topLevelComment.snippet.updatedAt).getMinutes() : '0' + new Date(comment.snippet.topLevelComment.snippet.updatedAt).getMinutes();
                    var time = hours+':'+minutes;
                    var date_time = date +' '+month+' '+year+' '+'  '+time;


                    comments = comments +'<li class="place-comment">';
                        comments = comments+'<div id="avatar_id">'; 
                            comments = comments+'<img class="image-comment" src="'+comment.snippet.topLevelComment.snippet.authorProfileImageUrl+'" alt="user_image">';
                        comments = comments+'</div>';
                        comments = comments+'<div class="post-content">';
                            comments = comments+'<div class="name">';
                                comments = comments+'<h2>'+comment.snippet.topLevelComment.snippet.authorDisplayName+'</h2> <p>'+date_time+'</p>';
                            comments = comments+'</div>';
                            comments = comments+'<div class="comment">';
                                comments = comments+'<p>';
                                    comments = comments+comment.snippet.topLevelComment.snippet.textOriginal;
                                comments = comments+'</p>';
                            comments = comments+'</div>';
                        comments = comments+'</div>';
                    comments = comments+'</li>';
                });

                $('#list-comments').append(comments);
                $('#comment_thread_id').val(response.items[0].id);
            },
            error: function(xhr, ajaxOptions, thrownError){
                console.log(xhr, ajaxOptions, thrownError)
            }
        });
    }
</script>