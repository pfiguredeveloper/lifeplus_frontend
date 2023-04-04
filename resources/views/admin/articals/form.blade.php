<div class="form-group{{ $errors->has('DESC1') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Description - 1</label>
    <div class="col-sm-7">
        {!! Form::text('DESC1', null, ['class' => 'form-control']) !!}
        @if ($errors->has('DESC1'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('DESC1') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('DESC2') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Description - 2</label>
    <div class="col-sm-7">
        {!! Form::text('DESC2', null, ['class' => 'form-control']) !!}
        @if ($errors->has('DESC2'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('DESC2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('DOCU') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Docu</label>
    <div class="col-sm-7">
        {!! Form::text('DOCU', null, ['class' => 'form-control']) !!}
        @if ($errors->has('DOCU'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('DOCU') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('FILENAME') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">File Name</label>
    <div class="col-sm-7">
        {!! Form::text('FILENAME', null, ['class' => 'form-control']) !!}
        @if ($errors->has('FILENAME'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('FILENAME') }}</strong>
            </span>
        @endif
    </div>
</div>