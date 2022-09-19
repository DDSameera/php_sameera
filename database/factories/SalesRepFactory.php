<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalesRep>
 */
class SalesRepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $routes = Route::pluck('id')->toArray();
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'telephone'=>$this->faker->phoneNumber(),
            'route_id'=> $this->faker->randomElement($routes),
            'joined_date'=>$this->faker->date(),
            'comments'=>$this->faker->paragraph()

        ];
    }
}
