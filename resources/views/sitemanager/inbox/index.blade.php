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
            <h1>{{ $moduleTitle }}</h1>
            <div class="options">
                <div class="btn-toolbar">

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
                                <option value="subject" {{ (request('by') == 'subject') ? 'selected' : '' }}>Subject</option>
                                <option value="name" {{ (request('by') == 'name') ? 'selected' : '' }}>Nama</option>
                                <option value="email" {{ (request('by') == 'email') ? 'selected' : '' }}>Email</option>
                            </select>
                            <input type="text" name="q" id="q" class="form-control" value="{{ request('q') }}">
                            <button class="btn btn-default" id="btn-search">Search</button>
                        </div>
                    </form>
                    <div class="panel">
                        <div class="panel-body panel-no-padding table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="40">No</th>
                                        <th>Subject</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="text-center" width="140">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($inbox as $index => $item)
                                    <tr>
                                        <td>{{ table_row_number($inbox, $index) }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td class="text-center">
                                            <a href="{{ url($moduleUrl, ['detail', $item->id]) }}" class="btn btn-info btn-xs btn-label">@fa('search')Detail</a>
                                            <a href="javascript:void(0)" data-url="{{ url($moduleUrl, ['delete', $item->id]) }}"  class="btn btn-danger btn-xs btn-label btn-delete">@fa('trash-o')Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="alert alert-info">
                                            <center>No records found.</center>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-right">
                        {!! $inbox->appends([
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