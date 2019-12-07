@extends('sitemanager._layout.default')

@section('script-top')
    @include('sitemanager.breaking_news.style')
@endsection

@section('script-bottom')
    @include('sitemanager.breaking_news.script')
@endsection

@section('content')
<div class="static-content">
    <div class="page-content">
    
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>Breaking News</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        {{-- <a href="{{ url($moduleUrl, ['create']) }}" class="btn btn-primary">{!!fa('plus')!!} Tambah</a> --}}
			    </div>
			</div>
        </div>

        <div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">
                    <div class="form-group">
                        <div class="col-sm-6" style="text-align:center; padding-left:0px;">
                            <div class="title">
                                Daftar Postingan
                            </div>
                            <ul class="select-post post-left">
                                @forelse($posts as $item)
                                    <li 
                                        class="option-post" 
                                        onClick="clickPost({{$item->id}}, {{$item->breaking_news}})"  
                                        id="post_{{$item->id}}" 
                                    >
                                        <p>{{$item->title}}</p>
                                    </li>
                                @empty
                                    <li value="">&nbsp;</li>
                                @endforelse
                            </ul>
                            {{-- <button 
                                id="btn-left" 
                                aria-hidden="true"
                                class="fa fa-arrow-circle-o-right fa-3x btn-switch" 
                            ></button> --}}
                        </div>
                        <div class="col-sm-6" style="text-align:center; padding-right: 0px ">
                            <div class="title" style="color:red">
                                Daftar Breaking News
                            </div>
                            <ul class="select-post post-right">
                                @forelse($breaking_news as $item)
                                    <li 
                                        class="option-post" 
                                        onClick="clickPost({{$item->id}}, {{$item->breaking_news}})" 
                                        id="post_{{$item->id}}"
                                    >
                                        <p>{{$item->title}}</p>
                                    </li>
                                @empty
                                    {{-- <li class="option-post"></li> --}}
                                @endforelse
                            </ul>
                            {{-- <button 
                                id="btn-right" 
                                aria-hidden="true" 
                                class="fa fa-arrow-circle-o-left fa-3x btn-switch"
                            ></button> --}}
                        </div>
                    </div>

				</div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection