<div class="form-group{{ $errors->has('NAME') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Gender</label>
    <div class="col-sm-6">
        {!! Form::text('NAME', null, ['class' => 'form-control']) !!}
        @if ($errors->has('NAME'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('NAME') }}</strong>
            </span>
        @endif
    </div>
</div>