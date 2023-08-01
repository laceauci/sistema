<?php

namespace Database\Factories;

use App\Models\Nombebida;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NombebidaFactory extends Factory
{
    protected $model = Nombebida::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
