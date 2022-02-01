<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DataTable extends LivewireDatatable
{
    public $model = Category::class;

    public function delete($id)
    {
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Category deleted successfully',
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

            Column::name('slug')
                ->searchable(),

            Column::callback(
                ['id','slug'],
                fn ($id, $slug) => view(
                    'livewire.categories.data-table.actions-column',
                    ['id' => $id, 'slug' => $slug]
                )
            )
                ->unsortable()
                ->label('Actions'),
        ];
    }
}
