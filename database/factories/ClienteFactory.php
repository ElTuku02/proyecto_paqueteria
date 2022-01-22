<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;
    public function definition()
    {
        return [
            'dni'               => $this->faker->dni(),
            'nombre'            => $this->faker->firstName(),
            'apellidos'         => $this->faker->lastName(),
            'telefono'          => $this->faker->phoneNumber(),
            'email'             => $this->faker->freeEmail(),
            'f_nacimiento'      => $this->faker->date($format= 'd-m-Y', $max = '01-01-2010'),
            'procedencia'       => $this->faker->state(),
        ];
    }
}
