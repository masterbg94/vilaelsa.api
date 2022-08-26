<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 7:50 PM
 */

namespace App\Repositories;

use App\Models\Image;

class ImageRepositories
{
    private $model;

    public function __construct(Image $model)
    {
        $this->model = $model;
    }

    function getAll()
    {
       return $this->model->all();
    }

    function getById($id)
    {
        return $this->model->find($id);
    }

    function getAllByType($typeId)
    {
        return $this->model->where('typeId', '=', $typeId)-> get();
    }
}