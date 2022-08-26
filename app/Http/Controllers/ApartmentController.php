<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:56 PM
 */

namespace App\Http\Controllers;


use App\Services\ApartmentServices;

class ApartmentController
{
    private $apartmentService;

    public function __construct(ApartmentServices $apartmentService)
    {
        $this->apartmentService = $apartmentService;
    }

    function getAll() {
        // Declare filter props
        $filter = [
            'floor' => isset($_GET['floor']) ? $_GET['floor'] : null,
            'type' => isset($_GET['type']) ? $_GET['type'] : null,
            'areaMin' => isset($_GET['areaMin']) ? $_GET['areaMin'] : null,
            'areaMax' => isset($_GET['areaMax']) ? $_GET['areaMax'] : null
        ];

        $pager = [
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'pageSize' => isset($_GET['pageSize']) ? $_GET['pageSize'] : 10
        ];

        return response()->json($this->apartmentService->getAll($filter, $pager),200);
    }

    function getById($id){

        return response()->json($this->apartmentService->getById($id),200);
    }

    function getAllByBuilding($buildingId){
        $filter = [
            'floor' => isset($_GET['floor']) ? $_GET['floor'] : null,
            'type' => isset($_GET['type']) ? $_GET['type'] : null,
            'areaMin' => isset($_GET['areaMin']) ? $_GET['areaMin'] : null,
            'areaMax' => isset($_GET['areaMax']) ? $_GET['areaMax'] : null
        ];

        $pager = [
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'pageSize' => isset($_GET['pageSize']) ? $_GET['pageSize'] : 10
        ];

        return response()->json($this->apartmentService->getAllByBuilding($buildingId, $filter, $pager),200);
    }

    function getAllByType($typeId){
        return response()->json($this->apartmentService->getAllByType($typeId),200);
    }

    function getAllByFloor($floorId){
       return response()->json($this->apartmentService->getAllByFloor($floorId),200) ;
    }

    function updateApartment($id){
        $status = isset($_POST['status']) ? $_POST['status'] : 'Slobodno';
        return response()->json($this->apartmentService->update($id,$status),200);
    }

    function apartmentsRandom(){
        return response()->json($this->apartmentService->apartmentsRandom(),200);
    }
}