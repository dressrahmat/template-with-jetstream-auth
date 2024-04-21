<?php

namespace App\Livewire\Services;

use App\Livewire\Forms\ServiceForm;
use App\Models\Customer;
use Livewire\Component;

class ServicesCreate extends Component
{
    public ServiceForm $form;

    public $modalServiceCreate = false;

    public function save()
    {
        try {
            $this->validate();
            $simpan = $this->form->store();

            $this->dispatch('notify', title: 'success', message: 'data berhasil disimpan');
            $this->dispatch('dispatch-services-create-save')->to(ServicesTable::class);

        } catch (\Throwable $th) {
            $this->dispatch('notify', title: 'failed', message: 'data gagal disimpan'.$th->getMessage());
        }

    }

    public function carChange()
    {
        $this->dispatch('set-type-create', id: $this->form->type, data: $this->form->setType());
        $this->resetErrorBag();
    }

    public function getCustomer($name)
    {
        return collect(Customer::select('id', 'name')->where('name', 'like', '%'.$name.'%')->get());
    }

    public function render()
    {
        // $this->dispatch('set-customer-create', id: $this->form->type, data: $this->form->setCustomer());
        $this->dispatch('set-car-create', id: $this->form->car, data: $this->form->setCar());

        return view('livewire.services.services-create');
    }
}
