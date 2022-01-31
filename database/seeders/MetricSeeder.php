<?php

namespace Database\Seeders;

use App\Models\Metric;
use Illuminate\Database\Seeder;

class MetricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metrics = [
            [
                'name' => 'Meter',
                'symbol' => 'm',
                'default' => true
            ],
            [
                'name' => 'Kilometer',
                'symbol' => 'km',
                'default' => true
            ],
            [
                'name' => 'Unit',
                'symbol' => 'u',
                'default' => true
            ],
            [
                'name' => 'Liter',
                'symbol' => 'l',
                'default' => true
            ],
            [
                'name' => 'Gallon',
                'symbol' => 'gal',
                'default' => true

            ]
        ];

        collect($metrics)->each(fn ($attributes) =>  Metric::updateOrCreate(
            ['symbol' => $attributes['symbol']],
            $attributes
        ));
    }
}
