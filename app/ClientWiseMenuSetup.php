<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ClientWiseMenuSetup extends Model
{
    protected $connection = 'lifecell_lic';
    protected $table      = 'client_wise_menu_setup';
    protected $primaryKey = 'id';
    public $timestamps    = false;

    protected $fillable = [
        'id','font_color','back_color','ordering','menu_id','client_id','quick_menu','quick_menu_ordering',
    ];
}