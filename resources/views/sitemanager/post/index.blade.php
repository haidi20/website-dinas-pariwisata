@extends('sitemanager._layout.default')

@section('script-top')
{!! Html::style('avenger/assets/plugins/sweet-alert/sweet-alert.css') !!}
@endsection

@section('script-bottom')
	@include('sitemanager.post.category.modal')
	@include('sitemanager.post.category.script')
@endsection

@section('content')
<div class="static-content">
    <div class="page-content">
    
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>{{ $moduleTitle }}</h1>
            <div class="options">
			    <div class="btn-toolbar">
			    	@if($moduleTitle === 'Post')
			        <a data-toggle="modal" href="#category" class="btn btn-default">{!!fa('tasks')!!} Kategori</a>
			        @endif
			        <a href="{{ url($moduleUrl, ['create']) }}" class="btn btn-primary">{!!fa('plus')!!} Tambah {{ $moduleTitle }}</a>
			    </div>
			</div>
        </div>

        <div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">

					{!! session()->get('message') !!}

					<form method="get" class="form-inline mb10">
                        <div class="form-group">
                            <div class="form-control">Total Records : <strong>{{ $total_record }}</strong></div>
                            <select name="perpage" id="perpage" class="form-control">
                                <option {{ (request('perpage') == 10) ? 'selected' : '' }}>10</option>
                                <option {{ (request('perpage') == 25) ? 'selected' : '' }}>25</option>
                                <option {{ (request('perpage') == 50) ? 'selected' : '' }}>50</option>
                                <option {{ (request('perpage') == 100) ? 'selected' : '' }}>100</option>
                            </select> &nbsp; Per-page
                        </div>

                        <div class="form-group pull-right">
                            Search by &nbsp; : &nbsp;
                            <select name="by" id="by" class="form-control">
                                <option value="title" {{ (request('by') == 'title') ? 'selected' : '' }}>Judul</option>
                                <option value="status" {{ (request('by') == 'status') ? 'selected' : '' }}>Status</option>
                            </select>
                            <input type="text" name="q" id="q" class="form-control" value="{{ request('q') }}">
                            <button class="btn btn-default" id="btn-search">Search</button>
                        </div>
                    </form>
					<div class="panel">
						<div class="panel-body panel-no-padding">
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<tr>
										<th class="text-center" width="40">No</th>
										<th>Judul</th>
										<th class="text-center" width="80">Dibaca</th>
										@if(Request::segment(2) == 'page')
										<th class="text-center" width="250">Url</th>
										@else
										<th class="text-center" width="200">Terakhir dibaca</th>
										@endif
										<th class="text-center" width="100">Status</th>
										<th class="text-center" width="140">Actions</th>
									</tr>
								</thead>
								<tbody>
									@forelse($posts as $index => $item)
									<tr>
										<td>{{ table_row_number($posts, $index) }}</td>
										<td>
											{!! $item->category_badge !!} &nbsp;
											{!! str_limit($item->title, 40) !!}
										</td>
										<td class="text-center">{{ $item->read }}</td>
										@if(Request::segment(2) == 'page')
										<td>
											<a href="{{ $item->url_slug }}" target="_blank">{{ $item->url_slug }}</a>
										</td>
										@else
										<td class="text-center">{{ $item->updated_at }}</td>
										@endif
										<td class="text-center">{!! $item->status_label !!}</td>
										<td class="text-center">
											<a href="{{ url($moduleUrl, ['edit', $item->id]) }}" class="btn btn-success btn-xs btn-label">{!!fa('pencil')!!}Edit</a>
											<a href="javascript:void(0)" class="btn btn-danger btn-xs btn-label btn-delete" data-url="{{ url($moduleUrl, ['delete', $item->id]) }}">{!!fa('trash-o')!!}Delete</a>
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="6" class="alert alert-info">
											<center>Data Kosong!</center>
										</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
					<div class="pull-right">
						{!! $posts->appends([
                                'perpage' => request('perpage'),
                                'by'      => request('by'),
                                'q'       => request('q')
                            ])->links() !!}
					</div>
				</div>
        	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection