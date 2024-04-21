<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use App\Livewire\Forms\PermissionForm;
use App\Livewire\Permissions\PermissionsTable;

class PermissionsCreate extends Component
{
    public PermissionForm $form;

    public function save()
    {
        $this->validate();

        try {
            $simpan = $this->form->store();
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil disimpan');
            $this->dispatch('set-reset');
        } catch (\Throwable $th) {
            $this->dispatch('sweet-alert', icon: 'error', title: 'data gagal disimpan'.$th->getMessage());
        }

        $this->dispatch('form-create')->to(PermissionsTable::class);
    }

    public function render()
    {
        return view('livewire.permissions.permissions-create');
    }
}