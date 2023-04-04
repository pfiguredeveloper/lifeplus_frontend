<div class="form-group{{ $errors->has('COURIER_NAME') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Courier Name</label>
    <div class="col-sm-5">
        {!! Form::text('COURIER_NAME', null, ['class' => 'form-control']) !!}
        @if ($errors->has('COURIER_NAME'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('COURIER_NAME') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('COURIER_PERSON') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Courier Person</label>
    <div class="col-sm-5">
        {!! Form::text('COURIER_PERSON', null, ['class' => 'form-control']) !!}
        @if ($errors->has('COURIER_PERSON'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('COURIER_PERSON') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('AD1') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Address-1</label>
    <div class="col-sm-5">
        {!! Form::text('AD1', null, ['class' => 'form-control']) !!}
        @if ($errors->has('AD1'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('AD1') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('AD2') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Address-2</label>
    <div class="col-sm-5">
        {!! Form::text('AD2', null, ['class' => 'form-control']) !!}
        @if ($errors->has('AD2'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('AD2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('AD3') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Address-3</label>
    <div class="col-sm-5">
        {!! Form::text('AD3', null, ['class' => 'form-control']) !!}
        @if ($errors->has('AD3'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('AD3') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('CITYID') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">City</label>
    <div class="col-sm-5 input-group-data">
        {!! Form::select('CITYID', [''=>'']+$city, !empty($courier['CITYID']) ? $courier['CITYID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
         <span class="input-group-addon city-model-form" data-table="city" data-toggle="modal" data-target="#exampleCityModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('CITYID'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('CITYID') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('PIN') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Pin Code</label>
    <div class="col-sm-5">
        {!! Form::text('PIN', null, ['class' => 'form-control']) !!}
        @if ($errors->has('PIN'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('PIN') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('PHONE') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Phone(O)</label>
    <div class="col-sm-5">
        {!! Form::text('PHONE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('PHONE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('PHONE') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('MOBILE') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Mobile</label>
    <div class="col-sm-5">
        {!! Form::text('MOBILE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('MOBILE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('MOBILE') }}</strong>
            </span>
        @endif
    </div>
</div>