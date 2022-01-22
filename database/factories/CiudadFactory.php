<?php

namespace Database\Factories;

use App\Models\Ciudad;
use App\Models\Repartidor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CiudadFactory extends Factory
{ 
    protected $model = Ciudad::class;

    public function definition()
    {
        return [
            'nombre'                 => $this->faker->city(),
            'provincia'              => $this->faker->state(),
            'pais'                   => $this->faker->country(),
            'codigo_postal'          => $this->faker->postcode(),
        ];
    }
}
