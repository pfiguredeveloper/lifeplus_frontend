@extends('admin.layouts.app')
<style type="text/css">
    @media screen and (min-width:320px) {
        .col-sm-7 {
            width: 70.333333% !important;
        }
    }
    @media screen and (min-width:375px) {
        .col-sm-7 {
            width: 61.333333% !important;
        }
    }
    @media only screen and (min-width:425px) {
        .col-sm-7 {
            width: 56.333333% !important;
        }
    }
    @media only screen and (min-width:768px) {
        .col-sm-7 {
            width: 50.333333% !important;
        }
    }
    @media only screen and (min-width:1024px) {
        .col-sm-7 {
            width: 41.333333% !important;
        }
    }
    @media only screen and (min-width:1440px) {
        .col-sm-7 {
            width: 31.333333% !important;
        }
    }
    @media only screen and (min-width:2560px) {
        .col-sm-7 {
            width: 21.333333% !important;
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
                            <h3 class="box-title">Commission Entry <small>Add</small></h3>
                            <a href="{{ url('admin/auto-commission-entry') }}" class="btn btn-success pull-right">Auto Commission</a>
                        </div>
                        {!! Form::open(['url' => url('admin/commission-entry'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.commission-entry.form')
                            </div>

                            <div class="box-footer">
                                <button class="btn btn-info pull-right" type="submit">Save</button>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection