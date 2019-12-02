{!! Html::script('avenger/assets/plugins/sweet-alert/sweet-alert.min.js') !!}
<script>
    const updateBreakingNews = (option, position) => {
        let {id, text} = option;
        let url = `${window.location.href}/edit/${id}`;
        let token   = $('[name="csrf-token"]').attr('content');
        let breaking_news = position == "left" ? 1 : 0;
        $.post(url, {_token:token, breaking_news}, function(response){
            if(position === "left"){
                $("#select-left option:selected").remove();
                $('#select-right').append(`<option value="${id}">${text}</option>`);
            }else if(position === "right"){
                $("#select-right option:selected").remove();
                $('#select-left').append(`<option value="${id}">${text}</option>`);
            }
        }).error(function(err){
            console.log(err)
        });
    };

    $(function(){
        $('.option-post').click(function(){
            var post_id = $(this).data('id');
            $('.option-post').css('background-color', '');
            $('#post_'+post_id).css('background-color', '#EEEEEE');
        });

        //update left to right
        $('#btn-left').on('click', () => {
            let leftID = $('#select-left').val();
            let leftText = $('#select-left option:selected').text();
            let length = $('#select-right > option').length;

            let rightFirstEl = $('#select-right').find("option:first-child").val();
            if(rightFirstEl == ''){
                $("#select-right option[value='']").remove();
            }
            if(leftID !== null && length < 5){
                updateBreakingNews({id: leftID, text: leftText}, "left");
            }
            if(length >= 5){
                swal({
                    title: "Peringatan",
                    text: "Maaf, Postingan Breaking news sudah 5",
                    type: "warning",
                    html: true,
                    confirmButtonColor: "green",
                    confirmButtonText: "Oke",
                    closeOnConfirm: false
                })
            }
        })

        //update right to left
        $('#btn-right').on('click', () => {
            let rightID = $('#select-right').val();
            let rightText = $('#select-right option:selected').text();
            if(rightID !== null){
                updateBreakingNews({id: rightID, text: rightText}, "right");
            }
        })

    });
</script>