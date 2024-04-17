<div>
    <x-button @click="$wire.set('modalRewardCreate', true)">Create Reward</x-button>

    <x-dialog-modal wire:model.live="modalRewardCreate" submit="save">
        <x-slot name="title">
            Form Reward
        </x-slot>
    
        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Customer -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.customer" value="Customer" />
                    <x-select id="form.customer" type="text" class="mt-1 w-full" wire:model="form.customer" require autocomplete="form.customer" >
                        <option></option>
                        @isset($customers)
                        @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                        @endisset
                    </x-select>
                    <x-input-error for="form.customer" class="mt-1" />
                </div>

                <!-- Month -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.month" value="Month" />
                    <x-select id="form.month" type="text" class="mt-1 w-full" wire:model="form.month" require autocomplete="form.month">
                        @for($i=1; $i<=12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </x-select>
                    <x-input-error for="form.month" class="mt-1" />
                </div>

                <!-- Year -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.year" value="Year" />
                    <x-select id="form.year" type="text" class="mt-1 w-full" wire:model="form.year" require autocomplete="form.year">
                        @for($i=2021; $i<=date('Y'); $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </x-select>
                    <x-input-error for="form.year" class="mt-1" />
                </div>

                <!-- Name -->
                <div class="col-span-12 mb-4">
                    <x-label for="form.name" value="Name" />
                    <x-input id="form.name" type="text" class="mt-1 w-full" wire:model="form.name" require autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalRewardCreate', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
    
            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
