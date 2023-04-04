<div class="form-group{{ $errors->has('SURNAME') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Surname</label>
    <div class="col-sm-6">
        {!! Form::text('SURNAME', null, ['class' => 'form-control']) !!}
        @if ($errors->has('SURNAME'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('SURNAME') }}</strong>
            </span>
        @endif
    </div>
</div>