<div class="grid grid-cols-6 gap-6">
    <div class="col-span-6">
        <x-jet-label for="name" value="{{ __('Name') }}" />
        <x-jet-input id="name" maxlength="255" type="text" class="mt-1 block w-full" wire:model.defer="category.name"
            autofocus />
        <x-jet-input-error for="category.name" class="mt-2" />
    </div>
</div>
