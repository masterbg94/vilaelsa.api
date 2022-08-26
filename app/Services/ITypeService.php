<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 6:37 PM
 */

namespace App\Services;


interface ITypeService
{
    function getAll();

    function getById($id);

    function getAllByBuilding($buildingId);
}