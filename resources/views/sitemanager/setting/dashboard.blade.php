{!! Form::open(['class' => 'form-horizontal']) !!}
	<div class="form-group {{ ($errors->first('title')) ? 'has-error' : '' }}">
		{!! Form::label('title', 'Title', ['class' => 'col-sm-1 control-label']) !!}
		<div class="col-sm-11">
			{!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-11 col-sm-offset-1">
				<a href="{{ url($moduleUrl) }}" class="btn btn-default">
					@fa('reply') Back
				</a>
				<button class="btn-primary btn" type="submit">@fa('save') Save</button>
			</div>
		</div>
	</div>
{!! Form::close() !!}