<div class="flex space-x-1 justify-around">

    @if (!$default)
        <x-data-tables.actions.edit-button wire:click="$emitTo('metrics.edit','editMetric' ,{{ $id }})" />
    @endif

    @if ($user_id)
        @include('datatables::delete', ['value' => $id])
    @endif
</div>
