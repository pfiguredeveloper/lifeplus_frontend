<div class="form-group{{ $errors->has('PCODE') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">PCODE</label>
    <div class="col-sm-5">
        {!! Form::text('PCODE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('PCODE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('PCODE') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('NAME') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">NAME</label>
    <div class="col-sm-5">
        {!! Form::text('NAME', null, ['class' => 'form-control']) !!}
        @if ($errors->has('NAME'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('NAME') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('DATE') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">DATE</label>
    <div class="col-sm-5">
        {!! Form::text('DATE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('DATE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('DATE') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('HRS') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">HRS</label>
    <div class="col-sm-5">
        {!! Form::text('HRS', null, ['class' => 'form-control']) !!}
        @if ($errors->has('HRS'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('HRS') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('MNT') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">MNT</label>
    <div class="col-sm-5">
        {!! Form::text('MNT', null, ['class' => 'form-control']) !!}
        @if ($errors->has('MNT'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('MNT') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('NARA') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">NARA</label>
    <div class="col-sm-5">
        {!! Form::text('NARA', null, ['class' => 'form-control']) !!}
        @if ($errors->has('NARA'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('NARA') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('NEXTMEET') ? ' has-error' : '' }}">
    <label class="col-sm-4 control-label">NEXTMEET</label>
    <div class="col-sm-5">
        {!! Form::text('NEXTMEET', null, ['class' => 'form-control']) !!}
        @if ($errors->has('NEXTMEET'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('NEXTMEET') }}</strong>
            </span>
        @endif
    </div>
</div>