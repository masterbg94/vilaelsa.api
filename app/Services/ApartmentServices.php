<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:43 PM
 */

namespace App\Services;


use App\Repositories\ApartmentRepositories;
use App\Repositories\FloorsRepositories;
use App\Repositories\ImageRepositories;
use App\Repositories\RoomsRepositories;
use App\Repositories\TypeRepositories;

class ApartmentServices implements IApartmentServices
{
    private $apartmentRepository;
    private $typeRepository;
    private $imageRepository;
    private $floorRepository;
    private $roomRepository;

    private $apartments = [];

    public function __construct(
        ApartmentRepositories $apartmentRepository,
        TypeRepositories $typeRepository,
        ImageRepositories $imageRepository,
        FloorsRepositories $floorsRepositories,
        RoomsRepositories $roomRepositories
    )
    {
        $this->apartmentRepository = $apartmentRepository;
        $this->typeRepository = $typeRepository;
        $this->imageRepository = $imageRepository;
        $this->floorRepository = $floorsRepositories;
        $this->roomRepository = $roomRepositories;
    }

    function getAll($filter = null, $pager)
    {
        if(
            $filter == null ||
            (
                !isset($filter['floor']) &&
                !isset($filter['type']) &&
                !isset($filter['areaMin']) &&
                !isset($filter['areaMax'])
            )
        ) {
            // No filter
            $this->apartments = $this->apartmentRepository->getAll();
        }

        // Filter result
        $this->apartments = $this->apartmentRepository->getAll()->filter(function($item) use ($filter) {
            $floorPassed = true;
            $typePassed = true;
            $areaPassed = true;

            if($filter['floor'] != null) {
                if($item['floorId'] == $filter['floor']) {
                    $floorPassed = true;
                } else {
                    $floorPassed = false;
                }
            }

            if($filter['type'] != null) {
                if($item['typeId'] == $filter['type']) {
                    $typePassed = true;
                } else {
                    $typePassed = false;
                }
            }

            if($filter['areaMin'] && $filter['areaMax']) {
                if($item['area'] > $filter['areaMin'] && $item['area'] < $filter['areaMax']) {
                    $areaPassed = true;
                } else {
                    $areaPassed = false;
                }
            }

            return $floorPassed && $typePassed && $areaPassed;
        });

        // Paginate result
        $totalItems = count($this->apartments);

        $startIndex = ($pager['page'] - 1) * $pager['pageSize'];
        $length = $pager['pageSize'];

        $this->apartments = array_slice($this->apartments->toArray(), $startIndex, $length);

        for ($i = 0; $i < count($this->apartments); $i++) {
            $this->apartments[$i]['type'] = $this->typeRepository->getById($this->apartments[$i]['typeId']);
            $this->apartments[$i]['floor'] = $this->floorRepository->getById($this->apartments[$i]['floorId']);
            $this->apartments[$i]['images'] = $this->imageRepository->getAllByType($this->apartments[$i]['typeId']);
        }

        return [
            'total' => $totalItems,
            'pageNumber' => $pager['page'],
            'data' => $this->apartments
        ];
    }

    function getById($id)

    {

        $this->apartments = $this->apartmentRepository->getById($id);

         $this->apartments['images'] = $this->imageRepository->getAllByType($this->apartments['typeId']);
        $this->apartments['rooms'] = $this->roomRepository->getAllByType($this->apartments['typeId']);

         return $this->apartments;


    }

    function getAllByBuilding($buildingId, $filter = null, $pager = null )
    {
        if(
            $filter == null ||
            (
                !isset($filter['floor']) &&
                !isset($filter['type']) &&
                !isset($filter['areaMin']) &&
                !isset($filter['areaMax'])
            )
        ) {
            // No filter
           $this->apartments = $this->apartmentRepository->getAllByBuilding($buildingId);
        }
        // Filter result
        $this->apartments = $this->apartmentRepository->getAllByBuilding($buildingId)->filter(function($item) use ($filter) {
            $floorPassed = true;
            $typePassed = true;
            $areaPassed = true;

            if($filter['floor'] != null) {
                if($item['floorId'] == $filter['floor']) {
                    $floorPassed = true;
                } else {
                    $floorPassed = false;
                }
            }

            if($filter['type'] != null) {
                if($item['typeId'] == $filter['type']) {
                    $typePassed = true;
                } else {
                    $typePassed = false;
                }
            }

            if($filter['areaMin'] && $filter['areaMax']) {
                if($item['area'] > $filter['areaMin'] && $item['area'] < $filter['areaMax']) {
                    $areaPassed = true;
                } else {
                    $areaPassed = false;
                }
            }

            return $floorPassed && $typePassed && $areaPassed;
        });

        // Paginate result
        $totalItems = count($this->apartments);

        $startIndex = ($pager['page'] - 1) * $pager['pageSize'];
        $length = $pager['pageSize'];

        $this->apartments = array_slice($this->apartments->toArray(), $startIndex, $length);

        for ($i = 0; $i < count($this->apartments); $i++) {
            $this->apartments[$i]['type'] = $this->typeRepository->getById($this->apartments[$i]['typeId']);
            $this->apartments[$i]['floor'] = $this->floorRepository->getById($this->apartments[$i]['floorId']);
            $this->apartments[$i]['images'] = $this->imageRepository->getAllByType($this->apartments[$i]['typeId']);
            $this->apartments[$i]['room'] = $this->roomRepository->getAllByType($this->apartments[$i]['typeId']);
        }

        return [
            'total' => $totalItems,
            'pageNumber' => $pager['page'],
            'data' => $this->apartments
        ];

    }

    function getPremisesByBuilding($buildingId)
    {
        $this->apartments = $this->apartmentRepository->getPremisesByBuilding($buildingId);
        // Paginate result
        $totalItems = count($this->apartments);

        return [
            'total' => $totalItems,
            'data' => $this->apartments
        ];
    }

    function getAllByType($typeId)
    {
        return $this->apartmentRepository->getAllByType($typeId);
    }

    function getAllByFloor($floorId)
    {
        return $this->apartmentRepository->getAllByFloor($floorId);
    }

    function update($id, $apartment)
    {
        return $this->apartmentRepository->update($id,$apartment);
    }

    function apartmentsRandom(){
        $numberOfRandomItems = 6;
        $allApartments = $this
            ->apartmentRepository
            ->getAll()
            ->toArray();

        for ($i = 0; $i < count($allApartments); $i++) {
            $allApartments[$i]['type'] = $this->typeRepository->getById($allApartments[$i]['typeId']);
            $allApartments[$i]['images'] = $this->imageRepository->getAllByType($allApartments[$i]['typeId']);
            $allApartments[$i]['floor'] = $this->floorRepository->getById($allApartments[$i]['floorId']);
            $allApartments[$i]['room'] = $this->roomRepository->getAllByType($allApartments[$i]['typeId']);
        }

        $arrayRandomKeys = array_rand($allApartments, $numberOfRandomItems);

        $array = [];

        for($i = 0; $i < $numberOfRandomItems; $i++) {
            $array[$i] = $allApartments[$arrayRandomKeys[$i]];
        }

        return $array;
    }
}
