<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/24/18
 * Time: 9:08 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    protected $fillable = [
        "name",
        "area",
        "imgHailight",
        "status",
        "garageNumber",
        "buildingId"
    ];

    public function building() {
        return $this->belongsTo('App\Models\Building', 'building', 'id');
    }
}