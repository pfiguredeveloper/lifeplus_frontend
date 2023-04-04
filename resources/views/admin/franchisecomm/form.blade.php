<div class="form-group{{ $errors->has('franchid') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Franchisee</label>
    <div class="col-sm-6 input-group-data">
        {!! Form::select('franchid', [''=>'']+$franchise, !empty($franchisecomm['franchid']) ? $franchisecomm['franchid'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"franchise_sel"]) !!}
        <span class="input-group-addon franchise-model-form" data-table="franchise" data-toggle="modal" data-target="#exampleFranchiseModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('franchid'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('franchid') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('dealerid') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Dealer</label>
    <div class="col-sm-6 input-group-data">
        {!! Form::select('dealerid', [''=>'']+$dealer, !empty($franchisecomm['dealerid']) ? $franchisecomm['dealerid'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"dealer_sel"]) !!}
        <span class="input-group-addon dealer-model-form" data-table="dealer" data-toggle="modal" data-target="#exampleDealerModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('dealerid'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('dealerid') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('productid') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Product</label>
    <div class="col-sm-3 input-group-data">
        {!! Form::select('productid', [''=>'']+$product, !empty($franchisecomm['productid']) ? $franchisecomm['productid'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'product_sel']) !!}
        <span class="input-group-addon" data-table="product" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></span>
        @if ($errors->has('productid'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('productid') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">From Date</label>
    <div class="col-sm-2">
        {!! Form::text('from_date', null, ['class' => 'form-control datepicker3','placeholder'=>"dd/mm/yyyy"]) !!}
        @if ($errors->has('from_date'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('from_date') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-sm-2 control-label">To Date</label>
    <div class="col-sm-2">
        {!! Form::text('to_date', null, ['class' => 'form-control datepicker3','placeholder'=>"dd/mm/yyyy"]) !!}
        @if ($errors->has('to_date'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('to_date') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">From Amount</label>
    <div class="col-sm-2">
        {!! Form::number('from_amount', null, ['class' => 'form-control','min'=>0]) !!}
        @if ($errors->has('from_amount'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('from_amount') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-sm-2 control-label">To Amount</label>
    <div class="col-sm-2">
        {!! Form::number('to_amount', null, ['class' => 'form-control','min'=>0]) !!}
        @if ($errors->has('to_amount'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('to_amount') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label">Comm. Rate %</label>
    <div class="col-sm-2">
        {!! Form::number('comm_rate', null, ['class' => 'form-control','min'=>0]) !!}
        @if ($errors->has('comm_rate'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('comm_rate') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-sm-2 control-label">TDS %</label>
    <div class="col-sm-2">
        {!! Form::number('tds', null, ['class' => 'form-control','min'=>0]) !!}
        @if ($errors->has('tds'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('tds') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
    <label class="col-sm-3 control-label">Remarks</label>
    <div class="col-sm-6">
        {!! Form::textarea('remark', null, ['class' => 'form-control','rows'=>3,'cols'=>3]) !!}
        @if ($errors->has('remark'))
            <span class="help-block">
                <strong style="color: red;">{{ $errors->first('remark') }}</strong>
            </span>
        @endif
    </div>
</div>