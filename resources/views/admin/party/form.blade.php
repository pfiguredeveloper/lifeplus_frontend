<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
<div class="main-layout">
<div class="col-md-7">
	<div class="form-group{{ $errors->has('NAME') ? ' has-error' : '' }}">
	    <label class="col-sm-3 control-label">Party Name</label>
	    <div class="col-sm-9">
	        {!! Form::text('NAME', null, ['class' => 'form-control','id'=>'PartyName']) !!}
	        @if ($errors->has('NAME'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('NAME') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('FNM') ? ' has-error' : '' }}">
	    <label class="col-sm-3 control-label">Father Name</label>
	    <div class="col-sm-9">
	        {!! Form::text('FNM', null, ['class' => 'form-control']) !!}
	        @if ($errors->has('FNM'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('FNM') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="form-group{{ $errors->has('FNAME') ? ' has-error' : '' }}">
	    <label class="col-sm-3 control-label">Family Head</label>
	    <div class="col-sm-9 input-group-data">
	    	{!! Form::select('FNAME', [''=>'']+$family, !empty($party['FNAME']) ? $party['FNAME'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'family_group']) !!}
	    	<span class="input-group-addon family-model-form" data-table="family_group" data-toggle="modal" data-target="#exampleFamilyModalLong"><i class="fa fa-plus"></i></span>
	        @if ($errors->has('FNAME'))
	            <span class="help-block">
	                <strong style="color: red;">{{ $errors->first('FNAME') }}</strong>
	            </span>
	        @endif
	    </div>
	</div>

	<div class="col-sm-7">
		<div class="form-group{{ $errors->has('STATUS') ? ' has-error' : '' }}">
		    <label class="col-sm-5 control-label">Salute</label>
		    <div class="col-sm-7 input-group-data" style="padding-left: 12px !important;">
		        {!! Form::select('STATUS', [''=>'']+$status, !empty($party['STATUS']) ? $party['STATUS'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"status_sel"]) !!}
		        <span class="input-group-addon status-model-form" data-table="status" data-toggle="modal" data-target="#exampleStatusModalLong"><i class="fa fa-plus"></i></span>
		        @if ($errors->has('STATUS'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('STATUS') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>

	<div class="col-sm-5">
		<div class="form-group{{ $errors->has('SEX') ? ' has-error' : '' }}">
		    <label class="col-sm-4 control-label">Gender</label>
		    <div class="col-sm-8" style="padding-right:0px !important;">
		        {!! Form::select('SEX', [''=>'']+$gender, !empty($party['SEX']) ? $party['SEX'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
		        @if ($errors->has('SEX'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('SEX') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>

	<div class="col-sm-7">
		<div class="form-group{{ $errors->has('LIC_CUSID') ? ' has-error' : '' }}">
		    <label class="col-sm-5 control-label">LIC Cust. ID</label>
		    <div class="col-sm-7" style="padding-left: 12px !important;">
		        {!! Form::text('LIC_CUSID', null, ['class' => 'form-control']) !!}
		        @if ($errors->has('LIC_CUSID'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('LIC_CUSID') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>

	<div class="col-sm-5">
		<div class="form-group{{ $errors->has('CUSID') ? ' has-error' : '' }}">
		    <label class="col-sm-4 control-label">Cust. ID</label>
		    <div class="col-sm-8" style="padding-right:0px !important;">
		        {!! Form::text('CUSID', null, ['class' => 'form-control']) !!}
		        @if ($errors->has('CUSID'))
		            <span class="help-block">
		                <strong style="color: red;">{{ $errors->first('CUSID') }}</strong>
		            </span>
		        @endif
		    </div>
		</div>
	</div>

</div>

<div class="col-md-5">
	<div class="form-group{{ $errors->has('PHOTO') ? ' has-error' : '' }}">
	    <label class="col-sm-3 control-label">Photo</label>
	    <div class="col-sm-9">
	        {!! Form::file('PHOTO', ['class' => '', 'id'=> 'PHOTO', 'onChange'=>'AjaxUploadImage(this)','style'=>'margin-top: 6px;']) !!}

            <?php
            if (!empty($party['PHOTO'])) {
            ?>
            <input type="hidden" name="PHOTO" value="{{$party['PHOTO']}}">
            <br><img id="DisplayImage" src="{{ url($party['PHOTO']) }}" name="img" id="img" width="150" style="padding-bottom:5px" >
            <?php
            }else{
                echo '<br><img id="DisplayImage" src="" width="150" style="display: none;"/>';
            } ?>

            @if ($errors->has('PHOTO'))
                <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('PHOTO') }}</strong>
                </span>
            @endif
	    </div>
	</div>
</div>

<div class="col-md-12">
	<br>
	<div id="exTab2"> 
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#1" data-toggle="tab">1. Address & Contact Details</a>
            </li>
            <li>
                <a href="#2" data-toggle="tab">2. Occupation Details</a>
            </li>
            <li>
                <a href="#3" data-toggle="tab">3. Personal Details</a>
            </li>
            <li>
                <a href="#4" data-toggle="tab">4. Party Wise Bank Details</a>
            </li>
        </ul>

        <div class="tab-content">
        	<div class="tab-pane active" id="1">
        		<div class="panel-body">
			        <div class="row">
			            <div class="panel panel-default">
		                    <div class="panel-heading">
		                        <h4 class="panel-title">Address & Contact Details</h4>
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
									                                @if(!empty($city))
									                                @foreach ($city as $key1 => $value)
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
								                                @if(!empty($area))
									                                @foreach ($area as $key2 => $value)
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
								                                @if(!empty($city))
								                                @foreach ($city as $key => $value)
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
							                                @if(!empty($area))
								                                @foreach ($area as $key => $value)
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

        	<div class="tab-pane" id="2">
        		<div class="panel-body">
			        <div class="row">
			            <div class="panel panel-default">
		                    <div class="panel-heading">
		                        <h4 class="panel-title">Occupation Details</h4>
		                    </div>
		                    
		                    <div class="panel-body">
		                        <div class="col-sm-6">
					        		<div class="form-group{{ $errors->has('OCCUPATION') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Occupation</label>
									    <div class="col-sm-8">
									        {!! Form::text('OCCUPATION', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('OCCUPATION'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('OCCUPATION') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('DOCCU') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Occupation Detail</label>
									    <div class="col-sm-8">
									        {!! Form::text('DOCCU', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('DOCCU'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('DOCCU') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('DURATION') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Duration</label>
									    <div class="col-sm-8">
									        {!! Form::number('DURATION', null, ['class' => 'form-control','min'=>0,'max'=>99,'maxlength'=>2,'onkeypress'=>"isNumeric(event)",'oninput'=>"maxLengthCheck(this)"]) !!}
									        @if ($errors->has('DURATION'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('DURATION') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('AG_REL') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Is Relative of Agent?</label>
									    <div class="col-sm-8">
									    	{!! Form::select('AG_REL', [''=>'','Yes'=>'Yes','No'=>'No'], !empty($party['AG_REL']) ? $party['AG_REL'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'relation_agent']) !!}
									        @if ($errors->has('AG_REL'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('AG_REL') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('AG_W_REL') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Relation with Agent</label>
									    <div class="col-sm-8 input-group-data">
									    	{!! Form::select('AG_W_REL', [''=>'']+$relation, !empty($party['AG_W_REL']) ? $party['AG_W_REL'] : null, ['class' => 'form-control', 'style' => 'width: 100%',(!empty($party['AG_REL']) && $party['AG_REL'] == 'yes') ? '' :'disabled','id'=>'relation_with_agent']) !!}
									    	<span class="input-group-addon" data-table="relation" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
									        @if ($errors->has('AG_W_REL'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('AG_W_REL') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>
								</div>

								<div class="col-sm-6">
									
									<div class="form-group{{ $errors->has('EMPNO') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Employee No.</label>
									    <div class="col-sm-8">
									        {!! Form::text('EMPNO', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('EMPNO'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('EMPNO') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('INCOME') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Yearly Income</label>
									    <div class="col-sm-8">
									        {!! Form::number('INCOME', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('INCOME'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('INCOME') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('KNOWN_DT') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Known From Date</label>
									    <div class="col-sm-8">
									    	<?php $KNOWNDT = !empty($party['KNOWN_DT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $party['KNOWN_DT'])->format('d/m/Y') : null; ?>
									        {!! Form::text('KNOWN_DT', $KNOWNDT, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
									        @if ($errors->has('KNOWN_DT'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('KNOWN_DT') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('BLOOD') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Blood Group</label>
									    <div class="col-sm-8">
									        {!! Form::text('BLOOD', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('BLOOD'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('BLOOD') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('IS_NRI') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Is NRI?</label>
									    <div class="col-sm-8">
									    	{!! Form::select('IS_NRI', [''=>'','Yes'=>'Yes','No'=>'No'], !empty($party['IS_NRI']) ? $party['IS_NRI'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
									        @if ($errors->has('IS_NRI'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('IS_NRI') }}</strong>
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

        	<div class="tab-pane" id="3">
        		<div class="panel-body">
			        <div class="row">
			            <div class="panel panel-default">
		                    <div class="panel-heading">
		                        <h4 class="panel-title">Personal Details</h4>
		                    </div>
		                    
		                    <div class="panel-body">
		                        <div class="col-sm-6">
					        		<div class="form-group{{ $errors->has('BD') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Record Birth Date</label>
									    <div class="col-sm-8">
									    	<?php $BD = !empty($party['BD']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $party['BD'])->format('d/m/Y') : null; ?>
									    	{!! Form::text('BD', $BD, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
									        @if ($errors->has('BD'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('BD') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('WDT') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Wedding Date</label>
									    <div class="col-sm-8">
									    	<?php $WDT = !empty($party['WDT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $party['WDT'])->format('d/m/Y') : null; ?>
									    	{!! Form::text('WDT', $WDT, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
									        @if ($errors->has('WDT'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('WDT') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('BIRTHPLACE') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Birth Place</label>
									    <div class="col-sm-8 input-group-data">
									    	{!! Form::select('BIRTHPLACE', [''=>'']+$city, !empty($party['BIRTHPLACE']) ? $party['BIRTHPLACE'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
									    	<span class="input-group-addon city-model-form" data-table="city" data-toggle="modal" data-target="#exampleCityModalLong"><i class="fa fa-plus"></i></span>
									        @if ($errors->has('BIRTHPLACE'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('BIRTHPLACE') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('EDUCATION') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Education</label>
									    <div class="col-sm-8">
									        {!! Form::text('EDUCATION', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('EDUCATION'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('EDUCATION') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('C_GST') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">GST NO.</label>
									    <div class="col-sm-8">
									        {!! Form::text('C_GST', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('C_GST'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('C_GST') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('ADHARNO') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Aadhar No.</label>
									    <div class="col-sm-8">
									        {!! Form::text('ADHARNO', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('ADHARNO'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('ADHARNO') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group{{ $errors->has('ABD') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Actual Birth Date</label>
									    <div class="col-sm-8">
									    	<?php $ABD = !empty($party['ABD']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $party['ABD'])->format('d/m/Y') : null; ?>
									    	{!! Form::text('ABD', $ABD, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
									        @if ($errors->has('ABD'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('ABD') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('LAST_DEL') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Last Delivery</label>
									    <div class="col-sm-8">
									    	<?php $LASTDEL = !empty($party['LAST_DEL']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $party['LAST_DEL'])->format('d/m/Y') : null; ?>
									    	{!! Form::text('LAST_DEL', $LASTDEL, ['class' => 'form-control datepicker3','placeholder'=>'dd/mm/yyyy']) !!}
									        @if ($errors->has('LAST_DEL'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('LAST_DEL') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('MARK') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">ID Mark</label>
									    <div class="col-sm-8">
									        {!! Form::text('MARK', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('MARK'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('MARK') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('PANGIRNO') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">PAN / GIR</label>
									    <div class="col-sm-8">
									        {!! Form::text('PANGIRNO', null, ['class' => 'form-control']) !!}
									        @if ($errors->has('PANGIRNO'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('PANGIRNO') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>

									<div class="form-group{{ $errors->has('RELATION') ? ' has-error' : '' }}">
									    <label class="col-sm-4 control-label">Relation</label>
									    <div class="col-sm-8 input-group-data">
									    	{!! Form::select('RELATION', [''=>'']+$relation, !empty($party['RELATION']) ? $party['RELATION'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"relation_sel"]) !!}
									    	<span class="input-group-addon" data-table="rela" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
									        @if ($errors->has('RELATION'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('RELATION') }}</strong>
									            </span>
									        @endif
									    </div>
									</div>
								</div>

								<div class="col-sm-12 col-lg-12">
									<div class="form-group{{ $errors->has('NOTES') ? ' has-error' : '' }}">
										<label class="col-sm-2 control-label">Notes</label>
									    <div class="col-sm-10">
									        {!! Form::textarea('NOTES', null, ['class' => 'form-control','rows'=>3,'cols'=>50]) !!}
									        @if ($errors->has('NOTES'))
									            <span class="help-block">
									                <strong style="color: red;">{{ $errors->first('NOTES') }}</strong>
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

        	<div class="tab-pane" id="4">
        		<br>
			    <div class="panel-body">
			        <div class="row">
			            <div class="col-sm-12">
			                <div id="party-wise-bank-section">

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
                            @foreach ($city as $key => $value)
                                <option value="{{ $key }}" />{{ $value }}</option>
                            @endforeach
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
                        @foreach ($area as $key => $value)
                            <option value="{{ $key }}" />{{ $value }}</option>
                        @endforeach
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/js-grid/js-grid.js') }}"></script>
<script type="text/javascript">
	$(function() {
		var selection_relation = <?php echo !empty($bank) ? json_encode($bank) : []; ?>;
		var db = {
		    loadData: function(filter) {
		        return $.grep(this.prtWBnkDt, function(client) {
		            return true;
		        });
		    }
		};
		db.prtWBnkDt = $.parseJSON('<?php echo $prtWBnkDt; ?>');
        $("#party-wise-bank-section").jsGrid({
            width: "100%",
            inserting: true,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 15,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete the record?",
        	controller: db,
            fields: [
            	{ name: "bcode", title : "Bank", type: "select",align: "left", items: selection_relation, valueField: "Id",textField: "Name",validate: "required"},
                { name: "acno", title : "Account No.", type: "text",align: "left", validate: "required"},
                { name: "actype", title : "Account Type", type: "text",align: "left", validate: "required"},
                { name: "elec_no", title : "MICR No.", type: "text",align: "left", validate: "required"},
                { name: "ifscode", title : "IFS CODE", type: "text",align: "left", validate: "required"},
                { type: "control", modeSwitchButton: false }
            ]
        });
    });

    $(document).on("click",".save-party",function() {
    	if($("#PartyName").val() == '') {
    		alert("Name Field is required");
    		return false;
    	}
        var form = $(this).closest(".store-party-info");
        
        var formPostData = new FormData(this.form);
        var prtwbnkList = $('#party-wise-bank-section').jsGrid('option', 'data');
        
        if (prtwbnkList.length > 0) {
            $.each(prtwbnkList, function(k,v){
                $.each(v, function(r,d){
                    formPostData.append("PARTYWISEBANK["+k+"]["+r+"]", d);
                });
            });
        }

        if (typeof $(this).data('url') != 'undefined') {
            $nextUrl = $(this).data('url');
        } else {
            $nextUrl = '';
        }

        $.ajax({
            url: form.attr("action"),
            method: 'POST',
            data : formPostData,
            processData: false,
            contentType: false,
            success: function(result) {
                window.location.href = $nextUrl;
            }
        });
    });

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
        return false;
    });

    $(document).on("change","#relation_agent",function() {
        if($("#relation_agent").val() == 'yes') {
        	$("#relation_with_agent").removeAttr("disabled");
        } else {
        	$("#relation_with_agent").attr("disabled","disabled");
        }
    });

    $(document).on("change","#family_group",function() {
    	if($("#family_group").val() != '') {
        	$.ajax({
        		url: "{{ url('admin/getFamilyAddress') }}"+"/"+$("#family_group").val(),
                method: 'get',
                success: function(result) {
                	console.log(result);
                	if(!$.isEmptyObject(result)) {
                		$("#FADD1").val(result.GAD1);
                		$("#FADD2").val(result.GAD2);
                		$("#FADD3").val(result.GAD3);
                		$("#FCITY").val(result.CITY);
                		$("#FPIN").val(result.GPIN);
                		$("#FARECD").val(result.ARECD);
                		$("#FPHONEO").val(result.GPHON_O);
                		$("#FPHONER").val(result.GPHON_R);
                		$("#FMOBILE").val(result.GMOBILE);
                		//$("#FFAX").val(result.GPIN);
                		$("#FEMAIL").val(result.GEMAIL);
                	}
                }
        	});
        } else {
        	$("#FADD1").val('');
    		$("#FADD2").val('');
    		$("#FADD3").val('');
    		$("#FCITY").val('');
    		$("#FPIN").val('');
    		$("#FARECD").val('');
    		$("#FPHONEO").val('');
    		$("#FPHONER").val('');
    		$("#FMOBILE").val('');
    		//$("#FFAX").val(result.GPIN);
    		$("#FEMAIL").val('');
        }
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

    function imageIsLoaded(e) {
        $('#DisplayImage').css("display", "block");
        $('#DisplayImage').attr('src', e.target.result);
        $('#DisplayImage').attr('width', '150');
    };

    function maxLengthCheck(object) {
	    if (object.value.length > object.maxLength)
	      object.value = object.value.slice(0, object.maxLength)
	}
	    
	function isNumeric (evt) {
	    var theEvent = evt || window.event;
	    var key = theEvent.keyCode || theEvent.which;
	    key = String.fromCharCode (key);
	    var regex = /[0-9]/;
	    if ( !regex.test(key) ) {
	      theEvent.returnValue = false;
	      if(theEvent.preventDefault) theEvent.preventDefault();
	    }
	}
</script>