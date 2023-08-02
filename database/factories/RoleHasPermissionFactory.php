<?php

namespace Database\Factories;

use App\Models\RoleHasPermission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoleHasPermissionFactory extends Factory
{
    protected $model = RoleHasPermission::class;

    public function definition()
    {
        return [
			'permission_id' => $this->faker->name,
			'role_id' => $this->faker->name,
        ];
    }
}
