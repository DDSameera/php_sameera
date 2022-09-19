<?php

namespace App\Services;

use App\Models\SalesRep;

class SalesRepService
{

    public function getAllSalesRep()
    {
        return SalesRep::with('route')->get();

    }

    public function addSalesRep($data)
    {
        return SalesRep::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'route_id' => $data['route_id'],
            'joined_date' => $data['joined_date'],
            'comments' => $data['comments']

        ]);
    }

    public function updateSalesRep($data, $id)
    {

        $saleRep = $this->getSalesRep($id);
       return $saleRep->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'route_id' => $data['route_id'],
            'joined_date' => $data['joined_date'],
            'comments' => $data['comments']

        ]);
    }

    public function getSalesRep($id)
    {
        return SalesRep::with('route')->where('sales_reps.id', $id)->first();
    }

}
