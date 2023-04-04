<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
    body {
         background: #d2d6de;
    }

    *[role="form"] {
        max-width: 400px;
        padding: 15px;
        margin: 0 auto;
        border-radius: 0.3em;
        background-color: #f2f2f2;
        padding-bottom: 0px;
    }

    .ss {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-clip: border-box;
        border-radius: .25rem;
    }

    *[role="form"] h1 {
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-size: 20px;
        font-weight: bold;
        color: White;
        line-height: 35px;
        margin-bottom: 15px;
        text-align: center;
        background-color: #6B6121;
        margin-top: 0px;
    }
    .card-product .img-wrap {
        border-radius: 3px 3px 0 0;
        overflow: hidden;
        position: relative;
        text-align: center;
    }
    .card-product .img-wrap img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
    }
    .card-product .info-wrap {
        overflow: hidden;
        padding: 15px;
        border-top: 1px solid #eee;
    }
    .card-product .bottom-wrap {
        padding: 15px;
        border-top: 1px solid #eee;
    }
    .label-rating { margin-right:10px;
        color: #333;
        display: inline-block;
        vertical-align: middle;
    }
    .card-product .price-old {
        color: #999;
    }
</style>
<body>
<br>
<div class="container" style="margin: 3% auto;">
    {!! Form::open(['url' => url('check_otp_verification'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal','role'=>'form']) !!}
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="c_id" value="{{$c_id}}">
        
        <h1>OTP Verification For Registration</h1>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <figure class="ss card-product">
                    <div class="img-wrap">
                        <img src="{{ URL::asset('assets/website/images/insurance/Life.png') }}">
                    </div>
                    <div class="form-group{{ $errors->has('c_otp') ? ' has-error' : '' }}" style="margin-top: 30px;">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-sm-12">
                            {!! Form::text('c_otp', null, ['class' => 'form-control','placeholder'=>'Enter OTP','required' => 'required']) !!}
                            @if ($errors->has('c_otp'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('c_otp') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </figure>
                <center>
                    <div class="btn-group">
                    <input type="submit" name="otpSubmit" class="btn btn-success" value="Verify OTP" />
                    </div>
                </center>
                <br>
            </div>
        </div>
    {!! Form::close() !!}
</div>
</body>
</html>