@extends('sitemanager._layout.default')

@section('script-bottom')
<script>
$(function() {
    $('#perpage').on('change', function() {
        this.form.submit();
    });
});
</script>
@endsection

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

        <div class="page-heading">
            @if($parent)
                <h1>Submenu</h1>
                <h1>&nbsp; <strong>"{{ $parent->display_parent_of }}"</strong></h1>
            @else
                <h1>Menu</h1>
            @endif
            <div class="options">
			    <div class="btn-toolbar">
			    	@if($parent)
					<a href="{{ url($moduleUrl, ['parent', $parent->parent_id]) }}" class="btn btn-default">{!!fa('reply')!!} Kembali</a>
			    	@endif
            		<a href="{{ url($moduleUrl, ['create', object_get($parent, 'id')]) }}" class="btn btn-primary">{!!fa('plus')!!} Tambah Menu</a>
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
                            <input type="text" name="q" id="q" class="form-control" value="{{ request('q') }}" placeholder="Nama menu...">
                            <button class="btn btn-default" id="btn-search">Search</button>
                        </div>
                    </form>
					<div class="panel">
						<div class="panel-body panel-no-padding">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th class="text-center" width="40">No</th>
										<th width="200">Nama Menu</th>
					                    <th class="text-center">Caption</th>
					                    <th class="text-center" width="160">Parent</th>
					                    <th class="text-center" width="100">Status</th>
					                    <th class="text-center" width="200">Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse($menu as $index => $item)
									<tr @if(!$item->active_link) class="active text-muted" @endif>
										<td>{{ table_row_number($menu, $index) }}</td>
										<td>{!! $item->display_active_link !!} &nbsp; {{ $item->display_name }}</td>
										<td>{{ str_limit($item->caption, 45) }}</td>
										<td class="text-center">{{ $item->display_parent }}</td>
										<td class="text-center">{!! $item->status_label !!}</td>
										<td class="text-center">
											@if(!$item->lock)
											<a class="btn btn-primary btn-xs" href="{{ url($moduleUrl, ['parent', $item->id]) }}">{!!fa('list')!!} Submenu</a>
											@else
											<a class="btn btn-disabled btn-xs" href="javascript:;">{!!fa('list')!!} Submenu</a>
				                            @endif

				                            <a class="btn btn-success btn-xs" href="{{ url($moduleUrl, ['edit', $item->id]) }}">
				                            	{!!fa('pencil')!!} Edit
				                            </a>

				                            @if(!$item->lock)
				                            <a class="btn btn-danger btn-xs btn-delete" href="javascript:void(0)" data-url="{{ url($moduleUrl, ['delete', $item->id]) }}">{!!fa('trash-o')!!} Delete</a>
				                            @else
				                            <a class="btn btn-disabled btn-xs" href="javascript:;">{!!fa('trash-o')!!} Delete</a>
				                            @endif
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

					<div class="text-right">
						{{ $menu->appends([
                                'perpage' => request('perpage'),
                                'q'       => request('q')
                            ])->links() }}
					</div>
				</div>
        	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection