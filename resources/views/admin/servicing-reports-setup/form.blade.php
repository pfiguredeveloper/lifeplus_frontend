<div class="form-group">
    <label class="col-sm-4 control-label">Title</label>
    <div class="col-sm-5">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Address 1</label>
    <div class="col-sm-5">
        {!! Form::text('address1', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Address 2</label>
    <div class="col-sm-5">
        {!! Form::text('address2', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Address 3</label>
    <div class="col-sm-5">
        {!! Form::text('address3', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Address 4</label>
    <div class="col-sm-5">
        {!! Form::text('address4', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Address 5</label>
    <div class="col-sm-5">
        {!! Form::text('address5', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Warning Line</label>
    <div class="col-sm-5">
        {!! Form::textarea('warning', null, ['class' => 'form-control','rows'=>'3','cols'=>'3']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Caption 1</label>
    <div class="col-sm-5">
        {!! Form::select('cap1', [''=>'']+$caption, !empty($reports['cap1']) ? $reports['cap1'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Caption 2</label>
    <div class="col-sm-5">
        {!! Form::select('cap2', [''=>'']+$caption, !empty($reports['cap2']) ? $reports['cap2'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
    </div>
</div>