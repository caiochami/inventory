<?php

namespace App\Http\Livewire\Locations\Concerns;

use App\Models\Location;

trait AsForm
{
    public bool $isModalOpen = false;

    public Location $location;

    protected $rules = [
        'location.name' => ['required','string','max:255'],
    ];

    protected $validationAttributes = [
        'location.name' => 'location name',
    ];
}
