<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:01 PM
 */

namespace App\Services;


use App\Repositories\FloorsRepositories;

class FloorService implements IFloorService
{
    private $floorRepositories;

    public function __construct(FloorsRepositories $floorsRepositories)
    {
        $this->floorRepositories = $floorsRepositories;
    }

    function getAll()
    {
       return $this->floorRepositories->getAll();
    }

    function getById($id)
    {
       return $this->floorRepositories->getById($id);
    }

    function getAllByBuilding($buildingId)
    {
       return $this->floorRepositories->getAllByBuilding($buildingId);
    }

}