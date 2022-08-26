<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/18/18
 * Time: 7:30 PM
 */

namespace App\Services;


use App\Repositories\BuildingRepository;
use App\Models\Building;


class BuildingService implements IBuildingService
{
    private $buildingRepository;

    public function __construct(BuildingRepository $buildingRepository) {
        $this->buildingRepository = $buildingRepository;
    }

    function getAll()
    {
        return $this->buildingRepository->getAll();
    }

    function getById($id)
    {
        return $this->buildingRepository->getById($id);
    }

    function update($id, $building)
    {
        return $this->buildingRepository->update($id, $building);
    }
}