@extends('admin.layouts.app')
<style>
    .mapping_table {display:block;max-height:277px;overflow-y:scroll;border-collapse: collapse;width:100%;border: 1px solid;margin-bottom: 10px !important;}
    .mapping_table thead th {position: sticky;top: 0;background: #c7c7c7;}
    #example_new .tbody-model tr td {word-break: break-all;}
    .dataTables_empty {width: 150% !important;text-align: center;}
</style>

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            @include ('admin.error')

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Multi Premium Posting <small>Add</small></h3>
                        </div>
                        {!! Form::open(['url' => url('admin/multi-premium-posting'), 'files'=>true, 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="box-body">
                                @include ('admin.multi-premium.form')
                            </div>
                            <div class="box-footer">
                                <!-- <button data-print-report-table="area" data-toggle="modal" data-target="#examplePrintReportModalLong" class="btn btn-info pull-right print-report-button-model" type="button"><b>Ok</b></button> -->
                                <div class="pull-right">
                                    <a class="btn btn-default" href="{{ url('admin/multi-premium-posting')}}">Back</a>&nbsp;
                                    <button data-print-report-table="Due Premium" data-target="#examplePrintReportModalLong" class="btn btn-info pull-right print-report-button-model" type="button" data-id-report="2"><b>Ok</b></button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection