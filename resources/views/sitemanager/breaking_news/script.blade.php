{!! Html::script('avenger/assets/plugins/sweet-alert/sweet-alert.min.js') !!}
<script>

    function clickPost(post_id, position)
    {
        $('.option-post').css('background-color', '');
        $('#post_'+post_id).css('background-color', '#EEEEEE');
        var countBreakingNews = $('.post-right li').length;

        if(countBreakingNews >= 10 && position == 0){
            swal({
                title: "Peringatan",
                text: "Maaf, Breaking News sudah 10 artikel",
                type: "warning",
                html: true,
                confirmButtonColor: "green",
                confirmButtonText: "Oke",
                closeOnConfirm: false
            })
        }else{
            $('#post_'+post_id).remove();
            
            updateBreakingNews(post_id);
        }       
    }

    function updateBreakingNews(post_id)
    {
        let url = "{{url('sitemanager', ['breaking-news', 'edit'])}}/"+post_id;

        $.get(url, function(data){
            if(data == 'not found'){
                swal({
                    title: "Peringatan",
                    text: "Maaf, Postingan tersebut tidak ada",
                    type: "warning",
                    html: true,
                    confirmButtonColor: "green",
                    confirmButtonText: "Oke",
                    closeOnConfirm: false
                })
            }else{
                var breakingNews = data.breaking_news;
                var option = '';

                option = option+'<li class="option-post" id="post_'+data.id+'" onClick="clickPost('+data.id+', '+data.breaking_news+')">';
                    option = option+'<p>'+data.title+'</p>';
                option = option+'</li>';

                if(breakingNews == 1){
                    $('.post-right').prepend(option);
                }else if(breakingNews == 0){
                    $('.post-left').prepend(option);
                }
            }
        }).error(function(err){
            console.log(err)
        });
    }
</script>