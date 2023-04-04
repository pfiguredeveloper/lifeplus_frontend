<div class="tab-pane" id="9">
    <div class="panel-body">
        <div class="row">
            
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Female Details</h4>
                    </div>
                    
                    <div class="panel-body">
                        <!-- Fdeliverydate Field -->
                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('DELIDT') ? ' has-error' : '' }}">
                                    <label>Delivery Date</label>
                                    {!! Form::text('DELIDT', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy']) !!}
                                    @if ($errors->has('DELIDT'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('DELIDT') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Flmcdate Field -->
                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('MCDT') ? ' has-error' : '' }}">
                                    <label>Last MC Date</label>
                                    {!! Form::text('MCDT', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy']) !!}
                                    @if ($errors->has('MCDT'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('MCDT') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Fppregnant Field -->
                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('PREG') ? ' has-error' : '' }}">
                                    <label>Present Pregnant</label>
                                    {!! Form::text('PREG', null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('PREG'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('PREG') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Fdetails Field -->
                        <div class="col-sm-12 col-lg-12">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('FEMALEDTL') ? ' has-error' : '' }}">
                                    <label>Detail About Abortion, Miscarriage Pregnant</label>
                                    {!! Form::textarea('FEMALEDTL', null, ['class' => 'form-control','rows'=>3,'cols'=>50]) !!}
                                    @if ($errors->has('FEMALEDTL'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('FEMALEDTL') }}</strong>
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