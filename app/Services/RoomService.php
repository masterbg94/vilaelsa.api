<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 11:16 PM
 */

namespace App\Services;


use App\Repositories\RoomsRepositories;

class RoomService implements IRoomsService
{
    private $roomsRepository;

    public function __construct(RoomsRepositories $roomsRepository)
    {
        $this->roomsRepository = $roomsRepository;
    }

    function getAll()
    {
        return $this->roomsRepository->getAll();
    }

    function getAllByType($typeId)
    {
        return $this->roomsRepository->getAllByType($typeId);
    }
}