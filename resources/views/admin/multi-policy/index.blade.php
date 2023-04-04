@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Multi-Plan Presentation
                <small>Management</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin/multi-policy')}}"><i class="fa fa-dashboard"></i> Multi-Plan Presentation</a></li>
            </ol>

            <br>
            @include ('admin.error')

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        @can('multipolicy_create')
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ url('admin/multi-policy/create/') }}" ><button class="btn bg-orange margin" type="button">Add Multi-Plan</button></a></h3>
                        </div>
                        @endcan

                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Quot. No.</th>
                                    <th>Quot. Dt.</th>
                                    <th>Name - 1</th>
                                    <th>AgName</th>
                                    <th>Report Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($policy as $list)
                                    <tr>
                                        <td>{{ $list['QUOTNO'] }} </td>
                                        <td>{{ $list['QUOTDT'] }}</td>
                                        <?php
                                            $party = '';
                                            if(!empty($list['NAME1']) && $list['NAME1'] > 0) {
                                                $partydata = \DB::connection('lifecell_lic')->select("SELECT NAME FROM party where GCODE = {$list['NAME1']} limit 1");
                                                $party = !empty($partydata[0]) ? $partydata[0]->NAME : '';
                                            }
                                        ?>
                                        <td>{{ $party }}</td>
                                        <?php
                                            $agency = '';
                                            if(!empty($list['AFILE']) && $list['AFILE'] > 0) {
                                                $agencydata = \DB::connection('lifecell_lic')->select("SELECT ANAME FROM agency where AFILE = {$list['AFILE']} limit 1");
                                                $agency = !empty($agencydata[0]) ? $agencydata[0]->ANAME : '';
                                            }
                                        ?>
                                        <td>{{ $agency }}</td>
                                        <?php
                                            $plan = '';
                                            if(!empty($list['PLAN']) && $list['PLAN'] > 0) {
                                                $plandata = \DB::connection('lifecell')->select("SELECT plannm FROM plan where planid = {$list['PLAN']} limit 1");
                                                $plan = !empty($plandata[0]) ? $plandata[0]->plannm : '';
                                            }
                                        ?>
                                        <td>{{ $plan }}</td>
                                        <td>
                                            <div class="btn-group-horizontal">
                                                @can('multipolicy_edit')
                                                {{ Form::open(array('url' => 'admin/multi-policy/'.$list['PUNIQID'].'/edit', 'method' => 'get','style'=>'display:inline')) }}
                                                <button class="index-edit-button" type="submit" ><i class="fa fa-edit"></i></button>
                                                {{ Form::close() }}
                                                @endcan
                                                @can('multipolicy_delete')
                                                <button class="index-delete-button" data-delete-id="{{$list['PUNIQID']}}" type="button" data-toggle="modal" data-target="#myModal_DELETE" style="margin: 2px 0px"><i class="fa fa-trash"></i></button>
                                                @endcan
                                                @can('multipolicy_delete')
                                                <button class="index-print-button" data-print-id="{{$list['PUNIQID']}}" type="button" data-toggle="modal" data-target="#myModal_PRINT" style="margin: 2px 0px"><i class="fa fa-print"></i></button>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                             @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="myModal_DELETE" class="fade modal modal-danger" role="dialog" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Policy</h4>
                    </div>
                    <form action="{{route('multi-policy.destroy','test')}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                      <div class="modal-body">
                            <p class="text-center">
                                Are you sure you want to delete this?
                            </p>
                            <input type="hidden" name="delete_record_id" id="delete_record_id" value="">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-warning">Yes, Delete</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>

        <div id="myModal_PRINT" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal_PRINT" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Quotation Print Setup</h4>
                    </div>
                    <form action="{{ url('admin/multi-policy/presentation/') }}" method="post" target="_blank">
                        {{csrf_field()}}
                        <div class="modal-body row form-horizontal">
                            <div class="form-group" style="margin-bottom: 6px;">
                                <label class="col-sm-2 control-label">Quotation No.</label>
                                <div class="col-sm-2">
                                    {!! Form::text('BANK', "2", ['class' => 'form-control','id'=>"bankName",'readonly']) !!}
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 6px;">
                                <label class="col-sm-2 control-label">Report Title</label>
                                <div class="col-sm-7">
                                    {!! Form::text('ss', "MULTI PLAN PRESENTATION", ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4" style="border: 1px solid black;padding-top: 10px;padding-bottom: 14px;">
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-8 control-label" style="text-align: left;">Loan Relnv.Rate</label>
                                        <div class="col-sm-4">
                                            {!! Form::number('ss', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Use Loan in Short Fall</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-8 control-label" style="text-align: left;">Loan Taken Year(From)</label>
                                        <div class="col-sm-4">
                                            {!! Form::number('ss', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Graph</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border: 1px solid black;padding-top: 10px;margin-left: 6px;padding-bottom: 21px;">
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-8 control-label" style="text-align: left;">MB Relnv.Rate</label>
                                        <div class="col-sm-4">
                                            {!! Form::number('ss', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Use MB in ShortFall</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Use MB Plan Loan in ShortFall</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Re-Inv.Mat.(M.B. Re-Inv.)?</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="border: 1px solid black;padding-top: 10px;margin-left: 6px;width: 31% !important;">
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-8 control-label" style="text-align: left;">IncomeTax Slab</label>
                                        <div class="col-sm-4">
                                            {!! Form::number('ss', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-8 control-label" style="text-align: left;">Dedu.Amt.Slab</label>
                                        <div class="col-sm-4">
                                            {!! Form::number('ss', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-8 control-label" style="text-align: left;">Tax Save Amt.</label>
                                        <div class="col-sm-4">
                                            {!! Form::number('ss', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-8 control-label" style="text-align: left;">Language</label>
                                        <div class="col-sm-4">
                                            {!! Form::number('ss', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12" style="padding-top:10px;">
                                <div class="col-md-4" style="border: 1px solid black;padding-top: 10px;">
                                    <div class="form-group">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Yield on Claim</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Plan wise Yield</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Yield in Summary Page</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border: 1px solid black;padding-top: 10px;margin-left: 6px;">
                                    <div class="form-group">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Calculate Loyalty Addition</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Want Cash Value?</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('cash_value', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Want Different Summary Page?</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top:10px;">
                                <div class="col-md-4" style="border: 1px solid black;padding-top: 10px;">
                                    <div class="form-group" style="margin-bottom: 6px;" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Risk,Tax & Cash Flow</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Loan Reinvestment</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Money Back Reinvestment</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-8 control-label" style="text-align: left;">Report Color Scheme</label>
                                        <div class="col-sm-4">
                                            {!! Form::select('report_color', ['blue'=>'Blue','red'=>'Red','green'=>'Green','pink'=>'Pink','crimson'=>'Crimson','maroon'=>'Maroon','brown'=>'Brown','salmon'=>'Salmon','coral'=>'Coral','chocolate'=>'Chocolate','orange'=>'Orange','gold'=>'Gold','yellow'=>'Yellow'], null, ['class' => 'form-control', 'style' => 'height: 25px;padding: 0px;text-align: right;width: 100%']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="border: 1px solid black;padding-top: 10px;margin-left: 6px;">
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Summary of Proposed Insurance</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>  
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">ShortFall Chart</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 6px;">
                                        <label class="col-sm-10 control-label" style="text-align: left;">Summary of Short Fall Chart</label>
                                        <div class="col-sm-2">
                                            {!! Form::checkbox('ss', 1,true, ['style'=>'margin-top: 8px;']) !!}
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="PUNIQID" value="" id="PUNIQID_ADD">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Preview</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Exit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on("click", ".index-print-button", function () {
        var PUNIQID = $(this).data('print-id');
        $('#PUNIQID_ADD').val(PUNIQID);
    });
</script>