<?php

namespace App\Livewire\Select2;

use App\Models\Customer;
use Livewire\Component;

class Select2Index extends Component
{
    public $city = 'CF';

    public $customer = 15;

    public function fetchData($val)
    {
        $data_customer = [];

        $query = Customer::where('name', 'like', '%'.$val.'%')->get();

        if (isset($query)) {
            foreach ($query as $key => $value) {
                $data_customer[$key] = [
                    'id' => $value->id,
                    'name' => $value->name,
                ];
            }
        }

        $this->dispatch('set-data-customer', data_customer: $data_customer, val: $val);
    }

    public function render()
    {
        $customers = Customer::get();

        return view('livewire.select2.select2-index', compact('customers'));
    }
}
