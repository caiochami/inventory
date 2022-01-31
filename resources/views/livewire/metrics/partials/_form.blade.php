<div class="grid grid-cols-6 gap-6">
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="name" value="{{ __('Name') }}" />
        <x-jet-input id="name" maxlength="255" type="text" class="mt-1 block w-full" wire:model.defer="form.name"
            autofocus />
        <x-jet-input-error for="form.name" class="mt-2" />
    </div>

    <div class="col-span-6 sm:col-span-2">
        <x-jet-label for="symbol" value="{{ __('Symbol') }}" />
        <x-jet-input id="symbol" maxlength="4" type="text" class="mt-1 block w-full" wire:model.defer="form.symbol" />
        <x-jet-input-error for="form.symbol" class="mt-2" />
    </div>
</div>
