<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 7:48 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Floors extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'building'
    ];

    public function building() {
        return $this->belongsTo('App\Models\Building', 'building', 'id');
    }

    public function apartments(){
        return $this->hasMany('App\Models\Apartment','id','floor');
    }
}