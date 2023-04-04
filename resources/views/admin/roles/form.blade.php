<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label class="col-sm-2 control-label">Title</label>
    <div class="col-sm-8">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        @if ($errors->has('title'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
    <label class="col-sm-2 control-label">Permissions</label>
    <div class="col-sm-8 per_sel">
    	{!! Form::select('permissions[]',$permissions, !empty($permissions_selected)?$permissions_selected:null, ['class' => 'select2 select2-hidden-accessible form-control', 'style' => 'width: 100%','multiple']) !!}
        @if ($errors->has('permissions'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('permissions') }}</strong>
            </span>
        @endif
    </div>
    <div style="margin-top: 5px;">
    	<span class="btn btn-info btn-xs select-all">Select All</span>
    	<span class="btn btn-info btn-xs deselect-all">Deselect All</span>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
	$('.select-all').click(function () {
	    let $select2 = $('.per_sel .select2')
	    $select2.find('option').prop('selected', 'selected')
	    $select2.trigger('change')
	})
  	
  	$('.deselect-all').click(function () {
    	let $select2 = $('.per_sel .select2')
    	$select2.find('option').prop('selected', '')
    	$select2.trigger('change')
  	})
</script>