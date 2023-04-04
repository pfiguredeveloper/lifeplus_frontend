<div class="form-group{{ $errors->has('MESSAGE') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Message</label>
    <div class="col-sm-7">
        {!! Form::textarea('MESSAGE', null, ['class' => 'form-control','rows'=>5,'cols'=>50]) !!}
        @if ($errors->has('MESSAGE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('MESSAGE') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('MESSAGETYPE') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Message Type</label>
    <div class="col-sm-7">
    	{!! Form::select('MESSAGETYPE', [''=>'']+$msgType, !empty($smsformat['MESSAGETYPE']) ? $smsformat['MESSAGETYPE'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
        @if ($errors->has('MESSAGETYPE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('MESSAGETYPE') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('MESSAGETITLE') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Message Title</label>
    <div class="col-sm-7">
        {!! Form::text('MESSAGETITLE', null, ['class' => 'form-control']) !!}
        @if ($errors->has('MESSAGETITLE'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('MESSAGETITLE') }}</strong>
            </span>
        @endif
    </div>
</div>