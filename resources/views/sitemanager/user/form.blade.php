@extends('sitemanager._layout.default')

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>{{ ($edit) ? 'Edit' : 'Add' }} {{ $moduleTitle }}</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        <a href="{{ url($moduleUrl) }}" class="btn btn-default">@fa('reply') Back</a>
			    </div>
			</div>
        </div>

        <div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">

					{!! show_bs_message($errors->all(), 'danger', 'times-circle') !!}
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Form {{ $moduleTitle }}</h2>
						</div>
						<div class="panel-body">
							{!! Form::open(['class' => 'form-horizontal']) !!}
								<div class="form-group {{ ($errors->first('name')) ? 'has-error' : '' }}">
									{!! Form::label('name', 'Nama', ['class' => 'col-sm-3 control-label']) !!}
									<div class="col-sm-9">
										{!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
									</div>
								</div>
								<div class="form-group {{ ($errors->first('username')) ? 'has-error' : '' }}">
									{!! Form::label('username', 'Username', ['class' => 'col-sm-3 control-label']) !!}
									<div class="col-sm-9">
										{!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '']) !!}
									</div>
								</div>
								<div class="form-group {{ ($errors->first('email')) ? 'has-error' : '' }}">
									{!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
									<div class="col-sm-9">
										{!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
									</div>
								</div>
								<div class="form-group {{ ($errors->first('password')) ? 'has-error' : '' }}">
									{!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
									<div class="col-sm-9">
										{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('password_confirmation', 'Password (Konfirmasi)', ['class' => 'col-sm-3 control-label']) !!}
									<div class="col-sm-9">
										{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('level', 'Level', ['class' => 'col-sm-3 control-label']) !!}
									<div class="col-sm-9">
										{!! Form::select('level', $listLevel, old('level'), ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<a href="{{ url($moduleUrl) }}" class="btn-default btn">
												@fa('reply') Back
											</a>
											<button class="btn-primary btn" type="submit">@fa('save') Save</button>
										</div>
									</div>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection