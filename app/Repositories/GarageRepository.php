<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/24/18
 * Time: 9:10 PM
 */

namespace App\Repositories;


use App\Models\Garage;

class GarageRepository
{
    private $model;

    public function __construct(Garage $garage)
    {
        $this->model = $garage;
    }

    function getAll()
    {
        return $this->model->all();
    }

    function getById($id)
    {
        return $this->model->find($id);
    }

    function getAllByBuilding($buildingId)
    {
        return $this->model->where('buildingId' ,'=', $buildingId)->get();
    }
}