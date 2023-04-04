<div class="tab-pane active" id="10">
    <br>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Client Details</h4>
                    </div>
                    <div class="panel-body">

                        <div class="col-sm-8">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('AFILE') ? ' has-error' : '' }}">
                                    <label>Agency</label>
                                    <div class="input-group-data">
                                        {!! Form::select('AFILE', [''=>'']+$agencyname, !empty($policy['AFILE']) ? $policy['AFILE'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"agency_sel"]) !!}
                                        <span class="input-group-addon agency-model-form" data-table="agency" data-toggle="modal" data-target="#exampleAgencyModalLong"><i class="fa fa-plus"></i></span>
                                    </div>
                                    @if ($errors->has('AFILE'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('AFILE') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('AGCODE') ? ' has-error' : '' }}">
                                    <label>Agency Code</label>
                                    {!! Form::text('AGCODE', null, ['class' => 'form-control','id'=>'agencycode','readonly']) !!}
                                    @if ($errors->has('AGCODE'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('AGCODE') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('NAME1') ? ' has-error' : '' }}">
                                    <label>Name - 1</label>
                                    <div class="input-group-data">
                                        {!! Form::select('NAME1', [''=>'']+$partyname, !empty($policy['NAME1']) ? $policy['NAME1'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"name1_sel"]) !!}
                                        <span class="input-group-addon party-model-form" data-party-type="name1" data-table="party" data-toggle="modal" data-target="#examplePartyModalLong"><i class="fa fa-plus"></i></span>
                                    </div>
                                    @if ($errors->has('NAME1'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('NAME1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('BIRTH1') ? ' has-error' : '' }}">
                                    <label>Birth Date - 1</label>
                                    {!! Form::text('BIRTH1', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'birthdate1']) !!}
                                    @if ($errors->has('BIRTH1'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('BIRTH1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('NAME2') ? ' has-error' : '' }}">
                                    <label>Name - 2</label>
                                    <div class="input-group-data">
                                        {!! Form::select('NAME2', [''=>'']+$partyname, !empty($policy['NAME2']) ? $policy['NAME2'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"name2_sel"]) !!}
                                        <span class="input-group-addon party-model-form" data-party-type="name2" data-table="party" data-toggle="modal" data-target="#examplePartyModalLong"><i class="fa fa-plus"></i></span>
                                    </div>
                                    @if ($errors->has('NAME2'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('NAME2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="form-group{{ $errors->has('BIRTH2') ? ' has-error' : '' }}">
                                    <label>Birth Date - 2</label>
                                    {!! Form::text('BIRTH2', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'birthdate2']) !!}
                                    @if ($errors->has('BIRTH2'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('BIRTH2') }}</strong>
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