<?php

namespace App\Livewire\Admin\Profiles;

use App\Models\User;
use Livewire\Component;

class ProfilesShow extends Component
{
    public $user;
    public $nama_lengkap;
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.admin.profiles.profiles-show');
    }
}