<!-- contact form box -->
<div class="title-section">
    <h1><span>Komentar</span></h1>
</div>
<div class="contact-form-box">
    {{-- <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-numposts="5" data-width="100%"></div> --}}
    {{-- <div style="text-align:center" class="loading"><i class="fa fa-spinner fa-spin big-loading"></i></div> --}}
    <form id="comment-form"  style="display:">
        <div class="row">
            <div class="col-md-1">
                <div class="image-new-comment" id="image-new-comment"> 
                    loading..
                </div>
            </div>
            <div class="col-md-11">
                <input 
                    id="comment" 
                    name="comment" 
                    type="text"
                    class="comment"
                    placeholder="Insert Your Comment"
                >
            </div>
        </div>
        {{-- <a href="javascript:;" onclick="signOut();">Sign out</a> --}}
        <a 
            href="javascript:;" 
            class="btn btn-default btn-md send-comment disabled"
            style="margin-left:65px;"
            onclick="authenticate().then(loadClient).then(execute)"
        >
            Kirim
        </a>
    </form>
    {{-- <div 
        class="g-signin2" 
        style="margin-bottom:10px; display:;" 
        data-onsuccess="onSignIn"
    /></div>--}}
</div>
<!-- End contact form box -->

<hr>
<div class="card">
    <div class="card-body">
        <ul class="list-posts list-comment" id="list-comments">
            
        </ul>
    </div>
</div>