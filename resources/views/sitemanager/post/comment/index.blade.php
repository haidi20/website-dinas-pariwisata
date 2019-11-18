@extends('sitemanager._layout.default')

@section('script-bottom')
    <script>
        $(function(){
            $('.btn-detail').click(function(){
                $('#modal-comment').modal('show');

                link = $(this).data('url')
                
                $.get(link, function(response){
                    $('#show-text').text(response.text)
                });
            });

            $('#perpage').change(function(){
                perpage = $(this).val()
                window.location.href = "{{$baseUrl}}?perpage="+perpage
            });
        });
    </script>
@endsection

@section('content')
@include('sitemanager.post.comment.modal')
<div class="static-content">
    <div class="page-content">

        <div class="page-heading">            
            <h1>{{ $moduleTitle }}</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        <a href="{{ url('sitemanager', ['post']) }}" class="btn btn-default">{!!fa('reply')!!} Kembali</a>
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
                                <option value="text" {{ (request('by') == 'text') ? 'selected' : '' }}>Comment</option>
                                <option value="name" {{ (request('by') == 'name') ? 'selected' : '' }}>Name</option>
                                <option value="email" {{ (request('by') == 'email') ? 'selected' : '' }}>Email</option>
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
                                        <th>Comment</th>
                                        <th class="text-center" width="140">Actions</th>
									</tr>
								</thead>
								<tbody>
									@forelse($comments as $index => $item)
									<tr>
										<td>{{ table_row_number($comments, $index) }}</td>
                                        <td>{{$item->review_text}}</td>
										<td class="text-center">
                                            <a 
                                                href="javascript:;" 
                                                class="btn btn-success btn-xs btn-label btn-detail"
                                                data-url="{{ url($moduleUrl, ['detail', $item->id]) }}"
                                            > Detail</a>
                                            <a 
                                                href="javascript:;" 
                                                class="btn btn-warning btn-xs btn-delete" 
                                                data-url="{{ url($moduleUrl, ['hidden', $item->id]) }}"
                                                data-status="Sembunyikan"
                                            >Hide</a>
                                            <a 
                                                href="javascript:;" 
                                                class="btn btn-danger btn-xs btn-delete" 
                                                data-url="{{ url($moduleUrl, ['delete', $item->id]) }}"
                                            >Delete</a>
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
						{!! $comments->appends([
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