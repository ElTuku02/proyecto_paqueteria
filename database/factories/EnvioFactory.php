<?php

namespace Database\Factories;

use App\Models\Envio;
use App\Models\Cliente;
use App\Models\Repartidor;
use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnvioFactory extends Factory
{
    
    protected $model = Envio::class;
    public function definition()
    {
        return [
            'producto'                 => $this->faker->randomElement($array = array ('Telefono', 'Gafas', 'Juego', 'Monitor')),
            'ciudad_id'                => Ciudad::all()->random()->id,
            'cliente_id'               => Cliente::all()->random()->id,
            'repartidor_id'            => Repartidor::all()->random()->id,
        ];
    }
}
