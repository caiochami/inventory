<?php

namespace App\Http\Livewire\Locations;

use App\Models\Location;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DataTable extends LivewireDatatable
{
    public $model = Location::class;

    public function delete($id)
    {
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Location deleted successfully',
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

            Column::callback(
                ['id', 'name'],
                fn ($id, $name) => view(
                    'livewire.locations.data-table.actions-column',
                    ['id' => $id, 'name' => $name]
                )
            )
                ->unsortable()
                ->label('Actions'),
        ];
    }
}
