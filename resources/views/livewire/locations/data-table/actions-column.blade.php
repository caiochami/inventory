<div class="flex space-x-2">

    <x-data-tables.actions.edit-button wire:click="$emitTo('locations.edit','editLocation' ,{{ $id }})" />

    @include('datatables::delete', ['value' => $id, 'title' => $name])
</div>
