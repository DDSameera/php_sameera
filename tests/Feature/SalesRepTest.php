<?php

namespace Tests\Feature;

use App\Models\SalesRep;
use Tests\TestCase;

class SalesRepTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_root_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_load_all_sales_rep_data()
    {

        $response = $this->get('/');
        $salesRep = SalesRep::first();
        $response->assertSee($salesRep->name);

    }

    public function test_data_pass_to_view()
    {
        $response = $this->get('/');
        $response->assertViewHas('salesRep', SalesRep::all());
    }

    public function test_view_sales_rep_create_page()
    {
        $response = $this->get('/salesrep/create');
        $response->assertStatus(200);
    }

    public function test_store_sales_rep_data()
    {

        $salesRepData = [
            'name' => 'Abdulla',
            'email' => 'abc@yahoo.com',
            'telephone' => '0122121221',
            'joined_date' => '2022-01-01',
            'route_id' => 1,
            'comments' => 'great'

        ];

        $this->call('POST', 'salesrep', $salesRepData);

        $salesRep = SalesRep::where('name', 'Abdulla')->first();


        $this->assertEquals($salesRepData["name"], $salesRep->name);


    }

    public function test_delete_sales_rep_data()
    {

        $salesRep = SalesRep::first();
        $salesRepId = $salesRep->id;
        $response = $this->call('DELETE', '/salesrep/' . $salesRepId, ['_token' => csrf_token()]);

        $this->assertEquals(302, $response->getStatusCode());


    }

    public function test_edit_sales_rep_data()
    {
        $salesRep = SalesRep::first();
        $salesRepId = $salesRep->id;

        $salesRepData = [
            'name' => 'Gotabaya',
            'email' => 'gota@yahoo.com',
            'telephone' => '0122121221',
            'joined_date' => '2022-01-01',
            'route_id' => 1,
            'comments' => 'Gota 2022',
            '_token' => csrf_token()

        ];


        $response = $this->call('PUT', '/salesrep/' . $salesRepId, $salesRepData);

        var_dump($response->getContent());
    }
}
