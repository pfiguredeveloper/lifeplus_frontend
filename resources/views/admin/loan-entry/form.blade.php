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
					    <th>SA</th>
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
            <h4 class="panel-title">Loan Entry</h4>
        </div>
        <div class="panel-body">
			<div class="form-group">
			    <label class="col-sm-5 control-label">Policy No.</label>
			    <div class="col-sm-7">
			        {!! Form::text('pono', null, ['class' => 'form-control','id'=>'policyNo']) !!}
			        @if ($errors->has('pono'))
			            <span class="help-block">
			                <strong style="color: red;">{{ $errors->first('pono') }}</strong>
			            </span>
			        @endif
			    </div>
			</div>
			<div class="form-group">
				<label class="col-sm-5 control-label">Loan Amount</label>
			    <div class="col-sm-7">
			        {!! Form::text('loan_amt', null, ['class' => 'form-control']) !!}
			        @if ($errors->has('loan_amt'))
			            <span class="help-block">
			                <strong style="color: red;">{{ $errors->first('loan_amt') }}</strong>
			            </span>
			        @endif
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-sm-5 control-label">Loan Taken Date</label>
			    <div class="col-sm-7">
			        {!! Form::text('loan_taken_dt', null, ['class' => 'form-control']) !!}
			        @if ($errors->has('loan_taken_dt'))
			            <span class="help-block">
			                <strong style="color: red;">{{ $errors->first('loan_taken_dt') }}</strong>
			            </span>
			        @endif
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-sm-5 control-label">Loan Int.</label>
			    <div class="col-sm-7">
			        {!! Form::text('loan_int', null, ['class' => 'form-control']) !!}
			        @if ($errors->has('loan_int'))
			            <span class="help-block">
			                <strong style="color: red;">{{ $errors->first('loan_int') }}</strong>
			            </span>
			        @endif
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-sm-5 control-label">Next Due Installment</label>
			    <div class="col-sm-7">
			        {!! Form::text('next_due', null, ['class' => 'form-control']) !!}
			        @if ($errors->has('next_due'))
			            <span class="help-block">
			                <strong style="color: red;">{{ $errors->first('next_due') }}</strong>
			            </span>
			        @endif
			    </div>
			</div>
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