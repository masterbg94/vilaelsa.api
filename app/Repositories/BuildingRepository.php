<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/18/18
 * Time: 7:23 PM
 */

namespace App\Repositories;


use App\Models\Building;

class BuildingRepository implements IBuildingRepository
{
    private $model;

    public function __construct(Building $building) {
        $this->model = $building;
    }

    function getAll()
    {
        return $this->model->all();
    }

    function getById($id)
    {
        return $this->model->find($id);
    }

    function update($id, $building)
    {
        return $this->model->find($id)->update($building);
    }
}