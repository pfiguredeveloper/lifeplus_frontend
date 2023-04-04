<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LifePlus | Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css') }} ">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/iCheck/square/blue.css') }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Readex+Pro:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<style>
		@media only screen and (min-width: 600px){.login-box-body{position: absolute;width: 350px;top: 0px;right: 0px;height: 100vh;}}
		body, div, p, h1, h2, h3, h4, h5, h6, b, span, li, ul, a, table, td, tr, th, input, select{
			font-family: 'Quicksand', sans-serif!important;
		}
		#myVideo {
		  position: fixed;
		  right: 0;
		  bottom: 0;
		  min-width: 100%; 
		  min-height: 100%;
		}
	</style>
</head>
<body class="hold-transition login-page" >
<!-- style="background-image:url('{{ url('images/bg-login.jpg') }}');background-size:cover;"-->
<video autoplay muted loop id="myVideo">
  <source src="{{ url('images/money-cart.mp4') }}" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
<div class="login-box">

    <div class="login-box-body">
		<div class="text-center">
			<img src="{{ URL::asset('assets/website/images/moneycartslogo.png') }}" width='200px' />
		</div>
		<div class="login-logo">
			<a href="{{ URL::to('/') }}"><b style="color:#373E69;">Life Plus</b></a>
		</div>
		
        <p class="login-box-msg">Sign in to start your session</p>

        @include("admin.error")

        <form class="" role="form" method="POST" action="{{ url('admin/login') }}">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('emailormobile') ? ' has-error' : '' }} has-feedback">
                <input type="text" id="emailormobile" name="emailormobile" class="form-control" placeholder="Email Or Mobile" value="{{ old('emailormobile') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>
        <br>
        <a href="{{url('admin/forgot-password')}}" style="float: left;">I forgot my password</a>
        <a href="{{url('register/7')}}" style="float: right;">Sign Up</a>
        <br>
    </div>
</div>

<script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/iCheck/icheck.min.js') }}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>

</body>
</html>