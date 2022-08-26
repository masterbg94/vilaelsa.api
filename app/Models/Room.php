<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 11:05 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        "name",
        "area",
        "roomNumber"
    ];

    public function type(){
        return $this->belongsTo('App\Models\Type', 'type', 'id');
    }
}