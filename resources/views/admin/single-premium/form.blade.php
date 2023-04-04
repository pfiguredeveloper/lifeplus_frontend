<div class="col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Plan Details</h4>
        </div>
        <div class="panel-body">
        	<table class="table table-bordered">
				<tbody>
					<tr>
					    <th style="width: 30%;">Name</th>
					    <td id="NAME"></td>
					</tr>
					<tr>
					    <th>Risk Date</th>
					    <td id="RISKDATE"></td>
					</tr>
					<tr>
					    <th>Plan</th>
					    <td id="PLAN"></td>
					</tr>
					<tr>
					    <th>Age</th>
					    <td id="AGE"></td>
					</tr>
					<tr>
					    <th>Mat. Term</th>
					    <td id="MTERM"></td>
					</tr>
					<tr>
					    <th>Prem. Term</th>
					    <td id="PTERM"></td>
					</tr>
					<tr>
					    <th>Mode</th>
					    <td id="CUREENTMODE"></td>
					</tr>
					<tr>
					    <th>Current SA</th>
					    <td id="CUREENTSA"></td>
					</tr>
					<tr>
					    <th>Premium</th>
					    <td id="CUREENTPREM"></td>
					</tr>
					<tr>
					    <th>FUP</th>
					    <td id="CUREENTFUP"></td>
					</tr>
					<tr>
					    <th>LLP</th>
					    <td id="CUREENTLPP"></td>
					</tr>
				</tbody>
			</table>
        </div>
    </div>
</div>

<div class="col-sm-6">
	<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Single Premium Posting</h4>
        </div>
        <div class="panel-body">
			<div class="form-group">
			    <label class="col-sm-5 control-label">Policy No.</label>
			    <div class="col-sm-7">
			        {!! Form::number('pono', null, ['class' => 'form-control','id'=>'policyNo']) !!}
			        @if ($errors->has('pono'))
			            <span class="help-block">
			                <strong style="color: red;">{{ $errors->first('pono') }}</strong>
			            </span>
			        @endif
			    </div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">New Last Paid Premium</label>
			    <div class="col-sm-7">
			        {!! Form::text('nprem', null, ['class' => 'form-control']) !!}
			        @if ($errors->has('nprem'))
			            <span class="help-block">
			                <strong style="color: red;">{{ $errors->first('nprem') }}</strong>
			            </span>
			        @endif
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-sm-5 control-label">Paid Date</label>
			    <div class="col-sm-7">
			        {!! Form::text('paiddt', null, ['class' => 'form-control datepicker3','placeholder' => 'dd/mm/yyyy','id'=>"PaidDate"]) !!}
			        @if ($errors->has('paiddt'))
			            <span class="help-block">
			                <strong style="color: red;">{{ $errors->first('paiddt') }}</strong>
			            </span>
			        @endif
			    </div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Last Enter Data</h4>
        </div>
        <div class="panel-body">
        	<table class="table table-bordered" style="margin-bottom: 0px !important;">
				<tbody>
					<tr>
					    <th style="width: 30%;">Policy No.</th>
					    <td>{{ (!empty($lastRecord) && !empty($lastRecord->pono)) ? $lastRecord->pono : "" }}</td>
					</tr>
					<?php
						if(!empty($lastRecord->pono)) {
							$pol = \DB::connection('lifecell_lic')->select("SELECT * FROM pol where PONO = {$lastRecord->pono} limit 1");
					        if (!empty($pol[0]) && !empty($pol[0]->NAME1)) {
					            $name = \DB::connection('lifecell_lic')->select("SELECT NAME FROM party where GCODE = {$pol[0]->NAME1} limit 1");
					            $Pname = !empty($name[0]) ? $name[0]->NAME : '';
					        }
						}
					 ?>
					<tr>
					    <th>Name</th>
					    <td>{{ !empty($Pname) ? $Pname : "" }}</td>
					</tr>
					<tr>
					    <th>Risk Date</th>
					    <td>{{ (!empty($pol[0]) && !empty($pol[0]->RDT)) ? $pol[0]->RDT : "" }}</td>
					</tr>
					<tr>
					    <th>FUP</th>
					    <td>{{ (!empty($pol[0]) && !empty($pol[0]->FUP)) ? $pol[0]->FUP : "" }}</td>
					</tr>
					<tr>
					    <th>Premium</th>
					    <td>{{ (!empty($pol[0]) && !empty($pol[0]->PREM)) ? $pol[0]->PREM : "" }}</td>
					</tr>
				</tbody>
			</table>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).on("change","#policyNo",function() {
		if($("#policyNo").val() != '') {
            $.ajax({
                url: "{{ url('admin/getPolicyNoWiseData') }}"+"/"+$("#policyNo").val(),
                method: 'get',
                success: function(result) {
                    if(!$.isEmptyObject(result.pol[0])) {
                    	if(result.pol[0] != '') {
                    		if(result.name != '') {
                        		$("#NAME").text(result.name);
                    		}
                        	$("#PLAN").text(result.pol[0]['PLAN']);
                        	$("#RISKDATE").text(result.pol[0]['RDT']);
                        	$("#CUREENTFUP").text(result.pol[0]['FUP']);
                        	$("#CUREENTLPP").text(result.pol[0]['RDT']);
                        	$("#MTERM").text(result.pol[0]['MTERM']);
                        	$("#PTERM").text(result.pol[0]['TERM']);
                        	$("#CUREENTMODE").text(result.pol[0]['MODE']);
                        	$("#CUREENTPREM").text(result.pol[0]['PREM']);
                        	$("#CUREENTSA").text(result.pol[0]['SA']);
                        	$("#AGE").text(result.pol[0]['AGE']);

                        	$('#MODE').empty().append('<option selected="selected" value=""></option>');

                        	var d     = new Date();
							var month = d.getMonth()+1;
							var day   = d.getDate();
							var year  = d.getFullYear();
							var output = ((''+day).length<2 ? '0' : '')+day+'/'+((''+month).length<2 ? '0' : '')+month+'/'+year;
							$("#PaidDate").val(output);

		                    if(result.getModeData != '') {
		                        $.each(result.getModeData, function(r,d) {
		                            if(d == 'Y')
		                                d = 'Yearly';
		                            else if(d == 'H')
		                                d = 'Half Yearly';
		                            else if(d == 'Q')
		                                d = 'Quarterly';
		                            else if(d == 'M')
		                                d = 'Monthly';
		                            else if(d == 'S')
		                                d = 'SSS';
		                            else if(d == 'G')
		                                d = 'Single';
		                            else
		                                d = '';

		                            $('#MODE').append($("<option></option>").attr("value",d).text(d));
		                        });
		                    }
                    	}
                    } else {
                    	alert('Policy No. does not Exist');
                    }
                }
            });
        } else {
            $("#agencycode").val('');
        }
    });

    $(document).on('keypress', 'input,select', function (e) {
        if (e.which == 13) {
            e.preventDefault();
            // Get all focusable elements on the page
            var $canfocus = $(':focusable');
            var index = $canfocus.index(document.activeElement) + 1;
            if (index >= $canfocus.length) index = 0;
            $canfocus.eq(index).focus();
        }
    });
</script>