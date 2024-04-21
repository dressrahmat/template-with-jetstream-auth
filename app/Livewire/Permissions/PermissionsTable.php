<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionsTable extends Component
{
    use WithPagination;

    #[On('form-create')]
    public function render()
    {
        $data = Permission::latest()->paginate(5);
        return view('livewire.permissions.permissions-table', compact('data'));
    }
}