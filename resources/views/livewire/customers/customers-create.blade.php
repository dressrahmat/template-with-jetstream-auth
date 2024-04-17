<div>
    <x-button @click="$wire.set('modalCustomerCreate', true)">Create Customer</x-button>

    <x-dialog-modal wire:model.live="modalCustomerCreate" submit="save">
        <x-slot name="title">
            Form Customer
        </x-slot>
    
        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Name -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.name" value="Name" />
                    <x-input id="form.name" type="text" class="mt-1 w-full" wire:model="form.name" require autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

                <!-- Email -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.email" value="Email" />
                    <x-input id="form.email" type="email" class="mt-1 w-full" wire:model="form.email" require autocomplete="form.email" />
                    <x-input-error for="form.email" class="mt-1" />
                </div>

                <!-- Address -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.address" value="Address" />
                    <x-input id="form.address" type="text" class="mt-1 w-full" wire:model="form.address" require autocomplete="form.address" />
                    <x-input-error for="form.address" class="mt-1" />
                </div>

                <!-- Hobbies -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.hobbies" value="Hobbies" />
                    <x-tom 
                        x-init="$el.hobbies = new Tom($el, {
                            sortField: {
                                field: 'hobbies',
                                direction: 'asc',
                            },
                            valueField: 'hobbies',
                            labelField: 'hobbies',
                            searchField: 'hobbies',
                        });"
                        @set-reset.window="$el.hobbies.clear()"
                    id="form.hobbies" type="text" class="mt-1 w-full" multiple wire:model="form.hobbies">
                        <option></option>
                        @foreach (\App\Helpers\HobbiesHelper::list() as $hobby)
                        <option>{{ $hobby }}</option>
                        @endforeach
                    </x-tom>
                    <x-input-error for="form.hobbies" class="mt-1" />
                </div>

            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCustomerCreate', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
    
            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
