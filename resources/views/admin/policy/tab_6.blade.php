<div class="tab-pane nachTabDeails" id="6">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">NACH Details</h4>
                    </div>

                    <div class="panel-body">
                        <!-- Bankname Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('E_BANK') ? ' has-error' : '' }}">
                                    <label>Bank Name</label>
                                    <div class="input-group-data">
                                        {!! Form::select('E_BANK', [''=>'']+$bankname, !empty($policy['E_BANK']) ? $policy['E_BANK'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"bank_sel"]) !!}
                                        <span class="input-group-addon bank-model-form" data-table="bank" data-toggle="modal" data-target="#exampleBankModalLong"><i class="fa fa-plus"></i></span>
                                    </div>
                                    @if ($errors->has('E_BANK'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('E_BANK') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Bankaddress Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('E_ADD') ? ' has-error' : '' }}">
                                    <label>Bank Address</label>
                                    {!! Form::text('E_ADD', null, ['class' => 'form-control','id'=>'E_ADD']) !!}
                                    @if ($errors->has('E_ADD'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('E_ADD') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Branch Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('E_BRANCH') ? ' has-error' : '' }}">
                                    <label>Branch</label>
                                    {!! Form::text('E_BRANCH', null, ['class' => 'form-control','id'=>'E_BRANCH']) !!}
                                    @if ($errors->has('E_BRANCH'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('E_BRANCH') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Micr Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('E_MICR') ? ' has-error' : '' }}">
                                    <label>MICR No</label>
                                    {!! Form::text('E_MICR', null, ['class' => 'form-control','id'=>'E_MICR']) !!}
                                    @if ($errors->has('E_MICR'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('E_MICR') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Acounttype Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('E_ACTYPE') ? ' has-error' : '' }}">
                                    <label>Account Type</label>
                                    {!! Form::text('E_ACTYPE', null, ['class' => 'form-control','id'=>'E_ACTYPE']) !!}
                                    @if ($errors->has('E_ACTYPE'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('E_ACTYPE') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Accountno Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('E_ACNO') ? ' has-error' : '' }}">
                                    <label>Account No</label>
                                    {!! Form::text('E_ACNO', null, ['class' => 'form-control','id'=>'E_ACNO']) !!}
                                    @if ($errors->has('E_ACNO'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('E_ACNO') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Acholdername Field -->
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('E_ACNAME') ? ' has-error' : '' }}">
                                    <label>A/C Holder Name</label>
                                    {!! Form::text('E_ACNAME', null, ['class' => 'form-control','id'=>'E_ACNAME']) !!}
                                    @if ($errors->has('E_ACNAME'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('E_ACNAME') }}</strong>
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