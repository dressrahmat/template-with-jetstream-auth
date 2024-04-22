<?php

namespace App\Livewire\Customers;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersTable extends Component
{
    use WithPagination;
    use WithSorting;

    public CustomerForm $form;

    public $paginate = 5;

    public $sortBy = 'customers.id';

    public $sortDirection = 'desc';

    public function confirmDelete($get_id)
    {
        try {
            Customer::destroy($get_id);
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal di hapus');
        }
    }

    #[On('dispatch-customer-create-save')]
    #[On('dispatch-customer-create-edit')]
    #[On('dispatch-customer-delete')]
    public function render()
    {
        $data = Customer::where('id', 'like', '%'.$this->form->id.'%')
            ->where('name', 'like', '%'.$this->form->name.'%')
            ->where('email', 'like', '%'.$this->form->email.'%')
            ->where('address', 'like', '%'.$this->form->address.'%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.customers.customers-table', compact('data'));
    }
}