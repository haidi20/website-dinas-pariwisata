@extends('sitemanager._layout.default')

@section('script-bottom')
{!! Html::script('avenger/assets/plugins/summernote/dist/summernote.js') !!}
{!! Html::script('avenger/assets/plugins/tinymce/tinymce.min.js') !!}
{!! Html::script('avenger/assets/plugins/tinymce/jquery.tinymce.min.js') !!}
<script>
$(document).ready(function() {
	$('.editor').tinymce({
        theme: "modern",
        height: 100,
        plugins: [
            "link code",
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | fontselect fontsizeselect",
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
</script>
@endsection

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

                    {!! session()->get('message') !!}

					<div class="panel">
						<div class="panel-heading">
							<h2>
								<ul class="nav nav-tabs">
									<li class="{{ ($page == 'contact') ? 'active' : '' }}">
										<a href="{{ url($moduleUrl, ['contact']) }}">contact</a>
									</li>
									<!-- <li class="{{ ($page == 'dashboard') ? 'active' : '' }}">
										<a href="{{ url($moduleUrl, ['dashboard']) }}">Dashboard</a>
									</li> -->
									<!-- <li><a href="#tab-2" data-toggle="tab">Tab 2</a></li>
									<li><a href="#tab-3" data-toggle="tab">Tab 3</a></li> -->
								</ul>
							</h2>
						</div>
						<div class="panel-body">
							<div class="tab-content">
								<div class="tab-pane {{ ($page == 'contact') ? 'active' : '' }}">
									@include('sitemanager.setting.'.$page)
								</div>
								<!-- <div class="tab-pane {{ ($page == 'dashboard') ? 'active' : '' }}">
									@include('sitemanager.setting.'.$page)
								</div> -->

								<!--
								<div class="tab-pane" id="tab-3">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, tempora, error, corporis repudiandae hic eaque rerum molestiae ex incidunt sit in quis ipsum expedita consectetur dolor veritatis doloribus quo temporibus?</p>
								</div> 
								-->
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
@endsection