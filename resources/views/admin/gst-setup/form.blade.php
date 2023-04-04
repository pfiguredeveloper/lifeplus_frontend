<div class="panel-body">
    <div class="row">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-5 control-label">GST Effective Date</label>
                        <div class="col-sm-3">
                            {!! Form::text('from_date', null, ['class' => 'form-control datepicker3','id'=>'from']) !!}
                        </div>
                        <label class="col-sm-1 control-label">To</label>
                        <div class="col-sm-3">
                            {!! Form::text('to_date', null, ['class' => 'form-control datepicker3','id'=>'to']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Cal. GST In Report?</label>
                        <div class="col-sm-3">
                            {!! Form::select('gst_in_report', ['Yes'=>'Yes','No'=>'No'], !empty($gst['gst_in_report']) ? $gst['gst_in_report'] : null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-5 control-label">GST (Ann.Sgl.Pr.)%</label>
                                <div class="col-sm-3">
                                    {!! Form::text('gst_ann', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Tax (SBC & KKC)</label>
                                <div class="col-sm-3">
                                    {!! Form::text('tax_ann_1', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::text('tax_ann_2', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-5 control-label">GST (Term,Ulip,Helath)%</label>
                                <div class="col-sm-3">
                                    {!! Form::text('gst_term', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Tax (SBC & KKC)</label>
                                <div class="col-sm-3">
                                    {!! Form::text('tax_term_1', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::text('tax_term_2', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-5 control-label">GST (Risk Prem.1 & 2 Yr.)%</label>
                                <div class="col-sm-3">
                                    {!! Form::text('gst_risk_1', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::text('gst_risk_2', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Tax (SBC & KKC)</label>
                                <div class="col-sm-3">
                                    {!! Form::text('tax_risk_1', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-sm-3">
                                    {!! Form::text('tax_risk_2', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>