<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/18/18
 * Time: 7:28 PM
 */

namespace App\Services;


interface IBuildingService
{
    function getAll();

    function  getById($id);

    function update($id, $building);
}