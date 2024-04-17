<div>
    <x-button @click="$wire.set('modalServiceCreate', true)">Create Service</x-button>

    <x-dialog-modal wire:model.live="modalServiceCreate" submit="save">
        <x-slot name="title">
            Form Service
        </x-slot>
    
        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4 pb-36">

                <!-- Customer -->
                <div class="col-span-12 mb-4">
                    <x-label for="customer-create" value="Customer" />
                    <x-tom 
                        x-init="$el.customer = new Tom($el, {
                            sortField: {
                                field: 'name',
                                direction: 'asc',
                            },
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name',
                            load: function(query, callback) {
                                $wire.getCustomer(query).then(results => {
                                    callback(results);
                                }).catch(() => {
                                    callback();
                                })
                            },
                            render: {
                                option: function(item, escape) {
                                    return `<div>${escape(item.name)}</div>`
                                },
                                option: function(item, escape) {
                                    return `<div>${escape(item.name)}</div>`
                                }
                            }
                        });
                        "
                        @set-customer-create.window="
                            $el.customer.addOption(event.detail.data)
                        "
                        @set-reset.window="$el.customer.clear()"
                    id="customer-create" type="text" class="mt-1 w-full" wire:model="form.customer" require autocomplete="customer-create">
                        <option value=""></option>
                    </x-tom>
                    <x-input-error for="form.customer" class="mt-1" />
                </div>

                <!-- Car -->
                <div class="col-span-12 mb-4">
                    <x-label for="car-create" value="Car" />
                    <x-tom 
                        x-init="$el.car = new Tom($el, {
                            sortField: {
                                field: 'name',
                                direction: 'asc',
                            },
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name',
                        });"
                        @set-car-create.window="
                            $el.car.addOption(event.detail.data)
                        "
                        @set-reset.window="$el.car.clear()"
                        wire:change="carChange"
                    id="car-create" type="text" class="mt-1 w-full" wire:model="form.car" require autocomplete="car-create">
                        {{-- <option value=""></option> --}}
                    </x-tom>
                    <x-input-error for="form.car" class="mt-1" />
                </div>

                <!-- Types -->
                <div class="col-span-12 mb-4">
                    <x-label for="type-create" value="Type" />
                    <x-tom 
                        x-init="$el.types = new Tom($el, {
                            sortField: {
                                field: 'name',
                                direction: 'asc',
                            },
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name',
                        });"
                        @set-type-create.window="
                            $el.types.clear();
                            $el.types.clearOptions();
                            $el.types.addOption(event.detail.data);
                        "
                        @set-reset.window="$el.type.clear(); $el.types.clearOptions()"
                    id="type-create" type="text" class="mt-1 w-full" wire:model="form.type" require autocomplete="type-create">
                        <option value=""></option>
                    </x-tom>
                    <x-input-error for="form.type" class="mt-1" />
                </div>

            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalServiceCreate', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
    
            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
