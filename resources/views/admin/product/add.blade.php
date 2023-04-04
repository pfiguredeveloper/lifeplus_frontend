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
                <small>Add</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/product-master')}}"><i class="fa fa-dashboard"></i> {{ $menu }}</a></li>
                <li class="active">Add</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">ADD Product</h3>
                        </div>

                        {!! Form::open(['url' => url('admin/product-master'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.product.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ url('admin/product-master') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button class="btn btn-info" type="submit">Save</button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection