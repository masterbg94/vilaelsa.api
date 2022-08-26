<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/18/18
 * Time: 7:18 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'name',
        'sold',
        'headerimg'
    ];

    public function type()
    {
        return $this->hasMany('App\Models\Type', 'id', 'building');
    }

    public function floors()
    {
        return $this->hasMany('App\Models\Type','id','building');
    }

    public function apartments(){
        return $this->hasMany('App\Models\Apartment','id','building');
    }
}