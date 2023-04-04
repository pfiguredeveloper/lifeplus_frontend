<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ClientRoles extends Model
{
    protected $connection = 'lifecell_users';
    protected $table      = 'roles';
    protected $primaryKey = 'id';
    public $timestamps    = false;

    protected $fillable = [
        'id','title',
    ];

    public function permissions()
    {
        return $this->belongsToMany('App\ClientPermissions','permission_role','role_id','permission_id');
    }
}