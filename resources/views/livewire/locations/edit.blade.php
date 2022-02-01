<div>
    @if ($location)
        <x-jet-dialog-modal wire:model="isModalOpen">
            <x-slot name="title">
                {{ __('Editing Location') }}: {{ $location->name }}
            </x-slot>
            <x-slot name="content">
                @include('livewire.locations.partials._form')
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('isModalOpen', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-3" wire:click="save" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
</div>
