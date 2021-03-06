<!-- contact form box -->
<div class="title-section">
    <h1><span>Komentar</span></h1>
</div>
<div class="contact-form-box">
    {{-- <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-numposts="5" data-width="100%"></div> --}}
    <form id="comment-form" action="{{$urlStoreComment}}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <div class="row">
            <div class="col-md-6">
                <input 
                    required
                    id="name" 
                    name="name" 
                    type="text"
                    {{-- class="form-control"  --}}
                    placeholder="Your Name"
                    oninvalid="this.setCustomValidity('Maaf, Nama wajib di isi')"
                    oninput="setCustomValidity('')"
                >
            </div>
            <div class="col-md-6">
                <input 
                    required
                    id="email" 
                    name="email" 
                    type="text"
                    pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                    {{-- class="form-control"  --}}
                    placeholder="Your Email"
                    oninvalid="this.setCustomValidity('Maaf, Email kosong atau kurang tepat')"
                    oninput="setCustomValidity('')"
                >
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <textarea 
                    required
                    id="text" 
                    name="text" 
                    {{-- type="text"  --}}
                    placeholder="Enter Your Comment"
                    oninvalid="this.setCustomValidity('Maaf, Komentar wajib di isi')"
                    oninput="setCustomValidity('')"
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
                    <div id="avatar_{{$item->id}}"> 
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