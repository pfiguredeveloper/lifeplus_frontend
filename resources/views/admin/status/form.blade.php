<div class="form-group{{ $errors->has('STATUS') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Status</label>
    <div class="col-sm-6">
        {!! Form::text('STATUS', null, ['class' => 'form-control']) !!}
        @if ($errors->has('STATUS'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('STATUS') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('GENDER') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Gender</label>
    <div class="col-sm-6">
        {!! Form::select('GENDER', [''=>'']+$gender, !empty($status['GENDER']) ? $status['GENDER'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
        @if ($errors->has('GENDER'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('GENDER') }}</strong>
            </span>
        @endif
    </div>
</div>