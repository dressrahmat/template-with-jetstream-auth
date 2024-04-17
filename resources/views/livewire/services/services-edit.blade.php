<div>

    <x-dialog-modal wire:model.live="modalServiceEdit" submit="edit">
        <x-slot name="title">
            Form Edit Customer
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Customer -->
                <div class="col-span-12 mb-4" x-data="{id: $id('input-text')}">
                    <x-label ::for="id" value="Name" />
                    <x-tom x-init="$el.customer = new Tom($el, {
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
                        });" @set-customer-edit.window="
                            $el.customer.clear();
                            $el.customer.clearOptions();
                            $el.customer.addOption(event.detail.data);
                            $el.customer.addItem(event.detail.id);
                            console.log(event.detail.id)
                        "  ::id="id" type="text" class="mt-1 w-full"
                        wire:model="form.customer" require autocomplete="customer-edit">
                        <option></option>
                    </x-tom>
                    <x-input-error for="form.customer" class="mt-1" />
                </div>

                <!-- Car -->
                <div class="col-span-12 mb-4">
                    <x-label for="car-edit" value="Name" />
                    <x-tom x-init="$el.car = new Tom($el, {
                            sortField: {
                                field: 'name',
                                direction: 'asc',
                            },
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name',
                        });" @set-car-edit.window="
                            $el.car.addOption(event.detail.data)
                            $el.car.addItem(event.detail.id)
                        " wire:change="carChange" id="car-edit" type="text"
                        class="mt-1 w-full" wire:model="form.car" require autocomplete="car-edit">
                        <option value=""></option>
                    </x-tom>
                    <x-input-error for="form.car" class="mt-1" />
                </div>

                <!-- Types -->
                <div class="col-span-12 mb-4">
                    <x-label for="type-edit" value="Name" />
                    <x-tom x-init="$el.types = new Tom($el, {
                            sortField: {
                                field: 'name',
                                direction: 'asc',
                            },
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name',
                        });" @set-type-edit.window="
                            $el.types.clear();
                            $el.types.clearOptions();
                            $el.types.addOption(event.detail.data);
                            $el.types.addItem(event.detail.id);
                        " id="type-edit" type="text"
                        class="mt-1 w-full" wire:model="form.type" require autocomplete="type-edit">
                        <option value=""></option>
                    </x-tom>
                    <x-input-error for="form.type" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalServiceEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
