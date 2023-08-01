<?php

namespace Database\Factories;

use App\Models\Nompescadosmarisco;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NompescadosmariscoFactory extends Factory
{
    protected $model = Nompescadosmarisco::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
