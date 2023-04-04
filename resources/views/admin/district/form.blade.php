<div class="form-group{{ $errors->has('DISTRICT') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">District</label>
    <div class="col-sm-7">
        {!! Form::text('DISTRICT', null, ['class' => 'form-control']) !!}
        @if ($errors->has('DISTRICT'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('DISTRICT') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('STATEID') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">State</label>
    <div class="col-sm-7 input-group-data">
        {!! Form::select('STATEID', [''=>'']+$state, !empty($district['STATEID']) ? $district['STATEID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"state_sel"]) !!}
        <span class="input-group-addon" data-table="state" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('STATEID'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('STATEID') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('COUNTRYID') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Country</label>
    <div class="col-sm-7 input-group-data">
        {!! Form::select('COUNTRYID', [''=>'']+$country, !empty($district['COUNTRYID']) ? $district['COUNTRYID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"country_sel"]) !!}
        <span class="input-group-addon" data-table="country" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('COUNTRYID'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('COUNTRYID') }}</strong>
            </span>
        @endif
    </div>
</div>