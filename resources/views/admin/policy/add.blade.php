@extends('admin.layouts.app')
<style>
    #DisplayDiv{width: 150;height: 135px;border: 1px solid black;}
    .form-control{padding:0px !important;padding-left: 5px !important;}
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {padding: 3px !important;}
    .panel-heading{padding: 6px 15px !important;}
</style>

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Policy <small>Add</small></h3>
                        </div>

                        {!! Form::open(['url' => url('admin/policy'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal store-policy-info']) !!}

                            <div class="box-body">
                                @include ('admin.policy.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ url('admin/policy') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button data-url="{{ url('admin/policy') }}" class="btn btn-info save-policy" type="button">Add</button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                        <div class="form-horizontal">
                            @include ('admin.dynamicPartyOptionAdd')
                            @include ('admin.dynamicAgencyOptionAdd')
                            @include ('admin.dynamicFamilyOptionAdd')
                            @include ('admin.dynamicDoctorOptionAdd')
                            @include ('admin.dynamicBankOptionAdd')
                            @include ('admin.dynamicCityOptionAdd')
                            @include ('admin.dynamicOptionAdd')
                            @include ('admin.dynamicBranchOptionAdd')
                            @include ('admin.dynamicStatusOptionAdd')
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection