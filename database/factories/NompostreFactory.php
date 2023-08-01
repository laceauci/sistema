<?php

namespace Database\Factories;

use App\Models\Nompostre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NompostreFactory extends Factory
{
    protected $model = Nompostre::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
