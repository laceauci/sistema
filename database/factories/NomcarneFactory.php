<?php

namespace Database\Factories;

use App\Models\Nomcarne;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NomcarneFactory extends Factory
{
    protected $model = Nomcarne::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
