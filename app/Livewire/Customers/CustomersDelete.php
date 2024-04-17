<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomersDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalCustomerDelete = false;

    #[On('dispatch-customer-table-delete')]
    public function set_customer($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalCustomerDelete = true;
    }

    public function delete()
    {
        $delete = Customer::destroy($this->id);

        ($delete) ? $this->dispatch('notify', title: 'success', message: 'data berhasil dihapus') : $this->dispatch('notify', title: 'failed', message: 'data gagal dihapus');

        $this->modalCustomerDelete = false;
        $this->dispatch('dispatch-customer-delete')->to(CustomersTable::class);
    }

    public function render()
    {
        return view('livewire.customers.customers-delete');
    }
}
