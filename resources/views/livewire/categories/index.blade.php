<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>

        <livewire:categories.create />
    </div>
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <livewire:categories.data-table searchable="name,slug" />

        <livewire:categories.edit />
    </div>
</div>
