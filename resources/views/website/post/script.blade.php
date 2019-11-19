<script>
    $(function(){
         comments = @json($comments);

         $.each(comments, function(index, item){
             // console.log(item)
             $('#avatar_'+item.id).empty().append($.gravatar(item.email, {
                 image: 'mp'
             }));
         });

         $(window).on('scroll', function() { 
            list = $('.list-comment')
            endComment = list.offset().top + list.outerHeight() - window.innerHeight
            if ($(window).scrollTop() >= endComment) {    
                count_list = $('ul.list-comment li').length
                console.log('jumlah koment = '+count_list)
            } 
        }); 
    });
 </script>