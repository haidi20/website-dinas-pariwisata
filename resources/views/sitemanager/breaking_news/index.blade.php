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

        <div class="page-heading" style="margin-bottom:5px;">            
            <h1>Breaking News</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        {{-- <a href="{{ url($moduleUrl, ['create']) }}" class="btn btn-primary">{!!fa('plus')!!} Tambah</a> --}}
			    </div>
			</div>
        </div>

        <div class="container-fluid">
            <div class="row text-center">
                <h4 class="label-left">Pilihan</h4>
                <h4 class="label-right">Ditampilkan</h4>
            </div>
        	<div class="row">
				<div class="col-md-12">
                    <div class="form-group">
<<<<<<< HEAD
                        <div class="col-sm-5 col-sm-offset-1" style="text-align:center;margin-right:10px;">
                            <select size="16" class="form-control" id="select-left" multiple="">
                                @forelse($posts as $item)
                                <option class="pilihan" value="{{ $item->id }}">{{(strlen($item->title) > 50) ? substr($item->title, 0, 50)."..." : $item->title}}</option>
=======
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
>>>>>>> master
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
<<<<<<< HEAD
                        <div class="col-sm-5" style="text-align:center;">
                            <select size="16" class="form-control" id="select-right" multiple="">
                                @forelse($breaking_news as $item)
                                <option class="pilihan" value="{{ $item->id }}">{{(strlen($item->title) > 50) ? substr($item->title, 0, 50)."..." : $item->title}}</option>
=======
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
>>>>>>> master
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