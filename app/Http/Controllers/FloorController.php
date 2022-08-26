<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:05 PM
 */

namespace App\Http\Controllers;


use App\Services\FloorService;

class FloorController
{
    private $floorService;

    public function __construct(FloorService $floorService)
    {
        $this->floorService = $floorService;
    }

    function getAll(){
        return response()->json($this->floorService->getAll(), 200);
    }

    function getById($id){
        return response()->json($this->floorService->getById($id),200);
    }

    function getAllByBuilding($buildingId){
        return response()->json($this->floorService->getAllByBuilding($buildingId),200);
    }
}