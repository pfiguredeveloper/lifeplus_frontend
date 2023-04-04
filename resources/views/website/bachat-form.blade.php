<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    body {
     background: url('{{ URL::asset('assets/website/images/pension.jpg') }}') fixed;
        background-size: cover;
    }

    *[role="form"] {
        max-width: 530px;
        padding: 15px;
        margin: 0 auto;
        border-radius: 0.3em;
        background-color: #f2f2f2;
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
</style>

<div class="container">
    <br><br>
    {!! Form::open(['url' => url('/'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal','role'=>'form']) !!}
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <h1>Registration</h1>
        <div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">Name <span style="color: red;"><b>*</b></span></label>
            <div class="col-sm-9">
                {!! Form::text('c_name', null, ['class' => 'form-control','placeholder'=>'Name']) !!}
                @if ($errors->has('c_name'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('c_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('c_mobile') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">Mobile <span style="color: red;"><b>*</b></span></label>
            <div class="col-sm-9">
                {!! Form::text('c_mobile', null, ['class' => 'form-control','placeholder'=>'Mobile No']) !!}
                @if ($errors->has('c_mobile'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('c_mobile') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('c_email') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">Email <span style="color: red;"><b>*</b></span></label>
            <div class="col-sm-9">
                {!! Form::text('c_email', null, ['class' => 'form-control','placeholder'=>'Email']) !!}
                @if ($errors->has('c_email'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('c_email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">State</label>
            <div class="col-sm-9">
                {!! Form::select('c_state_id', [''=>'--Select State--','1029'=>'A.NAGAR'], null, ['class' => 'form-control', 'style' => 'width: 100%;height: auto;']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">City</label>
            <div class="col-sm-4">
                {!! Form::select('c_city_id', [''=>'--Select City--']+$cityname, null, ['class' => 'form-control', 'style' => 'width: 100%;height: auto;']) !!}
            </div>
            <label class="col-sm-1 control-label">Pin</label>
            <div class="col-sm-4">
                {!! Form::text('c_pin', null, ['class' => 'form-control','placeholder'=>'Pin']) !!}
            </div>
        </div>
        <div class="form-group{{ $errors->has('c_password') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">Password <span style="color: red;"><b>*</b></span></label>
            <div class="col-sm-9">
                <input type="password" placeholder="Password" name="c_password" class="form-control" >
                @if ($errors->has('c_password'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('c_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
                <p style="color: red;">(Please Enter Valid Email Address Because We Are Sending Details On Email)</p>
            </div>
        </div> -->
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    {!! Form::close() !!}
</div>