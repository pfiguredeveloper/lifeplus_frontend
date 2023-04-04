<div class="form-group{{ $errors->has('division') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Division Name</label>
    <div class="col-sm-6">
        {!! Form::text('division', null, ['class' => 'form-control']) !!}
        @if ($errors->has('division'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('division') }}</strong>
            </span>
        @endif
    </div>
</div>