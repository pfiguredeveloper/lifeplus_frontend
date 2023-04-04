<div class="form-group{{ $errors->has('CAP1') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Line - 1</label>
    <div class="col-sm-7">
        {!! Form::text('CAP1', null, ['class' => 'form-control']) !!}
        @if ($errors->has('CAP1'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('CAP1') }}</strong>
            </span>
        @endif
    </div>
</div>