<div class="flex space-x-2">

    <x-data-tables.actions.edit-button wire:click="$emitTo('categories.edit','editCategory' ,'{{ $id }}')" />

    @include('datatables::delete', ['value' => $id, 'title' => $slug])
</div>
