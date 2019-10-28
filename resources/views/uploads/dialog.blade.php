<html>
<head>
	<meta charset="UTF-8">
	<title>Image Upload Dialog</title>
</head>
<body>
<div class="container">
	<div class="row col-md-10 col-md-offset-1">
		<div id="upload_form">
			<p>
				<!-- Change the url here to reflect your image handling controller -->
				{!! Form::open(array('url' => 'fileman/mce-upload', 'method' => 'POST', 'files' => true, 'target' => 'upload_target')) !!}
				{!! Form::file('imagefile', array('onChange' => 'this.form.submit(); ImageUpload.inProgress();')) !!}
				{!! Form::close() !!}
			</p>
		</div>
		<div id="image_preview" style="display:none; font-style: helvetica, arial;">
			<iframe frameborder=0 scrolling="no" id="upload_target" name="upload_target" height=240 width=320></iframe>
		</div>
	</div>
	{!! Html::script('avenger/assets/plugins/tinymce/plugins/imageupload/upload.js') !!}
</div>
</body>
</html>