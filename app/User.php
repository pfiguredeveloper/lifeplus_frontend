<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'lifecell_users';
    protected $table      = 'tbl_client_product';
    protected $primaryKey = 'cp_id';
    public $timestamps    = false;

    protected $fillable = [
        'cp_id','c_id', 'p_id', 'cp_reg_dt','cp_license_exp_dt','cp_hddno','cp_sitekey','cp_licencekey','cp_dealer_id','cp_dealer_name','cp_uniqno','cp_password','cp_mobile_no','cp_email','cp_title','cp_prch_dt','cp_prch_price','cp_surrender_date','cp_is_surrender','cp_is_demo','is_first_login','roles_id','old_client_id','cp_type','cp_stopdt','cp_payment','cp_sales_amt','cp_sales_mrp','cp_reason','cp_device_type','cp_imei','cp_user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->cp_password;
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = encrypt($password);
    }
}
