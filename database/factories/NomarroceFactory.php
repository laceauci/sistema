<?php

namespace Database\Factories;

use App\Models\Nomarroce;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NomarroceFactory extends Factory
{
    protected $model = Nomarroce::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
