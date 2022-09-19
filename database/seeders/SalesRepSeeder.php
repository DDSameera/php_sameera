<?php

namespace Database\Seeders;

use App\Models\Route;
use App\Models\SalesRep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesRepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalesRep::factory()->count(10)->create();
    }
}
