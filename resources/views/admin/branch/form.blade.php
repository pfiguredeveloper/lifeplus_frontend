<div class="form-group{{ $errors->has('BRANCH') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Branch Code</label>
    <div class="col-sm-7">
        {!! Form::text('BRANCH', null, ['class' => 'form-control']) !!}
        @if ($errors->has('BRANCH'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('BRANCH') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('BRANCHNM') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Branch Name</label>
    <div class="col-sm-7">
        {!! Form::text('BRANCHNM', null, ['class' => 'form-control']) !!}
        @if ($errors->has('BRANCHNM'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('BRANCHNM') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('BR_MGR_NM') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Branch Manager</label>
    <div class="col-sm-7">
        {!! Form::text('BR_MGR_NM', null, ['class' => 'form-control']) !!}
        @if ($errors->has('BR_MGR_NM'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('BR_MGR_NM') }}</strong>
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
        {!! Form::select('CITYID', [''=>'']+$city, !empty($branch['CITYID']) ? $branch['CITYID'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
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

<div class="form-group{{ $errors->has('PHONE_O') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Phone (O)</label>
    <div class="col-sm-7">
        {!! Form::text('PHONE_O', null, ['class' => 'form-control']) !!}
        @if ($errors->has('PHONE_O'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('PHONE_O') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('DIVISION') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Division</label>
    <div class="col-sm-7">
        {!! Form::text('DIVISION', null, ['class' => 'form-control']) !!}
        @if ($errors->has('DIVISION'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('DIVISION') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('ZONE') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Zone</label>
    <div class="col-sm-7">
        {!! Form::text('ZONE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('ZONE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('ZONE') }}</strong>
            </span>
        @endif
    </div>
</div>