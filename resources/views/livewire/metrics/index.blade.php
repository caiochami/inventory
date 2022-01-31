<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Metrics') }}
        </h2>

        <livewire:metrics.create />
    </div>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <livewire:metrics.data-table searchable="name, user.name" with="user" />

        <livewire:metrics.edit />
    </div>
</div>
