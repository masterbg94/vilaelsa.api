<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:29 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Apartment extends Model

{
    protected $filable = [
        'roomsNumber',
        'status',
        'imgModel',
        'imgHailight',
        'area',
        'apartmentNumber'
    ];

    public function building() {
        return $this->belongsTo('App\Models\Building', 'building', 'id');
    }

    public function type(){
        return $this->belongsTo('App\Models\Type', 'type', 'id');
    }

    public function floor(){
        return $this->belongsTo('App\Models\Floor', 'floor', 'id');
    }

}