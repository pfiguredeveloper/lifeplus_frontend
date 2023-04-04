<div class="main-layout">

<div id="exTab2"> 
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#1" data-toggle="tab">1. Agent Information Details</a>
        </li>
        <li>
            <a href="#2" data-toggle="tab">2. Agent Address & Contact Details</a>
        </li>
        <li>
            <a href="#3" data-toggle="tab">3. Agent Introduction Details</a>
        </li>
        <li>
            <a href="#4" data-toggle="tab">4. Agent Profile Details</a>
        </li>
    </ul>

    <div class="tab-content">
    	
    	<div class="tab-pane active" id="1">
    		<div class="panel-body">
		        <div class="row">
		            <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h4 class="panel-title">Agent Information Details</h4>
	                    </div>
	                    
	                    <div class="panel-body">
	                    	<div class="add-new-include" id="add-new-include" style="margin-left: 15px;">
	                    		<div class="row include-class">
			                    	<div class="col-md-6">
			                    		<div class="form-group">
										    <label class="col-sm-3 control-label">Agency Name</label>
										    <div class="col-sm-6">
										        {!! Form::text('ANAME', null, ['class' => 'form-control']) !!}
										        @if ($errors->has('ANAME'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('ANAME') }}</strong>
										            </span>
										        @endif
										    </div>

										    <label class="col-sm-1 control-label">ID</label>
										    <div class="col-sm-2">
										        {!! Form::text('AGNO', null, ['class' => 'form-control']) !!}
										        @if ($errors->has('AGNO'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('AGNO') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('BD') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Birth Date</label>
										    <div class="col-sm-9">
										    	<?php $BD = !empty($agency['BD']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $agency['BD'])->format('d/m/Y') : null; ?>
										      	{!! Form::text('BD', $BD, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
										        @if ($errors->has('BD'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('BD') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('WDT') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Wedding Date</label>
										    <div class="col-sm-9">
										    	<?php $WDT = !empty($agency['WDT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $agency['WDT'])->format('d/m/Y') : null; ?>
										        {!! Form::text('WDT', $WDT, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
										        @if ($errors->has('WDT'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('WDT') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('APP_DT') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Appt. Date</label>
										    <div class="col-sm-9">
										    	<?php $APP_DT = !empty($agency['APP_DT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $agency['APP_DT'])->format('d/m/Y') : null; ?>
										        {!! Form::text('APP_DT', $APP_DT, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
										        @if ($errors->has('APP_DT'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('APP_DT') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('DOCODE') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">DO Name</label>
										    <div class="col-sm-9">
										    	<div class="input-group-data">
										    	{!! Form::select('DOCODE', [''=>'']+$doname, !empty($agency['DOCODE']) ? $agency['DOCODE'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"do_sel"]) !!}
										    	<span class="input-group-addon" data-table="do" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
										    	</div>
										    	@if ($errors->has('DOCODE'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('DOCODE') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('BANKCD') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Bank Name</label>
										    <div class="col-sm-9 input-group-data">
										    	{!! Form::select('BANKCD', [''=>'']+$bankname, !empty($agency['BANKCD']) ? $agency['BANKCD'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"bank_sel"]) !!}
										    	<span class="input-group-addon bank-model-form" data-table="bank" data-toggle="modal" data-target="#exampleBankModalLong"><i class="fa fa-plus"></i></span>
										        @if ($errors->has('BANKCD'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('BANKCD') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group">
										    <label class="col-sm-3 control-label">Servicing</label>
										    <div class="col-sm-3">
										        {!! Form::select('SERVICING', [''=>'','Yes'=>'Yes','No'=>'No'], !empty($agency['SERVICING']) ? $agency['SERVICING'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
										        @if ($errors->has('SERVICING'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('SERVICING') }}</strong>
										            </span>
										        @endif
										    </div>

										    <label class="col-sm-3 control-label">Terminated</label>
										    <div class="col-sm-3">
										        {!! Form::select('TERMINATE', [''=>'','Yes'=>'Yes','No'=>'No'], !empty($agency['TERMINATE']) ? $agency['TERMINATE'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
										        @if ($errors->has('TERMINATE'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('TERMINATE') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group">
										    <label class="col-sm-3 control-label">License No.</label>
										    <div class="col-sm-3">
										        {!! Form::text('LICENCE', null, ['class' => 'form-control']) !!}
										        @if ($errors->has('LICENCE'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('LICENCE') }}</strong>
										            </span>
										        @endif
										    </div>

										    <label class="col-sm-3 control-label">Last Renu.Dt</label>
										    <div class="col-sm-3">
										    	<?php $RENEDT = !empty($agency['RENEDT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $agency['RENEDT'])->format('d/m/Y') : null; ?>
										        {!! Form::text('RENEDT', $RENEDT, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
										        @if ($errors->has('RENEDT'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('RENEDT') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group">
										    <label class="col-sm-3 control-label">Last Exp.Dt</label>
										    <div class="col-sm-3">
										    	<?php $LICEXPDT = !empty($agency['LICEXPDT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $agency['LICEXPDT'])->format('d/m/Y') : null; ?>
										        {!! Form::text('LICEXPDT', $LICEXPDT, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
										        @if ($errors->has('LICEXPDT'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('LICEXPDT') }}</strong>
										            </span>
										        @endif
										    </div>

										    <label class="col-sm-3 control-label">Training Renew Dt</label>
										    <div class="col-sm-3">
										    	<?php $TR_RENEWDT = !empty($agency['TR_RENEWDT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $agency['TR_RENEWDT'])->format('d/m/Y') : null; ?>
										        {!! Form::text('TR_RENEWDT', $TR_RENEWDT, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
										        @if ($errors->has('TR_RENEWDT'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('TR_RENEWDT') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('NOMINEE') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Nominee</label>
										    <div class="col-sm-9">
										        {!! Form::text('NOMINEE', null, ['class' => 'form-control']) !!}
										        @if ($errors->has('NOMINEE'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('NOMINEE') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('LICUSERID') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Lic Agent Apps User</label>
										    <div class="col-sm-9">
										        {!! Form::text('LICUSERID', null, ['class' => 'form-control']) !!}
										        @if ($errors->has('LICUSERID'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('LICUSERID') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

									</div>

									<div class="col-md-6">
										
										<div class="form-group{{ $errors->has('PHOTO') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Agent Photo</label>
										    <div class="col-sm-9">
										        {!! Form::file('PHOTO', ['class' => '', 'id'=> 'PHOTO', 'onChange'=>'AjaxUploadImage(this)','style'=>'margin-top: 6px;']) !!}

									            <?php
									            if (!empty($agency['PHOTO'])) {
									            ?>
									            <input type="hidden" name="PHOTO" value="{{$agency['PHOTO']}}">
									            <br><img id="DisplayImage" src="{{ url($agency['PHOTO']) }}" name="img" id="img" width="150" style="padding-bottom:5px" >
									            <?php
									            } else {
									                echo '<br><img id="DisplayImage" src="" width="150" height="135" style="display: none;"/>';
									                echo '<div id="DisplayDiv" style="display:block;"></div>';
									            } ?>

									            @if ($errors->has('PHOTO'))
									                <span class="help-block">
									                    <strong style="color: red;">{{ $errors->first('PHOTO') }}</strong>
									                </span>
									            @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('AGCODE') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Agency Code</label>
										    <div class="col-sm-9">
										        {!! Form::text('AGCODE', null, ['class' => 'form-control']) !!}
										        @if ($errors->has('AGCODE'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('AGCODE') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('BANKACNO') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Bank A/c No.</label>
										    <div class="col-sm-9">
										        {!! Form::text('BANKACNO', null, ['class' => 'form-control']) !!}
										        @if ($errors->has('BANKACNO'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('BANKACNO') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('CLUB') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Club Membership</label>
										    <div class="col-sm-9">
										    	{!! Form::select('CLUB', [''=>'','bm'=>'BM','cm'=>'CM','dm'=>'DM','no'=>'NO','zm'=>'ZM'], !empty($agency['CLUB']) ? $agency['CLUB'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
										        @if ($errors->has('CLUB'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('CLUB') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('BRANCHCODE') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Branch</label>
										    <div class="col-sm-9 input-group-data">
										    	{!! Form::select('BRANCHCODE', [''=>'']+$branchname, !empty($agency['BRANCHCODE']) ? $agency['BRANCHCODE'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"branch_sel"]) !!}
										    	<span class="input-group-addon branch-model-form" data-table="branch" data-toggle="modal" data-target="#exampleBranchModalLong"><i class="fa fa-plus"></i></span>
										    	@if ($errors->has('BRANCHCODE'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('BRANCHCODE') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('PAN') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">PAN/GIR</label>
										    <div class="col-sm-9">
										        {!! Form::text('PAN', null, ['class' => 'form-control']) !!}
										        @if ($errors->has('PAN'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('PAN') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('EXP_DT') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Ending Date (MBG)</label>
										    <div class="col-sm-9">
										    	<?php $EXP_DT = !empty($agency['EXP_DT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $agency['EXP_DT'])->format('d/m/Y') : null; ?>
										        {!! Form::text('EXP_DT', $EXP_DT, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
										        @if ($errors->has('EXP_DT'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('EXP_DT') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

										<div class="form-group{{ $errors->has('LICPASS') ? ' has-error' : '' }}">
										    <label class="col-sm-3 control-label">Password</label>
										    <div class="col-sm-9">
										        {!! Form::text('LICPASS', null, ['class' => 'form-control']) !!}
										        @if ($errors->has('LICPASS'))
										            <span class="help-block">
										                <strong style="color: red;">{{ $errors->first('LICPASS') }}</strong>
										            </span>
										        @endif
										    </div>
										</div>

									</div>
								</div>
							</div>
	                    </div>
	                </div>
		        </div>
		    </div>
    	</div>

    	<div class="tab-pane" id="2">
    		<div class="panel-body">
		        <div class="row">
		            <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h4 class="panel-title">Agent Address & Contact Details</h4>
	                    </div>
	                    
	                    <div class="panel-body">
	                    	@if (!empty($contact) && $contact != [] && count($contact) > 0)
	                    		@foreach ($contact as $key => $include)
			                    	<div class="add-new-include" id="add-new-include" style="margin-left: 15px;">
			                    		<div class="row include-class">
			                    			@if ($key != 0)
			                    			<hr>
			                    			@endif
					                    	<div class="col-sm-5">
						                        <div class="form-group">
												    <label class="col-sm-3 control-label">(1)</label>
												    <div class="col-sm-8">
												    	<input type="text" name="address_group[{{$key}}][AD1]" class="form-control includetextbox" data-index="{{$key}}" id="FADD1" value="{{$include['AD1']}}">
												    </div>
												</div>

						                        <div class="form-group">
												    <label class="col-sm-3 control-label">(2)</label>
												    <div class="col-sm-8">
												    	<input type="text" name="address_group[{{$key}}][AD2]" class="form-control includetextbox" data-index="{{$key}}" id="FADD2" value="{{$include['AD2']}}">
												    </div>
												</div>

						                        <div class="form-group">
												    <label class="col-sm-3 control-label">(3)</label>
												    <div class="col-sm-8">
												    	<input type="text" name="address_group[{{$key}}][AD3]" class="form-control includetextbox" data-index="{{$key}}" id="FADD3" value="{{$include['AD3']}}">
												    </div>
												</div>

						                        <div class="col-sm-6 col-md-offset-1">
													<div class="form-group">
													    <label class="col-sm-4 control-label">City</label>
													    <div class="col-sm-8 input-group-data" style="padding-left: 8px !important;">
													    	<select name="address_group[{{$key}}][CITYID]" class="form-control includetextbox data-model-city-{{$key}}" data-index="{{$key}}" id="FCITY">
								                                <option value=""></option>
								                                @if(!empty($cityname))
								                                @foreach ($cityname as $key1 => $value)
								                                    <option value="{{ $key1 }}" @if($key1 == $include['CITYID']) selected='selected' @endif />{{ $value }}</option>
								                                @endforeach
								                                @endif
								                            </select>
								                            <span class="input-group-addon city-model-form" data-table="city" data-model-id="{{$key}}" data-toggle="modal" data-target="#exampleCityModalLong" style="padding: 6px 6px !important;"><i class="fa fa-plus"></i></span>
													    </div>
													</div>
												</div>

												<div class="col-sm-4">
													<div class="form-group">
													    <label class="col-sm-4 control-label">Pin</label>
													    <div class="col-sm-8" style="padding-right:3px !important;">
													    	<input type="number" name="address_group[{{$key}}][PIN]" class="form-control includetextbox" data-index="{{$key}}" id="FPIN" value="{{$include['PIN']}}">
													    </div>
													</div>
												</div>

												<div class="form-group">
												    <label class="col-sm-3 control-label">Area</label>
												    <div class="col-sm-8 input-group-data">
												    	<select name="address_group[{{$key}}][ARECD]" class="form-control includetextbox data-model-area-{{$key}}" data-index="{{$key}}" id="FARECD">
							                                <option value=""></option>
							                                @if(!empty($areaname))
								                                @foreach ($areaname as $key2 => $value)
								                                    <option value="{{ $key2 }}" @if($key2 == $include['ARECD']) selected='selected' @endif />{{ $value }}</option>
								                                @endforeach
							                                @endif
							                            </select>
							                            <span class="input-group-addon" data-model-id="{{$key}}" data-table="area" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
												    </div>
												</div>
											</div>

											<div class="col-sm-5">
												<div class="form-group">
												    <label class="col-sm-3 control-label">Phone (O)</label>
												    <div class="col-sm-8">
												    	<input type="text" name="address_group[{{$key}}][PHONE_O]" class="form-control includetextbox" data-index="{{$key}}" id="FPHONEO" value="{{$include['PHONE_O']}}">
												    </div>
												</div>

												<div class="form-group">
												    <label class="col-sm-3 control-label">Phone (R)</label>
												    <div class="col-sm-8">
												    	<input type="text" name="address_group[{{$key}}][PHONE_R]" class="form-control includetextbox" data-index="{{$key}}" id="FPHONER" value="{{$include['PHONE_R']}}">
												    </div>
												</div>

												<div class="form-group">
												    <label class="col-sm-3 control-label">Mobile</label>
												    <div class="col-sm-8">
												    	<input type="text" name="address_group[{{$key}}][MOBILE]" class="form-control includetextbox" data-index="{{$key}}" id="FMOBILE" value="{{$include['MOBILE']}}">
												    </div>
												</div>

												<div class="form-group">
												    <label class="col-sm-3 control-label">Fax</label>
												    <div class="col-sm-8">
												    	<input type="text" name="address_group[{{$key}}][PAGER_FAX]" class="form-control includetextbox" data-index="{{$key}}" id="FFAX" value="{{$include['PAGER_FAX']}}">
												    </div>
												</div>

												<div class="form-group">
												    <label class="col-sm-3 control-label">Email</label>
												    <div class="col-sm-8">
												    	<input type="text" name="address_group[{{$key}}][EMAIL]" class="form-control includetextbox" data-index="{{$key}}" id="FEMAIL" value="{{$include['EMAIL']}}">
												    </div>
												</div>
											</div>

											<div class="col-sm-2">
												<div class="col-sm-12">
				                                    <div class="form-group">
				                                    	@if ($key == 0)
				                                            <button class="btn btn-info button-add-address" type="button"><li class="fa fa-plus"></li></button>
				                                        @else
				                                            <button class="btn btn-info button-add-address" type="button"><li class="fa fa-plus"></li></button>
				                                            <button class="btn btn-danger button-delete-address" type="button"><li class="fa fa-minus"></li></button>
				                                        @endif
				                                    </div>
				                                </div>
											</div>
										</div>
									</div>
								@endforeach
	                    	@else
		                    	<div class="add-new-include" id="add-new-include" style="margin-left: 15px;">
		                    		<div class="row include-class">
				                    	<div class="col-sm-5">
					                        <div class="form-group">
											    <label class="col-sm-3 control-label">(1)</label>
											    <div class="col-sm-8">
											    	<input type="text" name="address_group[0][AD1]" class="form-control includetextbox" data-index="0" id="FADD1">
											    </div>
											</div>

					                        <div class="form-group">
											    <label class="col-sm-3 control-label">(2)</label>
											    <div class="col-sm-8">
											    	<input type="text" name="address_group[0][AD2]" class="form-control includetextbox" data-index="0" id="FADD2">
											    </div>
											</div>

					                        <div class="form-group">
											    <label class="col-sm-3 control-label">(3)</label>
											    <div class="col-sm-8">
											    	<input type="text" name="address_group[0][AD3]" class="form-control includetextbox" data-index="0" id="FADD3">
											    </div>
											</div>

					                        <div class="col-sm-6 col-md-offset-1">
												<div class="form-group">
												    <label class="col-sm-4 control-label">City</label>
												    <div class="col-sm-8 input-group-data" style="padding-left: 8px !important;">
												    	<select name="address_group[0][CITYID]" class="form-control includetextbox data-model-city-0" data-index="0" id="FCITY">
							                                <option value=""></option>
							                                @if(!empty($cityname))
							                                @foreach ($cityname as $key => $value)
							                                    <option value="{{ $key }}" />{{ $value }}</option>
							                                @endforeach
							                                @endif
							                            </select>
							                            <span class="input-group-addon city-model-form" data-table="city" data-model-id="0" data-toggle="modal" data-target="#exampleCityModalLong" style="padding: 6px 6px !important;"><i class="fa fa-plus"></i></span>
												    </div>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-group">
												    <label class="col-sm-4 control-label">Pin</label>
												    <div class="col-sm-8" style="padding-right:3px !important;">
												    	<input type="number" name="address_group[0][PIN]" class="form-control includetextbox" data-index="0" id="FPIN">
												    </div>
												</div>
											</div>

											<div class="form-group">
											    <label class="col-sm-3 control-label">Area</label>
											    <div class="col-sm-8 input-group-data">
											    	<select name="address_group[0][ARECD]" class="form-control includetextbox data-model-area-0" data-index="0" id="FARECD">
						                                <option value=""></option>
						                                @if(!empty($areaname))
							                                @foreach ($areaname as $key => $value)
							                                    <option value="{{ $key }}" />{{ $value }}</option>
							                                @endforeach
						                                @endif
						                            </select>
						                            <span class="input-group-addon" data-model-id="0" data-table="area" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
											    </div>
											</div>
										</div>

										<div class="col-sm-5">
											<div class="form-group">
											    <label class="col-sm-3 control-label">Phone (O)</label>
											    <div class="col-sm-8">
											    	<input type="text" name="address_group[0][PHONE_O]" class="form-control includetextbox" data-index="0" id="FPHONEO">
											    </div>
											</div>

											<div class="form-group">
											    <label class="col-sm-3 control-label">Phone (R)</label>
											    <div class="col-sm-8">
											    	<input type="text" name="address_group[0][PHONE_R]" class="form-control includetextbox" data-index="0" id="FPHONER">
											    </div>
											</div>

											<div class="form-group">
											    <label class="col-sm-3 control-label">Mobile</label>
											    <div class="col-sm-8">
											    	<input type="text" name="address_group[0][MOBILE]" class="form-control includetextbox" data-index="0" id="FMOBILE">
											    </div>
											</div>

											<div class="form-group">
											    <label class="col-sm-3 control-label">Fax</label>
											    <div class="col-sm-8">
											    	<input type="text" name="address_group[0][PAGER_FAX]" class="form-control includetextbox" data-index="0" id="FFAX">
											    </div>
											</div>

											<div class="form-group">
											    <label class="col-sm-3 control-label">Email</label>
											    <div class="col-sm-8">
											    	<input type="text" name="address_group[0][EMAIL]" class="form-control includetextbox" data-index="0" id="FEMAIL">
											    </div>
											</div>
										</div>

										<div class="col-sm-2">
											<div class="col-sm-12">
			                                    <div class="form-group">
		                                            <button class="btn btn-info button-add-address" type="button"><li class="fa fa-plus"></li></button>
			                                    </div>
			                                </div>
										</div>
									</div>
								</div>
							@endif
	                    </div>
	                </div>
		        </div>
		    </div>
    	</div>

    	<div class="tab-pane" id="3">
    		<div class="panel-body">
		        <div class="row">
		            <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h4 class="panel-title">Agent Introduction Details</h4>
	                    </div>
	                    
	                    <div class="panel-body">
	                        <div class="form-group{{ $errors->has('AGTINTRO') ? ' has-error' : '' }}">
							    <label class="col-sm-3 control-label">Agent Introduction</label>
							    <div class="col-sm-6">
							    	{!! Form::textarea('AGTINTRO', null, ['class' => 'form-control','rows'=>3,'cols'=>50]) !!}
							        @if ($errors->has('AGTINTRO'))
							            <span class="help-block">
							                <strong style="color: red;">{{ $errors->first('AGTINTRO') }}</strong>
							            </span>
							        @endif
							    </div>
							</div>
	                    </div>
	                </div>
		        </div>
		    </div>
    	</div>

    	<div class="tab-pane" id="4">
    		<div class="panel-body">
		        <div class="row">
		            <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h4 class="panel-title">Agent Profile Details</h4>
	                    </div>
	                    
	                    <div class="panel-body">
	                        <div class="form-group{{ $errors->has('AGTABOUT') ? ' has-error' : '' }}">
							    <label class="col-sm-3 control-label">Agent Profile</label>
							    <div class="col-sm-6">
							    	{!! Form::textarea('AGTABOUT', null, ['class' => 'form-control','rows'=>3,'cols'=>50]) !!}
							        @if ($errors->has('AGTABOUT'))
							            <span class="help-block">
							                <strong style="color: red;">{{ $errors->first('AGTABOUT') }}</strong>
							            </span>
							        @endif
							    </div>
							</div>
	                    </div>
	                </div>
		        </div>
		    </div>
    	</div>

    </div>
</div>


<div id="add_address_button_click" style="display: none;">
	<div class="row include-class" style="margin-top:10px">
		<hr>
    	<div class="col-sm-5">
            <div class="form-group">
			    <label class="col-sm-3 control-label">(1)</label>
			    <div class="col-sm-8">
			    	<input type="text" name="PRODUCT_INCLUDE_ADD1" class="form-control includetextbox" data-index="PRODUCT_INCLUDE_ID">
			    </div>
			</div>

            <div class="form-group">
			    <label class="col-sm-3 control-label">(2)</label>
			    <div class="col-sm-8">
			    	<input type="text" name="PRODUCT_INCLUDE_ADD2" class="form-control includetextbox" data-index="PRODUCT_INCLUDE_ID">
			    </div>
			</div>

            <div class="form-group">
			    <label class="col-sm-3 control-label">(3)</label>
			    <div class="col-sm-8">
			    	<input type="text" name="PRODUCT_INCLUDE_ADD3" class="form-control includetextbox" data-index="PRODUCT_INCLUDE_ID">
			    </div>
			</div>

            <div class="col-sm-6 col-md-offset-1">
				<div class="form-group">
				    <label class="col-sm-4 control-label">City</label>
				    <div class="col-sm-8 input-group-data" style="padding-left: 8px !important;">
				    	<select name="PRODUCT_INCLUDE_CITY" class="form-control includetextbox data-model-city-PRODUCT_INCLUDE_ID" data-index="PRODUCT_INCLUDE_ID">
                            <option value=""></option>
                            @if(!empty($cityname))
	                            @foreach ($cityname as $key => $value)
	                                <option value="{{ $key }}" />{{ $value }}</option>
	                            @endforeach
                            @endif
                        </select>
                        <span class="input-group-addon city-model-form" data-table="city" data-model-id="PRODUCT_INCLUDE_ID" data-toggle="modal" data-target="#exampleCityModalLong" style="padding: 6px 6px !important;"><i class="fa fa-plus"></i></span>
				    </div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
				    <label class="col-sm-4 control-label">Pin</label>
				    <div class="col-sm-8" style="padding-right:3px !important;">
				    	<input type="number" name="PRODUCT_INCLUDE_PIN" class="form-control includetextbox" data-index="PRODUCT_INCLUDE_ID">
				    </div>
				</div>
			</div>

			<div class="form-group">
			    <label class="col-sm-3 control-label">Area</label>
			    <div class="col-sm-8 input-group-data">
			    	<select name="PRODUCT_INCLUDE_AREA" class="form-control includetextbox data-model-area-PRODUCT_INCLUDE_ID" data-index="PRODUCT_INCLUDE_ID">
                        <option value=""></option>
                        @if(!empty($areaname))
	                        @foreach ($areaname as $key => $value)
	                            <option value="{{ $key }}" />{{ $value }}</option>
	                        @endforeach
                        @endif
                    </select>
                    <span class="input-group-addon" data-model-id="PRODUCT_INCLUDE_ID" data-table="area" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
			    </div>
			</div>
		</div>

		<div class="col-sm-5">
			<div class="form-group">
			    <label class="col-sm-3 control-label">Phone (O)</label>
			    <div class="col-sm-8">
			    	<input type="text" name="PRODUCT_INCLUDE_PHONE_O" class="form-control includetextbox" data-index="PRODUCT_INCLUDE_ID">
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-3 control-label">Phone (R)</label>
			    <div class="col-sm-8">
			    	<input type="text" name="PRODUCT_INCLUDE_PHONE_R" class="form-control includetextbox" data-index="PRODUCT_INCLUDE_ID">
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-3 control-label">Mobile</label>
			    <div class="col-sm-8">
			    	<input type="text" name="PRODUCT_INCLUDE_MOBILE" class="form-control includetextbox" data-index="PRODUCT_INCLUDE_ID">
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-3 control-label">Fax</label>
			    <div class="col-sm-8">
			    	<input type="text" name="PRODUCT_INCLUDE_PAGER_FAX" class="form-control includetextbox" data-index="PRODUCT_INCLUDE_ID">
			    </div>
			</div>

			<div class="form-group">
			    <label class="col-sm-3 control-label">Email</label>
			    <div class="col-sm-8">
			    	<input type="text" name="PRODUCT_INCLUDE_EMAIL" class="form-control includetextbox" data-index="PRODUCT_INCLUDE_ID">
			    </div>
			</div>
		</div>

		<div class="col-sm-2">
			<div class="col-sm-12">
                <div class="form-group">
                    <button class="btn btn-info button-add-address" type="button"><li class="fa fa-plus"></li></button>
                    <button class="btn btn-danger button-delete-address" type="button"><li class="fa fa-minus"></li></button>
                </div>
            </div>
		</div>
	</div>
</div>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

	$('.main-layout').on("click", ".button-add-address", function(){
        var appendHtml = $('#add_address_button_click').html();
        var dom = $('.add-new-include:last').find('.include-class input');
        var lastIndex = dom[dom.length-1].getAttribute("data-index");
        var count = Number(lastIndex) + 1;
        var newappendHtml =  appendHtml.replace(/PRODUCT_INCLUDE_ID/g, count).replace(/PRODUCT_INCLUDE_ADD1/g, 'address_group[' + count + '][AD1]').replace(/PRODUCT_INCLUDE_ADD2/g, 'address_group[' + count + '][AD2]').replace(/PRODUCT_INCLUDE_ADD3/g, 'address_group[' + count + '][AD3]').replace(/PRODUCT_INCLUDE_CITY/g, 'address_group[' + count + '][CITYID]').replace(/PRODUCT_INCLUDE_PIN/g, 'address_group[' + count + '][PIN]').replace(/PRODUCT_INCLUDE_AREA/g, 'address_group[' + count + '][ARECD]').replace(/PRODUCT_INCLUDE_PHONE_O/g, 'address_group[' + count + '][PHONE_O]').replace(/PRODUCT_INCLUDE_PHONE_R/g, 'address_group[' + count + '][PHONE_R]').replace(/PRODUCT_INCLUDE_MOBILE/g, 'address_group[' + count + '][MOBILE]').replace(/PRODUCT_INCLUDE_PAGER_FAX/g, 'address_group[' + count + '][PAGER_FAX]').replace(/PRODUCT_INCLUDE_EMAIL/g, 'address_group[' + count + '][EMAIL]');
        $('.add-new-include:last').append( newappendHtml );
    });

    $('.main-layout').on('click','.button-delete-address',function(){
        $(this).parents('.include-class').remove();
        $(".includetextbox").focus();
        return false;
    });

	function AjaxUploadImage(obj,id) {
        var file = obj.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            $('#previewing'+URL).attr('src', 'noimage.png');
            alert("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
        } else {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(obj.files[0]);
        }
    }

    function imageIsLoaded(e,url,url1) {
        if(url!=undefined) {
            var x=document.getElementById('image_name').value = url1;
            $('#DisplayImage').css("display", "block");
            $('#DisplayDiv').css("display", "none");
            $('#DisplayImage').attr('src', url);
            $('#DisplayImage').attr('width', '150');
            $('#DisplayImage').attr('height', '135');
        } else {
            $('#DisplayImage').css("display", "block");
            $('#DisplayDiv').css("display", "none");
            $('#DisplayImage').attr('src', e.target.result);
            $('#DisplayImage').attr('width', '150');
            $('#DisplayImage').attr('height', '135');
        }
    };
</script>