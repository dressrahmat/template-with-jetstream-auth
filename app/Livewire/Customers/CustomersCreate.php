<?php

namespace App\Livewire\Customers;

use App\Livewire\Forms\CustomerForm;
use Livewire\Component;

class CustomersCreate extends Component
{
    public CustomerForm $form;

    public $modalCustomerCreate = false;

    public function save()
    {
        $this->validate();

        try {
            $simpan = $this->form->store();
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil disimpan');
            $this->dispatch('set-reset');
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal disimpan'.$th->getMessage());
        }

        $this->dispatch('dispatch-customer-create-save')->to(CustomersTable::class);
    }

    public function render()
    {
        return view('livewire.customers.customers-create');
    }
}
