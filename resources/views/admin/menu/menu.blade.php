@extends('admin.layouts.app')
@section('content')

    <style type="text/css">
        .btn-menu-main {white-space: normal !important;padding: 22px 0px !important;margin: 4px;width: 150px !important;height: 120px !important;}
        .button-font-size {font-size: 15px !important;}
        .box-header {padding-bottom: 0px !important;}
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{$menu}} Menu</h3>
                            <hr style="margin-bottom: 0px;margin-top: 10px;">
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p style="text-align: center;">
                                        <?php
                                            $cId = Auth::user()->c_id;
                                            $sIDdata = \DB::connection('lifecell_lic')->select("SELECT id FROM setup_servicing_reports where client_id = {$cId} limit 1");
                                            $sID = !empty($sIDdata[0]) ? $sIDdata[0]->id : '';

                                            $pIDdata = \DB::connection('lifecell_lic')->select("SELECT id FROM setup_plan where client_id = {$cId} limit 1");
                                            $pID = !empty($pIDdata[0]) ? $pIDdata[0]->id : '';

                                            $rIDdata = \DB::connection('lifecell_lic')->select("SELECT id FROM setup_reminder where client_id = {$cId} limit 1");
                                            $rID = !empty($rIDdata[0]) ? $rIDdata[0]->id : '';
                                        ?>

                                        @foreach($getMenu as $key => $value)
                                            @if($value['parent_id'] == 4 && $value['menu_url'] == 'plan-setup')
                                                <?php $url = 'admin/'.$value['menu_url'].'/'.$pID.'/edit'; ?>
                                            @elseif($value['parent_id'] == 4 && $value['menu_url'] == 'servicing-reports-setup')
                                                <?php $url = 'admin/'.$value['menu_url'].'/'.$sID.'/edit'; ?>
                                            @elseif($value['parent_id'] == 4 && $value['menu_url'] == 'reminder-setup')
                                                <?php $url = 'admin/'.$value['menu_url'].'/'.$rID.'/edit'; ?>
                                            @else
                                                <?php $url = 'admin/'.$value['menu_url']; ?>
                                            @endif
                                            <a href="{{ url($url) }}" class="btn btn-squared-default btn-menu-main" style="background-color: #f9f9f9;border-color: #e5e5e5;color: #000;">
                                                <i class="{{$value['icon']}} fa-3x"></i>
                                                <br>
                                                <span class="button-font-size"><b>{{$value['menu_name']}}</b></span>
                                            </a>
                                        @endforeach
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