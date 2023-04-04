<div class="col-md-7">
	<div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Name</label>
	    <div class="col-sm-8">
	        {!! Form::text('c_name', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('c_name'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_name') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('c_agt_ad1') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Address 1</label>
	    <div class="col-sm-8">
	        {!! Form::text('c_agt_ad1', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('c_agt_ad1'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_agt_ad1') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('c_agt_ad2') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Address 2</label>
	    <div class="col-sm-8">
	        {!! Form::text('c_agt_ad2', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('c_agt_ad2'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_agt_ad2') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('c_agt_ad3') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Address 3</label>
	    <div class="col-sm-8">
	        {!! Form::text('c_agt_ad3', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('c_agt_ad3'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_agt_ad3') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="col-sm-6 col-md-offset-2">
		<div class="form-group{{ $errors->has('c_city_id') ? ' has-error' : '' }}">
		    <label class="col-sm-4 control-label">City</label>
		    <div class="col-sm-8 input-group-data" style="padding-left: 10px !important;">
		        {!! Form::select('c_city_id', [''=>'']+$city, !empty($clients['c_city_id']) ? $clients['c_city_id'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
		         <span class="input-group-addon city-model-form" data-table="city" data-toggle="modal" data-target="#exampleCityModalLong"><i class="fa fa-plus"></i></span>
		        @if ($errors->has('c_city_id'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('c_city_id') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group{{ $errors->has('c_pin') ? ' has-error' : '' }}">
		    <label class="col-sm-4 control-label">Pin</label>
		    <div class="col-sm-8" style="padding-right:0px !important;">
		        {!! Form::text('c_pin', null, ['class' => 'form-control']) !!}
		        @if ($errors->has('c_pin'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('c_pin') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>

	<div class="form-group{{ $errors->has('c_email') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Email</label>
	    <div class="col-sm-8">
	    	{!! Form::text('c_email', null, ['class' => 'form-control']) !!}
	    	@if ($errors->has('c_email'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_email') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('c_birth_date') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Birthday</label>
	    <div class="col-sm-8">
	        {!! Form::text('c_birth_date', null, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
	        @if ($errors->has('c_birth_date'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_birth_date') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('c_docode') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">DO</label>
	    <div class="col-sm-8 input-group-data">
	        {!! Form::select('c_docode', [''=>'']+$doname, !empty($clients['c_docode']) ? $clients['c_docode'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"do_sel"]) !!}
	    	<span class="input-group-addon" data-table="do" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
	    	@if ($errors->has('c_docode'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_docode') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Remark</label>
	    <div class="col-sm-8">
	        {!! Form::text('remark', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('remark'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('remark') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
</div>

<div class="col-md-5">
	<div class="form-group" style="padding-top: 35px !important;">
	</div>

	<div class="form-group{{ $errors->has('c_phone_o') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Phone (O)</label>
	    <div class="col-sm-8">
	        {!! Form::text('c_phone_o', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('c_phone_o'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_phone_o') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('c_phone_r') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Phone (R)</label>
	    <div class="col-sm-8">
	        {!! Form::text('c_phone_r', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('c_phone_r'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_phone_r') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('c_mobile') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Mobile</label>
	    <div class="col-sm-8">
	        {!! Form::text('c_mobile', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('c_mobile'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_mobile') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('c_post') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Post</label>
	    <div class="col-sm-8 input-group-data">
	    	{!! Form::select('c_post', [''=>'']+$courier, !empty($clients['c_post']) ? $clients['c_post'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"courier_sel"]) !!}
	    	<span class="input-group-addon courier-model-form" data-table="courier" data-toggle="modal" data-target="#exampleCourierModalLong"><i class="fa fa-plus"></i></span>
	        @if ($errors->has('c_post'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_post') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group" style="padding-top: 35px !important;">
	</div>

	<div class="form-group{{ $errors->has('c_marriagedt') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Wed.Dt.</label>
	    <div class="col-sm-8">
	        {!! Form::text('c_marriagedt', null, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
	        @if ($errors->has('c_marriagedt'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_marriagedt') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('c_branch_id') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Branch</label>
	    <div class="col-sm-8 input-group-data">
	        {!! Form::select('c_branch_id', [''=>'']+$branchname, !empty($clients['c_branch_id']) ? $clients['c_branch_id'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"branch_sel"]) !!}
	    	<span class="input-group-addon branch-model-form" data-table="branch" data-toggle="modal" data-target="#exampleBranchModalLong"><i class="fa fa-plus"></i></span>
	    	@if ($errors->has('c_branch_id'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('c_branch_id') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('roles_id') ? ' has-error' : '' }}">
	    <label class="col-sm-4 control-label">Roles</label>
	    <div class="col-sm-8">
	    	{!! Form::select('roles_id', [''=>'']+$role, !empty($clients['roles_id']) ? $clients['roles_id'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
	        @if ($errors->has('roles_id'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('roles_id') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>
</div>
