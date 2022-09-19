<?php

namespace Tests\Unit;


use App\Models\SalesRep;
use Tests\TestCase;

class SalesRepTest extends TestCase
{
    /**
     * Validate Sales Rep Data Before Store them into databse
     *
     * @return void
     */

    public function test_validate_sales_rep_data_before_store()
    {
        $data = [
            'name' => 'Amal',
            'email' => 'abc@yahoo.com',
            'telephone' => '',
            'joined_date' => '',
            'route_id' => '',
            'comments' => '',
            '_token' => csrf_token()
        ];
        $response = $this->post(route('salesrep.store'), $data);
        $response->assertSessionHasErrors(['telephone', 'joined_date', 'route_id', 'comments']);

    }

    /**
     * Validate Sales Rep Data Before Update them
     *
     * @return void
     */
    public function test_validate_sales_rep_data_before_update()
    {
        $data = [
            'name' => 'Amal',
            'email' => 'abc@yahoo.com',
            'telephone' => '',
            'joined_date' => '',
            'route_id' => '',
            'comments' => '',
            '_token' => csrf_token()
        ];
        $salesRepId = SalesRep::first()->id;
        $response = $this->put(route('salesrep.update', $salesRepId), $data);
        $response->assertSessionHasErrors(['telephone', 'joined_date', 'route_id', 'comments']);

    }

    /**
     * Check Invalid Salerep ID
     *
     * @return void
     */

    public function test_invalid_salerep_id_edit()
    {
        $response = $this->get(route('salesrep.edit', 1000));
        $response->assertSessionHas('error','Sorry Sales Rep ID is not exsist');
    }


}
