
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LifeCell Form| Page not found.</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">

    <style type="text/css">
        .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="span12">
            <div class="hero-unit center">
                <h1>Page Not Found <small><font face="Tahoma" color="red">Error 404</font></small></h1>
                <br />

                <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>

                <p><b>Or you could just press this neat little button to go to website:</b></p>

                <a href="javascript:history.go(-1);" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>

