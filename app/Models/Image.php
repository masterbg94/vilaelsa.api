<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:29 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Image extends Model

{
    protected $filable = [
        'name'
    ];

    public function type(){
        return $this->belongsTo('App\Models\Type', 'type', 'id');
    }
}