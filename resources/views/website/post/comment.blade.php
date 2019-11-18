<div class="title-section">
    <h1><span>Komentar</span></h1>
</div>
<div class="card">
    <div class="card-body">
        <ul class="list-posts list-comment">
            <li class="place-comment">
                <img 
                    src="{{asset('images/loading.gif')}}"
                    data-src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" 
                    alt=""
                    class="lazy"
                >
                <div class="post-content">
                    <div class="name">
                        <h2>Nata</h2> <p>18 November 2019 16:00 </p>
                    </div>
                    <br>
                    <div class="comment">
                        <p>
                                t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

                        </p>
                    </div>
                </div>
            </li>
            <li class="place-comment">
                <img 
                    src="{{asset('images/loading.gif')}}"
                    data-src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" 
                    alt=""
                    class="lazy"
                >
                <div class="post-content">
                    <div class="name">
                        <h2>Haidi</h2> <p>18 November 2019 16:00 </p>
                    </div>
                    <br>
                    <div class="comment">
                        <p>
                                t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<hr>

<!-- contact form box -->
<div class="contact-form-box">
    {{-- <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-numposts="5" data-width="100%"></div> --}}
    <form id="comment-form">
        <div class="row">
            <div class="col-md-12">
                <input 
                    id="name" 
                    name="name" 
                    type="text"
                    {{-- class="form-control"  --}}
                    placeholder="Your Name"
                >
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <textarea 
                    id="comment" 
                    name="comment" 
                    {{-- type="text"  --}}
                    placeholder="Enter Your Comment"
                ></textarea>
            </div>
        </div>
        <button type="submit" id="submit-contact">
            <i class="fa fa-comment"></i> Post Comment
        </button>
    </form>                               
</div>
<!-- End contact form box -->