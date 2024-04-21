<?php

namespace App\Livewire\Rewards;

use App\Livewire\Forms\RewardForm;
use App\Models\Customer;
use Livewire\Component;

class RewardsCreate extends Component
{
    public RewardForm $form;

    public $modalRewardCreate = false;

    public function save()
    {
        $this->validate();
        $simpan = $this->form->store();

        is_null($simpan) ? $this->dispatch('notify', title: 'success', message: 'data berhasil disimpan') : $this->dispatch('notify', title: 'failed', message: 'data gagal disimpan');

        $this->dispatch('dispatch-reward-create-save')->to(RewardsTable::class);
    }

    public function render()
    {
        $customers = Customer::get();

        return view('livewire.rewards.rewards-create', compact('customers'));
    }
}
