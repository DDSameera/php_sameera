<?php
namespace App\Services;

use App\Models\Route;
use App\Models\SalesRep;

class RouteService{

    public function getAllRoutes(){
       return Route::all();

    }



}
