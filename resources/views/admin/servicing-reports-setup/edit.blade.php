@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            @include ('admin.error')
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Report Setup <small>Add</small></h3>
                        </div>

                        {!! Form::model($reports, ['url' => url('admin/servicing-reports-setup/' . $reports['id']), 'method' => 'patch', 'files'=>true, 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.servicing-reports-setup.form')
                            </div>

                            <div class="box-footer">
                                <button class="btn btn-info pull-right" type="submit">Save</button>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection