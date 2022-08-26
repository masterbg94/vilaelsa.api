<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 6:29 PM
 */

namespace App\Repositories;


use App\Models\Type;

class TypeRepositories implements ITypeRepositories
{

    private $model;


    public function __construct(Type $type)
    {
        $this->model = $type;
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
        return $this->model->where('building', '=', $buildingId) -> get();
    }
}