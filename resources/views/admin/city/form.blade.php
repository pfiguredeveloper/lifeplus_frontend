<div class="form-group{{ $errors->has('CITY') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">City</label>
    <div class="col-sm-7">
        {!! Form::text('CITY', null, ['class' => 'form-control']) !!}
        @if ($errors->has('CITY'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('CITY') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('DISTRICTID') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">District</label>
    <div class="col-sm-7 input-group-data">
        {!! Form::select('DISTRICTID', [''=>'']+$district, !empty($city['DISTRICTID']) ? $city['DISTRICTID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"district_sel"]) !!}
        <span class="input-group-addon" data-table="district" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('DISTRICTID'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('DISTRICTID') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('STATEID') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">State</label>
    <div class="col-sm-7 input-group-data">
        {!! Form::select('STATEID', [''=>'']+$state, !empty($city['STATEID']) ? $city['STATEID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"state_sel"]) !!}
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
        {!! Form::select('COUNTRYID', [''=>'']+$country, !empty($city['COUNTRYID']) ? $city['COUNTRYID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"country_sel"]) !!}
        <span class="input-group-addon" data-table="country" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('COUNTRYID'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('COUNTRYID') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('STD') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">STD Code</label>
    <div class="col-sm-7">
        {!! Form::text('STD', null, ['class' => 'form-control']) !!}
        @if ($errors->has('STD'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('STD') }}</strong>
            </span>
        @endif
    </div>
</div>