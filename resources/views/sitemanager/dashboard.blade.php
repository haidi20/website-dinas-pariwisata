@extends('sitemanager._layout.default')

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>Dashboard</h1>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

					<div class="alert alert-info">
						<p>WELCOME TO DASHBOARD</p>
					</div>

				</div>
        	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection