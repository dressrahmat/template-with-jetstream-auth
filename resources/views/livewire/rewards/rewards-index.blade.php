<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

                @livewire('rewards.rewards-create')
                @livewire('rewards.rewards-table')
                @livewire('rewards.rewards-edit')
                @livewire('rewards.rewards-delete')

                
            </div>
        </div>
    </div>
</div>
