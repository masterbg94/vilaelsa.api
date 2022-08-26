<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 6:50 PM
 */

namespace App\Http\Controllers;


use App\Services\TypeService;

class TypeController
{
    private $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }

    function getAll(){
        return response()->json($this->typeService->getAll(),200);
    }

    function getById($id){
        return response()->json($this->typeService->getById($id), 200);
    }

    function getAllByBuilding($buildingId){
        return response()->json($this->typeService->getAllByBuilding($buildingId), 200);
    }
}