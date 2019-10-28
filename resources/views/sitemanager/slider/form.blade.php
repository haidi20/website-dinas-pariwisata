@extends('sitemanager._layout.default', ['moduleTitle'])

@section('script-bottom')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".preview-image").html("<img src='" + e.target.result + "' width='800' id='image'>");
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#gallery_image").change(function () {
    readURL(this);
    $('.img-responsive').remove();
});

$('.close').on('click', function(){
    $('#image').remove();
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
			        <a href="{{ url($moduleUrl) }}" class="btn btn-default">@fa('reply') Kembali</a>
			    </div>
			</div>
        </div>
		
		<div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">

					{!! session()->get('message') !!}
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Form {{ $moduleTitle }}</h2>
						</div>
						<div class="panel-body">
							{!! Form::open(['class' => 'form-horizontal', 'files' => true]) !!}
								<div class="form-group {{ has_error($errors, 'caption') }}">
									{!! Form::label('caption', 'Judul', ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
										{!! Form::text('caption', old('caption'), ['class' => 'form-control', 'placeholder' => 'masukkan judul / title']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('description', 'Deskripsi', ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
										{!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
								<div class="form-group {{ has_error($errors, 'file') }}">
									{!! Form::label('file', 'Image' , ['class' => 'col-sm-1 control-label']) !!}
									<div class="col-sm-11">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<span class="btn {{ (has_error($errors, 'file') == ' has-error ') ? 'btn-danger' : 'btn-default' }} btn-file">
												<span class="fileinput-new">Select file</span>
												<span class="fileinput-exists">Change</span>
												{!! Form::file('file', ['id' => 'gallery_image', 'accept' => 'image/*']) !!}
											</span>
											<span class="fileinput-filename"></span>
											<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
										</div>
										<hr>
										<div class="preview-image"></div>
										{!! old('thumbnail') !!}
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