<!-- contact form box -->
<div class="title-section">
    <h1><span>Komentar</span></h1>
</div>
<div class="contact-form-box">
    {{-- <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-numposts="5" data-width="100%"></div> --}}
    <div style="text-align:center" class="loading"><i class="fa fa-spinner fa-spin big-loading"></i></div>
    <form id="comment-form"  style="display:none">
        <div class="row">
            <div class="col-md-1">
                <img src="" class="image-new-comment">
            </div>
            <div class="col-md-11">
                <input 
                    required
                    id="comment" 
                    name="comment" 
                    type="text"
                    {{-- class="form-control"  --}}
                    placeholder="Insert Your Comment"
                    oninvalid="this.setCustomValidity('Maaf, Nama wajib di isi')"
                    oninput="setCustomValidity('')"
                >
            </div>
        </div>
        {{-- <a href="javascript:;" onclick="signOut();">Sign out</a> --}}
        <a 
            href="javascript:;" 
            class="btn btn-default btn-md send-comment" 
            style="margin-left:65px;"

        >
            Kirim
        </a>
    </form>
    <div 
        class="g-signin2" 
        style="margin-bottom:10px; display:none;" 
        data-onsuccess="onSignIn"
    /></div>                               
</div>
<!-- End contact form box -->

<hr>
<div class="card">
    <div class="card-body">
        <ul class="list-posts list-comment" id="list-comments">
            
        </ul>
    </div>
</div>