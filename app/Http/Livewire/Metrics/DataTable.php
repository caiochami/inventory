<?php

namespace App\Http\Livewire\Metrics;

use App\Models\Metric;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DataTable extends LivewireDatatable
{
    public $model = Metric::class;

    public function delete($id)
    {
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Metric deleted successfully',
        ]);

        $this->model::destroy($id);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('name')
                ->defaultSort('asc')
                ->searchable(),

                Column::name('symbol'),

            BooleanColumn::name('default')->label('System Default'),

            Column::name('user.name')
                ->defaultSort('asc')
                ->label('Created By'),

            Column::callback(
                ['id', 'user_id', 'default'],
                fn ($id, $user_id, $default) => view(
                    'livewire.metrics.data-table.actions-column',
                    ['id' => $id, 'user_id' => $user_id, 'default' => $default]
                )
            )->unsortable(),
        ];
    }
}
