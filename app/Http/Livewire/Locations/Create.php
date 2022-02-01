<?php

namespace App\Http\Livewire\Locations;

use App\Http\Livewire\Locations\Concerns\AsForm;
use App\Models\Location;
use Livewire\Component;

class Create extends Component
{
    use AsForm;

    public function mount(): void
    {
        $this->location = new Location();
    }

    public function save(): void
    {
        $this->validate();

        $this->location->save();

        $this->notify('Location created successfully');

        $this->emit('refreshLivewireDatatable');

        $this->location = new Location();

        $this->reset('isModalOpen');
    }

    public function render()
    {
        return view('livewire.locations.create');
    }
}
