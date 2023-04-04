<div class="form-group{{ $errors->has('BANK') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Bank Name</label>
    <div class="col-sm-7">
        {!! Form::text('BANK', null, ['class' => 'form-control']) !!}
        @if ($errors->has('BANK'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('BANK') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('BANKBR') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Bank Name / Code</label>
    <div class="col-sm-7">
        {!! Form::text('BANKBR', null, ['class' => 'form-control']) !!}
        @if ($errors->has('BANKBR'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('BANKBR') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('BANKMICR') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">MICR Code</label>
    <div class="col-sm-7">
        {!! Form::text('BANKMICR', null, ['class' => 'form-control']) !!}
        @if ($errors->has('BANKMICR'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('BANKMICR') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('BANKIFS') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">IFC Code</label>
    <div class="col-sm-7">
        {!! Form::text('BANKIFS', null, ['class' => 'form-control']) !!}
        @if ($errors->has('BANKIFS'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('BANKIFS') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('AD1') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address-1</label>
    <div class="col-sm-7">
        {!! Form::text('AD1', null, ['class' => 'form-control']) !!}
        @if ($errors->has('AD1'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('AD1') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('AD2') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address-2</label>
    <div class="col-sm-7">
        {!! Form::text('AD2', null, ['class' => 'form-control']) !!}
        @if ($errors->has('AD2'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('AD2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('AD3') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address-3</label>
    <div class="col-sm-7">
        {!! Form::text('AD3', null, ['class' => 'form-control']) !!}
        @if ($errors->has('AD3'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('AD3') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('CITYID') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">City</label>
    <div class="col-sm-7 input-group-data">
        {!! Form::select('CITYID', [''=>'']+$city, !empty($bank['CITYID']) ? $bank['CITYID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
         <span class="input-group-addon city-model-form" data-table="city" data-toggle="modal" data-target="#exampleCityModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('CITYID'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('CITYID') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('PIN') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Pin</label>
    <div class="col-sm-7">
        {!! Form::text('PIN', null, ['class' => 'form-control']) !!}
        @if ($errors->has('PIN'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('PIN') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('PHONE') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Phone</label>
    <div class="col-sm-7">
        {!! Form::text('PHONE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('PHONE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('PHONE') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('FAX') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Fax</label>
    <div class="col-sm-7">
        {!! Form::text('FAX', null, ['class' => 'form-control']) !!}
        @if ($errors->has('FAX'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('FAX') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('EMAIL') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Email</label>
    <div class="col-sm-7">
        {!! Form::text('EMAIL', null, ['class' => 'form-control']) !!}
        @if ($errors->has('EMAIL'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('EMAIL') }}</strong>
            </span>
        @endif
    </div>
</div>