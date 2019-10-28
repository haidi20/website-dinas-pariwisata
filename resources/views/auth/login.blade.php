<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themepixels.com/demo/webpage/quirk/templates/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Apr 2016 14:45:02 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sitemanager</title>

  <link rel="stylesheet" href="{{ asset('avenger/assets/fonts/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('quirk/quirk.css') }}">

  <!-- <script src="../lib/modernizr/modernizr.js"></script> -->
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body class="signwrapper">

  <div class="sign-overlay"></div>
  <div class="signpanel"></div>

  <div class="panel signin">
    <div class="panel-heading">
      <h1>sitemanager</h1>
      <h4 class="panel-title">Welcome! Please login.</h4>
    </div>
    <div class="panel-body">
      @if (count($errors) > 0)
          <div class="alert alert-dismissable alert-danger">
              @fa('warning') <strong>Error :</strong><br>
              @foreach ($errors->all() as $error)
                  {{ $error }}<br>
              @endforeach
          </div>
      @endif
      {!! Form::open(['class' => '']) !!}
        <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            {!! Form::text('username', null, ['class'=>'form-control', 'placeholder' => 'Enter Username']) !!}
          </div>
        </div>
        <div class="form-group nomargin">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            {!! Form::password('password', ['class'=>'form-control', 'placeholder' => 'Enter Password']) !!}
          </div>
        </div>
        <div>
          <!-- <a href="#" class="forgot">Forgot password?</a> -->
          &nbsp;
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-quirk btn-block">Login</button>
        </div>
      {!! Form::close() !!}
      <hr class="invisible">
    </div>
  </div><!-- panel -->

</body>

<!-- Mirrored from themepixels.com/demo/webpage/quirk/templates/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Apr 2016 14:45:02 GMT -->
</html>
