<?php

namespace App\Facades;

use App\Services\RouteService;
use Illuminate\Support\Facades\Facade;

class RouteFacade extends Facade
{


    protected static function getFacadeAccessor()
    {
        return RouteService::class;
    }
}
