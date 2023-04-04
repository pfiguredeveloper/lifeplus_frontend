<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-body" style="padding: 10px !important;">
            <div class="row">
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Quot. No.</label>
                    {!! Form::number('QUOTNO', null, ['class' => 'form-control','id'=>'QUOTNO','min'=>0]) !!}
                </div>  
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Quot. Dt.</label>
                    {!! Form::text('QUOTDT', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'QUOTDT', 'autocomplete' => 'off']) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Quot. Ref</label>
                    {!! Form::text('QUOTREF', null, ['class' => 'form-control','id'=>'QUOTREF']) !!}
                </div>
                <div class="col-sm-4 mb-4">
                    <label class="control-label">Agency</label>
                    {!! Form::select('AFILE', [''=>'']+$agencyname, !empty($policy['AFILE']) ? $policy['AFILE'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"agency_sel"]) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Agency Code</label>
                    {!! Form::text('AGCODE', null, ['class' => 'form-control','id'=>'agencycode','readonly']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 mb-4">
                    <label class="control-label">Name - 1</label>
                    {!! Form::select('NAME1', [''=>'']+$partyname, !empty($policy['NAME1']) ? $policy['NAME1'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"name1_sel"]) !!}
                </div>
                <div class="col-sm-4 mb-4">
                    <label class="control-label">Birth Date - 1</label>
                    {!! Form::text('BIRTH1', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy','id'=>'birthdate1','readonly']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">Plan Details</h4>
        </div>

        <div class="panel-body" style="padding: 10px !important;" id="app">
            <div class="row">
                <div class="col-sm-2 mb-4">
                    <label class="control-label">RDT</label>
                    {!! Form::text('RDT', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'RDT', 'autocomplete' => 'off']) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Comp.Dt</label>
                        {!! Form::text('CDT', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'CDT', 'autocomplete' => 'off']) !!}
                 </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Plan</label>
                    {!! Form::select('PLAN', [''=>'']+$plan, null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'PLAN']) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Age</label>
                    <age-component></age-component>
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Mode</label>   
                    {!! Form::select('MODE', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%;padding-left: 0px;','id'=>'MODE']) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">M. Term</label>
                    {!! Form::select('MTERM', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'MTERM']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 mb-4">
                    <label class="control-label">P. Term</label>
                    {!! Form::select('PTERM', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'PTERM']) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label"><label>To Term</label><span>{!! Form::checkbox('groupentry', null,null, ['id'=>'group_entry','style'=>'margin-top: 0px;']) !!}</span></label>
                    {!! Form::select('TTERM', [''=>'']+\App\Policy::$status, null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'TTERM','disabled']) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">SA Option</label>
                    {!! Form::select('SAOPTION', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'SAOPTION']) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Propsor</label>
                    {!! Form::select('NAME2', [''=>'']+$partyname, !empty($policy['NAME2']) ? $policy['NAME2'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"NAME2"]) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Prop.DOB</label>
                    {!! Form::text('BIRTH2', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy','id'=>'BIRTH2','readonly']) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Prop Age</label>
                    {!! Form::text('PROP_AGE', null, ['class' => 'form-control','id'=>'PROP_AGE']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 mb-4">
                    <label class="control-label">NACH</label>
                    {!! Form::select('NACH', [''=>'']+\App\Policy::$status, null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'NACH']) !!}
                </div>
                <div class="col-sm-2 mb-4">
                    <label class="control-label">FUP</label>
                    {!! Form::select('FUP', [], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'FUP']) !!}
                    <input type="hidden" name="FUPDATE" id="FULLFUP" value="">
                </div>

                <div class="col-sm-2 mb-4">
                    <label class="control-label">Medical</label>
                    {!! Form::select('MEDICAL', [''=>'']+\App\Policy::$medical, null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'MEDICAL']) !!}
                </div>
                
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Bonus</label>
                    {!! Form::text('BONUS_RATE', null, ['class' => 'form-control','id'=>'BONUS_RATE']) !!}
                </div>

                <div class="col-sm-2 mb-4">
                   <label class="control-label">Loyalty</label>
                    {!! Form::text('LOYAL_RATE', null, ['class' => 'form-control','id'=>'LOYAL_RATE']) !!}
                </div>

                <div class="col-sm-2 mb-4">
                    <label class="control-label">G.Add.</label>
                    {!! Form::text('GADD', null, ['class' => 'form-control','id'=>'GADD']) !!}
                </div>
                
                <div class="col-sm-2 mb-4">
                    <label class="control-label">Maturity Amt.</label>
                    {!! Form::text('MATURITY_AMT', null, ['class' => 'form-control','id'=>'MATURITY_AMT','readonly']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6" style="padding-left: 0px;padding-right: 7px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Annuity / Pension Details</h4>
            </div>
            <div class="panel-body" style="padding: 10px !important;">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="control-label">Annuity Type</label><br/>
                        <input type="radio" name="ANN_TYPE" class="optionsRadios" checked="">
                        <span style="font-size: 16px;margin-right: 8px;">Single Life</span>
                        <input type="radio" name="ANN_TYPE" class="optionsRadios">
                        <span style="font-size: 16px;">Joint Life</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <label class="control-label">NCO</label>
                        {!! Form::text('NCO', null, ['class' => 'form-control','id'=>'NCO']) !!}
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label class="control-label">Annuity Option</label>
                        {!! Form::select('ANN_OPTION', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'ANN_OPTION']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <label class="control-label">Pen. Mode</label>
                        {!! Form::select('ANN_MODE', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%;padding-left: 0px;','id'=>'ANN_MODE']) !!}
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label class="control-label">Pen. Amt</label>   
                        {!! Form::text('ANN_AMT', null, ['class' => 'form-control','id'=>'ANN_AMT']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Unit Link Details</h4>
            </div>
            <div class="panel-body" style="padding: 10px !important;">
                <div class="row">
                    <div class="col-sm-6 mr-2 mb-4">
                        <label class="control-label">Premium</label>
                        {!! Form::number('UPREMIUM', 0, ['class' => 'form-control','id'=>'UPLAN','min'=>0,'style'=>'text-align: right;']) !!}
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label class="control-label">Found Type</label>
                        {!! Form::select('UFOUNDTYPE', ['Bond Fund'=>'Bond Fund','Secured Fund'=>'Secured Fund','Balanced Fund'=>'Balanced Fund','Growth Fund'=>'Growth Fund'], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'UFOUNDTYPE']) !!}
                    </div>
                </div>
            </div>
        </div>
        <a href="https://ebiz.licindia.in/D2CPM/?&_ga=2.70079058.379848617.1627448895-951808083.1613212203#qni/basicinfo" target="_blank"><button class="btn bg-orange" type="button">Calculate Prem From LIC Site</button></a>
    </div>
</div>
<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">SA & Riders Details <span style="margin-left:10px;float: right;">Auto Prem. {!! Form::checkbox('is_auto_prem', 1,true, ['id'=>'is_auto_prem','style'=>'margin-top: 0px;']) !!}</span></h4>
        </div>

        <div class="panel-body" style="padding-top: 0px !important;padding-bottom: 0px !important;">
            <div class="row">
                <?php $defaultVal = "0.00"; ?>
                <table class="table SA_Table" style="margin-bottom: 0px !important;">
                    <thead>
                        <tr>
                            <td width="30%"></td>
                            <td width="30%">
                                <center>SA & Riders</center>
                            </td>
                            <td width="30%">
                                <center>Prem.</center>
                            </td>
                            <td width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>BASIC SA</td>
                            <td>{!! Form::number('BASIC_SA', !empty($policy['BASIC_SA']) ? $policy['BASIC_SA'] : 0, ['class' => 'form-control GET_PREM','id'=>'BASIC_SA','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                            <td>{!! Form::number('BASIC_PREM', !empty($policy['BASIC_PREM']) ? $policy['BASIC_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'BASIC_PREM','readonly','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>{!! Form::select('DAB_OPTION', ['0'=>'ADDBR','1'=>'ADB'], null, ['class' => 'form-control GET_PREM', 'style' => 'height: 25px;padding: 0px;text-align: right;width: 100%','id'=>'DAB_OPTION','readonly']) !!}</td>
                            <td>{!! Form::number('DAB_SA', !empty($policy['DAB_SA']) ? $policy['DAB_SA'] : 0, ['class' => 'form-control GET_PREM','id'=>'DAB_SA','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,'readonly']) !!}</td>
                            <td>{!! Form::number('DAB_PREM', !empty($policy['DAB_PREM']) ? $policy['DAB_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'DAB_PREM','readonly','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                            <td>{!! Form::checkbox('DAB_CHECK', 0,false, ['style' => 'margin-top: 5px;','id'=>'DAB_CHECK','class' =>'GET_PREM']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>TR SA</td>
                            <td>{!! Form::number('TR_SA', !empty($policy['TR_SA']) ? $policy['TR_SA'] : 0, ['class' => 'form-control GET_PREM','id'=>'TR_SA','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,'readonly']) !!}</td>
                            <td>{!! Form::number('TR_PREM', !empty($policy['TR_PREM']) ? $policy['TR_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'TR_PREM','readonly','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                            <td>{!! Form::checkbox('TR_CHECK', 0,false, ['style' => 'margin-top: 5px;','id'=>'TR_CHECK','class' =>'GET_PREM']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>CIR SA</td>
                            <td>{!! Form::number('CIR_SA', !empty($policy['CIR_SA']) ? $policy['CIR_SA'] : 0, ['class' => 'form-control GET_PREM','id'=>'CIR_SA','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,'readonly']) !!}</td>
                            <td>{!! Form::number('CIR_PREM', !empty($policy['CIR_PREM']) ? $policy['CIR_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'CIR_PREM','readonly','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                            <td>{!! Form::checkbox('CIR_CHECK', 0,false, ['style' => 'margin-top: 5px;','id'=>'CIR_CHECK','class' =>'GET_PREM']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>PWB</td>
                            <td>{!! Form::select('PWB', ['No'=>'No','Yes'=>'Yes'], null, ['class' => 'form-control GET_PREM', 'style' => 'height: 25px;padding: 0px;text-align: right;width: 100%','id'=>'PWB','readonly']) !!}</td>
                            <td>{!! Form::number('PWB_PREM', !empty($policy['PWB_PREM']) ? $policy['PWB_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'PWB_PREM','readonly','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                            <td>{!! Form::checkbox('PWB_CHECK', 0,false, ['style' => 'margin-top: 5px;','id'=>'PWB_CHECK','class' =>'GET_PREM']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>SETT.</td>
                            <td>{!! Form::select('SETT', ['No'=>'No','Yes'=>'Yes'], null, ['class' => 'form-control', 'style' => 'height: 25px;padding: 0px;text-align: right;width: 100%','id'=>'SETT','readonly']) !!}</td>
                            <td>{!! Form::number('SETT_PREM', !empty($policy['SETT_PREM']) ? $policy['SETT_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'SETT_PREM','readonly','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                            <td>{!! Form::checkbox('SETT_CHECK', 0,false, ['style' => 'margin-top: 5px;','id'=>'SETT_CHECK','class' =>'GET_PREM']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>Extra Prem.</td>
                            <td>{!! Form::number('EXTRASA', !empty($policy['EXTRASA']) ? $policy['EXTRASA'] : $defaultVal, ['class' => 'form-control','id'=>'EXTRASA','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                            <td>{!! Form::number('EXTRAPREM', !empty($policy['EXTRAPREM']) ? $policy['EXTRAPREM'] : $defaultVal, ['class' => 'form-control','id'=>'EXTRAPREM','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,'readonly']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>Total Prem.</td>
                            <td></td>
                            <td>{!! Form::number('PREM', !empty($policy['PREM']) ? $policy['PREM'] : $defaultVal, ['class' => 'form-control','id'=>'PREM','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,'readonly']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>GST 4.5%</td>
                            <td></td>
                            <td>{!! Form::number('GST1', !empty($policy['GST1']) ? $policy['GST1'] : $defaultVal, ['class' => 'form-control','id'=>'GST1','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,'readonly']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>GST 2.25%</td>
                            <td></td>
                            <td>{!! Form::number('GST2', !empty($policy['GST2']) ? $policy['GST2'] : $defaultVal, ['class' => 'form-control','id'=>'GST2','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,'readonly']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>Prem + GST1</td>
                            <td></td>
                            <td>{!! Form::number('TOTPREM1', !empty($policy['TOTPREM1']) ? $policy['TOTPREM1'] : $defaultVal, ['class' => 'form-control','id'=>'TOTPREM1','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,'readonly']) !!}</td>
                        </tr>
                        <tr>
                            <td><span style="margin-left: 5px;"></span>Prem + GST2</td>
                            <td></td>
                            <td>{!! Form::number('TOTPREM2', !empty($policy['TOTPREM2']) ? $policy['TOTPREM2'] : $defaultVal, ['class' => 'form-control','id'=>'TOTPREM2','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,'readonly']) !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="edit_mode_id">
    <button class="btn btn-info insert-item-1" type="button" style="margin-bottom: 15px;"><i class="fa fa-plus"></i></button>
</div>

<br>
<div class="col-sm-12">
    <div class="policy-main-div">
        <div id="policy-section">

        </div>
    </div>
</div>