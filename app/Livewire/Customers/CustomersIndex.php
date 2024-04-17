<?php

namespace App\Livewire\Customers;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class CustomersIndex extends Component
{
    #[Title('Customers')]
    public function render(): View
    {
        return view('livewire.customers.customers-index');
    }
}
