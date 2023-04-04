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
</head>

<body class="hold-transition login-page">

<div class="login-box">

    <div class="login-logo">
        <a href="{{ URL::to('/') }}"><b>LifePlus</b></a>
    </div>

    <div class="login-box-body">
        <h5 class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</h5>

        @include("admin.error")

        <form class="" role="form" method="POST" action="{{ url('admin/forgot-password-update') }}">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('emailormobile') ? ' has-error' : '' }} has-feedback">
                <input type="text" id="emailormobile" name="emailormobile" class="form-control" placeholder="Email Or Mobile" value="{{ old('emailormobile') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary">Request new password</button>
                </div>
            </div>
        </form>
        <br>
        <a href="{{url('admin/login')}}" style="float: left;">Back To Sign In</a>
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