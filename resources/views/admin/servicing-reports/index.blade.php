@extends('admin.layouts.app')
@section('content')

    <style type="text/css">
        .btn-menu-main {white-space: normal !important;padding: 32px 0px !important;margin: 4px;width: 150px !important;height: 120px !important;}
        .button-font-size {font-size: 15px !important;}
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $menu }}
                <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/servicing-reports')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
            </ol>

            <br>

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Servicing Reports</h3>
                            <hr style="margin-bottom: 0px;margin-top: 10px;">
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p style="text-align: center;">
                                        @if(!empty($reports) && count($reports) > 0)
                                            @foreach($reports as $key => $value)
                                                @if($value['id'] != 11)
                                                    <a href="{{ url('admin/servicing-reports/'.$value['id'].'/edit') }}" class="btn btn-squared-default btn-menu-main" style="background-color: #f4f4f4;border-color: #5a5a5a;color: #666;">
                                                        <i class="{{$value['icon']}} fa-2x"></i>
                                                        <br>
                                                        <span class="button-font-size"><b>{{$value['title']}}</b></span>
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection