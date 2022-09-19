<?php

namespace App\Facades;

use App\Services\SalesRepService;
use Illuminate\Support\Facades\Facade;

class SalesRepFacade extends Facade
{


    /**
     * Load SalesRep Service Class through the SalesRepFacade
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SalesRepService::class;
    }
}
