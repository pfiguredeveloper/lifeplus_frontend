<div class="form-group{{ $errors->has('ARE1') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Area Name</label>
    <div class="col-sm-6">
        {!! Form::text('ARE1', null, ['class' => 'form-control']) !!}
        @if ($errors->has('ARE1'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('ARE1') }}</strong>
            </span>
        @endif
    </div>
</div>