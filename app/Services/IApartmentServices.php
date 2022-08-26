<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:43 PM
 */

namespace App\Services;


interface IApartmentServices
{
    function getAll($filter = null, $pager);

    function getById($id);

    function getAllByBuilding($buildingId);

    function getAllByType($typeId);

    function getAllByFloor($floorId);

    function update($id, $apartment);

    function apartmentsRandom();
}