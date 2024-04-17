<?php

namespace App\Livewire\Services;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class ServicesIndex extends Component
{
    #[Title('Services')]
    public function render(): View
    {
        return view('livewire.services.services-index');
    }
}
