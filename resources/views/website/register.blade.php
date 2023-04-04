<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>LifePlus | Registration</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<!--<link href="{{ URL::asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">-->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->
		
		<style type="text/css">
			/*body {background: url('{{ URL::asset('assets/website/images/pension.jpg') }}') fixed;background-size: cover;}*/
			body {background: url('{{ URL::asset('images/money-cart-register-bg.jpg') }}') fixed;background-size: cover;}
			*[role="form"] {max-width: 530px;padding: 15px;margin: 0 auto;border-radius: 0.3em;}			
			.box-frm{background-color: #ffffffcc;border-radius:10px;}
			*[role="form"] h1 {text-align: center;text-transform: uppercase;letter-spacing: 4px;font-size: 20px;font-weight: bold;color: White;line-height: 35px;margin-bottom: 15px;text-align: center;background-color: #6B6121;margin-top: 0px;}
			label{text-align:left!important;}
			/*
			@media only screen and (min-width: 1140px) {
				.box-frm{
					position:fixed;
					top:0px;
					right:0px;
					height:100vh;
				}
			}
			*/
			.help-block{margin:0px;}
			.form-control{
				display: block;
				width: 100%;
				height: 34px;
				padding: 6px 12px;
				font-size: 14px;
				line-height: 1.42857143;
				color: #000;
				background-color: transparent;
				background-image: none;
				border: 0px;
				border-radius: 0px;
				-webkit-box-shadow: none!important;
				box-shadow: none!important;
				-webkit-transition: none!important;
				-o-transition: none!important;
				transition: none!important;
				border-bottom: 1px solid #000000c7;
				font-family:"Helvetica Neue", FontAwesome, Helvetica, Arial, sans-serif;
			}
			.form-control:focus{background-color:transparent;}
			.form-horizontal .form-group {
				margin-right: 0px;
				margin-left: 0px;
			}
			.form-group {
				margin-bottom: 20px;
			}
			select{color:#555!important;}
		</style>
		
	</head>
	<body>
		<div class="container">
			<div class="row" style="margin-top:100px;margin-bottom:100px;">
				<div class="col-lg-6 offset-lg-3">
					<div class="box-frm">
						{!! Form::open(['url' => url('register_store'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal','role'=>'form']) !!}
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							@php
								$imageUrl = 'images/life-plus-logo.svg';
								if($pid == 7) {
									$imageUrl = 'images/life-plus-logo.svg';
								} else if($pid == 16) {
									$imageUrl = 'images/life-auto-comision-logo.svg';
								} else if($pid == 9) {
									$imageUrl = 'images/ig-logo.svg';
								} else if($pid == 8) {
									$imageUrl = 'images/bachat-logo.svg';
								} else if($pid == 11) {
									$imageUrl = 'images/track-mf-logo.svg';
								} else if($pid == 17) {
									$imageUrl = 'images/asset-managemnet-logo.svg';
								} else if($pid == 18) {
									$imageUrl = 'images/fixed-deposit-logo.svg';
								} else if($pid == 19) {
									$imageUrl = 'images/stock-security-logo.svg';
								} else if($pid == 20) {
									$imageUrl = 'images/arya-logo.svg';
								} else if($pid == 10) {
									$imageUrl = 'images/speed-logo.svg';
								} else if($pid == 21) {
									$imageUrl = 'images/hellow-logo.svg';
								} else if($pid == 22) {
									$imageUrl = 'images/sms-new.png';
								}
							@endphp
							<img src="{{ URL::asset($imageUrl) }}" style="width: auto;height: 100px;margin-bottom: 10px;margin-left: auto;margin-right: auto;display: block;" alt="">
							<h1 style="background-color: #F58220;">Registration</h1>
							<div class="form-group" style="margin-bottom: 0px !important;">
								<div class="row" style="margin:0px;">
									<label class="col-8 control-label">Product</label>
									<label class="col-4 control-label">Price</label>
								</div>
							</div>
							<div class="form-group" style="margin-bottom: 7px !important;">
								<div class="row" style="margin:0px;">
									<div class="col-8">
										<p style="margin-top: 6px;color: #F58220;"><b><big>{{$productName}}</big></b></p>
									</div>
									<div class="col-4">
										<p style="margin-top: 6px;color: #F58220;"><b><big>{{$productPrice}}</big></b></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
										{!! Form::text('c_name', null, ['class' => 'form-control','placeholder'=>'&#xf007; Name*']) !!}
										@if ($errors->has('c_name'))
											<span class="help-block">
												<strong style="color: red;">{{ $errors->first('c_name') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group{{ $errors->has('c_mobile') ? ' has-error' : '' }}">
										{!! Form::text('c_mobile', null, ['class' => 'form-control','placeholder'=>'&#xf095; Mobile No*']) !!}
										@if ($errors->has('c_mobile'))
											<span class="help-block">
												<strong style="color: red;">{{ $errors->first('c_mobile') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group{{ $errors->has('c_email') ? ' has-error' : '' }}">								
										{!! Form::text('c_email', null, ['class' => 'form-control','placeholder'=>'&#xf0e0; Email*']) !!}
										@if ($errors->has('c_email'))
											<span class="help-block">
												<strong style="color: red;">{{ $errors->first('c_email') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										{!! Form::select('c_state_id', [''=>'-- State --']+$statename, null, ['class' => 'form-control', 'style' => 'width: 100%;height: auto;']) !!}
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										{!! Form::select('c_city_id', [''=>'-- City --']+$cityname, null, ['class' => 'form-control', 'style' => 'width: 100%;height: auto;']) !!}
									</div>
								</div>
									
								<div class="col-lg-6">
									<div class="form-group">
										{!! Form::text('c_pin', null, ['class' => 'form-control','placeholder'=>'&#xf2bc; Pin Code']) !!}
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										{!! Form::select('cp_user_type', [''=>'-- User Type* --']+$userType, null, ['class' => 'form-control', 'style' => 'width: 100%;height: auto;']) !!}
										@if ($errors->has('cp_user_type'))
											<span class="help-block">
												<strong style="color: red;">{{ $errors->first('cp_user_type') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group{{ $errors->has('c_password') ? ' has-error' : '' }}">
										<input type="password" placeholder="&#xf084; Password" name="c_password" class="form-control" >
										@if ($errors->has('c_password'))
											<span class="help-block">
												<strong style="color: red;">{{ $errors->first('c_password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-lg-6">								
									<div class="form-group{{ $errors->has('cf_password') ? ' has-error' : '' }}">
										<input type="password" placeholder="&#xf084; Confirm password" name="cf_password" class="form-control" >
										@if ($errors->has('cf_password'))
											<span class="help-block">
												<strong style="color: red;">{{ $errors->first('cf_password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<p style="color: red;">(Please Enter Valid Email Address Because We Are Sending Details On Email)</p>
									</div>
								</div>
								<div class="col-lg-12">
									<input type="hidden" name="p_id" value="{{$pid}}">
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="background-color:#F58220;border-color:#F58220;padding:9px 18px;font-size:16px;font-weight:bold;">Register</button>
									</div>
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</body>
</html>