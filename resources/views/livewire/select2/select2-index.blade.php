<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Select2') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

                <h3 class="text-3xl font-bold">Livewire 3 With Select2</h3>

                <div class="flex gap-x-10 py-8">
                    <div class="mt-5 flex flex-col gap-y-2 w-1/3" wire:ignore>
                        <label for="city">City</label>
                        <select 
                        x-init="$('#city').select2({
                            placeholder: 'select an option',
                        });
                        $('#city').on('change', function(){
                            $wire.set('city', $('#city').val());
                        });
                        $('#city').val($('#city').val());
                        $('#city').trigger('change');
                        "
                        wire:model.live="city" id="city" class="select2">
                            <option></option>
                            <option value="AL">Alabama</option>
                            <option value="CF">California</option>
                            <option value="TB">Tuban</option>
                        </select>
                    </div>
                    
                    <div class="mt-5 flex flex-col gap-y-2 w-1/3" wire:ignore>
                        <label for="customer">Customer</label>
                        <select 
                        x-init="$('#customer').select2({
                            placeholder: 'select an option',
                        });
                        $('#customer').on('change', function(){
                            $wire.set('customer', $('#customer').val())
                        });
                        $('#customer').val($('#customer').val())
                        $('#customer').trigger('change');
                        $('#customer').on('select2:open', function(e) {
                            $('input.select2-search__field').on('input', function () {
                                $wire.call('fetchData', $(this).val());
                            });
                        });
                        "
                        @set-data-customer.window="
                        {{-- console.log(event.detail.data_customer) --}}
                        select2 = $('#customer').data('select2');
                        select2.destroy();
                        select2.$element.find('option').remove();

                        $('#customer').select2({
                            placeholder: 'select an option',
                        });

                        event.detail.data_customer.forEach(function (customer) {
                            select2.$element.append(new Option(customer.name, customer.id, false, false));
                        });
                        $('#customer').select2('open');
                        $('input.select2-search__field').val(event.detail.val);
                        $('#customer').on('change', function(){
                            $wire.set('customer', $(this).val())
                        });
                        "
                        wire:model.live="customer" id="customer" class="select2">
                            <option></option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <p>City : {{$city}}</p> 
            <p>Customer : {{$customer}}</p>
        </div>
    </div>
</div>