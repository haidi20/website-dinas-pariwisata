<!-- contact form box -->
<div class="title-section">
    <h1><span>Komentar</span></h1>
</div>
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
                <input 
                    id="name" 
                    name="name" 
                    type="text"
                    {{-- class="form-control"  --}}
                    placeholder="Your Email"
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

<hr>
<div class="card">
    <div class="card-body">
        <ul class="list-posts list-comment">
            @forelse ($comments as $index => $item)
                <li class="place-comment">
                    {{-- <img 
                        src="{{asset('images/loading.gif')}}"
                        data-src="{{asset('images/pemerintah/POSTER BARU PARIWISATA-01.jpg')}}" 
                        alt=""
                        class="lazy"
                    > --}}
                    <div id="avatar"> 
                        loading...
                    </div>
                    <div class="post-content">
                        <div class="name">
                            <h2>{{$item->name}}</h2> <p>{{$item->detail_date_time}}</p>
                        </div>
                        <br>
                        <div class="comment">
                            <p>
                                {{$item->text}}
                            </p>
                        </div>
                    </div>
                </li>
            @empty
                
            @endforelse
        </ul>
    </div>
</div>