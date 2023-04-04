
<div class="panel-body">
    <div class="row">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Loan Relnv. Rate</label>
                    <div class="col-sm-2">
                        {!! Form::text('loan_relnv_rate', null, ['class' => 'form-control']) !!}
                    </div>

                    <label class="col-sm-2 control-label">Money Back Reinv. Rate</label>
                    <div class="col-sm-2">
                        {!! Form::text('mb_relnv_rate', null, ['class' => 'form-control']) !!}
                    </div>

                    <label class="col-sm-2 control-label">Yield</label>
                    <div class="col-sm-2">
                        {!! Form::select('yield', ['Yes'=>'Yes','No'=>'No'], !empty($sales['yield']) ? $sales['yield'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Other Interestment Rate</label>
                    <div class="col-sm-2">
                        {!! Form::text('other_interest_rate', null, ['class' => 'form-control']) !!}
                    </div>

                    <label class="col-sm-2 control-label">Dating Back Invest Rate</label>
                    <div class="col-sm-2">
                        {!! Form::text('db_invest_rate', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>