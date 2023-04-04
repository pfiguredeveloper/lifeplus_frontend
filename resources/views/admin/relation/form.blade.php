<div class="form-group{{ $errors->has('RELA') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Relation</label>
    <div class="col-sm-6">
        {!! Form::text('RELA', null, ['class' => 'form-control']) !!}
        @if ($errors->has('RELA'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('RELA') }}</strong>
            </span>
        @endif
    </div>
</div>