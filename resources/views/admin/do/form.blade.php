<div class="form-group{{ $errors->has('DO_CODE') ? ' has-error' : '' }}">
    <label class="col-sm-5 control-label">Developement Officer Code</label>
    <div class="col-sm-6">
        {!! Form::text('DO_CODE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('DO_CODE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('DO_CODE') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('DONAME') ? ' has-error' : '' }}">
    <label class="col-sm-5 control-label">Developement Officer Name</label>
    <div class="col-sm-6">
        {!! Form::text('DONAME', null, ['class' => 'form-control']) !!}
        @if ($errors->has('DONAME'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('DONAME') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('APP_MONTH') ? ' has-error' : '' }}">
    <label class="col-sm-5 control-label">Appraisal Start Month</label>
    <div class="col-sm-6">
        {!! Form::select('APP_MONTH', [''=>'']+$startMonth, !empty($do['APP_MONTH'])?$do['APP_MONTH']:null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
        @if ($errors->has('APP_MONTH'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('APP_MONTH') }}</strong>
            </span>
        @endif
    </div>
</div>