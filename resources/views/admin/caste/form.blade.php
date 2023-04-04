<div class="form-group{{ $errors->has('CASTE') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Caste</label>
    <div class="col-sm-6">
        {!! Form::text('CASTE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('CASTE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('CASTE') }}</strong>
            </span>
        @endif
    </div>
</div>