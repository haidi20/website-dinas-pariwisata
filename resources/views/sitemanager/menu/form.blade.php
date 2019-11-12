@extends('sitemanager._layout.default')

@section('script-top')
	{!! Html::style('avenger/assets/plugins/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') !!}
@endsection

@section('script-bottom')
	{!! Html::script('avenger/assets/plugins/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.4.0.min.js') !!}
	{!! Html::script('avenger/assets/plugins/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') !!}
	<script>
        $(function(){
            $('#iconpicker').iconpicker({
                arrowClass: 'btn-default',
                arrowPrevIconClass: 'fa fa-chevron-left',
                arrowNextIconClass: 'fa fa-chevron-right',
                cols: 5,
                icon: '{{ old('icon', 'fa-file') }}',
                iconset: 'fontawesome',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom',
                rows: 5,
                search: true,
                searchText: 'Search',
                selectedClass: 'btn-default',
                unselectedClass: ''
            }).on('change', function(e){
                $('#icon').val(e.icon);
            });
        });
    </script>
@endsection

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>Tambah</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        <a href="{{ url($moduleUrl, isset($parent) ? ['parent', $parent->id] : [] ) }}" class="btn btn-default">{!!fa('reply')!!} Kembali</a>
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
								@if(isset($parent))
					            <div class="form-group">
					                {!! Form::label('parent', 'Parent', ['class' => 'col-sm-2 control-label']) !!}
					                <input type="hidden" name="parent_id" value="{{ $parent->id }}">
					                <div class="col-sm-10">
					                	<input type="text" value="{{ $parent->display_parent_of }}" class="form-control" readonly>
					                </div>
					            </div>
					            @endif
								<div class="form-group {{ has_error($errors, 'name') }}">
									{!! Form::label('name', 'Nama Menu', ['class' => 'col-sm-2 control-label']) !!}
									{!! Form::hidden('icon', old('icon') ?: 'fa-file', ['id' => 'icon']) !!}
									<div class="col-sm-10">
										<!--<div class="input-group">
											<div class="input-group-btn">
												<button class="btn btn-info" type="button" id="iconpicker"></button>
											</div>-->
											{!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'masukkan nama menu']) !!}
										<!--</div>-->
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('caption', 'Caption', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										{!! Form::text('caption', old('caption'), ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('link', 'Alamat Link', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-8">
										{!! Form::text('link', old('link'), ['class' => 'form-control', old('lock') ? 'disabled' : 'placeholder' => 'masukkan link']) !!}
									</div>
									<div class="col-sm-2">
										<label class="checkbox-inline icheck">
											@if(old('id'))
											<input type="checkbox" name="active_link" id="inlinecheckbox1" value="1" @if(old('active_link')) checked="checked" @endif> {!! old('display_active_link') !!} &nbsp; Active Link
											@else
											<input type="checkbox" name="active_link" id="inlinecheckbox1" value="1" checked="checked"> {!!fa('link')!!} &nbsp; Active Link
											@endif
										</label>
									</div>
								</div>
								<!--
								<div class="form-group">
									{!! Form::label('position', 'Posisi', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-4">
										{!! Form::select('position', $position, old('position'), ['class' => 'form-control']) !!}
									</div>
								</div>
								-->
								{!! Form::hidden('position', 'header', ['class' => 'form-control']) !!}
								<!-- -->

								<div class="form-group">
									{!! Form::label('warna', 'Warna', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-2">
										{!! Form::color('color', old('color'), ['class' => 'form-control', 'placeholder' => '']) !!}
									</div>
								</div>
								
								<div class="form-group">
									{!! Form::label('order', 'Urutan', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-4">
										{!! Form::text('order', old('order') ?: $lastOrder, ['class' => 'form-control', 'placeholder' => '']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label(null, 'Status', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										<label class="radio-inline icheck">
											{!! Form::radio('status', '1', old('status') ?: true, ['id' => 'status_published' ]) !!}
											{!! Form::label('status_published', 'Published') !!}
										</label>
										<label class="radio-inline icheck">
											{!! Form::radio('status', '0', old('status'), ['id' => 'status_draft' ]) !!}
                        					{!! Form::label('status_draft', 'Draft') !!}
										</label>
									</div>
								</div>
								<div class="form-group">
									{!! Form::label(null, 'Terhubung Kategori', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										@if(old('id'))
										<input type="checkbox" name="active_link" id="inlinecheckbox1" value="1" @if(old('active_link')) checked="checked" @endif> {!! old('display_active_link') !!} &nbsp; Active Link
										@else
										<input type="checkbox" name="active_link" id="inlinecheckbox1" value="1" checked="checked"> {!!fa('link')!!} &nbsp; Active Link
										@endif
									</div>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<a href="{{ url($moduleUrl) }}" class="btn-default btn">
												{!!fa('reply')!!} Kembali
											</a>
											<button class="btn-primary btn" type="submit">{!!fa('save')!!} Simpan</button>
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