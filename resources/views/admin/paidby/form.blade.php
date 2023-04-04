<div class="form-group{{ $errors->has('PAIDBY') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Paid By</label>
    <div class="col-sm-6">
        {!! Form::text('PAIDBY', null, ['class' => 'form-control']) !!}
        @if ($errors->has('PAIDBY'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('PAIDBY') }}</strong>
            </span>
        @endif
    </div>
</div>