@extends('sitemanager._layout.default')

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>{{ $moduleTitle }}</h1>
        </div>

        <div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">

					{!! show_bs_message($errors->all() ?: $message, 'danger') !!}
					{!! session()->get('message') !!}

					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Form {{ $moduleTitle }}</h2>
						</div>
						<div class="panel-body">
							{!! Form::open(['class' => 'form-horizontal']) !!}
								<div class="form-group">
									{!! Form::label('old_password', 'Password (Lama)', ['class' => 'col-sm-3 control-label']) !!}
									<div class="col-sm-9">
										{!! Form::password('old_password', ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
									<div class="col-sm-9">
										{!! Form::password('password', ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('password_confirmation', 'Password (Konfirmasi)', ['class' => 'col-sm-3 control-label']) !!}
									<div class="col-sm-9">
										{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<button class="btn-primary btn" type="submit">@fa('save') Simpan</button>
										</div>
									</div>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
        	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection