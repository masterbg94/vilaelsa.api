<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:36 PM
 */

namespace App\Repositories;


use App\Models\Apartment;

class ApartmentRepositories implements IApartmentRepositories
{
    private $model;

    public function __construct(Apartment $apartment)
    {
        $this->model = $apartment;
    }

    function getAll()
    {
        return $this->model->all();
    }

    function getById($id)
    {
        return $this->model->find($id);
    }

    function getAllByBuilding($buildingId)
    {
        return $this->model->where([['buildingId' ,'=', $buildingId],['apartmentNumber' ,'!=', null]])->get();
    }

    function getAllByType($typeId)
    {
        return $this->model->where('typeId','=', $typeId)->get();
    }

    function getAllByFloor($floorId)
    {
        return $this->model->where('floorId','=', $floorId)->get();
    }

    function update($id, $apartment)
    {
        $apt = $this->model->find($id);

        $apt->status = $apartment;

        return $apt->save();
    }
}
