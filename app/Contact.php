<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $connection = 'lifecell_lic';
    protected $table      = 'contact';
    protected $primaryKey = 'ID';
    public $timestamps    = false;

    protected $fillable = [
        'ID','AD1','AD2','AD3','CITY','CITYID','PIN','ARECD','PHONE_O','PHONE_R','MOBILE','PAGER_FAX','EMAIL','tableName','tableID',
    ];
}