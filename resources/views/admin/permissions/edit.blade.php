@extends('admin.layouts.app')
<style>
    .select2-container .select2-selection--single {
        height: 34px !important;
    }
</style>
@section('content')

    <div class="content-wrapper" style="min-height: 946px;">
        <section class="content-header">
            <h1>
                {{ $menu }}
                <small>Edit</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/permissions')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">EDIT Permissions</h3>
                        </div>

                        {!! Form::model($permissions, ['url' => url('admin/permissions/' . $permissions['id']), 'method' => 'patch', 'files'=>true, 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.permissions.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ url('admin/permissions') }}" ><button class="btn btn-default" type="button">Back</button></a>
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