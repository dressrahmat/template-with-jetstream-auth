<?php

namespace App\Livewire\Services;

use App\Models\Service;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class ServicesDelete extends Component
{
    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalCustomerDelete = false;

    #[On('dispatch-services-table-delete')]
    public function set_customer($id, $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->modalCustomerDelete = true;
    }

    public function delete()
    {
        try {
            $delete = Service::destroy($this->id);
            $this->dispatch('notify', title: 'success', message: 'data berhasil dihapus');
            $this->modalCustomerDelete = false;
            $this->dispatch('dispatch-services-delete')->to(ServicesTable::class);
        } catch (\Throwable $th) {
            $this->dispatch('notify', title: 'failed', message: 'data gagal dihapus'.$th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.services.services-delete');
    }
}
