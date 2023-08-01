<?php

namespace Database\Factories;

use App\Models\Nomaperitivo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NomaperitivoFactory extends Factory
{
    protected $model = Nomaperitivo::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
