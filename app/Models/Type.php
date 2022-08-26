<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 6:24 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $fillable = [
        'name',
        'slideImage',
        'description'
    ];

    protected $hidden = [
        'building'
    ];


    public function building() {
        return $this->belongsTo('App\Models\Building', 'building', 'id');
    }

    public function apartments(){
        return $this->hasMany('App\Models\Apartment','id','types');
    }

    public function rooms(){
        return $this->hasMany('App\Models\Room','id','types');
    }

    public function images(){
        return $this->hasMany('App\Models\Image','id','types');
    }
}