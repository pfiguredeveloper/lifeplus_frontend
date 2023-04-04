@extends('admin.layouts.app')
<style type="text/css">
    @media screen and (min-width:320px) {
        .col-sm-7 {
            width: 56.333333% !important;
        }
    }
    @media screen and (min-width:375px) {
        .col-sm-7 {
            width: 46.333333% !important;
        }
    }
    @media only screen and (min-width:425px) {
        .col-sm-7 {
            width: 42.333333% !important;
        }
    }
    @media only screen and (min-width:768px) {
        .col-sm-7 {
            width: 42.333333% !important;
        }
    }
    @media only screen and (min-width:1024px) {
        .col-sm-7 {
            width: 31.333333% !important;
        }
    }
    @media only screen and (min-width:1440px) {
        .col-sm-7 {
            width: 21.333333% !important;
        }
    }
    @media only screen and (min-width:2560px) {
        .col-sm-7 {
            width: 11.333333% !important;
        }
    }
</style>
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            @include ('admin.error')

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Single Premium Posting <small>Add</small></h3>
                        </div>
                        {!! Form::open(['url' => url('admin/single-premium-posting'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.single-premium.form')
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <a class="btn btn-default" href="{{ url('admin/single-premium-posting')}}">Back</a>
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