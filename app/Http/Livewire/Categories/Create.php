<?php

namespace App\Http\Livewire\Categories;

use App\Http\Livewire\Categories\Concerns\AsForm;
use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    use AsForm;

    public function mount(): void
    {
        $this->category = new Category();
    }

    public function save(): void
    {
        $this->validate();

        $this->category->save();

        $this->notify('Category created successfully');

        $this->emit('refreshLivewireDatatable');

        $this->category = new Category();

        $this->reset('isModalOpen');
    }

    public function render()
    {
        return view('livewire.categories.create');
    }
}
