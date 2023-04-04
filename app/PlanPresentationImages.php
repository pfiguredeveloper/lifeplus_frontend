<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class PlanPresentationImages extends Model
{
    protected $connection = 'lifecell_lic';
    protected $table      = 'plan_presentation_images';
    protected $primaryKey = 'PlanPreID';
    public $timestamps    = false;

    protected $fillable = [
        'PlanPreID','PlanID','Title','Image','client_id','old_id','old_client_id'
    ];

    public function planPresentationId()
    {
        return $this->hasOne('App\LifeCell','plno','PlanID');
    }

}