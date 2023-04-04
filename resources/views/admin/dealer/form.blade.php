<div class="form-group{{ $errors->has('dealer') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Dealer Name</label>
    <div class="col-sm-6">
        {!! Form::text('dealer', null, ['class' => 'form-control']) !!}
        @if ($errors->has('dealer'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('dealer') }}</strong>
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

<div class="form-group{{ $errors->has('franchid') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Franchisee</label>
    <div class="col-sm-6 input-group-data">
        {!! Form::select('franchid', [''=>'']+$franchise, !empty($franchisee['franchid']) ? $franchisee['franchid'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"franchise_sel"]) !!}
         <span class="input-group-addon franchise-model-form" data-table="franchise" data-toggle="modal" data-target="#exampleFranchiseModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('franchid'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('franchid') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
    <label class="col-sm-3 control-label">Address-1</label>
    <div class="col-sm-3">
        {!! Form::text('add1', null, ['class' => 'form-control']) !!}
        @if ($errors->has('add1'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('add1') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-sm-3">
        {!! Form::text('add2', null, ['class' => 'form-control']) !!}
        @if ($errors->has('add2'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('add2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('add3') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Address-3</label>
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
        {!! Form::select('cityid', [''=>'']+$city, !empty($dealer['cityid']) ? $dealer['cityid'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"city_sel"]) !!}
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

<div class="form-group">
    <label class="col-sm-3 control-label">Mob(Show No.)</label>
    <div class="col-sm-3">
        {!! Form::text('show_mob', null, ['class' => 'form-control']) !!}
        @if ($errors->has('show_mob'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('show_mob') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-sm-1 control-label">DlrStatus</label>
    <div class="col-sm-2">
        {!! Form::select('dlr_status', [''=>'','Active'=>'Active','Inactive'=>'Inactive','Close'=>'Close'], !empty($dealer['dlr_status']) ? $dealer['dlr_status'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
        @if ($errors->has('dlr_status'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('dlr_status') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">NextDue</label>
    <div class="col-sm-2">
        {!! Form::text('dlr_due', null, ['class' => 'form-control datepicker3','placeholder'=>"dd/mm/yyyy"]) !!}
        @if ($errors->has('dlr_due'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('dlr_due') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-sm-2 control-label">Make Bill in PSTPL?</label>
    <div class="col-sm-2">
        {!! Form::select('bill', [''=>'','Yes'=>'Yes','No'=>'No'], !empty($dealer['bill']) ? $dealer['bill'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
        @if ($errors->has('bill'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('bill') }}</strong>
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

<div class="form-group{{ $errors->has('bankname') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Bank Name</label>
    <div class="col-sm-6">
        {!! Form::text('bankname', null, ['class' => 'form-control']) !!}
        @if ($errors->has('bankname'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('bankname') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('acno') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">A/c No.</label>
    <div class="col-sm-6">
        {!! Form::text('acno', null, ['class' => 'form-control']) !!}
        @if ($errors->has('acno'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('acno') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">Limit</label>
    <div class="col-sm-2">
        {!! Form::number('r_limit', null, ['class' => 'form-control']) !!}
        @if ($errors->has('r_limit'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('r_limit') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-sm-2 control-label">Current Limit</label>
    <div class="col-sm-2">
        {!! Form::number('c_limit', null, ['class' => 'form-control']) !!}
        @if ($errors->has('c_limit'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('c_limit') }}</strong>
            </span>
        @endif
    </div>
</div>