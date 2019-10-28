@extends('sitemanager._layout.default')

@section('script-bottom')
<script>
$(function() {
    $('#perpage').change(function() {
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
            <h1>{{ $moduleTitle }}</h1>
            <div class="options">
                <div class="btn-toolbar">
					<a href="{{ url($moduleUrl, ['create', $type]) }}" class="btn btn-primary">{!!fa('plus')!!} {{ $moduleTitle }}</a>
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
                            <input type="text" name="q" id="q" class="form-control" value="{{ request('q') }}" placeholder="Search by name...">
                            <button class="btn btn-default" id="btn-search">Search</button>
                        </div>
                    </form>
					<div class="panel">
                        <div class="panel-body panel-no-padding table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="40">No</th>
                                        <th width="300">Nama</th>
                                        <th>link</th>
                                        <th class="text-center" width="140">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($media as $index => $item)
                                    <tr>
                                        <td>{{ table_row_number($media, $index) }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->link }}</td>
                                        <td class="text-center">
                                            <a href="{{ url($moduleUrl, ['edit', $item->id]) }}" class="btn btn-success btn-xs btn-label">{!!fa('pencil')!!}Edit</a>
                                            <a href="javascript:void(0)" data-url="{{ url($moduleUrl, ['delete', $item->id]) }}"  class="btn btn-danger btn-xs btn-label btn-delete">{!!fa('trash-o')!!}Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="alert alert-info">
                                            <center>No records found.</center>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-right">
                        {!! $media->appends([
                                'perpage' => request('perpage'),
                                'q'       => request('q')
                            ])->links() !!}
                    </div>

				</div>
			</div>
		</div>

	</div>
</div>
@endsection                