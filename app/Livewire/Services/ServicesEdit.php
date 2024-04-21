<?php

namespace App\Livewire\Services;

use App\Livewire\Forms\ServiceForm;
use App\Models\Customer;
use App\Models\Service;
use Livewire\Attributes\On;
use Livewire\Component;

class ServicesEdit extends Component
{
    public ServiceForm $form;

    public $modalServiceEdit = false;

    #[On('dispatch-services-table-edit')]
    public function set_service(Service $id)
    {
        $this->form->setService($id);

        $get_customer = Customer::select('id', 'name')->where('id', $this->form->customer)->first();

        $this->dispatch('set-customer-edit', id: $this->form->customer, data: collect($get_customer));
        $this->dispatch('set-car-edit', id: $this->form->car, data: $this->form->setCar());
        $this->dispatch('set-type-edit', id: $this->form->type, data: $this->form->setType());

        $this->modalServiceEdit = true;
    }

    public function getCustomer($name)
    {
        return collect(Customer::select('id', 'name')->where('name', 'like', '%'.$name.'%')->get());
    }

    public function carChange()
    {
        $this->dispatch('set-type-edit', id: $this->form->type, data: $this->form->setType());
        $this->resetErrorBag();
    }

    public function edit()
    {
        $this->validate();

        try {
            $update = $this->form->update();
            $this->dispatch('notify', title: 'success', message: 'data berhasil diupdate');
            $this->dispatch('dispatch-services-create-edit')->to(ServicesTable::class);
        } catch (\Throwable $th) {
            $this->dispatch('notify', title: 'failed', message: 'data gagal diupdate'.$th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.services.services-edit');
    }
}
