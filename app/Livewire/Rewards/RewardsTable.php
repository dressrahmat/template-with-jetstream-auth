<?php

namespace App\Livewire\Rewards;

use App\Livewire\Forms\RewardForm;
use App\Models\Reward;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RewardsTable extends Component
{
    use WithPagination;
    use WithSorting;

    public RewardForm $form;

    public $customer_name;

    public $paginate = 5;

    public $sortBy = 'rewards.id';

    public $sortDirection = 'desc';

    #[On('dispatch-reward-create-save')]
    #[On('dispatch-reward-create-edit')]
    #[On('dispatch-reward-delete')]
    public function render()
    {
        $data = Reward::select('rewards.id', 'customers.name as customer_name', 'month', 'year', 'rewards.name as reward_name')
            ->join('customers', 'customers.id', 'rewards.customer_id')
            ->where('customers.name', 'like', '%'.$this->form->customer.'%')
            ->where('rewards.name', 'like', '%'.$this->form->name.'%')
            ->where('rewards.month', 'like', '%'.$this->form->month.'%')
            ->where('rewards.year', 'like', '%'.$this->form->year.'%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.rewards.rewards-table', compact('data'));
    }
}
