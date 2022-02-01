<?php

namespace App\Http\Livewire\Locations;

use App\Http\Livewire\Locations\Concerns\AsForm;
use App\Models\Location;
use Livewire\Component;

class Edit extends Component
{
    use AsForm;

    protected $listeners = [
        'editLocation',
    ];

    public function editLocation(Location $location): void
    {
        $this->location = $location;

        $this->isModalOpen = true;
    }

    public function save(): void
    {
        $this->validate();

        $this->location->save();

        $this->notify('Location updated successfully');

        $this->emit('refreshLivewireDatatable');

        $this->reset('isModalOpen');
    }

    public function render()
    {
        return view('livewire.locations.edit');
    }
}
