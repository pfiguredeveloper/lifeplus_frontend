<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ClientPermissions extends Model
{
    protected $connection = 'lifecell_users';
    protected $table      = 'permissions';
    protected $primaryKey = 'id';
    public $timestamps    = false;

    protected $fillable = [
        'id','title',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\ClientRoles','permission_role','role_id','permission_id');
    }
}