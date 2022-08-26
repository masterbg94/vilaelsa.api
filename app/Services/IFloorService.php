<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:00 PM
 */

namespace App\Services;


interface IFloorService
{
    function getAll();

    function getById($id);

    function getAllByBuilding($buildingId);
}