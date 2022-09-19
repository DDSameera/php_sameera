<?php
namespace App\Services;

use App\Models\Route;
use App\Models\SalesRep;

class RouteService{

    /**
     * Load All Routes Data
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllRoutes(){
       return Route::all();

    }



}
