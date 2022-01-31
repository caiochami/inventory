<?php

namespace App\Http\Livewire\Metrics\Concerns;

trait AsForm
{
    public bool $isModalOpen = false;

    public array $form = [
        'name' => '',
        'symbol' => '',
    ];

    protected $validationAttributes = [
        'form.name' => 'metric name',
        'form.symbol' => 'metric symbol',
    ];
}
