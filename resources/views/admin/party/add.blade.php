@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Party <small>Add</small></h3>
                        </div>

                        {!! Form::open(['url' => url('admin/party-master'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal store-party-info']) !!}

                            <div class="box-body">
                                @include ('admin.party.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ url('admin/party-master') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button data-url="{{ url('admin/party-master') }}" class="btn btn-info save-party" type="button">Save</button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                        <div class="form-horizontal">
                            @include ('admin.dynamicFamilyOptionAdd')
                            @include ('admin.dynamicStatusOptionAdd')
                            @include ('admin.dynamicCityOptionAdd')
                            @include ('admin.dynamicOptionAdd')
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection