<?php

namespace App\Http\Livewire\Categories\Concerns;

use App\Models\Category;

trait AsForm
{
    public bool $isModalOpen = false;

    public Category $category;

    protected $rules = [
        'category.name' => ['required','string','max:255'],
    ];

    protected $validationAttributes = [
        'category.name' => 'category name',
    ];
}
