<div class="flex space-x-2">

    @if (!$default)
        <x-data-tables.actions.edit-button wire:click="$emitTo('metrics.edit','editMetric' ,{{ $id }})" />

        @include('datatables::delete', ['value' => $id])
    @endif
</div>
