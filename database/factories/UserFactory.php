<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama'     => fake()->name(),
            'email'    => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'no_hp'    => fake()->phoneNumber(),
            'role'     => 'pasien',
            'foto'     => null,
            'status'   => 1,
        ];
    }
}
