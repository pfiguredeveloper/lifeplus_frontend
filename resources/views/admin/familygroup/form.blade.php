<div class="form-group{{ $errors->has('GNM') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Family</label>
    <div class="col-sm-7">
        {!! Form::text('GNM', null, ['class' => 'form-control']) !!}
        @if ($errors->has('GNM'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GNM') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('GAD1') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address-1</label>
    <div class="col-sm-7">
        {!! Form::text('GAD1', null, ['class' => 'form-control']) !!}
        @if ($errors->has('GAD1'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GAD1') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('GAD2') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address-2</label>
    <div class="col-sm-7">
        {!! Form::text('GAD2', null, ['class' => 'form-control']) !!}
        @if ($errors->has('GAD2'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GAD2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('GAD3') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address-3</label>
    <div class="col-sm-7">
        {!! Form::text('GAD3', null, ['class' => 'form-control']) !!}
        @if ($errors->has('GAD3'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GAD3') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('CITYID') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">City</label>
    <div class="col-sm-7 input-group-data">
        {!! Form::select('CITYID', [''=>'']+$city, !empty($familygroup['CITYID']) ? $familygroup['CITYID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
        <span class="input-group-addon city-model-form" data-table="city" data-toggle="modal" data-target="#exampleCityModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('CITYID'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('CITYID') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('ARECD') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Area</label>
    <div class="col-sm-7 input-group-data">
        {!! Form::select('ARECD', [''=>'']+$area, !empty($familygroup['ARECD']) ? $familygroup['ARECD'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"area_sel"]) !!}
        <span class="input-group-addon" data-table="area" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('ARECD'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('ARECD') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('GPIN') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Pin</label>
    <div class="col-sm-7">
        {!! Form::text('GPIN', null, ['class' => 'form-control']) !!}
        @if ($errors->has('GPIN'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GPIN') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('GPHON_O') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Phone (O)</label>
    <div class="col-sm-7">
        {!! Form::text('GPHON_O', null, ['class' => 'form-control']) !!}
        @if ($errors->has('GPHON_O'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GPHON_O') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('GPHON_R') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Phone (R)</label>
    <div class="col-sm-7">
        {!! Form::text('GPHON_R', null, ['class' => 'form-control']) !!}
        @if ($errors->has('GPHON_R'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GPHON_R') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('GMOBILE') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Mobile</label>
    <div class="col-sm-7">
        {!! Form::text('GMOBILE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('GMOBILE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GMOBILE') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('GEMAIL') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Email</label>
    <div class="col-sm-7">
        {!! Form::text('GEMAIL', null, ['class' => 'form-control']) !!}
        @if ($errors->has('GEMAIL'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GEMAIL') }}</strong>
            </span>
        @endif
    </div>
</div>