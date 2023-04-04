{{-- <?php echo "<pre>";print_r($policy); ?> --}}
<div class="tab-pane active" id="1">
    <div class="panel-body" style="padding-bottom: 0px !important;" id="app">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body" style="padding: 10px !important;">
                        <div class="row">
                            <div class="col-sm-2 mb-4">
                                <label class="control-label">Proposal No</label>
                                {!! Form::number('PROPNO',$policy['PROPNO'] ?? null, ['class' => 'form-control','id'=>'PROPNO','min'=>0]) !!}
                            </div>
                            <div class="col-sm-2 mb-4">
                                <label class="control-label">Proposal Dt.</label>
                                {!! Form::text('PROPDT', $policy['PROPDT'] ?? null, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'PROPDT', 'autocomplete' => 'off']) !!}
                            </div>
                            <div class="col-sm-2 mb-4">
                                <label class="control-label">Policy No</label>
                                {!! Form::text('PONO', $policy['PONO'] ?? null, ['class' => 'form-control','id'=>'PONO']) !!}
                            </div>
                            <div class="col-sm-4 mb-4">
                                <label class="control-label">Agency</label><br/>
                                <div class="input-group-data">                                
                                    {!! Form::select('AFILE', [''=>'']+$agencyname, !empty($policy['AFILE']) ? $policy['AFILE'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"agency_sel"]) !!}
                                    <span class="input-group-addon party-model-form" data-party-type="name3" data-table="party" data-toggle="modal" data-target="#exampleAgencyModalLong"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-2 mb-4">
                                <label class="control-label">Agency Code</label>
                                {!! Form::text('AGCODE',$policy['AGCODE'] ?? null, ['class' => 'form-control','id'=>'agencycode','readonly']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="control-label">Name - 1</label>
                                <div class="input-group-data">                                
                                    {!! Form::select('NAME1', [''=>'']+$partyname, !empty($policy['NAME1']) ? $policy['NAME1'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"name1_sel"]) !!}                                
                                    <span class="input-group-addon party-model-form" data-party-type="name3" data-table="party" data-toggle="modal" data-target="#examplePartyModalLong"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Birth Date - 1</label>
                                {!! Form::text('BIRTH1', $policy['BIRTH1'] ?? null, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy','id'=>'birthdate1','readonly']) !!}
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
                    <div class="panel-body" style="padding: 10px !important;">
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">RDT</label>
                                <?php $RDT = !empty($policy['RDT']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $policy['RDT'])->format('d/m/Y') : null; ?>
                                {!! Form::text('RDT', $RDT, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'RDT', 'autocomplete' => 'off']) !!}
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">CDT</label>
                                @php($CDT = null)
                                @if(!empty($policy['CDT']))
                                    @php($CDT = strcmp($policy['CDT'], "/") ? $policy['CDT'] : \Carbon\Carbon::createFromFormat('Y-m-d', $policy['CDT'])->format('d/m/Y'))
                                @endif
                                {!! Form::text('CDT', $CDT, ['class' => 'form-control datepicker3', 'placeholder' => 'dd/mm/yyyy','id'=>'CDT', 'autocomplete' => 'off']) !!}
                            </div>
                            <div class="col-sm-4">
                                <label class="control-label">Plan</label>
                                {!! Form::select('PLAN',[''=>'']+$plan,$policy['PLAN'] ?? null,['class'=>'form-control','style'=>'width:100%','id'=>'PLAN']) !!}
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Age</label>
                                <age-component></age-component>
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Mode</label>
                                {!! Form::select('MODE', [''=>''], $policy["MODE"] ?? null, ['class' => 'form-control', 'style' => 'width: 100%;padding-left: 0px;','id'=>'MODE']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">M. Term</label>
                                {!! Form::select('MTERM', [''=>''],$policy["MTERM"] ?? null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'MTERM']) !!}
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">P. Term</label>
                                {!! Form::select('PTERM', [''=>''],$policy["PTERM"] ?? null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'PTERM']) !!}
                            </div>
                            <div class="col-sm-4">
                                <label class="control-label">SA Option</label>
                                {!! Form::select('SAOPTION', [''=>''],$policy["SAOPTION"] ?? null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'SAOPTION']) !!}
                            </div>
                            <div class="col-sm-4">
                                <label class="control-label">Propsor</label>
                                <div class="input-group-data">   
                                {!! Form::select('NAME2', [''=>'']+$partyname, !empty($policy['NAME2']) ? $policy['NAME2'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>"NAME2"]) !!}
                                <span class="input-group-addon party-model-form" data-party-type="name3" data-table="party" data-toggle="modal" data-target="#examplePartyModalLong"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-sm-2">
                                <label class="control-label">Prop.DOB</label>
                                {!! Form::text('BIRTH2',$policy['BIRTH2'] ?? null, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy','id'=>'BIRTH2','readonly','autocomplete' => 'off']) !!}
                            </div>
                            <div  class="col-sm-2">
                                <label class="control-label">Prop Age</label>
                                {!! Form::text('PROP_AGE',$policy['PROP_AGE'] ?? null, ['class' => 'form-control','id'=>'PROP_AGE']) !!}
                            </div>
                            <div  class="col-sm-2">
                                <label class="control-label">NACH</label>
                                {!! Form::select('NACH', \App\Policy::$status, 'No', ['class' => 'form-control', 'style' => 'width: 100%','id'=>'NACH']) !!}
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">FUP</label>
                                {!! Form::select('FUP', [], $policy['FUP'] ?? null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'FUP']) !!}
                                <input type="hidden" name="FUPDATE" id="FULLFUP" value="" />                                
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Medical</label>
                                {!! Form::select('MEDICAL', [''=>'']+\App\Policy::$medical,$policy['MEDICAL'] ?? null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'MEDICAL']) !!}
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Mat.Dt</label>
                                <?php $MATDATE = !empty($policy['MATDATE']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $policy['MATDATE'])->format('d/m/Y') : null; ?>
                                {!! Form::text('MATDATE', $MATDATE, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy','id'=>'MATDATE','readonly', 'autocomplete' => 'off']) !!}
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Last Prem</label>
                                <?php $LASTPREM = !empty($policy['LASTPREM']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $policy['LASTPREM'])->format('d/m/Y') : null; ?>
                                {!! Form::text('LASTPREM', $LASTPREM, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy','id'=>'LASTPREM','readonly', 'autocomplete' => 'off']) !!}
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
                                    <label class="control-label" style="padding-top: 0px;text-align: left;float: left;">Annuity Type</label>
                                    <div class="col-sm-8">
                                        <input type="radio" name="ANN_TYPE" class="optionsRadios" value="Single Life" checked="">
                                        <span style="font-size: 16px;margin-right: 8px;">Single Life</span>
                                        <input type="radio" name="ANN_TYPE" value="Joint Life" class="optionsRadios">
                                        <span style="font-size: 16px;">Joint Life</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label">NCO</label>
                                    {!! Form::text('NCO',$policy['NCO'] ?? null, ['class' => 'form-control','id'=>'NCO']) !!}
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Annuity Option</label>
                                    {!! Form::select('ANN_OPTION', [''=>''],$policy['ANN_OPTION'] ?? null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'ANN_OPTION']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label">Pen. Mode</label>
                                    {!! Form::select('ANN_MODE', [''=>''],$policy['ANN_MODE'] ?? null, ['class' => 'form-control', 'style' => 'width: 100%;padding-left: 0px;','id'=>'ANN_MODE']) !!}
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Pen. Amt</label>
                                    {!! Form::text('ANN_AMT',$policy['ANN_AMT'] ?? null, ['class' => 'form-control','id'=>'ANN_AMT']) !!}
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label" style="text-align: left;float: left;">Premium</label>
                                    {!! Form::number('UPREMIUM', $policy['UPREMIUM'] ?? 0, ['class' => 'form-control','id'=>'UPLAN','min'=>0,'style'=>'text-align: right;']) !!}
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label" style="text-align: left;float: left;">Found Type</label>
                                    {!! Form::select('UFOUNDTYPE', ['Bond Fund'=>'Bond Fund','Secured Fund'=>'Secured Fund','Balanced Fund'=>'Balanced Fund','Growth Fund'=>'Growth Fund'], $policy['UFOUNDTYPE'] ?? null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'UFOUNDTYPE']) !!}
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
                        <?php
                        if (!empty($policy)) {
                            if (!empty($policy['is_auto_prem'])) {
                                $isAutoP = true;
                            } else {
                                $isAutoP = false;
                            }
                        } else {
                            $isAutoP = false;
                        }
                        ?>
                        <h4 class="panel-title">SA & Riders Details <span style="margin-left:10px;float: right;">Auto Prem. {!! Form::checkbox('is_auto_prem', 1,$isAutoP, ['id'=>'is_auto_prem','style'=>'margin-top: 0px;']) !!}</span></h4>
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
                                        <td>{!! Form::number('BASIC_SA', !empty($policy['SA']) ? $policy['SA'] : 0, ['class' => 'form-control GET_PREM','id'=>'BASIC_SA','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                                        <td>{!! Form::number('BASIC_PREM', !empty($policy['BASIC_PREM']) ? $policy['BASIC_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'BASIC_PREM',!empty($isAutoP) ? 'readonly' : '','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><span style="margin-left: 5px;"></span>{!! Form::select('DAB_OPTION', ['0'=>'ADDBR','1'=>'ADB'],$policy['DAB_OPTION'] ?? null, ['class' => 'form-control GET_PREM', 'style' => 'height: 25px;padding: 0px;text-align: right;width: 100%','id'=>'DAB_OPTION',!empty($policy['DAB_CHECK']) ? '' : 'readonly']) !!}</td>
                                        <td>{!! Form::number('DAB_SA', !empty($policy['DABSA']) ? $policy['DABSA'] : 0, ['class' => 'form-control GET_PREM','id'=>'DAB_SA','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,!empty($policy['DAB_CHECK']) ? '' : 'readonly']) !!}</td>
                                        <td>{!! Form::number('DAB_PREM', !empty($policy['DAB_PREM']) ? $policy['DAB_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'DAB_PREM',!empty($isAutoP) ? 'readonly' : '','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                                        <td>{!! Form::checkbox('DAB_CHECK', 1,!empty($policy['DAB_CHECK']) ? true : false, ['style' => 'margin-top: 5px;','id'=>'DAB_CHECK','class' =>'GET_PREM']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="margin-left: 5px;"></span>TR SA</td>
                                        <td>{!! Form::number('TR_SA', !empty($policy['TR_SA']) ? $policy['TR_SA'] : 0, ['class' => 'form-control GET_PREM','id'=>'TR_SA','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,!empty($policy['TR_CHECK']) ? '' : 'readonly']) !!}</td>
                                        <td>{!! Form::number('TR_PREM', !empty($policy['TR_PREM']) ? $policy['TR_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'TR_PREM',!empty($isAutoP) ? 'readonly' : '','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                                        <td>{!! Form::checkbox('TR_CHECK', 1,!empty($policy['TR_CHECK']) ? true : false, ['style' => 'margin-top: 5px;','id'=>'TR_CHECK','class' =>'GET_PREM']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="margin-left: 5px;"></span>CIR SA</td>
                                        <td>{!! Form::number('CIR_SA', !empty($policy['CIR_SA']) ? $policy['CIR_SA'] : 0, ['class' => 'form-control GET_PREM','id'=>'CIR_SA','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0,!empty($policy['CIR_CHECK']) ? '' : 'readonly']) !!}</td>
                                        <td>{!! Form::number('CIR_PREM', !empty($policy['CIR_PREM']) ? $policy['CIR_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'CIR_PREM',!empty($isAutoP) ? 'readonly' : '','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                                        <td>{!! Form::checkbox('CIR_CHECK', 1,!empty($policy['CIR_CHECK']) ? true : false, ['style' => 'margin-top: 5px;','id'=>'CIR_CHECK','class' =>'GET_PREM']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="margin-left: 5px;"></span>PWB</td>
                                        <td>{!! Form::select('PWB', ['No'=>'No','Yes'=>'Yes'],$policy['PWB'] ?? null, ['class' => 'form-control GET_PREM', 'style' => 'height: 25px;padding: 0px;text-align: right;width: 100%','id'=>'PWB',!empty($policy['PWB_CHECK']) ? '' : 'readonly']) !!}</td>
                                        <td>{!! Form::number('PWB_PREM', !empty($policy['PWB_PREM']) ? $policy['PWB_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'PWB_PREM',!empty($isAutoP) ? 'readonly' : '','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                                        <td>{!! Form::checkbox('PWB_CHECK', 1,!empty($policy['PWB_CHECK']) ? true : false, ['style' => 'margin-top: 5px;','id'=>'PWB_CHECK','class' =>'GET_PREM']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td><span style="margin-left: 5px;"></span>SETT.</td>
                                        <td>{!! Form::select('SETT', ['No'=>'No','Yes'=>'Yes'],$policy['SETT'] ?? null, ['class' => 'form-control', 'style' => 'height: 25px;padding: 0px;text-align: right;width: 100%','id'=>'SETT',!empty($policy['SETT_CHECK']) ? '' : 'readonly']) !!}</td>
                                        <td>{!! Form::number('SETT_PREM', !empty($policy['SETT_PREM']) ? $policy['SETT_PREM'] : $defaultVal, ['class' => 'form-control GET_PREM','id'=>'SETT_PREM',!empty($isAutoP) ? 'readonly' : '','style'=>'height: 25px;padding: 0px;text-align: right;','min'=>0]) !!}</td>
                                        <td>{!! Form::checkbox('SETT_CHECK', 1,!empty($policy['SETT_CHECK']) ? true : false, ['style' => 'margin-top: 5px;','id'=>'SETT_CHECK','class' =>'GET_PREM']) !!}</td>
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
            </div>

        </div>
    </div>
</div>