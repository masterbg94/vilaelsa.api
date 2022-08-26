<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 11:11 PM
 */

namespace App\Repositories;


interface IRoomsRepositories
{
    function getAll();

    function getAllByType($typeId);
}