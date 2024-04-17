<?php

namespace App\Livewire\Rewards;

use App\Models\Reward;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use App\Livewire\Forms\RewardForm;
use App\Livewire\Rewards\RewardsTable;

class RewardsEdit extends Component
{
    public RewardForm $form;

    public $modalRewardEdit = false;

    #[On('dispatch-reward-table-edit')]
    public function set_reward(Reward $id)
    {
        $this->form->setReward($id);
        $this->modalRewardEdit = true;
    }

    public function edit()
    {
        $this->validate();
        $update = $this->form->update();

        is_null($update) ? $this->dispatch('notify', title: 'success', message: 'data berhasil diupdate') : $this->dispatch('notify', title: 'failed', message: 'data gagal diupdate');

        $this->dispatch('dispatch-reward-create-edit')->to(RewardsTable::class);
    }

    public function render()
    {
        $customers = Customer::get();
        return view('livewire.rewards.rewards-edit', compact('customers'));
    }
}
