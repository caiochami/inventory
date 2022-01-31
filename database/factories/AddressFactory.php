<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $country = $this->faker->country();

        $countryAbbr = Str::of($country)->substr(0, 2);

        return [
            'postal_code' => $this->faker->postcode(),
            'address_line_1' => $this->faker->address(),
            'address_line_2' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'state_abbr' => $this->faker->stateAbbr(),
            'country' => $country,
            'country_abbr' => (string)$countryAbbr->upper(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'comment' => $this->faker->text(),
        ];
    }
}
