<?php

namespace App\Facades;

use App\Services\RouteService;
use Illuminate\Support\Facades\Facade;

class RouteFacade extends Facade
{


    /**
     * Load Route Service Class through the Route Facade
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return RouteService::class;
    }
}
