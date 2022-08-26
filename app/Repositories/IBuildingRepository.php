<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/18/18
 * Time: 7:21 PM
 */

namespace App\Repositories;


interface IBuildingRepository
{
    function getAll();

    function getById($id);

    function update($id, $building);
}