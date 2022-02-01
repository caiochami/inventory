<?php

namespace App\Http\Livewire\Categories;

use App\Http\Livewire\Categories\Concerns\AsForm;
use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    use AsForm;

    protected $listeners = [
        'editCategory',
    ];

    public function editCategory(Category $category): void
    {
        $this->category = $category;

        $this->isModalOpen = true;
    }

    public function save(): void
    {
        $this->validate();

        $this->category->save();

        $this->notify('Category updated successfully');

        $this->emit('refreshLivewireDatatable');

        $this->reset('isModalOpen');
    }

    public function render()
    {
        return view('livewire.categories.edit');
    }
}
