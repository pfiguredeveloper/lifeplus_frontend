@extends('admin.layouts.app')
<style>
    .iradio_flat-green {
        margin-bottom: 8px !important;
    }
    .mapping_table {
        display:block;
        height:300px;
        overflow-y:scroll;
        border-collapse: collapse;
        width:100%;
    }
    .mapping_table thead th {
        position: sticky;
        top: 0;
        background: #c7c7c7;
    }

    /*.mapping_table tbody {
        display:block;
        height:300px;
        overflow-y:scroll;
    }
    .mapping_table thead{
        display:table;
        width:96.8%;
        table-layout:fixed;
    }
    .mapping_table tbody tr {
        display:table;
        width:100%;
        table-layout:fixed;
    }*/

    #example5_filter label {
        font-weight:bold;
        float: left;
    }
    #example_new .tbody-model tr td {
        word-break: break-all;
    }
    #example_new .tbody-model-filter tr td {
        word-break: break-all;
    }
</style>
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{$reports['title']}} Report</h3>
                        </div>
                        <br>

                        {!! Form::model($reports, ['url' => url('admin/servicing-reports/' . $reports['id'].'/report'), 'method' => 'post', 'files'=>true, 'class' => 'form-horizontal','target'=>"_blank"]) !!}

                            <div class="box-body">
                                @include ('admin.servicing-reports.form')
                            </div>

                            <div class="box-footer">
                                <div class=" pull-right">
                                    <a href="{{ url('admin/servicing-reports') }}" ><button class="btn btn-default" type="button">Back</button></a>
                                    <button data-print-report-table="{{$reports['title']}}" data-target="#examplePrintReportModalLong" class="btn btn-info print-report-button-model" type="button" data-id-report="{{$reports['id']}}"><b>Ok</b></button>
                                </div>
                            </div>

                        {{ Form::close() }}
                        <div class="form-horizontal">
                            @include ('admin.dynamicSMSOptionAdd')
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection