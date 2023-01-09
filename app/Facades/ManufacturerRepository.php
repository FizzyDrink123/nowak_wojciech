<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ManufacturerRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ManufacturerRepository';
    }
}
