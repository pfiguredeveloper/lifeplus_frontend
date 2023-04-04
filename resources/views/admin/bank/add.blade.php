@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Bank <small>Add</small></h3>
                        </div>

                        {!! Form::open(['url' => url('admin/bank-master'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.bank.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ url('admin/bank-master') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button class="btn btn-info" type="submit">Save</button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                        <div class="form-horizontal">
                            @include ('admin.dynamicCityOptionAdd')
                            @include ('admin.dynamicOptionAdd')
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection