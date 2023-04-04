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
                            <h3 class="box-title">Paid By <small>Edit</small></h3>
                        </div>

                        {!! Form::model($paidby, ['url' => url('admin/paidby-master/' . $paidby['PAIDBYID']), 'method' => 'patch', 'files'=>true, 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.paidby.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ url('admin/paidby-master') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button class="btn btn-info" type="submit">Edit</button>
                                </div>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection