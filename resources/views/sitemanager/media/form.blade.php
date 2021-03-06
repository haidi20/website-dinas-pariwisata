@extends('sitemanager._layout.default')

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>{{ (old('id')) ? 'Edit' : 'Add' }} {{ $moduleTitle }}</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        <a href="{{ url($moduleUrl, [$type]) }}" class="btn btn-default">{!! fa('reply')!!} Back</a>
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
									{!! Form::label('name', 'Nama', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										<select class="form-control" name="name">
											<option value=""></option>
											@foreach($listMedia as $item)
												<option value="{{ $item }}" @if(old('name') == $item) selected="selected" @endif>{{ $item }}</option>
											@endforeach
										</select>
									</div>
								</div>
								@if($type == 'medsos')
								<div class="form-group {{ ($errors->first('link')) ? 'has-error' : '' }}">
									{!! Form::label('link', 'Alamat Link', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										{!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => 'Masukan Alamat Link']) !!}
									</div>
								</div>
								@endif
								<div class="form-group">
									{!! Form::label(null, 'Status', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										<label class="radio-inline icheck">
											{!! Form::radio('status', '1', old('status') ?: true, ['id' => 'status_enabled' ]) !!}
											{!! Form::label('status_enabled', 'Enabled') !!}
										</label>
										<label class="radio-inline icheck">
											{!! Form::radio('status', '0', old('status'), ['id' => 'status_disabled' ]) !!}
                        					{!! Form::label('status_disabled', 'Disabled') !!}
										</label>
									</div>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-10 col-sm-offset-2">
											<a href="{{ url($moduleUrl, [$type]) }}" class="btn-default btn">
												{!! fa('reply') !!} Back
											</a>
											<button class="btn-primary btn" type="submit">{!! fa('save') !!} Save</button>
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