<?php

namespace Database\Factories;

use App\Models\Repartidor;
use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepartidorFactory extends Factory
{
    protected $model = Repartidor::class;
    public function definition()
    {
        return [
            'dni'                       => $this->faker->dni(),
            'nombre'                    => $this->faker->firstName(),
            'apellidos'                 => $this->faker->lastName(),
            'telefono'                  => $this->faker->phoneNumber(),
            'email'                     => $this->faker->freeEmail(),
            'f_nacimiento'              => $this->faker->date($format= 'd/m/Y', $max = 'now'),
            'ciudad_id'                 => Ciudad::all()->random()->id,
        ];
    }
}
