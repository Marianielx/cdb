<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'first_name' => "admin",
            'last_name' => "istrator",
            'email' => "cdb@admin.com",
            'level' => 'Administrator',
            'email_verified_at' => now(),
            'password' => bcrypt("t;jfN=2z7DIh"),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
