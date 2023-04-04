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
                            <h3 class="box-title">Single Premium Posting <small>Edit</small></h3>
                        </div>

                        {!! Form::model($area, ['url' => url('admin/single-premium-posting/' . $area['ARECD']), 'method' => 'patch', 'files'=>true, 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.single-premium.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ url('admin/single-premium-posting') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button class="btn btn-info " type="submit">Edit</button>
                                </div>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection