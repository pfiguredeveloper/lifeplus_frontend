<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LifePlus | @if($menu == "Users") {{"Clients"}} @else {{ $menu }} @endif</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!-- Bootstrap 3.3.6 -->
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datepicker/datepicker3.css')}}">
    <!-- Icheck radio -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/iCheck/all.css')}}">
    <!-- SELECT  -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/skins/_all-skins.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Readex+Pro:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style type="text/css">
@media (min-width: 992px) {
  .modal-lg {
    width: 900px;
  }
}
@media (min-width: 768px) {
  .modal-xl {
    width: 90%;
   max-width:1200px;
  }
}
		body, div, p, h1, h2, h3, h4, h5, h6, b, span, li, ul, a, table, td, tr, th, input, select{
			font-family: 'Quicksand', sans-serif!important;
		}
        .select2-container .select2-selection--single {
            height: 34px !important;
        }
        .input-group-data {
            position: relative;
            display: table;
            border-collapse: separate;
        }
        .input-group-addon:hover {
            cursor: hand;
        }
        .modal {
          overflow-y:auto !important;
        }
        .menu_title_client {
            float: left !important;margin-left: 370px !important;font-size: 18px;
        }
        .menu-font{font-size: 16px;}
        .navbar-logo{width: 115px;height: 36px;}
        @media screen and (max-width:1024px) {
            .menu_title_client {
                float: left !important;margin-left: 250px !important;
            }
            .menu-font{font-size: 14px;}
            .nav>li>a{padding: 15px 10px;}
            .navbar-logo{width: 100px;height: 36px;}
        }
        @media screen and (max-width:768px) {
            .menu_title_client {
                float: left !important;margin-left: 130px !important;font-size: 15px !important;
            }
        }
        @media screen and (max-width:425px) {
            .menu_title_client {
                float: left !important;margin-left: 100px !important;
            }
        }
        @media screen and (max-width:375px) {
            .menu_title_client {
                float: left !important;margin-left: 85px !important;
            }
        }
        @media screen and (max-width:320px) {
            .menu_title_client {
                float: left !important;margin-left: 55px !important;font-size: 15px !important;
            }
        }
        #example2 thead tr th{background-color: #c7c7c7 !important;}
        .index-edit-button{color: #fff;background-color: #00a65a;border-color: #008d4c;border-radius: 3px;box-shadow: none;border: 1px solid transparent;}
        .index-delete-button{color: #fff;background-color: #ac2925;border-color: #761c19;border-radius: 3px;box-shadow: none;border: 1px solid transparent;}
        .index-print-button{color: #fff;background-color: #0a58ca;border-color: #0a53be;border-radius: 3px;box-shadow: none;border: 1px solid transparent;}
        .dropdown-submenu .dropdown-menu{top: 0;left: 100%;margin-top: 31px;}
		.navbar-header{min-height:100px;}
    </style>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Bootstrap datatable -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}">
	<style>
		.main-header{max-height:250px;}
		.navbar-nav>.user-menu .user-image{width:40px;height:40px;margin-top:-7px;}
		.skin-blue .main-header .navbar{background-color:#000; }
		.skin-blue .main-header .navbar .fa{color:#F58220;font-size:40px;}
		.skin-blue .main-header li.user-header{background-color:#000;}
		.box.box-info{border-top-color:#000;}
		.box-header{background-color:#fbfbfb;color:#000;}
		thead th{background-color:#000!important;color:#fff!important;}
		#example2 thead tr th{background-color:#000!important;color:#fff!important;}
		.box{border-top:3px solid #000;}
		.nav li{min-width:150px;}
		li.active{background-color:#F58220;}
		.skin-blue .main-header .navbar li.active .fa{color:#fff;}
	</style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <!-- Header Navbar: style can be found in header.less -->
        <?php 
            $cId        = Auth::user()->c_id;
            $cpTitle    = Auth::user()->cp_title;
            $clientData = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$cId} limit 1"); 


               $productdata = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client_product where c_id = {$cId} limit 1"); 



        ?>

        <nav class="navbar navbar-static-top" style="text-align: center;background-color:seashell;">
            <div class="container" style="width:100%;">
                <div class="navbar-header">
                    <a href="{{ url('admin/dashboard') }}" class="navbar-brand" style="padding: 7px 15px;"><img src="{{ URL::asset('assets/website/images/moneycartslogo.png') }}" alt="" style="width: auto;height: 75px;"></a>
					<a href="{{ url('admin/dashboard') }}" class="navbar-brand" style="padding: 7px 5px;"><img src="{{ URL::asset('assets/website/images/Life.png') }}" style="width: auto;height: 75px;" alt=""></a>
                </div>
                <button type="button" class="btn btn-warning" style="margin-top: 30px;background-color: seashell;border-color: seashell;color: black;cursor: context-menu;"><b>{{ !empty($cpTitle) ? $cpTitle : '' }}</b></button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 30px;float: right;">
                    <b>Life Insurance Companies</b>
                </button>
            </div>
        </nav>
		<div class="navbar-header" style="display:none;">
                    <a href="{{ url('admin/dashboard') }}" class="navbar-brand" style="padding: 7px 5px;"><img src="{{ URL::asset('assets/website/images/Life.png') }}" class="navbar-logo" alt=""></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                </div>
        <nav class="navbar navbar-static-top">
            <div class="container" style="width:100%;">
                

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="@if(!empty($menu) && $menu=='Dashboard') active @endif text-center">
                            <a href="{{ url('admin/dashboard') }}" class="menu-font">
                                <i class="fa fa-dashboard"></i> <div style="margin-top:8px;">Dashboard</div>
                            </a>
                        </li>
                        <?php 
                            $cId            = Auth::user()->c_id;
                            $clientWiseMenu = \DB::connection('lifecell_lic')->select("SELECT * FROM client_wise_menu_setup where client_id = {$cId}");
                            if(!empty($clientWiseMenu) && count($clientWiseMenu) > 0) {
                                $masterMenu = [];
                                foreach($clientWiseMenu as $key => $value) {
                                    $clientMenu = \DB::connection('lifecell_users')->select("SELECT * FROM main_menus where id = {$value->menu_id} AND parent_id = 0 AND menu_enabled = 1 AND product_id = 7 limit 1");
                                    if(!empty($clientMenu[0])) {
                                        $masterMenu[] = [
                                            'id'        => !empty($clientMenu[0]->id) ? $clientMenu[0]->id : "",
                                            'menu_name' => !empty($clientMenu[0]->menu_name) ? $clientMenu[0]->menu_name : "",
                                            'menu_url'  => !empty($clientMenu[0]->menu_url) ? $clientMenu[0]->menu_url : "",
                                            'icon'      => !empty($clientMenu[0]->icon) ? $clientMenu[0]->icon : "",
                                            'ordering'  => !empty($value->ordering) ? $value->ordering : 0,
                                        ];
                                    }
                                }
                                if(!empty($masterMenu)) {
                                    array_multisort(array_column($masterMenu, 'ordering'), SORT_ASC, $masterMenu);
                                }
                            }
                        ?>
                        @foreach($masterMenu as $key => $value)
                            <li class="@if($menu==$value['menu_name']) active @endif text-center">
                                <a href="{{ url('admin/'.$value['id'].'/'.$value['menu_url']) }}" class="menu-font">
                                    <i class="{{$value['icon']}}"></i> <div style="margin-top:8px;">{{$value['menu_name']}}</div>
                                </a>
                            </li>
                        @endforeach

                        <!-- <li class="dropdown @if(!empty($mainmenu) && $mainmenu=='Master') active  @endif">
                            <a href="#" class="dropdown-toggle menu-font" data-toggle="dropdown">
                                <i class="fa fa-newspaper-o"></i> <span><?php echo "&nbsp;" ?>Master</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @can('do_access')
                                    <li class="@if(isset($menu) && $menu=='Developement Office') active @endif">
                                        <a href="{{ url('admin/do-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Developement Office</a>
                                    </li>
                                @endcan
                                @can('party_access')
                                    <li class="@if(isset($menu) && $menu=='Party') active @endif">
                                        <a href="{{ url('admin/party-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Party</a>
                                    </li>
                                @endcan
                                @can('agency_access')
                                    <li class="@if(isset($menu) && $menu=='Agency') active @endif">
                                        <a href="{{ url('admin/agency-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Agency</a>
                                    </li>
                                @endcan
                                @can('area_access')
                                    <li class="@if(isset($menu) && $menu=='Area') active @endif">
                                        <a href="{{ url('admin/area-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Area</a>
                                    </li>
                                @endcan
                                @can('paidby_access')
                                    <li class="@if(isset($menu) && $menu=='Paid By') active @endif">
                                        <a href="{{ url('admin/paidby-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Paid By</a>
                                    </li>
                                @endcan
                                @can('pacode_access')
                                    <li class="@if(isset($menu) && $menu=='P.A. Code') active @endif">
                                        <a href="{{ url('admin/pacode-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>P.A. Code</a>
                                    </li>
                                @endcan
                                @can('caption_access')
                                    <li class="@if(isset($menu) && $menu=='Caption') active @endif">
                                        <a href="{{ url('admin/caption-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Caption</a>
                                    </li>
                                @endcan
                                @can('relation_access')
                                    <li class="@if(isset($menu) && $menu=='Relation') active @endif">
                                        <a href="{{ url('admin/relation-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Relation</a>
                                    </li>
                                @endcan
                                @can('bank_access')
                                    <li class="@if(isset($menu) && $menu=='Bank') active @endif">
                                        <a href="{{ url('admin/bank-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Bank</a>
                                    </li>
                                @endcan
                                @can('branch_access')
                                    <li class="@if(isset($menu) && $menu=='Branch') active @endif">
                                        <a href="{{ url('admin/branch-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Branch</a>
                                    </li>
                                @endcan
                                @can('doctor_access')
                                    <li class="@if(isset($menu) && $menu=='Doctor') active @endif">
                                        <a href="{{ url('admin/doctor-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Doctor</a>
                                    </li>
                                @endcan
                                @can('caste_access')
                                    <li class="@if(isset($menu) && $menu=='Caste') active @endif">
                                        <a href="{{ url('admin/caste-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Caste</a>
                                    </li>
                                @endcan
                                @can('gender_access')
                                    <li class="@if(isset($menu) && $menu=='Gender') active @endif">
                                        <a href="{{ url('admin/gender-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Gender</a>
                                    </li>
                                @endcan
                                @can('status_access')
                                    <li class="@if(isset($menu) && $menu=='Status') active @endif">
                                        <a href="{{ url('admin/status-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Status</a>
                                    </li>
                                @endcan
                                @can('articals_access')
                                    <li class="@if(isset($menu) && $menu=='Articals') active @endif">
                                        <a href="{{ url('admin/articals-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Articals</a>
                                    </li>
                                @endcan
                                @can('country_access')
                                    <li class="@if(isset($menu) && $menu=='Country') active @endif">
                                        <a href="{{ url('admin/country-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Country</a>
                                    </li>
                                @endcan
                                @can('state_access')
                                    <li class="@if(isset($menu) && $menu=='State') active @endif">
                                        <a href="{{ url('admin/state-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>State</a>
                                    </li>
                                @endcan
                                @can('district_access')
                                    <li class="@if(isset($menu) && $menu=='District') active @endif">
                                        <a href="{{ url('admin/district-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>District</a>
                                    </li>
                                @endcan
                                @can('city_access')
                                    <li class="@if(isset($menu) && $menu=='City') active @endif">
                                        <a href="{{ url('admin/city-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>City</a>
                                    </li>
                                @endcan
                                @can('familygroup_access')
                                    <li class="@if(isset($menu) && $menu=='Family Group') active @endif">
                                        <a href="{{ url('admin/familygroup-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>Family Group</a>
                                    </li>
                                @endcan
                                @can('smsformat_access')
                                    <li class="@if(isset($menu) && $menu=='SMS Format') active @endif">
                                        <a href="{{ url('admin/smsformat-master') }}" class="menu-font"><i class="fa fa-circle-o"></i>SMS Format</a>
                                    </li>
                                @endcan
                                
                            </ul>
                        </li> -->
                        
                        <!-- <li class="dropdown @if(!empty($mainmenu) && $mainmenu=='Transaction') active @endif">
                            <a href="#" class="dropdown-toggle menu-font" data-toggle="dropdown">
                                <i class="fa fa-plus-square-o"></i> <span>Transaction</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @can('policy_access')
                                    <li class="@if(isset($menu) && $menu=='Policy') active @endif">
                                        <a href="{{ url('admin/policy') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>Policy Entry</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('policy_access')
                                    <li class="dropdown-submenu @if(!empty($mainmenusub) && $mainmenusub=='Premium Posting') active @endif" style="height: auto;font-size: 16px;">
                                        <a href="#" class="test menu-font">
                                            <i class="fa fa-circle-o"></i><span>Premium Posting</span>
                                            <i class="fa fa-caret-right"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="submenu">
                                            <li class="@if(isset($menu) && $menu=='Multi Premium Posting') active @endif">
                                                <a href="{{ url('admin/multi-premium-posting/create') }}" class="menu-font">
                                                    <i class="fa fa-circle-o"></i><span>Multi Premium Posting</span>
                                                </a>
                                            </li>
                                            <li class="@if(isset($menu) && $menu=='Single Premium Posting') active @endif">
                                                <a href="{{ url('admin/single-premium-posting/create') }}" class="menu-font">
                                                    <i class="fa fa-circle-o"></i><span>Single Premium Posting</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endcan
                                @can('policy_access')
                                    <li class="@if(isset($menu) && $menu=='Commission Entry') active @endif">
                                        <a href="{{ url('admin/commission-entry/create') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>Commission Entry</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('policy_access')
                                    <li class="@if(isset($menu) && $menu=='Mode Change Action') active @endif">
                                        <a href="{{ url('admin/mode-change-action/create') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>Mode Change Action</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('policy_access')
                                    <li class="@if(isset($menu) && $menu=='Loan Entry') active @endif">
                                        <a href="{{ url('admin/loan-entry/create') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>Loan Entry</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li> -->
                        
                        <!-- <li class="dropdown @if(!empty($mainmenu) && $mainmenu=='Reports') active  @endif">
                            <a href="#" class="dropdown-toggle menu-font" data-toggle="dropdown">
                                <i class="fa fa-flag"></i> <span>Reports</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @can('multipolicy_access')
                                    <li class="@if(isset($menu) && $menu=='Multi Policy') active @endif">
                                        <a href="{{ url('admin/multi-policy') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>Multi-Plan Presentation</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('servicing_reports_access')
                                    <li class="@if(isset($menu) && $menu=='Servicing Reports') active @endif">
                                        <a href="{{ url('admin/servicing-reports') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>Servicing Reports</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li> -->

                        <!-- <li class="dropdown @if(!empty($mainmenu) && $mainmenu=='Configuration') active  @endif">
                            <a href="#" class="dropdown-toggle menu-font" data-toggle="dropdown">
                                <i class="fa fa-cogs"></i> <span>Configuration</span>
                                <span class="caret"></span>
                            </a>
                            <?php
                                $cId = Auth::user()->c_id;
                                $mIDdata = \DB::connection('lifecell_lic')->select("SELECT id FROM setup_marketing_reports where client_id = {$cId} limit 1");
                                $mID = !empty($mIDdata[0]) ? $mIDdata[0]->id : '';

                                $sIDdata = \DB::connection('lifecell_lic')->select("SELECT id FROM setup_servicing_reports where client_id = {$cId} limit 1");
                                $sID = !empty($sIDdata[0]) ? $sIDdata[0]->id : '';

                                $pIDdata = \DB::connection('lifecell_lic')->select("SELECT id FROM setup_plan where client_id = {$cId} limit 1");
                                $pID = !empty($pIDdata[0]) ? $pIDdata[0]->id : '';

                                $rIDdata = \DB::connection('lifecell_lic')->select("SELECT id FROM setup_reminder where client_id = {$cId} limit 1");
                                $rID = !empty($rIDdata[0]) ? $rIDdata[0]->id : '';
                            ?>
                            <ul class="dropdown-menu" role="menu">
                                @can('multipolicy_access')
                                    <li class="@if(isset($menu) && $menu=='Plan Setup') active @endif">
                                        <a href="{{ url('admin/plan-setup/'.$pID.'/edit') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>Plan Setup</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('gst_setup_access')
                                    <li class="@if(isset($menu) && $menu=='GST Rate Setup') active @endif">
                                        <a href="{{ url('admin/gst-setup') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>GST Rate Setup</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('multipolicy_access')
                                    <li class="@if(isset($menu) && $menu=='Report Setup') active @endif">
                                        <a href="{{ url('admin/servicing-reports-setup/'.$sID.'/edit') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>Report Setup</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('multipolicy_access')
                                    <li class="@if(isset($menu) && $menu=='Reminder Setup') active @endif">
                                        <a href="{{ url('admin/reminder-setup/'.$rID.'/edit') }}" class="menu-font">
                                            <i class="fa fa-circle-o"></i><span>Reminder Setup</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding:39px;">
                                <img src="{{ URL::asset('assets/dist/img/avatar.png') }}" class="user-image"
                                     alt="User Image">
                                <span class="hidden-xs">{{ (!empty($clientData[0]) && $clientData[0]->c_name) ? $clientData[0]->c_name : '' }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="{{ URL::asset('assets/dist/img/avatar.png') }}" class="img-circle"
                                         alt="User Image">
                                    <p >
                                        {{ $user = Auth::user()->cp_email }} <br>
                                        <small></small>
                                    </p>

                                    <p style="font-size: 13px !important;">

                                        <?php 
                                        $date=$productdata[0]->cp_license_exp_dt;
                                        ?>
                                        License Expiry Date : <?php echo date("d-m-Y", strtotime($date)); ?>  <br>
                                        <small></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ url('admin/users/'.$user = Auth::user()->c_id).'/edit' }}"
                                           class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    
    <!-- Content Wrapper. Contains page content -->
    @yield('content')

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Select Life Insurance Companies</b></h4>
                </div>
                {{ Form::open(array('url' => 'admin/save-policy-insurance-id', 'method' => 'post','style'=>'display:inline')) }}
                <!-- <form action="{{url('admin/save-policy-insurance-id')}}" method="post"> -->
                    <div class="modal-body">
                        <?php 
                            $policyInsuranceData = \DB::connection('lifecell_lic')->select("SELECT * FROM life_insurance");
                            $policyInsurance = [];
                            if(!empty($policyInsuranceData)) {
                                foreach ($policyInsuranceData as $key => $value) {
                                    $policyInsurance[$value->policy_insurance_id] = !empty($value->company_name) ? $value->company_name : "";
                                }
                            }
                        ?>
                        <div class="form-group" style="margin-bottom: 40px !important;">
                            <label class="col-sm-2 control-label" style="margin-top: 5px !important;"></label>
                            <div class="col-sm-8" style="margin-bottom: 10px;">
                                {!! Form::select('policy_insurance_id', $policyInsurance, (!empty($clientData[0]) && $clientData[0]->policy_insurance_id) ? $clientData[0]->policy_insurance_id : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                {{ Form::close() }}
                <!-- </form> -->
            </div>
        </div>
    </div>
            <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>LifePlus</strong>
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@if(empty($policySec))
<!-- jQuery 2.2.0 -->
<script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
@endif
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
    $('.calltype').click(function () {
        alert(this.val());
    });
</script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap datatables -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>

<script>
    $(function () {

        $(".select2").select2();
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
        $("#example1").DataTable();
        $("#example3").DataTable({"paging": false});
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "aaSorting": []
        });

        dTable = $('#example_new').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            "dom": "lrtip",
            "aaSorting": []
        });

        $('#example_new1').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            "dom": "lrtip",
            "aaSorting": []
        });

        $('#myCustomSearchBox').keyup(function() {
            dTable.search($(this).val()).draw(); // this  is for customized searchbox with datatable search feature.
        })
         
        $('#reservation').daterangepicker({
            format: 'YYYY/MM/DD'
        });

        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            autoclose: true
        });

        $('.datepicker1').datepicker({
            format: 'mm/yyyy',
            autoclose: true
        });

        $('.datepicker8').datepicker({
            format: 'mm/yyyy',
            viewMode: "months",
            minViewMode: "months",
            autoclose: true
        });

        $('.datepicker2').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        $('.datepicker3').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });

        $(".timepicker").timepicker({
            showInputs: false,
            showMeridian: false,
        });
    });

    $(document).on('click','.index-delete-button',function(){
        var deleteID = $(this).attr("data-delete-id");
        $('#delete_record_id').val(deleteID);
    });
</script>
@yield('jquery')
        <!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/iCheck/icheck.min.js')}}"></script>
<!-- Morris.js charts -->
<!-- InputMask -->
<script src="{{ URL::asset('assets/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script> -->
<!-- Sparkline -->
<script src="{{ URL::asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('assets/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ URL::asset('assets/dist/js/pages/dashboard.js')}}"></script> -->

<script src="{{ URL::asset('assets/dist/js/demo.js')}}"></script>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });

    /* Remove 0000-00-00 date */
    $("input.datepicker3").each(function(){
        if($(this).val()=="30/11/-0001"){
            $(this).val(null);
        }
  });
});
</script>
<script>
   function loadPreview(input) {
       var data = $(input)[0].files; //this file data
       $.each(data, function(index, file){
           if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
               var fRead = new FileReader();
               fRead.onload = (function(file){
                   return function(e) {
                       var img = $('<img height=200 width=200 style="margin-top:5px;" />').addClass('thumb').attr('src', e.target.result); //create image thumb element
                       $('#thumb-output').append(img);
                   };
               })(file);
               fRead.readAsDataURL(file);
           }
       });
   }
</script>
</body>
</html>
