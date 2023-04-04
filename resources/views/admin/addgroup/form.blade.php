<div class="form-group{{ $errors->has('ADDGROUP') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Address Group Name</label>
    <div class="col-sm-5">
        {!! Form::text('ADDGROUP', null, ['class' => 'form-control']) !!}
        @if ($errors->has('ADDGROUP'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('ADDGROUP') }}</strong>
            </span>
        @endif
    </div>
</div>