<?php

namespace App\Services;

use App\Models\SalesRep;

class SalesRepService
{

    /**
     * Get All Sales Rep data
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllSalesRep()
    {
        return SalesRep::with('route')->get();

    }

    /**
     * Add Sales Rep data
     * @param $data
     * @return mixed
     */
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

    /**
     * Update Sales Rep data
     * @param $data
     * @param $id
     * @return bool|int
     */
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

    /**
     * Get Single Rep Data Record by their ID
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getSalesRep($id)
    {
        return SalesRep::with('route')->where('sales_reps.id', $id)->first();
    }

}
