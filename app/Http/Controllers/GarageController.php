<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/24/18
 * Time: 9:14 PM
 */

namespace App\Http\Controllers;


use App\Services\GarageService;

class GarageController
{
    public $garageService;

    public function __construct(GarageService $garageService)
    {
        $this->garageService = $garageService;
    }

    function getAll(){
        return response()->json($this->garageService->getAll(),200);
    }
    function getById($id){
        return response()->json($this->garageService->getById($id),200);
    }

    function getAllByBuilding($buildingId){
        $pager = [
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'pageSize' => isset($_GET['pageSize']) ? $_GET['pageSize'] : 10
        ];
        return response()->json($this->garageService->getByBuilding($buildingId, $pager),200);
    }
}