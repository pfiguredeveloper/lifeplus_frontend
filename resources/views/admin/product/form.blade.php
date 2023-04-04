<div class="form-group{{ $errors->has('productname') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Product Name</label>
    <div class="col-sm-5">
        {!! Form::text('productname', null, ['class' => 'form-control']) !!}
        @if ($errors->has('productname'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('productname') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('productpath') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Product Path</label>
    <div class="col-sm-5">
        {!! Form::text('productpath', null, ['class' => 'form-control']) !!}
        @if ($errors->has('productpath'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('productpath') }}</strong>
            </span>
        @endif
    </div>
</div>