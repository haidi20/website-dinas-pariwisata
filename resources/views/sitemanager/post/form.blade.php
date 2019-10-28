@extends('sitemanager._layout.default')

@section('script-top')
{!! Html::style('avenger/assets/plugins/form-select2/select2.css') !!}
{!! Html::style('avenger/assets/plugins/form-tokenfield/bootstrap-tokenfield.css') !!}
@endsection

@section('script-bottom')
{!! Html::script('avenger/assets/plugins/form-select2/select2.min.js') !!}
{!! Html::script('avenger/assets/plugins/form-tokenfield/bootstrap-tokenfield.min.js') !!}
{!! Html::script('avenger/assets/plugins/form-typeahead/typeahead.bundle.min.js') !!}
	@include('sitemanager.post.script')
	@include('sitemanager.post.modal')
@endsection

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>Tambah</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        <a href="{{ url($moduleUrl) }}" class="btn btn-default">@fa('reply') Kembali</a>
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
							{!! Form::open(['class' => 'form-horizontal', 'files' => true]) !!}
								<div class="form-group {{ has_error($errors, 'title') }}">
									{!! Form::label('title', 'Judul', ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
										{!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'masukkan judul / title']) !!}
									</div>
								</div>
								@if(strtolower($moduleTitle) == 'page')
								<div class="form-group">
									{!! Form::label('url', 'URL', ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
										<div class="input-group">
											{!! Form::text('url', old('url_slug'), ['class' => 'form-control', 'id' => 'url', 'readonly' => 'readonly']) !!}
											{!! Form::hidden('link', old('slug'), ['id' => 'link', 'class' => 'form-control']) !!}
											<div class="input-group-btn">
												<a data-toggle="modal" href="#menu">
													<button type="button" class="btn btn-info">@fa('link')</button>
												</a>
											</div>
										</div>
									</div>
								</div>
								@else
								<div class="form-group">
									{!! Form::label('file', 'Image' , ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<span class="btn btn-default btn-file">
												<span class="fileinput-new">Select file</span>
												<span class="fileinput-exists">Change</span>
												{!! Form::file('file', ['id' => 'gallery_image', 'accept' => 'image/*']) !!}
											</span>
											<span class="fileinput-filename"></span>
											<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
										</div>
										<hr>
										<div class="preview-image">
											{!! old('preview_similar') !!}
										</div>
									</div>
								</div>
								@endif
								@if(isset($categories))
								<div class="form-group">
									{!! Form::label('category_id', 'Kategori', ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
										{!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('tags', 'Tags', ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
										{!! Form::hidden('tags', old('tags'), ['id' => 'tags', 'style' => 'width:100% !important']) !!}
										<p class="help-block">ketika melakukan pengisian pada kolom ini tekan tombol tab atau enter</p>
									</div>
								</div>
								@endif
								@if(strtolower($moduleTitle) == 'post')
								{{-- <div class="form-group">
									{!! Form::label('read', 'Read', ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-2">
										{!! Form::text('read', old('read'), ['class' => 'form-control', 'id' => 'read', 'onkeypress' => 'return numberonly(event, false)']) !!}
									</div>
								</div> --}}
								@endif
								<div class="form-group">
									{!! Form::label('content', 'Konten', ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
										{!! Form::textarea('content', old('content'), ['class' => 'form-control editor', 'rows' => '15']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label(null, 'Status', ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
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
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-11 col-sm-offset-1">
											<a href="{{ url($moduleUrl) }}" class="btn-default btn">
												@fa('reply') Kembali
											</a>
											<button class="btn-primary btn" type="submit">@fa('save') Simpan</button>
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