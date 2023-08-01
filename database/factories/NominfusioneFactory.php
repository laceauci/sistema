<?php

namespace Database\Factories;

use App\Models\Nominfusione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NominfusioneFactory extends Factory
{
    protected $model = Nominfusione::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
