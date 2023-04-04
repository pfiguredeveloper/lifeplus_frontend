<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $connection = 'lifecell_lic';
    protected $table    =  "pol";

    public $timestamps  = false;

    protected $fillable = [
        'plannm', 'planid', 'plangrpid','plno','effe_from','effe_to'
    ];

    const STATUS_YES = 'Yes';
    const STATUS_NO = 'No';

    public static $status = [
        self::STATUS_YES => 'Yes',
        self::STATUS_NO => 'No',
    ];

    const STATUS_Y = 'Y';
    const STATUS_N = 'N';

    public static $status1 = [
        self::STATUS_Y => 'Y',
        self::STATUS_N => 'N',
    ];

    const STATUS_1 = '1';
    const STATUS_0 = '0';

    public static $status2 = [
        self::STATUS_1 => '1',
        self::STATUS_0 => '0',
    ];

    const MEDICAL_M = 'M';
    const MEDICAL_S = 'S';
    const MEDICAL_G = 'G';

    public static $medical = [
        self::MEDICAL_M => 'M',
        self::MEDICAL_S => 'S',
        self::MEDICAL_G => 'G',
    ];
}

