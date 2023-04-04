<!-- <?php phpinfo(); ?> -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Money Carts - Pfiger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="{{ URL::asset('assets/website/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/website/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/website/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/website/css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/website/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/website/css/owl.theme.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<style>
		.logo img {width: auto !important;background-size: contain !important;height: 85px;}
		.top-bar{background-color:#333A66;}
		.info-icon i{color:#333A66;}
		.product-box {background: #fff;padding: 25px;margin: 15px 0px;min-height: 330px;border-bottom:15px solid #EE487E;}
		.product-box .img-responsive {display: block;height: 125px;margin: auto;margin-bottom: 30px;}
		.title:after{background:#fff;}
		.title{margin-bottom:40px;}
		.footer {background: #EE487E;color: #fff;font-weight: bold;}
		.btn{border-radius:40px;}
	</style>
</head>
<body>

<div class="body-inner">
    <div id="top-bar" class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 top-social">
                    <ul class="unstyled">
                        <li>
                            <a title="Facebook" href="javascript:">
                                <span class="social-icon"><i class="fa fa-facebook"></i></span>
                            </a>
                            <a title="Twitter" href="javascript:">
                                <span class="social-icon"><i class="fa fa-twitter"></i></span>
                            </a>
                            <a title="Google+" href="javascript:">
                                <span class="social-icon"><i class="fa fa-google-plus"></i></span>
                            </a>
                            <a title="Linkdin" href="javascript:">
                                <span class="social-icon"><i class="fa fa-linkedin"></i></span>
                            </a>
                            <a title="instagram" href="javascript:">
                                <span class="social-icon"><i class="fa fa-instagram"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 top-menu ">
                    <ul class="unstyled">
                        <li><a href="javascript:">ABOUT US</a></li>
                        <li><a href="javascript:">TERMS OF USE</a></li>
                        <li><a href="javascript:">PRIVACY POLICY</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="logo col-xs-12 col-sm-2">
                    <a href="{{url('/')}}">
                        <img src="{{ URL::asset('assets/website/images/moneycartslogo.png') }}" alt="">
                    </a>
                </div>

                <div class="col-xs-12 col-sm-9 header-right">
                    <ul class="top-info">
                        <li>
                            <div class="info-box"><span class="info-icon"><i class="fa fa-map-marker">&nbsp;</i></span>
                                <div class="info-box-content">
                                    <p class="info-box-title">Pfiger Software Technologies</p>
                                    <p class="info-box-subtitle">Gurukrupa Complex,2, <br />Jalaram Plot,University Road,Rajkot - 360005</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="info-box"><span class="info-icon"><i class="fa fa-phone">&nbsp;</i></span>
                                <div class="info-box-content">
                                    <p class="info-box-title">(+91) 98251 88250</p>
                                    <p class="info-box-subtitle">pfiger@gmail.com</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="info-box"><span class="info-icon"><i class="fa fa-compass">&nbsp;</i></span>
                                <div class="info-box-content">
                                    <p class="info-box-title">10.00 - 18.00</p>
                                    <p class="info-box-subtitle">Monday to Friday</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div style="margin: -25px 0 0 0;">
                                <a href="{{url('/')}}">
                                    <img src="{{ URL::asset('assets/website/images/logo.png') }}" style="width:100%;" alt="">
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
	
    <section id="product-area" class="product-area" style="background-image:url({{ URL::asset('images/bg-home.png') }});min-height:85vh;">
        <div class="container">
            <div class="row text-center">
                <h2 class="title">
                    <span class="title-head">Wealth Management System</span>
                </h2>
            </div>

            <div class="row">
				<div class="col-md-4">
					<div class="product-box animate__animated  animate__backInDown">
						<img class="img-responsive" src="{{ URL::asset('images/life-plus-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('admin')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('register/7')}}" class="btn btn-primary" style="background-color: #e97717 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">	
					<div class="product-box animate__animated animate__backInUp">
						<img class="img-responsive" src="{{ URL::asset('images/life-auto-comision-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{env('COMM_PRODUCT_SERVICE_ENDPOINT')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('register/16')}}" class="btn btn-primary" style="background-color: #C15E28 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="product-box animate__animated  animate__backInDown">
						<img class="img-responsive" src="{{ URL::asset('images/ig-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('https://moneycarts.in/gi/public/admin/login')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #3c8476 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="product-box animate__animated animate__backInDown">
						<img class="img-responsive" src="{{ URL::asset('images/bachat-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('bachat/public/admin/login')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #c33830 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				
				<div class="col-md-4">	
					<div class="product-box animate__animated animate__backInUp">
						<img class="img-responsive" src="{{ URL::asset('images/track-mf-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #F680C6 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">	
					<div class="product-box animate__animated animate__backInUp">
						<img class="img-responsive" src="{{ URL::asset('images/asset-managemnet-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #513F99 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">	
					<div class="product-box animate__animated animate__backInUp">
						<img class="img-responsive" src="{{ URL::asset('images/fixed-deposit-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #911B50 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">	
					<div class="product-box animate__animated animate__backInUp">
						<img class="img-responsive" src="{{ URL::asset('images/stock-security-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #39B54A !important;">Sign Up</a>
						</p>
					</div>
				</div>

				<div class="col-md-4">	
					<div class="product-box animate__animated animate__backInUp">
						<img class="img-responsive" src="{{ URL::asset('images/arya-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #015FA6 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="product-box animate__animated animate__backInUp">
						<img class="img-responsive" src="{{ URL::asset('images/speed-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #231f20 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">	
					<div class="product-box animate__animated animate__backInUp">
						<img class="img-responsive" src="{{ URL::asset('images/hellow-logo.svg') }}" alt="" >
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #DD2D27 !important;">Sign Up</a>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="product-box animate__animated animate__backInUp">
						<img class="img-responsive" src="{{ URL::asset('images/sms-new.png') }}" alt="" >
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #000 !important;">Sign In</a>
						</p>
						<p align="Center">
							<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #1b8ccd !important;">Sign Up</a>
						</p>
					</div>
				</div>
			</div>
			<?php 
			/*
			<div class="col-md-12">				
				<div id="product-slide" class="owl-carousel owl-theme product-slide" style="display: block; opacity: 1;padding-bottom: 0px;">
					<div class="owl-wrapper-outer">
						<!-- width: 5952px; -->
						<div class="owl-wrapper" style="left: 0px; display: block;">
							<div class="owl-item" style="width: 185px;">
								<div class="item">
									<div class="product-item">
										<img class="img-responsive" src="{{ URL::asset('assets/website/images/insurance/Life.png') }}" alt="" style="height: 150px;display: block;margin: 0 auto;">
										<!-- <h4 class="product-title">LIFEPLUS</h4> -->
										<!-- <p class="product-desc">New Age CRM For Today"s Competitive Insurance Business. Trusted By Insurance & Investment Professional Since 1989</p> -->
										<p align="Center">
											<a href="{{url('admin')}}" class="btn btn-primary" style="background-color: #e97717 !important;">Sign In</a>
										</p>
										<p align="Center">
											<a href="{{url('register/7')}}" class="btn btn-primary" style="background-color: #e97717 !important;">Sign Up</a>
										</p>
									</div>
								</div>
							</div>

							<div class="owl-item" style="width: 185px;">
								<div class="item">
									<div class="product-item">
										<img class="img-responsive" src="{{ URL::asset('assets/website/images/insurance/GI.png') }}" alt="" style="height: 150px;display: block;margin: 0 auto;">
										<p align="Center">
											<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #3c8476 !important;">Sign In</a>
										</p>
										<p align="Center">
											<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #3c8476 !important;">Sign Up</a>
										</p>
									</div>
								</div>
							</div>

							<div class="owl-item" style="width: 185px;">
								<div class="item">
									<div class="product-item">
										<img class="img-responsive" src="{{ URL::asset('assets/website/images/insurance/Bachat.png') }}" alt="" style="height: 150px;display: block;margin: 0 auto;">
										<!-- <h4 class="product-title">BACHAT</h4> -->
										<!-- <p class="product-desc">An Ultimate Software for Postal Agents</p> -->
										<p align="Center">
											<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #c33830 !important;">Sign In</a>
										</p>
										<p align="Center">
											<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #c33830 !important;">Sign Up</a>
										</p>
									</div>
								</div>
							</div>

							<div class="owl-item" style="width: 185px;">
								<div class="item">
									<div class="product-item">
										<img class="img-responsive" src="{{ URL::asset('assets/website/images/insurance/Speed.png') }}" alt="" style="height: 150px;display: block;margin: 0 auto;">
										<!-- <h4 class="product-title">SPEED</h4> -->
										<!-- <p class="product-desc">Look Left, Look Right, Most Importantly Look Ahead...With Speed</p> -->
										<p align="Center">
											<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #231f20 !important;">Sign In</a>
										</p>
										<p align="Center">
											<a href="{{url('coming-soon')}}" class="btn btn-primary" style="background-color: #231f20 !important;">Sign Up</a>
										</p>
									</div>
								</div>
							</div>

							<div class="owl-item" style="width: 185px;">
								<div class="item">
									<div class="product-item">
										<img class="img-responsive" src="{{ URL::asset('assets/website/images/insurance/SMS2.png') }}" alt="" style="height: 150px;display: block;margin: 0 auto;">
										<!-- <h4 class="product-title">SPEED</h4> -->
										<!-- <p class="product-desc">Look Left, Look Right, Most Importantly Look Ahead...With Speed</p> -->
										<p align="Center">
											<a href="{{url('register/7')}}" class="btn btn-primary" style="background-color: #1b8ccd !important;">By Now</a>
										</p>
									</div>
								</div>
							</div>

							<!-- <div class="owl-item" style="width: 185px;">
								<div class="item">
									<div class="product-item">
										<img class="img-responsive" src="{{ URL::asset('assets/website/images/insurance/whatsapp.png') }}" alt="" style="height: 150px;display: block;margin: 0 auto;">
										<h4 class="product-title">SPEED</h4>
										<p class="product-desc">Look Left, Look Right, Most Importantly Look Ahead...With Speed</p>
										<p align="Center">
											<a href="{{url('register/2')}}" class="btn btn-primary" style="background-color: #009f01 !important;">By Now</a>
										</p>
									</div>
								</div>
							</div> -->

							<div class="owl-item" style="width: 185px;">
								<div class="item">
									<div class="product-item">
										<img class="img-responsive" src="{{ URL::asset('assets/website/images/insurance/autocomm.png') }}" alt="" style="height: 150px;display: block;margin: 0 auto;">
										<p align="Center">
											<a href="{{env('COMM_PRODUCT_SERVICE_ENDPOINT')}}" class="btn btn-primary" style="background-color: #f9c702 !important;">Sign In</a>
										</p>
										<p align="Center">
											<a href="{{url('register/7')}}" class="btn btn-primary" style="background-color: #f9c702 !important;">Sign Up</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- <div class="owl-controls clickable">
						<div class="owl-buttons">
							<div class="owl-prev">
								<i class="fa fa-angle-left"></i>
							</div>
							<div class="owl-next">
								<i class="fa fa-angle-right"></i>
							</div>
						</div>
					</div> -->
				</div>
			</div>
			*/ ?>
            </div>
        </div>
    </section>

    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
				<div class="copyright-info text-center">
					<span style="color: white;">Copyright © 2022 Pfiger Software Technologies. All Rights Reserved.</span>
				</div>
            </div>

            <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix-top" data-original-title="" title="" style="display: none;">
                <button class="btn btn-primary" title="Back to Top">
                    <i class="fa fa-angle-double-up"></i>
                </button>
            </div>
        </div>
    </footer>
</div>

</body>
</html>