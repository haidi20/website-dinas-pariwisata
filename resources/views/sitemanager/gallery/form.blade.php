@extends('sitemanager._layout.default')

@section('script-top')
{!! Html::style('avenger/assets/plugins/form-select2/select2.css') !!}
@endsection

@section('script-bottom')
{!! Html::script('avenger/assets/plugins/tinymce/tinymce.min.js') !!}
{!! Html::script('avenger/assets/plugins/tinymce/jquery.tinymce.min.js') !!}
{!! Html::script('avenger/assets/plugins/form-select2/select2.min.js') !!}
<script>
$(function() {
	$("#tags").select2({width: "100%", tags:{!! $tags !!} });

	$('.editor').tinymce({
        theme: "modern",
        height: 700,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern codemirror imageupload",
        ],
        toolbar1: "insertfile undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | fontselect fontsizeselect",
        toolbar2: "print preview media | imageupload | forecolor backcolor | link table | template | code",
        image_advtab: true,
        templates: [
            {
                title: "Pengumuman",
                url: '{{ asset('editor-templates/pengumuman.html') }}',
                description: 'Template pengumuman'
            }
        ],
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        document_base_url: "{{ url('/') }}",
        content_css: [
                "{{ asset('css/web.css') }}"
        ],
        extended_valid_elements: "table[class=table table-bordered][style][width]",
        table_class_list: [
            {title: 'None', value: ''},
            {title: 'Dog', value: 'dog'},
            {title: 'Cat', value: 'cat'}
        ],
        codemirror: {
            path: "codemirror",
            config: {
                theme: "monokai"
            },
            cssFiles:[
                    "theme/monokai.css"
            ]
        }
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".preview").html("<img src='" + e.target.result + "' width='310' id='image'>");
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#gallery").change(function () {
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
            <h1>@if(old()) Edit @else Tambah @endif
            {{ ucfirst($type) }}</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        <a href="{{ url($moduleUrl, ['type', $type]) }}" class="btn btn-default">{!!fa('reply')!!} Kembali</a>
			    </div>
			</div>
        </div>

        <div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">

					{!! show_bs_message($errors->all(), 'danger', 'times-circle') !!}

					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Form {{ $moduleTitle }} {{ ucfirst($type) }}</h2>
						</div>
						<div class="panel-body">
							{{-- {!! Form::open(['class' => 'form-horizontal', 'files' => true]) !!} --}}
							<form action="{{url($moduleUrl, ['create', $type])}}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="form-group {{ has_error($errors, 'caption') }}">
									{!! Form::label('caption', ($type == 'plant') ? 'Nama' : 'Judul', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										{!! Form::text('caption', old('caption'), ['class' => 'form-control', 'placeholder' => ($type == 'plant') ? 'masukkan nama batching plant' : 'masukkan judul / title']) !!}
									</div>
								</div>
								<div class="form-group">
									{!! Form::label('description', 'Deskripsi', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										{!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'rows' => 10]) !!}
									</div>
								</div>
								@if($type != 'plant')
								<div class="form-group">
									{!! Form::label('tags', 'Tags', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										{!! Form::hidden('tags', old('tags'), ['id' => 'tags', 'style' => 'width:100% !important']) !!}
										<p class="help-block">ketika melakukan pengisian pada kolom ini tekan tombol tab atau enter</p>
									</div>
								</div>
								@endif

								<div class="form-group">
									{!! Form::label('file', ($type === 'video') ? ucfirst($type).' from youtube' : 'Image', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										@if($type === 'video')
											{!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => ($type == 'video') ? 'masukkan link video youtube' : '']) !!}
										@else
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Select file</span>
													<span class="fileinput-exists">Change</span>
													{!! Form::file('image', ['id' => 'gallery']) !!}
												</span>
												<span class="fileinput-filename"></span>
												<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
											</div>
											<hr>
											<div class="preview"></div>
											@if(old())
											{!! old('small_preview') !!}
											@endif
										@endif
									</div>
								</div>
								
								{{-- <div class="form-group">
									{!! Form::label('link', 'Alamat Link Youtube', ['class' => 'col-sm-2 control-label']) !!}
									<div class="col-sm-10">
										{!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => ($type === 'video') ? 'ex : https://www.youtube.com/watch?v=uVdV-lxRPFo' : 'masukkan link']) !!}
										@if(old())
										<hr>
										{!! old('preview') !!}
										@endif
									</div>
								</div> --}}
								
								{!! Form::hidden('type', $type) !!}
								<div class="panel-footer">
									<div class="row">
										<div class="col-sm-10 col-sm-offset-2">
											<a href="{{ url($moduleUrl, ['type', $type]) }}" class="btn-default btn">
												{!!fa('reply')!!} Kembali
											</a>
											<button class="btn-primary btn" type="submit">{!!fa('save')!!} Simpan</button>
										</div>
									</div>
								</div>
							{{-- {!! Form::close() !!} --}}
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection