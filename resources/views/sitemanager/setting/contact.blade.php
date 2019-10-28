{!! Form::open(['class' => 'form-horizontal']) !!}
	<div class="form-group {{ ($errors->first('address')) ? 'has-error' : '' }}">
		{!! Form::label('address', 'Address', ['class' => 'col-sm-1 control-label']) !!}
		<div class="col-sm-11">
			{!! Form::textarea('address', ($address) ? $address : null, ['class' => 'form-control editor', 'rows' => '3']) !!}
		</div>
	</div>
	<div class="form-group {{ ($errors->first('phone')) ? 'has-error' : '' }}">
		{!! Form::label('phone', 'Phone', ['class' => 'col-sm-1 control-label']) !!}
		<div class="col-sm-11">
			{!! Form::textarea('phone', ($phone) ? $phone : null, ['class' => 'form-control editor', 'rows' => '3']) !!}
		</div>
	</div>
	<div class="form-group {{ ($errors->first('fax')) ? 'has-error' : '' }}">
		{!! Form::label('fax', 'Fax', ['class' => 'col-sm-1 control-label']) !!}
		<div class="col-sm-11">
			{!! Form::textarea('fax', ($fax) ? $fax : null, ['class' => 'form-control editor', 'rows' => '3']) !!}
		</div>
	</div>
	<div class="form-group {{ ($errors->first('email')) ? 'has-error' : '' }}">
		{!! Form::label('email', 'Email', ['class' => 'col-sm-1 control-label']) !!}
		<div class="col-sm-11">
			{!! Form::textarea('email', ($email) ? $email : null, ['class' => 'form-control editor', 'rows' => '3']) !!}
		</div>
	</div>
	<div class="form-group {{ ($errors->first('time')) ? 'has-error' : '' }}">
		{!! Form::label('time', 'Time', ['class' => 'col-sm-1 control-label']) !!}
		<div class="col-sm-11">
			{!! Form::textarea('time', ($time) ? $time : null, ['class' => 'form-control editor', 'rows' => '3']) !!}
		</div>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-11 col-sm-offset-1">
				<button class="btn-primary btn" type="submit">@fa('save') Save</button>
			</div>
		</div>
	</div>
{!! Form::close() !!}