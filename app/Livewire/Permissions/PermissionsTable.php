<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionsTable extends Component
{
    use WithPagination;
    public function render()
    {
        $data = Permission::paginate(5);
        return view('livewire.permissions.permissions-table', compact('data'));
    }
}