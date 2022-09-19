<?php

namespace App\Facades;

use App\Services\SalesRepService;
use Illuminate\Support\Facades\Facade;

class SalesRepFacade extends Facade {


    protected static function getFacadeAccessor()
    {
        return SalesRepService::class;
    }
}
