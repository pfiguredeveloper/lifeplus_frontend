<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-body" style="padding: 10px !important;">
            <div class="row">
                
            <div class="col-sm-12" style="padding-left: 0px;">

                <label class="control-label" style="text-align: left;float: left;">Quot. No.</label>
                <div class="col-sm-2" style="width: 12%;">
                    {!! Form::number('QUOTNO', null, ['class' => 'form-control','id'=>'QUOTNO','min'=>0]) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Quot. Dt.</label>
                <div class="col-sm-2" style="width: 12%;">
                    {!! Form::text('QUOTDT', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'QUOTDT', 'autocomplete' => 'off']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Quot. Ref</label>
                <div class="col-sm-2" style="width: 12%;">
                    {!! Form::text('QUOTREF', null, ['class' => 'form-control','id'=>'QUOTREF']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Agency</label>
                <div class="col-sm-3">
                    {!! Form::select('AFILE', [''=>'']+$agencyname, !empty($policy['AFILE']) ? $policy['AFILE'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"agency_sel"]) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Agency Code</label>
                <div class="col-sm-2" style="width: 12%;">
                    {!! Form::text('AGCODE', null, ['class' => 'form-control','id'=>'agencycode','readonly']) !!}
                </div>

            </div>

            <div class="col-sm-12" style="margin-top: 10px;padding-left: 0px;">

                <label class="control-label" style="text-align: left;float: left;">Name - 1</label>
                <div class="col-sm-3">
                    {!! Form::select('NAME1', [''=>'']+$partyname, !empty($policy['NAME1']) ? $policy['NAME1'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"name1_sel"]) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Birth Date - 1</label>
                <div class="col-sm-2" style="width: 12%;">
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
            <div class="col-sm-12" style="padding-left: 0px;">

                <label class="control-label" style="text-align: left;float: left;">RDT</label>
                <div class="col-sm-2" style="width: 14%;">
                    {!! Form::text('RDT', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'RDT', 'autocomplete' => 'off']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Comp.Dt</label>
                <div class="col-sm-2" style="width: 14%;">
                    {!! Form::text('CDT', null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'CDT', 'autocomplete' => 'off']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Plan</label>
                <div class="col-sm-4" style="width: 25%">
                    {!! Form::select('PLAN', [''=>'']+$plan, null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'PLAN']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Age</label>
                <div class="col-sm-2" style="width: 12%">
                    <age-component></age-component>
                </div>

                <label class="control-label" style="text-align: left;float: left;">Mode</label>
                <div class="col-sm-2" style="width: 14%">
                    {!! Form::select('MODE', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%;padding-left: 0px;','id'=>'MODE']) !!}
                </div>

            </div>

            <div class="col-sm-12" style="margin-top: 10px;padding-left: 0px;">
                <label class="control-label" style="text-align: left;float: left;">M. Term</label>
                <div class="col-sm-2" style="width: 13%;">
                    {!! Form::select('MTERM', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'MTERM']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">P. Term</label>
                <div class="col-sm-2" style="width: 13%;">
                    {!! Form::select('PTERM', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'PTERM']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;"><label>To Term</label><span style="margin-left:10px;">{!! Form::checkbox('groupentry', null,null, ['id'=>'group_entry','style'=>'margin-top: 0px;']) !!}</span></label>
                <div class="col-sm-2" style="width: 13% !important;">
                    {!! Form::select('TTERM', [''=>'']+\App\Policy::$status, null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'TTERM','disabled']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">SA Option</label>
                <div class="col-sm-3">
                    {!! Form::select('SAOPTION', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'SAOPTION']) !!}
                </div>

            </div>

            <div class="col-sm-12" style="margin-top: 10px;padding-left: 0px;">
                <label class="control-label" style="text-align: left;float: left;">Propsor</label>
                <div class="col-sm-5">
                    {!! Form::select('NAME2', [''=>'']+$partyname, !empty($policy['NAME2']) ? $policy['NAME2'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"NAME2"]) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Prop.DOB</label>
                <div class="col-sm-2" style="width: 18.8% !important;">
                    {!! Form::text('BIRTH2', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy','id'=>'BIRTH2','readonly']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Prop Age</label>
                <div class="col-sm-2" style="width: 13% !important;">
                    {!! Form::text('PROP_AGE', null, ['class' => 'form-control','id'=>'PROP_AGE']) !!}
                </div>
            </div>

            <div class="col-sm-12" style="margin-top: 10px;padding-left: 0px;">
                <label class="control-label" style="text-align: left;float: left;">NACH</label>
                <div class="col-sm-2" style="width: 17%;">
                    {!! Form::select('NACH', [''=>'']+\App\Policy::$status, null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'NACH']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">FUP</label>
                <div class="col-sm-2" style="width: 17%;">
                    {!! Form::select('FUP', [], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'FUP']) !!}
                    <input type="hidden" name="FUPDATE" id="FULLFUP" value="">
                </div>

                <label class="control-label" style="text-align: left;float: left;">Medical</label>
                <div class="col-sm-2" style="width: 18%;">
                    {!! Form::select('MEDICAL', [''=>'']+\App\Policy::$medical, null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'MEDICAL']) !!}
                </div>
            </div>

            <div class="col-sm-12" style="margin-top: 10px;padding-left: 0px;">
                <label class="control-label" style="text-align: left;float: left;">Bonus</label>
                <div class="col-sm-2" style="width: 17%;">
                    {!! Form::text('BONUS_RATE', null, ['class' => 'form-control','id'=>'BONUS_RATE']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Loyalty</label>
                <div class="col-sm-2" style="width: 17%;">
                    {!! Form::text('LOYAL_RATE', null, ['class' => 'form-control','id'=>'LOYAL_RATE']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">G.Add.</label>
                <div class="col-sm-2" style="width: 18%;">
                    {!! Form::text('GADD', null, ['class' => 'form-control','id'=>'GADD']) !!}
                </div>

                <label class="control-label" style="text-align: left;float: left;">Maturity Amt.</label>
                <div class="col-sm-2" style="width: 18%;">
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

                <div class="col-sm-12" style="padding-left: 0px;">
                    <label class="control-label" style="text-align: left;float: left;">Annuity Type</label>
                    <div class="col-sm-8" style="margin-top: 7px;">
                        <input type="radio" name="ANN_TYPE" class="optionsRadios" checked="">
                        <span style="font-size: 16px;margin-right: 8px;">Single Life</span>
                        <input type="radio" name="ANN_TYPE" class="optionsRadios">
                        <span style="font-size: 16px;">Joint Life</span>
                    </div>
                </div>

                <div class="col-sm-12" style="margin-top: 10px;padding-left: 0px;">
                    <label class="control-label" style="text-align: left;float: left;">NCO</label>
                    <div class="col-sm-4">
                        {!! Form::text('NCO', null, ['class' => 'form-control','id'=>'NCO']) !!}
                    </div>

                    <label class="control-label" style="text-align: left;float: left;">Annuity Option</label>
                    <div class="col-sm-4">
                        {!! Form::select('ANN_OPTION', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'ANN_OPTION']) !!}
                    </div>
                </div>

                <div class="col-sm-12" style="margin-top: 10px;padding-left: 0px;">
                    <label class="control-label" style="text-align: left;float: left;">Pen. Mode</label>
                    <div class="col-sm-4">
                        {!! Form::select('ANN_MODE', [''=>''], null, ['class' => 'form-control', 'style' => 'width: 100%;padding-left: 0px;','id'=>'ANN_MODE']) !!}
                    </div>

                    <label class="control-label" style="text-align: left;float: left;">Pen. Amt</label>
                    <div class="col-sm-4">
                        {!! Form::text('ANN_AMT', null, ['class' => 'form-control','id'=>'ANN_AMT']) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-6" style="padding-left: 0px;padding-right: 0px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Unit Link Details</h4>
            </div>

            <div class="panel-body" style="padding: 10px !important;">

                <div class="col-sm-12" style="padding-left: 0px;">
                    <label class="control-label" style="text-align: left;float: left;">Premium</label>
                    <div class="col-sm-3">
                        {!! Form::number('UPREMIUM', 0, ['class' => 'form-control','id'=>'UPLAN','min'=>0,'style'=>'text-align: right;']) !!}
                    </div>

                    <label class="control-label" style="text-align: left;float: left;">Found Type</label>
                    <div class="col-sm-4">
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