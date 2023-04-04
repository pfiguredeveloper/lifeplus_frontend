<div class="form-group{{ $errors->has('PACODE') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">P.A. Code</label>
    <div class="col-sm-6">
        {!! Form::text('PACODE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('PACODE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('PACODE') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('PACODENM') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Company Name</label>
    <div class="col-sm-6">
        {!! Form::text('PACODENM', null, ['class' => 'form-control']) !!}
        @if ($errors->has('PACODENM'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('PACODENM') }}</strong>
            </span>
        @endif
    </div>
</div>