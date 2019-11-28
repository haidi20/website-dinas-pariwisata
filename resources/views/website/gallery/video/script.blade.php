{{-- <script src="https://apis.google.com/js/platform.js" async defer></script> --}}
<script src="https://apis.google.com/js/client:plusone.js" type="application/javascript"></script>
{{-- <script src="https://apis.google.com/js/api.js"></script> --}}
<script>
    /**
   * Sample JavaScript code for youtube.commentThreads.insert
   * See instructions for running APIs Explorer code samples locally:
   * https://developers.google.com/explorer-help/guides/code_samples#javascript
   */

    function authenticate() {
        return gapi.auth2.getAuthInstance()
            .signIn({scope: "https://www.googleapis.com/auth/youtube.force-ssl"})
            .then(function() { console.log("Sign-in successful"); },
                function(err) { console.error("Error signing in", err); });
    }

    function loadClient() {
        gapi.client.setApiKey("AIzaSyDHy18clWdaVSoLKhwxAI24XSotdc-Ucqo");
        return gapi.client.load("https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest")
            .then(function(ress) { 
                    console.log("GAPI client loaded for API"); 
            },
            function(err) { console.error("Error loading GAPI client for API", err); });
    }

    // Make sure the client is loaded and sign-in is complete before calling this method.
    function execute() {
        var comment = $('.comment').val();
        var videoId = $('.videoId').val();
        let comments= '';

        // console.log(comment, videoId);
        return gapi.client.youtube.commentThreads.insert({
            "part": "snippet",
            "resource": {
                "snippet": {
                "topLevelComment": {
                    "snippet": {
                    "textOriginal": comment,
                    "videoId": videoId
                    }
                }
                }
            }
        })
        .then(function(response) {
            // Handle the results here (response.result has the parsed body).
            console.log("Response", response);
            var author = response.result.snippet.topLevelComment.snippet
            var comments = '';

            var myUserEntity = {};
            myUserEntity.name   = author.authorDisplayName
            myUserEntity.image  = author.authorProfileImageUrl
            myUserEntity.comment= author.textOriginal 
            
            //Store the entity object in sessionStorage where it will be accessible from all pages of your site.
            sessionStorage.setItem('myUserEntity', JSON.stringify(myUserEntity));
            // console.log('session = '+sessionStorage.getItem('myUserEntity'))
            // console.log('data = '+myUserEntity.name)
            $('.comment').val('');
            $('.send-comment').addClass('disabled btn-info');

            comments = insert_comment(response.result, comments);
            console.log(comments)
            $('#list-comments').prepend(comments);
        },
        function(err) { console.error("Execute error", err); });
    }

    gapi.load("client:auth2", function() {
        gapi.auth2.init({client_id: "480303218320-t5f67643c8c2f8873a7ghlc0rqp2j888"});
    });

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
            console.log('User signed out.');
        });

        sessionStorage.clear();

        location.reload();
    }
// <button onclick="authenticate().then(loadClient)">authorize and load</button>
// <button onclick="execute()">execute</button>
    $(function(){
        $('.article-post').click(function(){
            link = $(this).data('link');

            window.location.href = link;
        });

        $('.comment').keyup(function(){
            var btn = $('.send-comment')
            if($(this).val() != ""){
                btn.addClass('btn-info');
                btn.removeClass('disabled');
                btn.removeClass('btn-default');
            }else{
                btn.removeClass('btn-info');
                btn.addClass('disabled');
                btn.addClass('btn-default');
            }
        });

        $('#image-new-comment').empty().append($.gravatar('', {
            image: 'mp'
        }));

        if(sessionStorage.getItem('myUserEntity') != null){
            var user = JSON.parse(sessionStorage.getItem('myUserEntity'))
            $('#image-new-comment').empty().append('<img src="'+user.image+'" />')
        }

        // console.log('session = '+sessionStorage.getItem('myUserEntity'))

        show_comments();
    });

    function show_comments()
    {
        let comments = '';

        url = 'https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&videoId={{explode("v=",$video->link)[1]}}&key=AIzaSyDHy18clWdaVSoLKhwxAI24XSotdc-Ucqo';
        $.ajax({
            url: url,
            type: 'get',
            success:function(response){
                response.items.map(comment => {
                    // console.log(comment.snippet);

                    comments = insert_comment(comment, comments);
                });

                $('#list-comments').append(comments);
                $('#comment_thread_id').val(response.items[0].id);
            },
            error: function(xhr, ajaxOptions, thrownError){
                console.log(xhr, ajaxOptions, thrownError)
            }
        });
    }

    function insert_comment(comment, comments)
    {
        const bulan = [ 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agust', 'Sept', 'Okt', 'Nov', 'Des' ];

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

        return comments;
    }

    // function onSignIn(googleUser) {
    //     var profile = googleUser.getBasicProfile();

    //     condition_form_comment(profile);

    //     var myUserEntity = {};
    //     myUserEntity.Id = profile.getId();
    //     myUserEntity.Name = profile.getName();
        
    //     //Store the entity object in sessionStorage where it will be accessible from all pages of your site.
    //     sessionStorage.setItem('myUserEntity',JSON.stringify(myUserEntity));
    // }

    // function condition_form_comment(profile)
    // {
    //     // console.log('ID: ' + profile.getId());

    //     if(profile){
    //         console.log('show')
    //         $('#comment-form').show();
    //         $('.g-signin2').hide();
    //         $('.loading').hide();

    //         $('.image-new-comment').attr('src', profile.getImageUrl());
    //     }else{
    //         console.log('hide')
    //         $('#comment-form').hide();
    //         $('.g-signin2').show();
    //         $('.loading').hide();
    //     }
    // }

    // function signOut() {
    //     var auth2 = gapi.auth2.getAuthInstance();
    //         auth2.signOut().then(function () {
    //         console.log('User signed out.');
    //     });

    //     sessionStorage.clear();

    //     location.reload();
    // }

    // function send_comment()
    // {
    //     var comment = $('.comment').val();
    //     var videoId = $('.videoId').val();
    //     let comments = '';

    //     console.log(comment, videoId);
    //     // gapi.client.load("https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest")
    //     // .then(function(ress) { 
    //     //     console.log(gapi.client);
    //     // });

    //     gapi.client.load("https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest")
    //     .then(function(ress) { 
    //         return gapi.client.youtube.commentThreads.insert({
    //                 "part": "snippet",
    //                 "resource": {
    //                     "snippet": {
    //                         "topLevelComment": {
    //                             "snippet": {
    //                                 "textOriginal": comment,
    //                                 "videoId": videoId
    //                             }
    //                         }
    //                     }
    //                 }
    //             }).then(function(response) {
    //                 // Handle the results here (response.result has the parsed body).
    //                 // console.log("Response", response);
    //                 $('.comment').val('');
    //                 $('.send-comment').addClass('disabled btn-info');

    //                 comments = insert_comment(response.result, comments);

    //                 $('#list-comments').prepend(comments);
    //                 $('#comment_thread_id').val(response.result.items[0].id);
    //         },function(err) { console.error("Execute error", err); });
    //     },function(err) { console.error("Error loading GAPI client for API", err); });
    // }

    

</script>