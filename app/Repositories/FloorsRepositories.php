<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 7:50 PM
 */

namespace App\Repositories;




use App\Models\Floors;

class FloorsRepositories implements IFloorsRepositories
{
    private $model;

    public function __construct(Floors $floors)
    {
        $this->model = $floors;
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
        return $this->model->where('buildingId', '=', $buildingId)-> get();
    }
}