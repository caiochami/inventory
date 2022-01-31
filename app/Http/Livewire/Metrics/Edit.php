<?php

namespace App\Http\Livewire\Metrics;

use App\Http\Livewire\Metrics\Concerns\AsForm;
use App\Models\Metric;
use Livewire\Component;

class Edit extends Component
{
    use AsForm;

    public Metric $metric;

    protected $listeners = [
        'editMetric',
    ];

    public function editMetric(Metric $metric): void
    {
        $this->metric = $metric;

        $this->fill([
            'form.name' => $metric->name,
            'form.symbol' => $metric->symbol
        ]);

        $this->isModalOpen = true;
    }

    public function save(): void
    {
        $this->validate();

        $this->metric->fill($this->form);

        $this->metric->save();

        $this->notify('Metric updated successfully');

        $this->emit('refreshLivewireDatatable');

        $this->isModalOpen = false;
    }

    protected function rules(): array
    {
        return [
            'form.name' => ['required', 'string', 'max:255'],
            'form.symbol' => ['required', 'string', 'max:4', 'unique:metrics,symbol,' . $this->metric->id],
        ];
    }

    public function render()
    {
        return view('livewire.metrics.edit');
    }
}
