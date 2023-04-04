<div class="form-group{{ $errors->has('franchnm') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Franchisee Name</label>
    <div class="col-sm-6">
        {!! Form::text('franchnm', null, ['class' => 'form-control']) !!}
        @if ($errors->has('franchnm'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('franchnm') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('sortname') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Sort Name</label>
    <div class="col-sm-3">
        {!! Form::text('sortname', null, ['class' => 'form-control']) !!}
        @if ($errors->has('sortname'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('sortname') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contactper') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Contact Person</label>
    <div class="col-sm-6">
        {!! Form::text('contactper', null, ['class' => 'form-control']) !!}
        @if ($errors->has('contactper'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('contactper') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('workarea') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Division / Area</label>
    <div class="col-sm-6">
        {!! Form::text('workarea', null, ['class' => 'form-control']) !!}
        @if ($errors->has('workarea'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('workarea') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('add1') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address1</label>
    <div class="col-sm-6">
        {!! Form::text('add1', null, ['class' => 'form-control']) !!}
        @if ($errors->has('add1'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('add1') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('add2') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address2</label>
    <div class="col-sm-6">
        {!! Form::text('add2', null, ['class' => 'form-control']) !!}
        @if ($errors->has('add2'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('add2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('add3') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address3</label>
    <div class="col-sm-6">
        {!! Form::text('add3', null, ['class' => 'form-control']) !!}
        @if ($errors->has('add3'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('add3') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">City</label>
    <div class="col-sm-3 input-group-data">
        {!! Form::select('cityid', [''=>'']+$city, !empty($franchisee['cityid']) ? $franchisee['cityid'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
         <span class="input-group-addon city-model-form" data-table="city" data-toggle="modal" data-target="#exampleCityModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('cityid'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('cityid') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-sm-1 control-label">Pin Code</label>
    <div class="col-sm-2">
        {!! Form::text('pin', null, ['class' => 'form-control']) !!}
        @if ($errors->has('pin'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('pin') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">Phone(O)</label>
    <div class="col-sm-3">
        {!! Form::text('phone_o', null, ['class' => 'form-control']) !!}
        @if ($errors->has('phone_o'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('phone_o') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-sm-1 control-label">Phone(R)</label>
    <div class="col-sm-2">
        {!! Form::text('phone_r', null, ['class' => 'form-control']) !!}
        @if ($errors->has('phone_r'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('phone_r') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Mobile</label>
    <div class="col-sm-6">
        {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
        @if ($errors->has('mobile'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('mobile') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">E-mail</label>
    <div class="col-sm-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('fr_status') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Franchisee Status</label>
    <div class="col-sm-3">
        {!! Form::select('fr_status', [''=>'','Active'=>'Active','Inactive'=>'Inactive'], !empty($franchisee['fr_status']) ? $franchisee['fr_status'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
        @if ($errors->has('fr_status'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('fr_status') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Remarks</label>
    <div class="col-sm-6">
        {!! Form::textarea('remark', null, ['class' => 'form-control','rows'=>3,'cols'=>3]) !!}
        @if ($errors->has('remark'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('remark') }}</strong>
            </span>
        @endif
    </div>
</div>