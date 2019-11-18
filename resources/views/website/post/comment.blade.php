<!-- contact form box -->
<div class="contact-form-box">
    <div class="title-section">
        <h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
    </div>
    {{-- <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-numposts="5" data-width="100%"></div> --}}
    <form id="comment-form">
        <div class="row">
            <div class="col-md-8">
                <input id="name" name="name" class="form-control" placeholder="Your Name">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8">
                <textarea 
                    id="comment" 
                    name="comment" 
                    type="text" 
                    placeholder="Your Comment"
                ></textarea>
            </div>
        </div>
        <button type="submit" id="submit-contact">
            <i class="fa fa-comment"></i> Post Comment
        </button>
    </form>                               
</div>
<!-- End contact form box -->