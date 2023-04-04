<div class="form-group{{ $errors->has('COUNTRY') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Country Name</label>
    <div class="col-sm-7">
        {!! Form::text('COUNTRY', null, ['class' => 'form-control']) !!}
        @if ($errors->has('COUNTRY'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('COUNTRY') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('ISD') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">ISD Code</label>
    <div class="col-sm-7">
        {!! Form::text('ISD', null, ['class' => 'form-control']) !!}
        @if ($errors->has('ISD'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('ISD') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('ISO') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">ISO Code</label>
    <div class="col-sm-7">
        {!! Form::text('ISO', null, ['class' => 'form-control']) !!}
        @if ($errors->has('ISO'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('ISO') }}</strong>
            </span>
        @endif
    </div>
</div>