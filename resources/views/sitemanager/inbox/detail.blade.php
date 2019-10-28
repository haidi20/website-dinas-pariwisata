@extends('sitemanager._layout.default')

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

		<div class="page-heading">            
            <h1>{{ $moduleTitle }}</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        <a href="{{ url($moduleUrl) }}" class="btn btn-default">@fa('reply') Kembali</a>
			    </div>
			</div>
        </div>
		
		<div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Detail</h2>
						</div>
						<div class="panel-body" style="height: 190px">
							<table>
								<tr>
									<td width="100">Subject</td><td width="10">:</td><td>{{ $inbox->subject }}</td>
								</tr>
								<tr>
									<td>Nama</td><td>:</td><td>{{ $inbox->name }}</td>
								</tr>
								<tr>
									<td>Email</td><td>:</td><td><a href="mailto:{{ $inbox->email }}">{{ $inbox->email }}</a></td>
								</tr>
								<tr>
									<td>Phone</td><td>:</td><td>{{ $inbox->phone }}</td>
								</tr>
								<tr>
									<td>Pesan</td><td>:</td><td>{{ $inbox->message }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

    </div>
</div>
@endsection