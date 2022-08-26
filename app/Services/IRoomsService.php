<?php
/**
 * Created by PhpStorm.
 * User: slobodansekulic
 * Date: 4/19/18
 * Time: 11:16 PM
 */

namespace App\Services;


interface IRoomsService
{
    function getAll();

    function getAllByType($typeId);
}