<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Phone;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(255),
            'email' => $this->faker->email(),
            'user_id' => User::factory()
        ];
    }

    public function withPhone(): self
    {
        return $this->afterCreating(fn (Supplier $supplier) => Phone::factory()->count(3)->for(
            $supplier,
            'phonable'
        )->create());
    }

    public function withAddress(): self
    {
        return $this->afterCreating(fn (Supplier $supplier) => Address::factory()->count(3)->for(
            $supplier,
            'addressable'
        )->create());
    }
}
