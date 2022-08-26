<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 11:11 PM
 */

namespace App\Repositories;


use App\Models\Room;

class RoomsRepositories implements IRoomsRepositories
{
    private $model;

    public function __construct(Room $rooms)
    {
        $this->model = $rooms;
    }

    function getAll()
    {
        return $this->model->all();
    }

    function getAllByType($typeId)
    {
       return $this->model->where('typeId','=', $typeId)->get();
    }
}