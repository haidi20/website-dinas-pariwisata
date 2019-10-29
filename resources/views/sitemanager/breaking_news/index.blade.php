@extends('sitemanager._layout.default')

@section('script-top')
{!! Html::style('avenger/assets/plugins/sweet-alert/sweet-alert.css') !!}
@endsection

@section('script-bottom')
	<script>
        $(function(){
            //statement
        });
    </script>
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

					<h1>breaking news</h1>
				</div>
        	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection