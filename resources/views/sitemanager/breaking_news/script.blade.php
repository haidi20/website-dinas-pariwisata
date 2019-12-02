{!! Html::script('avenger/assets/plugins/sweet-alert/sweet-alert.min.js') !!}
<script>

    function clickPost(post_id, position)
    {
        $('.option-post').css('background-color', '');
        $('#post_'+post_id).css('background-color', '#EEEEEE');
        var countBreakingNews = $('.post-right li').length;

        console.log(position)

        if(countBreakingNews >= 5 && position == 0){
            swal({
                title: "Peringatan",
                text: "Maaf, Postingan Breaking news sudah 5",
                type: "warning",
                html: true,
                confirmButtonColor: "green",
                confirmButtonText: "Oke",
                closeOnConfirm: false
            })
        }else{
            removeListPost(post_id);
            updateBreakingNews(post_id);
        }       
    }

    function removeListPost(post_id)
    {
        $('#post_'+post_id).remove();
    }

    function updateBreakingNews(post_id)
    {
        let url = "{{url('sitemanager', ['breaking-news', 'edit'])}}/"+post_id;

        $.get(url, function(data){
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
        }).error(function(err){
            console.log(err)
        });
    }

    // $(function(){
    //     //update left to right
    //     // $('#btn-left').on('click', () => {
    //     //     let leftID = $('#select-left').val();
    //     //     let leftText = $('#select-left option:selected').text();
    //     //     let length = $('#select-right > option').length;

    //     //     let rightFirstEl = $('#select-right').find("option:first-child").val();
    //     //     if(rightFirstEl == ''){
    //     //         $("#select-right option[value='']").remove();
    //     //     }
    //     //     if(leftID !== null && length < 5){
    //     //         updateBreakingNews({id: leftID, text: leftText}, "left");
    //     //     }
    //     //     if(length >= 5){
    //     //         swal({
    //     //             title: "Peringatan",
    //     //             text: "Maaf, Postingan Breaking news sudah 5",
    //     //             type: "warning",
    //     //             html: true,
    //     //             confirmButtonColor: "green",
    //     //             confirmButtonText: "Oke",
    //     //             closeOnConfirm: false
    //     //         })
    //     //     }
    //     // })

    //     //update right to left
    //     // $('#btn-right').on('click', () => {
    //     //     let rightID = $('#select-right').val();
    //     //     let rightText = $('#select-right option:selected').text();
    //     //     if(rightID !== null){
    //     //         updateBreakingNews({id: rightID, text: rightText}, "right");
    //     //     }
    //     // })
    // });

    // const updateBreakingNews = (option, position) => {
    //     let {id, text} = option;
    //     let url = `${window.location.href}/edit/${id}`;
    //     let token   = $('[name="csrf-token"]').attr('content');
    //     let breaking_news = position == "left" ? 1 : 0;
    //     $.post(url, {_token:token, breaking_news}, function(data){
    //         if(position === "left"){
    //             $("#select-left option:selected").remove();
    //             $('#select-right').append(`<option value="${id}">${text}</option>`);
    //         }else if(position === "right"){
    //             $("#select-right option:selected").remove();
    //             $('#select-left').append(`<option value="${id}">${text}</option>`);
    //         }
    //     }).error(function(err){
    //         console.log(err)
    //     });
    // };
</script>