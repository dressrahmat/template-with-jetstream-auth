<div>
    <x-select wire:model.live="paginate">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </x-select>

    <table class="mt-8 w-full">
        <thead>
            <tr>
                <th class="p-2 whitespace-nowrap border border-spacing-1">
                    #
                </th>
                <th class="p-2 whitespace-nowrap border border-spacing-1">
                    Action
                </th>
                <th @click="$wire.sortField('services.id')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'services.id'" /> ID
                </th>
                <th @click="$wire.sortField('customer')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'customer'" /> Customer
                </th>
                <th @click="$wire.sortField('car')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'car'" /> Car
                </th>
                <th @click="$wire.sortField('type')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :$sortDirection :$sortBy :field="'type'" /> Type
                </th>
            </tr>
            <tr>
                <td class="p-2 text-center whitespace-nowrap border border-spacing-1"></td>
                <td class="p-2 text-center whitespace-nowrap border border-spacing-1"></td>
                <td class="p-2 text-center whitespace-nowrap border border-spacing-1"><x-input wire:model.live="form.id" type="search" class="w-full text-sm" /></td>
                <td class="p-2 text-center whitespace-nowrap border border-spacing-1"><x-input wire:model.live="form.service" type="search" class="w-full text-sm" /></td>
                <td class="p-2 text-center whitespace-nowrap border border-spacing-1"><x-input wire:model.live="form.car" type="search" class="w-full text-sm" /></td>
                <td class="p-2 text-center whitespace-nowrap border border-spacing-1"><x-input wire:model.live="form.type" type="search" class="w-full text-sm" /></td>
            </tr>
        </thead>
        <tbody>
            @isset($data)
            @foreach ($data as $service)
                <tr>
                    <td class="p-2 text-center whitespace-nowrap border border-spacing-1">{{ $loop->iteration }}</td>
                    <td class="p-2 whitespace-nowrap border border-spacing-1">
                        <x-button @click="$dispatch('dispatch-services-table-edit', { id: '{{ $service->id }}' })" type="button">
                            Edit
                        </x-button>
                        <x-danger-button @click="$dispatch('dispatch-services-table-delete', { id: '{{ $service->id }}', name: '{{ $service->customer }}' })">
                            Delete
                        </x-danger-button>
                    </td>
                    <td class="p-2 text-center whitespace-nowrap border border-spacing-1">{{ $service->id }}</td>
                    <td class="p-2 whitespace-nowrap border border-spacing-1">{{ $service->customer }}</td>
                    <td class="p-2 whitespace-nowrap border border-spacing-1">{{ $service->car }}</td>
                    <td class="p-2 whitespace-nowrap border border-spacing-1">{{ $service->type }}</td>
                </tr>
            @endforeach
            @endisset
        </tbody>
    </table>
    <div class="mt-3">
        {{ $data->onEachSide(1)->links() }}
    </div>
</div>
