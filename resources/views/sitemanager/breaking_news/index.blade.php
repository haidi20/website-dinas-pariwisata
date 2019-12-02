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
                            <ul class="select-post">
                                @forelse($posts as $item)
                                    <li class="option-post" id="post_{{$item->id}}" data-id="{{ $item->id }}">
                                        <p>{{$item->title}}</p>
                                        {{-- {{$item->title}} --}}
                                    </li>
                                @empty
                                    <li value="">&nbsp;</li>
                                @endforelse
                            </ul>
                            <button id="btn-left" class="fa fa-arrow-circle-o-right fa-3x" aria-hidden="true" style="margin-top:10px; border:none; background:none;"></button>
                        </div>
                        <div class="col-sm-6" style="text-align:center; padding-right: 0px ">
                            <div class="title">
                                Daftar Breaking News
                            </div>
                            <select size="12" class="form-control custom" id="select-right" multiple="">
                                @forelse($breaking_news as $item)
                                    <option value="{{ $item->id }}">{{$item->show_limit_title_large}}</option>
                                @empty
                                    <option value="">&nbsp;</option>
                                @endforelse
                            </select>
                            <button id="btn-right" class="fa fa-arrow-circle-o-left fa-3x" aria-hidden="true" style="margin-top:10px; border:none; background:none;"></button>
                        </div>
                    </div>

				</div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection