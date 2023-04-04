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
        {{-- <section class="content-header">
            @include ('admin.error')

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Mode Change Action <small>Add</small></h3>
                        </div>
                        {!! Form::open(['url' => url('admin/mode-change-action'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.mode-change.form')
                            </div>

                            <div class="box-footer">
                                <button class="btn btn-info pull-right" type="submit">Save</button>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section> --}}
        <div class="row">
            <div class="col-md-12">
                 <h1 class="text-center" style="color: #F58220;font-size: 55px; padding-top:150px;font-weight: 900;">COMING SOON</h1>
             </div>
         </div>
    </div>
@endsection