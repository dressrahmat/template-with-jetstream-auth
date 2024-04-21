<?php

namespace App\Livewire\Rewards;

use App\Models\Reward;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class RewardsDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalCustomerDelete = false;

    #[On('dispatch-reward-table-delete')]
    public function set_reward($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalCustomerDelete = true;
    }

    public function delete()
    {
        $delete = Reward::destroy($this->id);

        ($delete) ? $this->dispatch('notify', title: 'success', message: 'data berhasil dihapus') : $this->dispatch('notify', title: 'failed', message: 'data gagal dihapus');

        $this->modalCustomerDelete = false;
        $this->dispatch('dispatch-reward-delete')->to(RewardsTable::class);
    }

    public function render()
    {
        return view('livewire.rewards.rewards-delete');
    }
}
