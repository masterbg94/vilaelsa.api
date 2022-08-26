<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 6:38 PM
 */

namespace App\Services;


use App\Repositories\TypeRepositories;

class TypeService implements ITypeService
{
    private $typeRepositories;

    public function  __construct(TypeRepositories $typeRepositories){
        $this->typeRepositories = $typeRepositories;
    }

     function getAll()
    {
       return $this->typeRepositories->getAll();
    }

    function getById($id)
    {
      return  $this->typeRepositories->getById($id);
    }
    function getAllByBuilding($buildingId)
    {
        return $this->typeRepositories->getAllByBuilding($buildingId);
    }
}