@extends('admin.layouts.app')
<style>
    #DisplayDiv{width: 150;height: 135px;border: 1px solid black;}
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
                            <h3 class="box-title">Agency<small>Edit</small></h3>
                        </div>

                        {!! Form::model($agency, ['url' => url('admin/agency-master/' . $agency['AFILE']), 'method' => 'patch', 'files'=>true, 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.agency.form')
                            </div>

                            <div class="box-footer">
                                <div class=" pull-right">
                                    <a href="{{ url('admin/agency-master') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button class="btn btn-info" type="submit">Edit</button>
                                </div>
                            </div>

                        {{ Form::close() }}
                        <div class="form-horizontal">
                            @include ('admin.dynamicBankOptionAdd')
                            @include ('admin.dynamicBranchOptionAdd')
                            @include ('admin.dynamicCityOptionAdd')
                            @include ('admin.dynamicOptionAdd')
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection