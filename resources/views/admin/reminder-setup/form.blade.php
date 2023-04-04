<div class="panel-body">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Disable All Reminder ?</label>
                    <div class="col-sm-3" style="margin-top: 6px;">
                        {!! Form::radio('is_disable_reminder', 'No', null, ['class' => 'flat-red']) !!} <span style="margin-right: 10px;"><b>{{ 'No' }}</b></span>
                    </div>
                    <div class="col-sm-3" style="margin-top: 6px;">
                        {!! Form::radio('is_disable_reminder', 'Disable', null, ['class' => 'flat-red']) !!} <span style="margin-right: 10px;"><b>{{ 'Disable' }}</b></span>
                    </div>
                    <div class="col-sm-3" style="margin-top: 6px;">
                        {!! Form::radio('is_disable_reminder', 'Enable', null, ['class' => 'flat-red']) !!} <span style="margin-right: 10px;"><b>{{ 'Enable' }}</b></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Birthday Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('birthday_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['birthday_rm']) ? $reports['birthday_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'birthday_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('birthday_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'birthday_rm_bf',(!empty($reports['birthday_rm']) && $reports['birthday_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('birthday_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'birthday_rm_af',(!empty($reports['birthday_rm']) && $reports['birthday_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Agent Birthday Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('agent_birthday_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['agent_birthday_rm']) ? $reports['agent_birthday_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'agent_birthday_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('agent_birthday_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'agent_birthday_rm_bf',(!empty($reports['agent_birthday_rm']) && $reports['agent_birthday_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('agent_birthday_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'agent_birthday_rm_af',(!empty($reports['agent_birthday_rm']) && $reports['agent_birthday_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Marriage Ann. Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('marriage_ann_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['marriage_ann_rm']) ? $reports['marriage_ann_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'marriage_ann_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('marriage_ann_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'marriage_ann_rm_bf',(!empty($reports['marriage_ann_rm']) && $reports['marriage_ann_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('marriage_ann_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'marriage_ann_rm_af',(!empty($reports['marriage_ann_rm']) && $reports['marriage_ann_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">FUP Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('fup_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['fup_rm']) ? $reports['fup_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'fup_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('fup_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'fup_rm_bf',(!empty($reports['fup_rm']) && $reports['fup_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('fup_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'fup_rm_af',(!empty($reports['fup_rm']) && $reports['fup_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Term Insurance Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('term_insurance_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['term_insurance_rm']) ? $reports['term_insurance_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'term_insurance_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('term_insurance_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'term_insurance_rm_bf',(!empty($reports['term_insurance_rm']) && $reports['term_insurance_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('term_insurance_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'term_insurance_rm_af',(!empty($reports['term_insurance_rm']) && $reports['term_insurance_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ULIP Plan Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('ulip_plan_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['ulip_plan_rm']) ? $reports['ulip_plan_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'ulip_plan_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('ulip_plan_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'ulip_plan_rm_bf',(!empty($reports['ulip_plan_rm']) && $reports['ulip_plan_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('ulip_plan_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'ulip_plan_rm_af',(!empty($reports['ulip_plan_rm']) && $reports['ulip_plan_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Agency Expiry Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('agency_expiry_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['agency_expiry_rm']) ? $reports['agency_expiry_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'agency_expiry_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('agency_expiry_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'agency_expiry_rm_bf',(!empty($reports['agency_expiry_rm']) && $reports['agency_expiry_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('agency_expiry_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'agency_expiry_rm_af',(!empty($reports['agency_expiry_rm']) && $reports['agency_expiry_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Licence. Expiry Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('licence_expiry_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['licence_expiry_rm']) ? $reports['licence_expiry_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'licence_expiry_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('licence_expiry_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'licence_expiry_rm_bf',(!empty($reports['licence_expiry_rm']) && $reports['licence_expiry_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('licence_expiry_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'licence_expiry_rm_af',(!empty($reports['licence_expiry_rm']) && $reports['licence_expiry_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Last Renew Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('last_renew_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['last_renew_rm']) ? $reports['last_renew_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'last_renew_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('last_renew_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'last_renew_rm_bf',(!empty($reports['last_renew_rm']) && $reports['last_renew_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('last_renew_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'last_renew_rm_af',(!empty($reports['last_renew_rm']) && $reports['last_renew_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">TO Do Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('to_do_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['to_do_rm']) ? $reports['to_do_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'to_do_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('to_do_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'to_do_rm_bf',(!empty($reports['to_do_rm']) && $reports['to_do_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('to_do_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'to_do_rm_af',(!empty($reports['to_do_rm']) && $reports['to_do_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Health Plan Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('health_plan_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['health_plan_rm']) ? $reports['health_plan_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'health_plan_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('health_plan_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'health_plan_rm_bf',(!empty($reports['health_plan_rm']) && $reports['health_plan_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('health_plan_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'health_plan_rm_af',(!empty($reports['health_plan_rm']) && $reports['health_plan_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Maturity Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('maturity_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['maturity_rm']) ? $reports['maturity_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'maturity_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('maturity_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'maturity_rm_bf',(!empty($reports['maturity_rm']) && $reports['maturity_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('maturity_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'maturity_rm_af',(!empty($reports['maturity_rm']) && $reports['maturity_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Money Back Reminder</label>
                    <div class="col-sm-2">
                        {!! Form::select('money_back_rm', ['Yes'=>'Yes','No'=>'No'], !empty($reports['money_back_rm']) ? $reports['money_back_rm'] : null, ['class' => 'form-control', 'style' => 'width: 100%','id'=>'money_back_rm']) !!}
                    </div>
                    <label class="col-sm-1 control-label">Before</label>
                    <div class="col-sm-2">
                        {!! Form::number('money_back_rm_bf', null, ['class' => 'form-control','min'=>0,'id'=>'money_back_rm_bf',(!empty($reports['money_back_rm']) && $reports['money_back_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                    <label class="col-sm-1 control-label">After</label>
                    <div class="col-sm-2">
                        {!! Form::number('money_back_rm_af', null, ['class' => 'form-control','min'=>0,'id'=>'money_back_rm_af',(!empty($reports['money_back_rm']) && $reports['money_back_rm'] == 'No') ? 'readonly' : '']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).on("change","#birthday_rm",function() {
        if($("#birthday_rm").val() == 'No') {
            $("#birthday_rm_bf").attr("readonly","readonly");
            $("#birthday_rm_bf").val(0);
            $("#birthday_rm_af").attr("readonly","readonly");
            $("#birthday_rm_af").val(0);
        } else {
            $("#birthday_rm_bf").removeAttr("readonly");
            $("#birthday_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#agent_birthday_rm",function() {
        if($("#agent_birthday_rm").val() == 'No') {
            $("#agent_birthday_rm_bf").attr("readonly","readonly");
            $("#agent_birthday_rm_bf").val(0);
            $("#agent_birthday_rm_af").attr("readonly","readonly");
            $("#agent_birthday_rm_af").val(0);
        } else {
            $("#agent_birthday_rm_bf").removeAttr("readonly");
            $("#agent_birthday_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#marriage_ann_rm",function() {
        if($("#marriage_ann_rm").val() == 'No') {
            $("#marriage_ann_rm_bf").attr("readonly","readonly");
            $("#marriage_ann_rm_bf").val(0);
            $("#marriage_ann_rm_af").attr("readonly","readonly");
            $("#marriage_ann_rm_af").val(0);
        } else {
            $("#marriage_ann_rm_bf").removeAttr("readonly");
            $("#marriage_ann_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#fup_rm",function() {
        if($("#fup_rm").val() == 'No') {
            $("#fup_rm_bf").attr("readonly","readonly");
            $("#fup_rm_bf").val(0);
            $("#fup_rm_af").attr("readonly","readonly");
            $("#fup_rm_af").val(0);
        } else {
            $("#fup_rm_bf").removeAttr("readonly");
            $("#fup_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#term_insurance_rm",function() {
        if($("#term_insurance_rm").val() == 'No') {
            $("#term_insurance_rm_bf").attr("readonly","readonly");
            $("#term_insurance_rm_bf").val(0);
            $("#term_insurance_rm_af").attr("readonly","readonly");
            $("#term_insurance_rm_af").val(0);
        } else {
            $("#term_insurance_rm_bf").removeAttr("readonly");
            $("#term_insurance_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#ulip_plan_rm",function() {
        if($("#ulip_plan_rm").val() == 'No') {
            $("#ulip_plan_rm_bf").attr("readonly","readonly");
            $("#ulip_plan_rm_bf").val(0);
            $("#ulip_plan_rm_af").attr("readonly","readonly");
            $("#ulip_plan_rm_af").val(0);
        } else {
            $("#ulip_plan_rm_bf").removeAttr("readonly");
            $("#ulip_plan_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#agency_expiry_rm",function() {
        if($("#agency_expiry_rm").val() == 'No') {
            $("#agency_expiry_rm_bf").attr("readonly","readonly");
            $("#agency_expiry_rm_bf").val(0);
            $("#agency_expiry_rm_af").attr("readonly","readonly");
            $("#agency_expiry_rm_af").val(0);
        } else {
            $("#agency_expiry_rm_bf").removeAttr("readonly");
            $("#agency_expiry_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#licence_expiry_rm",function() {
        if($("#licence_expiry_rm").val() == 'No') {
            $("#licence_expiry_rm_bf").attr("readonly","readonly");
            $("#licence_expiry_rm_bf").val(0);
            $("#licence_expiry_rm_af").attr("readonly","readonly");
            $("#licence_expiry_rm_af").val(0);
        } else {
            $("#licence_expiry_rm_bf").removeAttr("readonly");
            $("#licence_expiry_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#last_renew_rm",function() {
        if($("#last_renew_rm").val() == 'No') {
            $("#last_renew_rm_bf").attr("readonly","readonly");
            $("#last_renew_rm_bf").val(0);
            $("#last_renew_rm_af").attr("readonly","readonly");
            $("#last_renew_rm_af").val(0);
        } else {
            $("#last_renew_rm_bf").removeAttr("readonly");
            $("#last_renew_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#to_do_rm",function() {
        if($("#to_do_rm").val() == 'No') {
            $("#to_do_rm_bf").attr("readonly","readonly");
            $("#to_do_rm_bf").val(0);
            $("#to_do_rm_af").attr("readonly","readonly");
            $("#to_do_rm_af").val(0);
        } else {
            $("#to_do_rm_bf").removeAttr("readonly");
            $("#to_do_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#health_plan_rm",function() {
        if($("#health_plan_rm").val() == 'No') {
            $("#health_plan_rm_bf").attr("readonly","readonly");
            $("#health_plan_rm_bf").val(0);
            $("#health_plan_rm_af").attr("readonly","readonly");
            $("#health_plan_rm_af").val(0);
        } else {
            $("#health_plan_rm_bf").removeAttr("readonly");
            $("#health_plan_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#maturity_rm",function() {
        if($("#maturity_rm").val() == 'No') {
            $("#maturity_rm_bf").attr("readonly","readonly");
            $("#maturity_rm_bf").val(0);
            $("#maturity_rm_af").attr("readonly","readonly");
            $("#maturity_rm_af").val(0);
        } else {
            $("#maturity_rm_bf").removeAttr("readonly");
            $("#maturity_rm_af").removeAttr("readonly");
        }
    });
    $(document).on("change","#money_back_rm",function() {
        if($("#money_back_rm").val() == 'No') {
            $("#money_back_rm_bf").attr("readonly","readonly");
            $("#money_back_rm_bf").val(0);
            $("#money_back_rm_af").attr("readonly","readonly");
            $("#money_back_rm_af").val(0);
        } else {
            $("#money_back_rm_bf").removeAttr("readonly");
            $("#money_back_rm_af").removeAttr("readonly");
        }
    });
</script>