<script>
    $(function(){
         comments = @json($comments);

         $.each(comments, function(index, item){
             // console.log(item)
             $('#avatar_'+item.id).empty().append($.gravatar(item.email, {
                 image: 'mp'
             }));
         });
    });
 </script>