<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 6:29 PM
 */

namespace App\Repositories;


interface ITypeRepositories
{
    function getAll();

    function getById($id);

    function getAllByBuilding($buildingId);


}