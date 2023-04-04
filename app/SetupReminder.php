<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class SetupReminder extends Model
{
    protected $connection = 'lifecell_lic';
    protected $table      = 'setup_reminder';
    protected $primaryKey = 'id';
    public $timestamps    = false;

    protected $fillable = [
        'id','is_disable_reminder','birthday_rm','birthday_rm_bf','birthday_rm_af','agent_birthday_rm','agent_birthday_rm_bf','agent_birthday_rm_af','marriage_ann_rm','marriage_ann_rm_bf','marriage_ann_rm_af','fup_rm','fup_rm_bf','fup_rm_af','term_insurance_rm','term_insurance_rm_bf','term_insurance_rm_af','ulip_plan_rm','ulip_plan_rm_bf','ulip_plan_rm_af','agency_expiry_rm','agency_expiry_rm_bf','agency_expiry_rm_af','licence_expiry_rm','licence_expiry_rm_bf','licence_expiry_rm_af','last_renew_rm','last_renew_rm_bf','last_renew_rm_af','to_do_rm','to_do_rm_bf','to_do_rm_af','health_plan_rm','health_plan_rm_bf','health_plan_rm_af','maturity_rm','maturity_rm_bf','maturity_rm_af','money_back_rm','money_back_rm_bf','money_back_rm_af','client_id','old_id','old_client_id',
    ];
}