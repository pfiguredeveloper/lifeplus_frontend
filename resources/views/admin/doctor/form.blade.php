<div class="col-md-7">
	<div class="form-group{{ $errors->has('DOCTOR') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Doctor Name</label>
	    <div class="col-sm-8">
	        {!! Form::text('DOCTOR', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('DOCTOR'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('DOCTOR') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('ADDRESS') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Address</label>
	    <div class="col-sm-8">
	    	{!! Form::textarea('ADDRESS', null, ['class' => 'form-control','rows'=>3,'cols'=>50]) !!}
	        @if ($errors->has('ADDRESS'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('ADDRESS') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="col-sm-6 col-md-offset-2">
		<div class="form-group{{ $errors->has('CITYID') ? ' has-error' : '' }}">
		    <label class="col-sm-4 control-label">City</label>
		    <div class="col-sm-8 input-group-data" style="padding-left: 10px !important;">
		        {!! Form::select('CITYID', [''=>'']+$city, !empty($doctor['CITYID']) ? $doctor['CITYID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
		         <span class="input-group-addon city-model-form" data-table="city" data-toggle="modal" data-target="#exampleCityModalLong"><i class="fa fa-plus"></i></span>
		        @if ($errors->has('CITYID'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('CITYID') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group{{ $errors->has('PIN') ? ' has-error' : '' }}">
		    <label class="col-sm-4 control-label">Pin</label>
		    <div class="col-sm-8" style="padding-right:0px !important;">
		        {!! Form::text('PIN', null, ['class' => 'form-control']) !!}
		        @if ($errors->has('PIN'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('PIN') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>

	<div class="form-group{{ $errors->has('ARECD') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Area</label>
	    <div class="col-sm-8 input-group-data">
	    	{!! Form::select('ARECD', [''=>'']+$area, !empty($doctor['ARECD']) ? $doctor['ARECD'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"area_sel"]) !!}
	    	<span class="input-group-addon" data-table="area" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
	        @if ($errors->has('ARECD'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('ARECD') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('PHONE_O') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Phone (O)</label>
	    <div class="col-sm-8">
	        {!! Form::text('PHONE_O', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('PHONE_O'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('PHONE_O') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('EMAIL') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Email</label>
	    <div class="col-sm-8">
	        {!! Form::text('EMAIL', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('EMAIL'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('EMAIL') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="col-sm-5 col-md-offset-2">
		<div class="form-group{{ $errors->has('APP_DATE') ? ' has-error' : '' }}">
		    <label class="col-sm-5 control-label">Appt. Date</label>
		    <div class="col-sm-7" style="padding-left: 6px !important;">
		        {!! Form::text('APP_DATE', null, ['class' => 'form-control datepicker2','placeholder'=>"yyyy-mm-dd"]) !!}
		        @if ($errors->has('APP_DATE'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('APP_DATE') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>

	<div class="col-sm-5">
		<div class="form-group{{ $errors->has('RET_DATE') ? ' has-error' : '' }}">
		    <label class="col-sm-5 control-label">Retire. Date</label>
		    <div class="col-sm-7" style="padding-right:0px !important;">
		        {!! Form::text('RET_DATE', null, ['class' => 'form-control datepicker2','placeholder'=>"yyyy-mm-dd"]) !!}
		        @if ($errors->has('RET_DATE'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('RET_DATE') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group{{ $errors->has('SPECIALIST') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Specialist</label>
	    <div class="col-sm-8">
	        {!! Form::text('SPECIALIST', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('SPECIALIST'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('SPECIALIST') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('DOC_CODE') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Code</label>
	    <div class="col-sm-8">
	        {!! Form::text('DOC_CODE', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('DOC_CODE'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('DOC_CODE') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('SHRTNM') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Short Name</label>
	    <div class="col-sm-8">
	        {!! Form::text('SHRTNM', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('SHRTNM'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('SHRTNM') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('LIMIT_DATA') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Limit</label>
	    <div class="col-sm-8">
	        {!! Form::number('LIMIT_DATA', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('LIMIT_DATA'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('LIMIT_DATA') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group" style="padding-top: 25px !important;">
	</div>
	<div class="form-group{{ $errors->has('PHONE_R') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Phone (R)</label>
	    <div class="col-sm-8">
	        {!! Form::text('PHONE_R', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('PHONE_R'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('PHONE_R') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('MOBILE') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Mobile</label>
	    <div class="col-sm-8">
	        {!! Form::text('MOBILE', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('MOBILE'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('MOBILE') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('STATUS') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Status</label>
	    <div class="col-sm-8">
	    	{!! Form::select('STATUS', [''=>'','continue'=>"Continue",'discontinue'=>"Discontinue"], !empty($doctor['STATUS']) ? $doctor['STATUS'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
	        @if ($errors->has('STATUS'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('STATUS') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
</div>
