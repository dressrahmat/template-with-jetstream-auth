<div>

    <x-dialog-modal wire:model.live="modalCustomerDelete" submit="save">
        <x-slot name="title">
            Customer Delete
        </x-slot>
    
        <x-slot name="content">
            <p>Apakah anda ingin menghapus data dengan ID: {{ $id }} dan name : {{ $name }}</p>
        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCustomerDelete', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
    
            <x-danger-button @click="$wire.delete()" class="ms-3" wire:loading.attr="disabled">
                Delete
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
