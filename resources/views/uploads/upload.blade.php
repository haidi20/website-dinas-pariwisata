<html>
<head>
	<meta charset="UTF-8">
	<title>Image Upload</title>
	{!! Html::script('avenger/assets/plugins/tinymce/plugins/imageupload/upload.js') !!}

	<script type="text/javascript">
	window.parent.window.ImageUpload.uploadSuccess({
		code : '{{ $file_path }}'
	});
	</script>
	<style type="text/css">
		img {
			max-height: 240px;
			max-width: 320px;
		}
	</style>
</head>
<body>
	<img src="{{ $file_path }}">
</body>
</html>