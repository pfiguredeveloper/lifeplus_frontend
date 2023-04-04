<div class="tab-pane" id="8">
    <div class="panel-body">
        <div class="col-sm-12">
            <div class="row" style="border: 1px solid black;">
                <div style="margin-top: 13px;">
                    <!-- Doctor Field -->
                    <div class="col-sm-3">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('DOC_M') ? ' has-error' : '' }}">
                                <label>Doctor For 1<sup>st</sup> Proposer</label>
                                <div class="input-group-data">
                                    {!! Form::select('DOC_M', [''=>'']+$doctorname, !empty($policy['DOC_M']) ? $policy['DOC_M'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"DOC_M_sel"]) !!}
                                    <span class="input-group-addon doctor-model-form" data-doctor-gender="male" data-table="doctor" data-toggle="modal" data-target="#exampleDoctorModalLong"><i class="fa fa-plus"></i></span>
                                </div>
                                @if ($errors->has('DOC_M'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('DOC_M') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Mdt Field -->
                    <div class="col-sm-1">
                        <div class="form-group{{ $errors->has('MEDI_DT_M') ? ' has-error' : '' }}">
                            <label>Medical Dt</label>
                            {!! Form::text('MEDI_DT_M', null, ['class' => 'form-control datepicker3','placeholder' => 'dd/mm/yyyy']) !!}
                            @if ($errors->has('MEDI_DT_M'))
                            <span class="help-block">
                                <strong style="color: red;">{{ $errors->first('MEDI_DT_M') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Height Field -->
                    <div class="col-sm-1">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('HEIGHT_M') ? ' has-error' : '' }}">
                                <label>Height</label>
                                {!! Form::number('HEIGHT_M', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('HEIGHT_M'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('HEIGHT_M') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Weight Field -->
                    <div class="col-sm-1">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('WEIGHT_M') ? ' has-error' : '' }}">
                                <label>Weight</label>
                                {!! Form::number('WEIGHT_M', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('WEIGHT_M'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('WEIGHT_M') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Abd Field -->
                    <div class="col-sm-1">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('ABD_M') ? ' has-error' : '' }}">
                                <label>Abd</label>
                                {!! Form::number('ABD_M', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('ABD_M'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('ABD_M') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Chestin Field -->
                    <div class="col-sm-2">
                        <label>Chest Ex-In</label>
                        <div class="input-group">
                            {!! Form::number('CHEST_EX_M', null, ['class' => 'form-control']) !!}
                            <span class="input-group-btn"></span>
                            {!! Form::number('CHEST_IN_M', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <!-- Pulse Field -->
                    <div class="col-sm-1">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('PULSE_M') ? ' has-error' : '' }}">
                                <label>Pulse</label>
                                {!! Form::number('PULSE_M', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('PULSE_M'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('PULSE_M') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Bplow Field -->
                    <div class="col-sm-2">
                        <label>BP Low-High</label>
                        <div class="input-group">
                            {!! Form::number('BP_LOW_M', null, ['class' => 'form-control']) !!}
                            <span class="input-group-btn"></span>
                            {!! Form::number('BP_HI_M', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="border: 1px solid black;border-top: none;">
                <div style="margin-top: 13px;">
                    <!-- Doctor Field -->
                    <div class="col-sm-3">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('DOC_F') ? ' has-error' : '' }}">
                                <label>Doctor For 2<sup>nd</sup> Proposer</label>
                                <div class="input-group-data">
                                    {!! Form::select('DOC_F', [''=>'']+$doctorname, !empty($policy['DOC_F']) ? $policy['DOC_F'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"DOC_F_sel"]) !!}
                                    <span class="input-group-addon doctor-model-form" data-doctor-gender="female" data-table="doctor" data-toggle="modal" data-target="#exampleDoctorModalLong"><i class="fa fa-plus"></i></span>
                                </div>
                                @if ($errors->has('DOC_F'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('DOC_F') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Mdt Field -->
                    <div class="col-sm-1">
                        <div class="form-group{{ $errors->has('MEDI_DT_F') ? ' has-error' : '' }}">
                            <label>Medical Dt</label>
                            {!! Form::text('MEDI_DT_F', null, ['class' => 'form-control datepicker3','placeholder' => 'dd/mm/yyyy']) !!}
                            @if ($errors->has('MEDI_DT_F'))
                            <span class="help-block">
                                <strong style="color: red;">{{ $errors->first('MEDI_DT_F') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Height Field -->
                    <div class="col-sm-1">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('HEIGHT_F') ? ' has-error' : '' }}">
                                <label>Height</label>
                                {!! Form::number('HEIGHT_F', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('HEIGHT_F'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('HEIGHT_F') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Weight Field -->
                    <div class="col-sm-1">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('WEIGHT_F') ? ' has-error' : '' }}">
                                <label>Weight</label>
                                {!! Form::number('WEIGHT_F', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('WEIGHT_F'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('WEIGHT_F') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Abd Field -->
                    <div class="col-sm-1">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('ABD_F') ? ' has-error' : '' }}">
                                <label>Abd</label>
                                {!! Form::number('ABD_F', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('ABD_F'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('ABD_F') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Chestin Field -->
                    <div class="col-sm-2">
                        <label>Chest Ex-In</label>
                        <div class="input-group">
                            {!! Form::number('CHEST_EX_F', null, ['class' => 'form-control']) !!}
                            <span class="input-group-btn"></span>
                            {!! Form::number('CHEST_IN_F', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <!-- Pulse Field -->
                    <div class="col-sm-1">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('PULSE_M') ? ' has-error' : '' }}">
                                <label>Pulse</label>
                                {!! Form::number('PULSE_M', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('PULSE_M'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('PULSE_M') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Bplow Field -->
                    <div class="col-sm-2">
                        <label>BP Low-High</label>
                        <div class="input-group">
                            {!! Form::number('BP_LOW_M', null, ['class' => 'form-control']) !!}
                            <span class="input-group-btn"></span>
                            {!! Form::number('BP_HI_M', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>