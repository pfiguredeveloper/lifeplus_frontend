<div class="form-group{{ $errors->has('INVESTMENT') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Investment</label>
    <div class="col-sm-5">
        {!! Form::text('INVESTMENT', null, ['class' => 'form-control']) !!}
        @if ($errors->has('INVESTMENT'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('INVESTMENT') }}</strong>
            </span>
        @endif
    </div>
</div>