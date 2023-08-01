<?php

namespace Database\Factories;

use App\Models\Nomensalada;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NomensaladaFactory extends Factory
{
    protected $model = Nomensalada::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
