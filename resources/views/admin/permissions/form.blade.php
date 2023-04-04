<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">Title</label>
    <div class="col-sm-5">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        @if ($errors->has('title'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>