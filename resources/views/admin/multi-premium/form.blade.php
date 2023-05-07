<div class="form-group">
    <label class="col-sm-5 control-label" style="font-size: 16px;">Due Premium From Date</label>
    <div class="col-sm-2">
        {!! Form::text('due_date',date('01/m/Y'), ['class' => 'form-control datepicker3 fromDate','placeholder' => 'dd/mm/yyyy']) !!}
        @if ($errors->has('due_date'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('due_date') }}</strong>
            </span>
        @endif
    </div>
</div>



<div class="form-group">
    <label class="col-sm-5 control-label" style="font-size: 16px;">Due Premium To Date</label>
    <div class="col-sm-2">
        {!! Form::text('due_date',date('t/m/Y'), ['class' => 'form-control datepicker3 todate','placeholder' => 'dd/mm/yyyy']) !!}
        @if ($errors->has('due_date'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('due_date') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
    <label class="col-sm-5 control-label" style="font-size: 16px;">Include ECS Facility Due?</label>
    <div class="col-sm-2">
        {!! Form::checkbox('ecs_due',null,false,['style'=>'margin-top: 11px;']) !!}
    </div>
</div>

@if(!empty($filter) && count($filter) > 0)
<div class="form-group">
    <label class="col-sm-5 control-label" style="font-size: 16px;">Filter</label>
    <div class="col-sm-3">
	    <table style="filter: alpha(opacity=40); opacity: 0.95;border:1px #ddd solid;border-collapse: inherit;">
    		<tbody>
    			<?php $i = 0; ?>
		    	@foreach ($filter as $key => $value)
		    		@if($i%2 == 0)
		    		<tr>
		    		@endif
		    			<td style="padding-bottom: 10px;padding-top: 7px;">
				    		<span style="margin-left: 5px;margin-right: 5px;"><b>@if($value == "family_group") {{"Family"}} @else {{ucfirst($value)}} @endif</b></span>
				    	</td>
				    	<td width="50%" style="padding-bottom: 10px;padding-top: 7px;padding-right: 5px;">
		        			<button data-table="{{$value}}" data-toggle="modal" data-target="#exampleFilterModalLong" class="btn btn-block btn-default btn-xs filter-button-model" type="button" style="background-color: burlywood!important;font-size: 16px;"><b>All</b></button>
				        </td>
				        <?php $i++; ?>
		            @if($i%2 == 0)
		    		</tr>
		    		@endif
		        @endforeach
        	</tbody>
        </table>
	</div>
</div>
@endif

<div class="form-group">
    <label class="col-sm-5 control-label" style="font-size: 16px;">Payment Type</label>
    <div class="col-sm-4" style="margin-top: 6px;">
        {!! Form::radio('payment_type', 'Cash', true, ['class' => 'flat-red']) !!} <span style="margin-right: 10px;"><b>{{ 'Cash' }}</b></span>
        {!! Form::radio('payment_type', 'Cheque', null, ['class' => 'flat-red']) !!} <span style="margin-right: 10px;"><b>{{ 'Cheque' }}</b></span>
    </div>
</div>

<div class="modal fade" id="exampleFilterModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleFilterModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title add-new-title"></h4>
            </div>
            <div class="modal-body">
            	<div class="col-sm-12">
                	<span class="control-label" style="font-size: 16px;float: left;"><b>Search :</b></span>
                	<div class="col-sm-5">
			            <input type="text" id="myCustomSearchBox" class="form-control">
			            <br>
			        </div>
		        </div>
            	<div class="box-body">
                    <table id="example_new" class="table table-bordered table-striped mapping_table filter-table">
                        <thead class="thead-model">
                            <th width="100%"></th>
                            <th></th>
                        </thead>
                        <tbody class="tbody-model">
                    		<tr>
                    			<td width="100%"></td>
                    			<td></td>
                    		</tr>
                        </tbody>
                    </table>
            	</div>
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-primary pull-left checkall">Select All</button>
            	<button type="button" class="btn btn-primary pull-left uncheckall">Deselect All</button>
            	<button type="button" class="btn btn-primary pull-left invert">Invert Selection</button>
                <button id="model-bank-form-submit" type="button" class="btn btn-primary">Ok</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

    


<div class="modal fade" id="examplePrintReportModalLong" tabindex="-1" role="dialog" aria-labelledby="examplePrintReportModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title print-report-title"></h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <table id="example_new" class="table table-bordered table-striped mapping_table" style="border-color: black">
                        <thead class="thead-model">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody class="tbody-model1">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button id="model-bank-form-submit" type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Exit</button>
            </div>
        </div>
    </div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).on("click", ".filter-button-model", function () {
         var tableName = $(this).data('table');
         if(tableName == "family_group") {
         	$(".add-new-title").html("Select Family");
         } else {
         	$(".add-new-title").html("Select "+tableName);
         }
         $('.add-new-title').css('textTransform', 'capitalize');
         $('.add-new-title').css('font-weight', 'bold');

         $.ajax({
            url: "{{ url('admin/getFilterTableData') }}"+"/"+tableName,
            type: "GET",
            success: function(data) {
            	$(".thead-model").html("");
            	if(tableName == "do") {
            		$('.thead-model').append('<tr><th width="100%">Developement Officer Name</th><th>Select</th></tr>');
            	} else if(tableName == "agency") {
            		$('.thead-model').append('<tr><th width="100%">Agency Name</th><th>Select</th></tr>');
            	} else if(tableName == "area") {
            		$('.thead-model').append('<tr><th width="100%">Area Name</th><th>Select</th></tr>');
            	} else if(tableName == "city") {
            		$('.thead-model').append('<tr><th width="100%">City Name</th><th>Select</th></tr>');
            	} else if(tableName == "family_group") {
            		$('.thead-model').append('<tr><th width="100%">Family Name</th><th>Select</th></tr>');
            	}
            	if(!$.isEmptyObject(data)) {
            		$(".tbody-model").html("");
            		var dataTable = $('#example_new').DataTable();
            		dataTable.clear();
            		if (tableName == "do") {
            			$.each(data, function(key, value) {
            				$('#example_new').dataTable().fnAddData([value.DONAME,'<input type="checkbox" class="checkhour" name=""></td>']);
		                });
            		} else if (tableName == "agency") {
            			$.each(data, function(key, value) {
            				$('#example_new').dataTable().fnAddData([value.ANAME,'<input type="checkbox" class="checkhour" name=""></td>']);
		                });
            		} else if (tableName == "area") {
            			$.each(data, function(key, value) {
            				$('#example_new').dataTable().fnAddData([value.ARE1,'<input type="checkbox" class="checkhour" name=""></td>']);
		                });
            		} else if (tableName == "city") {
            			$.each(data, function(key, value) {
            				$('#example_new').dataTable().fnAddData([value.CITY,'<input type="checkbox" class="checkhour" name=""></td>']);
		                });
            		} else if (tableName == "family_group") {
            			$.each(data, function(key, value) {
            				$('#example_new').dataTable().fnAddData([value.GNM,'<input type="checkbox" class="checkhour" name=""></td>']);
		                });
            		}
            		$('.tbody-model tr:first').remove();
            	}
            }
        });
    });


$(document).on("click", ".print-report-button-model", function () {
         var tableName = $(this).data('print-report-table');
         $('.print-report-title').html("Premium Posting Upto 01/2022");
         $('.print-report-title').css('textTransform', 'capitalize');
         $('.print-report-title').css('font-weight', 'bold');
         var reportID = $(this).data('id-report');
         var fromDate = $('.fromDate').val();
         var toDate   = $('.todate').val();
         $.ajax({
            url: "{{ url('admin/servicing-reports') }}"+"/"+reportID+"/reportNews",
            type: "POST",
            data: {"_token": "{{ csrf_token() }}","from_date":fromDate,"to_date":toDate},
            success: function(data) {
                console.log(data);
                if($.isEmptyObject(data)) {
                    alert("No Records Found");
                    return false;
                }
                $('#examplePrintReportModalLong').modal('show')
                $(".thead-model").html("");
                if(reportID == 1) {
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Premium</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Paid Date</th></tr>');
                } else if(reportID == 2) {
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Premium</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Paid Date</th></tr>');
                } else if(reportID == 3) {
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Premium</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 4) {
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Loan Int.</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 5) {
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Premium</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 6) {
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Premium</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 7) {
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Premium</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 8) {
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="11%">Premium</th><th width="10%">Mat. Date</th><th width="13%">Mobile</th><th width="7%">Agency</th><th width="8%">Select</th></tr>');
                } else if(reportID == 9) {
                    $('.thead-model').append('<tr><th width="25%">Praty Name</th><th width="10%">Birth Date(R)</th><th width="10%">Birth Date(A)</th><th width="10%">Wedding Date</th><th width="10%">Mobile</th><th width="4%">Select</th></tr>');
                } else if(reportID == 10) {
                    $('.thead-model').append('<tr><th width="25%">Praty Name</th><th width="10%">Birth Date(R)</th><th width="10%">Birth Date(A)</th><th width="10%">Wedding Date</th><th width="10%">Mobile</th><th width="4%">Select</th></tr>');
                } else if(reportID == 11) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">Birth Date(R)</th><th width="12%">Birth Date(A)</th><th width="12%">Wedding Date</th><th width="10%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 12) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">Birth Date(R)</th><th width="12%">Birth Date(A)</th><th width="12%">Wedding Date</th><th width="10%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 13) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">Birth Date(R)</th><th width="12%">Birth Date(A)</th><th width="12%">Wedding Date</th><th width="10%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 14) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">Birth Date(R)</th><th width="12%">Birth Date(A)</th><th width="12%">Wedding Date</th><th width="10%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 15) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">Birth Date(R)</th><th width="12%">Birth Date(A)</th><th width="12%">Wedding Date</th><th width="10%">Mobile</th><th width="8%">Select</th></tr>');
                }
                if(!$.isEmptyObject(data)) {
                    $(".tbody-model1").html("");
                    var dataTable = $('#example_new').DataTable();
                    dataTable.clear();
                    if (reportID == 1) {
                        $.each(data, function(key, value) {
                            console.log(value);
                            var Pname = '';
                            if(value.Party != null && value.Party.NAME != null) {
                                var Pname = value.Party.NAME;
                            }
                            var mobile = '';
                            if(value.Party != null && value.Party.MOBILE != null) {
                                var mobile = value.Party.MOBILE;
                            }
                            var RDT = '';
                            if(value.RDT != null) {
                                var RDT = getDateFormateWise(value.RDT);
                            }
                            var FUPDATE = '';
                            if(value.FUPDATE != null) {
                                var FUPDATE = getDateFormateWise(value.FUPDATE);
                            }
                            $('.tbody-model1').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="date" name="select['+value.PUNIQID+']" class="checkhour"></tr>');
                        });
                    } else if (reportID == 2) {
                        console.log(data);
                        $.each(data, function(key, value) {
                            console.log(value);
                            var Pname = '';
                            if(value.Party != null && value.Party.NAME != null) {
                                var Pname = value.Party.NAME;
                            }
                            var mobile = '';
                            if(value.Party != null && value.Party.MOBILE != null) {
                                var mobile = value.Party.MOBILE;
                            }
                            var RDT = '';
                            if(value.RDT != null) {
                                var RDT = getDateFormateWise(value.RDT);
                            }
                            var FUPDATE = '';
                            if(value.FUPDATE != null) {
                                var FUPDATE = getDateFormateWise(value.FUPDATE);
                            }
                            $('.tbody-model1').append('<tr><td width="13%">'+value.Party.NAME+'aaa</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+value.ECS_MODE+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="date" name="paiddate[]" class="checkhour"><input type="hidden" name="policyno[]" value="'+value.PUNIQID+'" class="checkhour"><input type="hidden" name="fupdate[]" value="'+value.FUPDATE+'" class="checkhour"><input type="hidden" name="RDT[]" value="'+value.RDT+'" class="checkhour"></tr>');
                        });
                    } else if (reportID == 3) {
                        $.each(data, function(key, value) {
                            var Pname = '';
                            if(value.Party != null && value.Party.NAME != null) {
                                var Pname = value.Party.NAME;
                            }
                            var mobile = '';
                            if(value.Party != null && value.Party.MOBILE != null) {
                                var mobile = value.Party.MOBILE;
                            }
                            var RDT = '';
                            if(value.RDT != null) {
                                var RDT = getDateFormateWise(value.RDT);
                            }
                            var FUPDATE = '';
                            if(value.FUPDATE != null) {
                                var FUPDATE = getDateFormateWise(value.FUPDATE);
                            }
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></tr>');
                        });
                    } else if (reportID == 4) {
                        $.each(data, function(key, value) {
                            var Pname = '';
                            if(value.Party != null && value.Party.NAME != null) {
                                var Pname = value.Party.NAME;
                            }
                            var mobile = '';
                            if(value.Party != null && value.Party.MOBILE != null) {
                                var mobile = value.Party.MOBILE;
                            }
                            var RDT = '';
                            if(value.RDT != null) {
                                var RDT = getDateFormateWise(value.RDT);
                            }
                            var FUPDATE = '';
                            if(value.FUPDATE != null) {
                                var FUPDATE = getDateFormateWise(value.FUPDATE);
                            }
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></tr>');
                        });
                    } else if (reportID == 5) {
                        $.each(data, function(key, value) {
                            var Pname = '';
                            if(value.Party != null && value.Party.NAME != null) {
                                var Pname = value.Party.NAME;
                            }
                            var mobile = '';
                            if(value.Party != null && value.Party.MOBILE != null) {
                                var mobile = value.Party.MOBILE;
                            }
                            var RDT = '';
                            if(value.RDT != null) {
                                var RDT = getDateFormateWise(value.RDT);
                            }
                            var FUPDATE = '';
                            if(value.FUPDATE != null) {
                                var FUPDATE = getDateFormateWise(value.FUPDATE);
                            }
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></tr>');
                        });
                    } else if (reportID == 6) {
                        $.each(data, function(key, value) {
                            var Pname = '';
                            if(value.Party != null && value.Party.NAME != null) {
                                var Pname = value.Party.NAME;
                            }
                            var mobile = '';
                            if(value.Party != null && value.Party.MOBILE != null) {
                                var mobile = value.Party.MOBILE;
                            }
                            var RDT = '';
                            if(value.RDT != null) {
                                var RDT = getDateFormateWise(value.RDT);
                            }
                            var FUPDATE = '';
                            if(value.FUPDATE != null) {
                                var FUPDATE = getDateFormateWise(value.FUPDATE);
                            }
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></tr>');
                        });
                    } else if (reportID == 7) {
                        $.each(data, function(key, value) {
                            var Pname = '';
                            if(value.Party != null && value.Party.NAME != null) {
                                var Pname = value.Party.NAME;
                            }
                            var mobile = '';
                            if(value.Party != null && value.Party.MOBILE != null) {
                                var mobile = value.Party.MOBILE;
                            }
                            var RDT = '';
                            if(value.RDT != null) {
                                var RDT = getDateFormateWise(value.RDT);
                            }
                            var FUPDATE = '';
                            if(value.FUPDATE != null) {
                                var FUPDATE = getDateFormateWise(value.FUPDATE);
                            }
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></td></tr>');
                        });
                    } else if (reportID == 8) {
                        $.each(data, function(key, value) {
                            var Pname = '';
                            if(value.Party != null && value.Party.NAME != null) {
                                var Pname = value.Party.NAME;
                            }
                            var mobile = '';
                            if(value.Party != null && value.Party.MOBILE != null) {
                                var mobile = value.Party.MOBILE;
                            }
                            var RDT = '';
                            if(value.RDT != null) {
                                var RDT = getDateFormateWise(value.RDT);
                            }
                            var MATDATE = '';
                            if(value.MATDATE != null) {
                                var MATDATE = getDateFormateWise(value.MATDATE);
                            }
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+MATDATE+'</td><td width="13%">'+mobile+'</td><td width="7%">'+value.AGCODE+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></td></tr>');
                        });
                    } else if (reportID == 9) {
                        $.each(data, function(key, value) {
                            var wDate = '';
                            if(value.WDT != null) {
                                var wDate = getDateFormateWise(value.WDT);
                            }
                            var bDate = '';
                            if(value.BD != null) {
                                var bDate = getDateFormateWise(value.BD);
                            }
                            var aDate = '';
                            if(value.ABD != null) {
                                var aDate = getDateFormateWise(value.ABD);
                            }
                            $('.tbody-model').append('<tr><td>'+value.NAME+'</td><td>'+bDate+'</td><td>'+aDate+'</td><td>'+wDate+'</td><td>'+value.MOBILE+'</td><td><input type="checkbox" name="select['+value.GCODE+']" class="checkhour" checked="checked"></td></tr>');
                        });
                    } else if (reportID == 10) {
                        $.each(data, function(key, value) {
                            var wDate = '';
                            if(value.WDT != null) {
                                var wDate = getDateFormateWise(value.WDT);
                            }
                            var bDate = '';
                            if(value.BD != null) {
                                var bDate = getDateFormateWise(value.BD);
                            }
                            var aDate = '';
                            if(value.ABD != null) {
                                var aDate = getDateFormateWise(value.ABD);
                            }
                            $('.tbody-model').append('<tr><td>'+value.NAME+'</td><td>'+bDate+'</td><td>'+aDate+'</td><td>'+wDate+'</td><td>'+value.MOBILE+'</td><td><input type="checkbox" name="select['+value.GCODE+']" class="checkhour" checked="checked"></td></tr>');
                        });
                    } else if (reportID == 11) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></tr>');
                        });
                    } else if (reportID == 12) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></tr>');
                        });
                    } else if (reportID == 13) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></tr>');
                        });
                    } else if (reportID == 14) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></tr>');
                        });
                    } else if (reportID == 15) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour" checked="checked"></tr>');
                        });
                    }
                    //$('.tbody-model tr:first').remove();
                }
            }
        });
    });


	
    function getDateFormateWise(getDate) {
        var date  = new Date(getDate);
        var yr    = date.getFullYear();
        var month = date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1);
        var day   = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();
        return day + '/' + month + '/' + yr;
    }




    $(document).on("click", ".myText", function () {
	    var div = $(this);
	    var tb = div.find('input:text');//get textbox, if exist
	    if (tb.length) {//text box already exist
    	  	div.text(tb.val());//remove text box & put its current value as text to the div
	    } else {
	    	tb = $('<input>').prop({
	        	'type': 'text',
	        	'name':'test',
	        	'value': div.text()//set text box value from div current text
	      	});
	      	div.empty().append(tb);//add new text box
	      	tb.focus();//put text box on focus
	    }
	});

	$(document).ready(function() {
	  	$(".modal").on("hidden.bs.modal", function() {
	    	$(".thead-model").html("");
	    	$(".tbody-model").html("");
	  	});
	});

    var clicked = false;
	$(".checkall").on("click", function() {
	  	$(".checkhour").prop("checked", !clicked);
	});

	var uncheckall = true;
	$(".uncheckall").on("click", function() {
	  	$(".checkhour").prop("checked", !uncheckall);
	});

	$(".invert").on("click", function() {
		var list = $(".checkhour");
		for(var i = 0;i<list.length;i++){
			if(list[i].checked==true){
				list[i].checked=false;
			} else {
				list[i].checked=true;
			}
		}
	});
	
</script>