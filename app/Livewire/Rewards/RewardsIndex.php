<?php

namespace App\Livewire\Rewards;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class RewardsIndex extends Component
{
    #[Title('Customers')]
    public function render(): View
    {
        return view('livewire.rewards.rewards-index');
    }
}
