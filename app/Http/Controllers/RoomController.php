<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 11:19 PM
 */

namespace App\Http\Controllers;


use App\Services\RoomService;

class RoomController
{
    private $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    function getAll(){
        return response()->json($this->roomService->getAll(),200);
    }

    function getAllByType($typeId){
       return response()->json($this->roomService->getAllByType($typeId),200);
    }
}