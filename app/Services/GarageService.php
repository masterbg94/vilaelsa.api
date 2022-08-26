<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/24/18
 * Time: 9:11 PM
 */

namespace App\Services;


use App\Repositories\GarageRepository;

class GarageService
{
    private $garages = [];
    private $garageRepository;

    public function __construct(GarageRepository $garageRepository)
    {
       return $this->garageRepository = $garageRepository;
    }

    public function getAll(){
        return $this->garageRepository->getAll();
    }

    public function getById($id){
        return $this->garageRepository->getById($id);
    }

    public function getByBuilding($buildingId, $pager = null){

        $this->garages = $this->garageRepository->getAllByBuilding($buildingId);
        // Paginate result
        $totalItems = count($this->garages);

        $startIndex = ($pager['page'] - 1) * $pager['pageSize'];
        $length = $pager['pageSize'];

        $this->garages = array_slice($this->garages->toArray(), $startIndex, $length);




        return [
            'total' => $totalItems,
            'pageNumber' => $pager['page'],
            'data' => $this->garages
        ];
    }
}