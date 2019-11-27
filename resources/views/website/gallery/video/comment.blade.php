<!-- contact form box -->
<div class="title-section">
    <h1><span>Komentar</span></h1>
</div>
<div class="contact-form-box">
    {{-- <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-numposts="5" data-width="100%"></div> --}}
    <form id="comment-form" >
        <div class="row">
            <div class="col-md-12">
                <input 
                    required
                    id="email" 
                    name="email" 
                    type="text"
                    {{-- class="form-control"  --}}
                    placeholder="Your Gmail"
                    oninvalid="this.setCustomValidity('Maaf, Nama wajib di isi')"
                    oninput="setCustomValidity('')"
                >
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
        <button type="submit" id="submit-contact">
            <i class="fa fa-comment"></i> Video Comment
        </button>
    </form>                               
</div>
<!-- End contact form box -->

<hr>
<div class="card">
    <div class="card-body">
        <ul class="list-posts list-comment" id="list-comments">
            
        </ul>
    </div>
</div>