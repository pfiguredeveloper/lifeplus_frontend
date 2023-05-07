@if(!empty($selectOption) && count($selectOption) > 0)
	<div class="form-group{{ $errors->has('select_option') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label" style="font-size: 16px;">Select Option</label>
	    <div class="col-sm-5">
	    	{!! Form::select('select_option', $selectOption, null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
	    	@if ($errors->has('select_option'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('select_option') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
@endif

@if(!empty($reports['date_display']) && $reports['date_display'] == "Yes")
	<div class="form-group">
	    <label class="col-sm-4 control-label" style="font-size: 16px;">From</label>
	    <div class="col-sm-2">
	        {!! Form::text('from_date', $fromDate, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'from_date']) !!}
	        @if ($errors->has('from_date'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('from_date') }}</strong>
	            </span>
	        @endif
	    </div>

	    <label class="col-sm-1 control-label" style="font-size: 16px;">To</label>
	    <div class="col-sm-2">
	        {!! Form::text('to_date', $toDate, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'to_date']) !!}
	        @if ($errors->has('to_date'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('to_date') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
@endif

@if(!empty($redioOption) && count($redioOption) > 0 && $reports["id"]!=24)
	<div class="form-group{{ $errors->has('redio_option') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label" style="font-size: 16px;">Options</label>
	    <div class="col-sm-5">
	    	@foreach ($redioOption as $key => $value)
	    		<tr>
	    			<td>
			    		<label class="control-label">
			                <span style="margin-right: 5px;font-size: 16px;">{{$value}}</span>
			                {!! Form::checkbox('redio_option[]',$value,false,['style'=>'margin-right: 10px;']) !!}
			            </label>
			        </td>
			    </tr>
	    	@endforeach
	    	@if ($errors->has('redio_option'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('redio_option') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
@endif

@if(!empty($filter) && count($filter) > 0)

@if($reports['id'] == 12 || $reports['id'] == 24 || $reports['id'] == 13 || $reports['id'] == 14 || $reports['id'] == 15)
<div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-5" style="">
        <div style="border:1px #ddd solid;padding: 6px;text-align: center;">
            <label style="margin-right: 20px;">
              <input type="radio" name="optionsRadios" class="optionsRadios" value="Family" checked="">
              <span style="font-size: 16px;">Family</span>
            </label>
            <label>
              <input type="radio" name="optionsRadios" class="optionsRadios" value="Party">
              <span style="font-size: 16px;">Party</span>
            </label>
        </div>
    </div>
</div>
@endif

<div class="form-group">
    <label class="col-sm-4 control-label" style="font-size: 16px;">Filter</label>
    <div class="col-sm-5">
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
		        			<button data-table="{{$value}}" data-toggle="modal" data-target="#exampleFilterModalLong" class="btn btn-block btn-default btn-xs filter-button-model {{$value}}" type="button" style="background-color: burlywood!important;font-size: 16px;"><b>All</b></button>
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

@if(!empty($reportType) && count($reportType) > 0)
	<div class="form-group{{ $errors->has('report_type') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label" style="font-size: 16px;">Report Type</label>
	    <div class="col-sm-5">
	    	{!! Form::select('report_type', $reportType, null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
	    	@if ($errors->has('report_type'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('report_type') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
@endif

@if(!empty($groupingOption) && count($groupingOption) > 0)
	<div class="form-group{{ $errors->has('grouping_option') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label" style="font-size: 16px;">Grouping Option</label>
	    <div class="col-sm-5">
	    	{!! Form::select('grouping_option', $groupingOption, null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
	    	@if ($errors->has('grouping_option'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('grouping_option') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
@endif


@if(!empty($orderingOption) && count($orderingOption) > 0)
	<div class="form-group{{ $errors->has('sorting_option') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label" style="font-size: 16px;">Sorting Option</label>
	    <div class="col-sm-5">
	    	{!! Form::select('sorting_option', $orderingOption, null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
	    	@if ($errors->has('sorting_option'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('sorting_option') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
@endif

<div class="modal fade" id="exampleFilterModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleFilterModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
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
                    <table id="example_new" class="table table-bordered table-striped mapping_table">
                        <thead class="thead-model-filter">
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody class="tbody-model-filter">
                    		<tr>
                    			<td></td>
                    			<td></td>
                    		</tr>
                        </tbody>
                    </table>
            	</div>
            </div>
            <div class="modal-footer master-filter-footer">
            	<button type="button" class="btn btn-primary pull-left checkall">Select All</button>
            	<button type="button" class="btn btn-primary pull-left uncheckall">Deselect All</button>
            	<button type="button" class="btn btn-primary pull-left invert">Invert Selection</button>
                <button type="button" class="btn btn-primary submit-master-report">Ok</button>
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
                        <tbody class="tbody-model">
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
            	<button type="button" class="btn btn-primary pull-left checkall">Select All</button>
            	<button type="button" class="btn btn-primary pull-left uncheckall">Deselect All</button>
            	<button type="button" class="btn btn-primary pull-left invert">Invert Selection</button>
                <button id="send-sms-report" data-toggle="modal" data-target="#exampleSMSModalLong" type="button" class="btn btn-primary"><i class="fa fa-commenting-o" aria-hidden="true"></i> SMS</button>
                <button type="submit" class="btn btn-primary submit-click"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Exit</button>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	let report_id = "{{$reports["id"]}}";
	$(document).on("click", ".submit-click", function () {
		if($('.report-checkbox').filter(':checked').length < 1 && !["12","24"].includes(report_id)) {
	        alert("Check at least one record!");
			return false;
		}
	});

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
            	$(".thead-model-filter").html("");
            	if(tableName == "do") {
            		$('.thead-model-filter').append('<tr><th width="100%">Developement Officer Name</th><th>Select</th></tr>');
            	} else if(tableName == "agency") {
            		$('.thead-model-filter').append('<tr><th width="100%">Agency Name</th><th>Select</th></tr>');
            	} else if(tableName == "area") {
            		$('.thead-model-filter').append('<tr><th width="100%">Area Name</th><th>Select</th></tr>');
            	} else if(tableName == "city") {
            		$('.thead-model-filter').append('<tr><th width="100%">City Name</th><th>Select</th></tr>');
            	} else if(tableName == "branch") {
            		$('.thead-model-filter').append('<tr><th width="100%">Branch Name</th><th>Select</th></tr>');
            	} else if(tableName == "family_group") {
            		$('.thead-model-filter').append('<tr><th width="100%">Family Name</th><th>Select</th></tr>');
            	} else if(tableName == "paidby") {
            		$('.thead-model-filter').append('<tr><th width="100%">Paid By</th><th>Select</th></tr>');
            	} else if(tableName == "addgroup") {
            		$('.thead-model-filter').append('<tr><th width="100%">Address Group Name</th><th>Select</th></tr>');
            	} else if(tableName == "bank") {
            		$('.thead-model-filter').append('<tr><th width="100%">Bank Name</th><th>Select</th></tr>');
            	} else if(tableName == "doctor") {
            		$('.thead-model-filter').append('<tr><th width="100%">Doctor Name</th><th>Select</th></tr>');
            	} else if(tableName == "country") {
            		$('.thead-model-filter').append('<tr><th width="100%">Country Name</th><th>Select</th></tr>');
            	} else if(tableName == "state") {
            		$('.thead-model-filter').append('<tr><th width="100%">State Name</th><th>Select</th></tr>');
            	} else if(tableName == "district") {
            		$('.thead-model-filter').append('<tr><th width="100%">District Name</th><th>Select</th></tr>');
            	} else if(tableName == "party") {
            		$('.thead-model-filter').append('<tr><th width="100%">Party Name</th><th>Select</th></tr>');
            	}
            	if(!$.isEmptyObject(data)) {
            		$(".tbody-model-filter").html("");
            		var dataTable = $('#example_new').DataTable();
            		dataTable.clear();
            		$(".submit-master-report").attr('id',tableName);
            		var myarray = $('#select_'+tableName).val();
            		var array   = [];
    				if(myarray != '' && myarray != null && myarray != 'undefined') {
    					var array = myarray.split(',').map(function(item) {
						    return parseInt(item, 10);
						});
    				}
    				if (tableName == "do") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.DOCODE, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.DONAME,'<input type="checkbox" '+selectedd+' name="selectDoMaster" value="'+value.DOCODE+'" class="checkhour">']);
		                });
            		} else if (tableName == "agency") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.AFILE, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.ANAME,'<input type="checkbox" '+selectedd+' name="selectAgencyMaster" value="'+value.AFILE+'"  class="checkhour">']);
		                });
            		} else if (tableName == "area") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.ARECD, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.ARE1,'<input type="checkbox" '+selectedd+' name="selectAreaMaster" value="'+value.ARECD+'" class="checkhour">']);
		                });
            		} else if (tableName == "city") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.CITYID, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.CITY,'<input type="checkbox" '+selectedd+' name="selectCityMaster" value="'+value.CITYID+'" class="checkhour">']);
		                });
            		} else if (tableName == "branch") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.BCODE, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.BRANCHNM,'<input type="checkbox" '+selectedd+' name="selectBranchMaster" value="'+value.BCODE+'" class="checkhour">']);
		                });
            		} else if (tableName == "family_group") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.GCODE, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.GNM,'<input type="checkbox" '+selectedd+' name="selectFamily_groupMaster" value="'+value.GCODE+'" class="checkhour">']);
		                });
            		} else if (tableName == "paidby") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.PAIDBYID, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.PAIDBY,'<input type="checkbox" '+selectedd+' name="selectPaidbyMaster" value="'+value.PAIDBYID+'" class="checkhour">']);
		                });
            		} else if (tableName == "bank") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.BANKCD, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.BANK,'<input type="checkbox" '+selectedd+' name="selectBankMaster" value="'+value.BANKCD+'" class="checkhour">']);
		                });
            		} else if (tableName == "doctor") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.DCODE, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.DOCTOR,'<input type="checkbox" '+selectedd+' name="selectDoctorMaster" value="'+value.DCODE+'" class="checkhour">']);
		                });
            		} else if (tableName == "country") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.COUNTRYID, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.COUNTRY,'<input type="checkbox" '+selectedd+' name="selectCountryMaster" value="'+value.COUNTRYID+'" class="checkhour">']);
		                });
            		} else if (tableName == "state") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.STATEID, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.STATE,'<input type="checkbox" '+selectedd+' name="selectStateMaster" value="'+value.STATEID+'" class="checkhour">']);
		                });
            		} else if (tableName == "district") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.DISTRICTID, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.DISTRICT,'<input type="checkbox" '+selectedd+' name="selectDistrictMaster" value="'+value.DISTRICTID+'" class="checkhour">']);
		                });
            		} else if (tableName == "party") {
            			$.each(data, function(key, value) {
            				var selectedd = '';
            				if(jQuery.inArray(value.GCODE, array) !== -1) {
            					var selectedd = "checked = checked";
            				}
            				$('#example_new').dataTable().fnAddData([value.NAME,'<input type="checkbox" '+selectedd+' name="selectPartyMaster" value="'+value.GCODE+'" class="checkhour">']);
		                });
            		}
            		$('.tbody-model-filter tr:first').remove();
            	}
            }
        });
    });

	function capitalizeFirstLetter(string){
	  return string.charAt(0).toUpperCase() + string.slice(1);
	}

	$(document).on("click", ".submit-master-report", function () {
		var tableName = $('.submit-master-report').attr('id');
		var vals 	  = [];
		$('#select_'+tableName).remove();
		var capString = capitalizeFirstLetter(tableName);

		$('input[name="select'+capString+'Master"]:checked').each(function() {
	        vals.push($(this).val());
	    });

	    $('.master-filter-footer').append('<input type="hidden" name="select_'+tableName+'" id="select_'+tableName+'" value="'+vals.join(',')+'" />');

		if(vals != '') {
			var text = "<b>Selected</b>";
			$('.'+tableName).html(text);
		} else {
			var text = "<b>All</b>";
			$('.'+tableName).html(text);
		}

		$('#exampleFilterModalLong').modal('toggle');
	});

	$(document).on("click", ".print-report-button-model", function (e) {
   		 var tableName = $(this).data('print-report-table');
         $('.print-report-title').html(tableName+" Report");
         $('.print-report-title').css('textTransform', 'capitalize');
         $('.print-report-title').css('font-weight', 'bold');
         var reportID = $(this).data('id-report');
         var fromDate = $('#from_date').val();
         var toDate   = $('#to_date').val();
		 var param1 = $("#select_area").val();
		 var param2  = $("#select_city").val();
		 var select_option   = $("select[name='select_option']").val();
		 var ordering_option   = $("select[name='sorting_option']").val();
		 var grouping_option = $("select[name='grouping_option']").val();
		 var report_type = $("select[name='report_type']").val();
		 var redio_option = $("input[name='redio_option[]']:checked").map(function(ele){ return this.value;}).get();
		 var select_do = !["",undefined,null].includes($("#select_do").val()) ? $("#select_do").val().split(",") : [];
		 var select_area = !["",undefined,null].includes($("#select_area").val()) ? $("#select_area").val().split(",") : [];
		 var select_city = !["",undefined,null].includes($("#select_city").val()) ? $("#select_city").val().split(",") : [];
		 var select_family_group = !["",undefined,null].includes($("#select_family_group").val()) ? $("#select_family_group").val().split(",") : [];
		 var select_agency = !["",undefined,null].includes($("#select_agency").val()) ? $("#select_agency").val().split(",") : [];
      	console.log("asdasd",["12","24"].includes(reportID));
        if([12,24].includes(reportID)) {
        	e.preventDefault();
        	$(".submit-click").trigger("click");
        	return false;
        } 	
         	
         	console.log("asdAAAAAAsad");

         $.ajax({
            type: "POST",
            url: "{{ url('admin/servicing-reports') }}"+"/"+reportID+"/reportNews",
			data: {
				"_token": "{{ csrf_token() }}",
				from_date:fromDate,
				to_date:toDate,
				param1:param1,
				param2:param2,
				select_option:select_option,
				sorting_option:ordering_option,
				report_type:report_type,
				redio_option:redio_option,
				selectDo:select_do,
				selectArea:select_area,
				selectCity:select_city,
				selectFamilyGroup:select_family_group,
				selectAgency:select_agency,
				optionsRadios:$("input[name='optionsRadios']:checked").val(),
			},
            success: function(data) {
            	if($.isEmptyObject(data)) {
            		alert("No Records Found");
            		return false;
            	}
            	$('#examplePrintReportModalLong').modal('show')
            	$(".thead-model").html("");
            	if(reportID == 1) {
            		$('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Premium</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Select</th></tr>');
            	} else if(reportID == 2) {
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Premium</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Select</th></tr>');
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
                    $('.thead-model').append('<tr><th width="14%">Praty Name</th><th width="11%">Plicy No.</th><th width="12%">Risk Date</th><th width="7%">Plan</th><th width="7%">Mode</th><th width="7%">ECS</th><th width="11%">Premium</th><th width="10%">Due Date</th><th width="13%">Mobile</th><th width="8%">Select</th></tr>');

                } else if(reportID == 13) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">Birth Date(R)</th><th width="12%">Birth Date(A)</th><th width="12%">Wedding Date</th><th width="10%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 14) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">Birth Date(R)</th><th width="12%">Birth Date(A)</th><th width="12%">Wedding Date</th><th width="10%">Mobile</th><th width="8%">Select</th></tr>');
                } else if(reportID == 15) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">Birth Date(R)</th><th width="12%">Birth Date(A)</th><th width="12%">Wedding Date</th><th width="10%">Mobile</th><th width="8%">Select</th></tr>');
                }

                else if(reportID == 22) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">CIty</th><th width="12%">Mobile Number</th><th width="12%">Fax</th><th width="8%">Select</th></tr>');
                }

                 else if(reportID == 23) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">CIty</th><th width="12%">Mobile Number</th><th width="12%">Gcode</th><th width="8%">Select</th></tr>');
                }

                 else if(reportID == 24) {
                    $('.thead-model').append('<tr><th width="13%">Praty Name</th><th width="11%">IsurerProductName</th><th width="11%">Policy No</th><th width="12%">RiskDate</th><th width="12%">Premium</th><th width="8%">Select</th></tr>');
                }
            	if(!$.isEmptyObject(data)) {
            		$(".tbody-model").html("");
            		var dataTable = $('#example_new').DataTable();
            		dataTable.clear();
            		if (reportID == 1) {
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
            				$('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
		                });
            		} else if (reportID == 2) {
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
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'aaa</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="hidden" name="policyno[]" value="'+value.PUNIQID+'" class="checkhour"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
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
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
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
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
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
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
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
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
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
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+''+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></td></tr>');
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
                            $('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+MATDATE+'</td><td width="13%">'+mobile+'</td><td width="7%">'+value.AGCODE+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></td></tr>');
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
                            $('.tbody-model').append('<tr><td>'+value.NAME+'</td><td>'+bDate+'</td><td>'+aDate+'</td><td>'+wDate+'</td><td>'+value.MOBILE+'</td><td><input type="checkbox" name="select['+value.GCODE+']" class="checkhour report-checkbox" checked="checked"></td></tr>');
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
                            $('.tbody-model').append('<tr><td>'+value.NAME+'</td><td>'+bDate+'</td><td>'+aDate+'</td><td>'+wDate+'</td><td>'+value.MOBILE+'</td><td><input type="checkbox" name="select['+value.GCODE+']" class="checkhour report-checkbox" checked="checked"></td></tr>');
                        });
                    } else if (reportID == 11) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
                        });
                    } else if (reportID == 12) {
                        /*$.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
                        });*/

                        $.each(data, function(key, value) {
                        	let ECS_MODE = value.ECS_MODE=="Yes" ? "Yes" : "No";
                            let RDT = value.RDT != null ? getDateFormateWise(value.RDT) : '';
                            let FUPDATE = value.FUPDATE != null ? getDateFormateWise(value.FUPDATE) : '';
                            let Pname = (value.Party != null && value.Party.NAME != null) ? value.Party.NAME : '';
                            let mobile = (value.Party != null && value.Party.MOBILE != null) ? value.Party.MOBILE : '';
                        	$('.tbody-model').append('<tr><td width="13%">'+Pname+'</td><td width="11%">'+value.PONO+'</td><td width="12%">'+RDT+'</td><td width="7%">'+value.PLAN+'</td><td width="7%">'+value.MODE+'</td><td width="7%">'+ECS_MODE+'</td><td width="11%">'+value.PREM+'</td><td width="10%">'+FUPDATE+'</td><td width="13%">'+mobile+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
		                });
                    } else if (reportID == 13) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
                        });
                    } else if (reportID == 14) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
                        });
                    } else if (reportID == 15) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.DONAME+'</td><td width="11%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="12%">'+value.DONAME+'</td><td width="10%">'+value.DONAME+'</td><td width="8%"><input type="checkbox" name="select['+value.PUNIQID+']" class="checkhour report-checkbox" checked="checked"></tr>');
                        });
                    }

                    else if (reportID == 22) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.NAME+'</td><td width="11%">'+value.CITY+'</td><td width="12%">'+value.PHONE_O+'</td><td width="12%">'+value.FAX+'</td><td width="8%"><input type="checkbox" name="select['+value.ID+']" class="checkhour report-checkbox" checked="checked"></tr>');
                        });
                    }

                    else if (reportID == 23) {
                        $.each(data, function(key, value) {
                            $('.tbody-model').append('<tr><td width="12%">'+value.NAME+'</td><td width="11%">'+value.CITY+'</td><td width="12%">'+value.MOBILE+'</td><td width="12%">'+value.GCODE+'</td><td width="8%"><input type="checkbox" name="select['+value.GCODE+']" class="checkhour report-checkbox" checked="checked"></tr>');
                        });
                    }

                    else if (reportID == 24) {
                        $.each(data.policy_list, function(key, value) {

                        	console.log(data.policy_list[key]['0'].NetPremium);
                            $('.tbody-model').append('<tr><td width="12%">'+value.policy_list+'</td><td width="11%">'+value.policy_list+'</td><td width="12%">'+value.PolicyNo+'</td><td width="12%">'+value.policy_list+'</td><td width="12%">'+value.Premium+'</td><td width="8%"><input type="checkbox" name="select['+value.policy_list+']" class="checkhour report-checkbox" checked="checked"></tr>');
                        });
                    }


            		//$('.tbody-model tr:first').remove();
            	}
            }
        });
    });

	function getDateFormateWise(getDate) {
		//var date  = new Date(getDate);
		var date  = getDate.split('-');
		//console.log(date);
        /*var yr    = date.getFullYear();
        var month = date.getMonth() < 9 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1);
        var day   = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();*/
        //return day + '/' + month + '/' + yr;
        return date[2] + '/' + date[1] + '/' + date[0];
	}

	$(document).ready(function() {
	  	$("#examplePrintReportModalLong").on("hidden.bs.modal", function() {
	    	$(".thead-model").html("");
	    	$(".tbody-model").html("");
	  	});
        $("#exampleFilterModalLong").on("hidden.bs.modal", function() {
            $(".thead-model-filter").html("");
            $(".tbody-model-filter").html("");
        });
	});

    var clicked = false;
	$(".checkall").on("click", function() {
	  	$(".checkhour").prop("checked", !clicked);
	});

    $('.party').prop('disabled', true);
    $(".optionsRadios").change(function() {
        if($(this).val() == 'Party') {
            $('.family_group').prop('disabled', true);
            $('.party').prop('disabled', false);
        } else if($(this).val() == 'Family') {
            $('.family_group').prop('disabled', false);
            $('.party').prop('disabled', true);
        }
    });

	var uncheckall = true;
	$(".uncheckall").on("click", function() {
	  	$(".checkhour").prop("checked", !uncheckall);
	});

	$(".invert").on("click", function() {
		var list = $(".checkhour");
		for(var i = 0;i<list.length;i++) {
			if(list[i].checked==true) {
				list[i].checked=false;
			} else {
				list[i].checked=true;
			}
		}
	});

	

	/* Start  Due premium related JS*/
	if(report_id==2) {
		let select_options = ["Outstanding Due Premium"];
		$("select[name='select_option'] option").each(function(){
			if(!select_options.includes($(this).text())){
				$(this).attr("hidden",true);
			}
		});
		let select_radio = ["SSS?"];
		$("input[name='redio_option[]']").each(function(){
			if(!select_radio.includes($(this).val())){
				$(this).parent().hide();
			}
		});
		$("select[name='report_type']").val(10).attr("readonly",true); 
		$("select[name='grouping_option']").attr("readonly",true); 
		$("select[name='sorting_option']").val(0).attr("readonly",true); 
	}
	/* End  Due premium related JS*/

	/* Start  Maturity Report JS*/
	if(report_id==8) {
		$("select[name='report_type']").val(0).attr("readonly",true); 
		$("select[name='grouping_option']").attr("readonly",true); 
		$("select[name='sorting_option']").val(0).attr("readonly",true); 
	}
	/* End  Maturity Report JS*/
	
	/* Start Lapse Report JS*/
	if(report_id==5) {
		$("select[name='report_type']").val(8).attr("readonly",true); 
		$("select[name='grouping_option']").attr("readonly",true); 
		$("select[name='sorting_option']").val(0).attr("readonly",true); 
		let select_options = ["Lapse (Date)"];
		$("select[name='select_option'] option").each(function(){
			if(!select_options.includes($(this).text())){
				$(this).attr("hidden",true);
			}
		});
	}
	/* End  Lapse Report JS*/
	

	/* Start Premium Calendar Report JS*/
	if(report_id==12) {
		let select_radio = ["ECS?"];
		$("input[name='redio_option[]']").each(function(){
			if(!select_radio.includes($(this).val())){
				$(this).parent().hide();
			}
		});
	}
	/* End Premium Calendar Report JS*/
	

</script>