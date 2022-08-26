<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 8:36 PM
 */

namespace App\Repositories;


interface IApartmentRepositories
{
    function getAll();

    function getById($id);

    function getAllByBuilding($buildingId);

    function getAllByType($typeId);

    function getAllByFloor($floorId);

    function update($id, $apartment);

}