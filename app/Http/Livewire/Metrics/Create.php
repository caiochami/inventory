<?php

namespace App\Http\Livewire\Metrics;

use App\Http\Livewire\Metrics\Concerns\AsForm;
use App\Models\Metric;
use App\Services\MetricService;
use Livewire\Component;

class Create extends Component
{
    use AsForm;

    public bool $isModalOpen = false;

    protected $rules = [
        'form.name' => ['required','string','max:255'],
        'form.symbol' => ['required','string','max:4', 'unique:metrics,symbol'],
    ];

    public function save(MetricService $service)
    {
        $this->validate();

        $service->create($this->form, auth()->id());

        $this->notify('Metric created successfully');

        $this->emit('refreshLivewireDatatable');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.metrics.create');
    }
}
