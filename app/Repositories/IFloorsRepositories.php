<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 7:50 PM
 */

namespace App\Repositories;


interface IFloorsRepositories
{
    function getAll();

    function getById($id);

    function getAllByBuilding($buildingId);
}