<?php

namespace App\Livewire\Admin\Profiles;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\ProfileForm;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;

class ProfilesCreate extends Component
{
    use WithFileUploads;
    
    public ProfileForm $form;

    public $dataKota;

    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        // $this->validate();
        
        DB::beginTransaction();
        try {
            $ubahProvinsi = Province::where('code', $this->form->provinsi)->first();
            $this->form->provinsi = $ubahProvinsi->name;
            $ubahKota = City::where('code', $this->form->kota)->first();
            $this->form->kota = $ubahKota->name;
            $simpan = $this->form->store($this->user);
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil disimpan');
            $this->dispatch('set-reset');
            DB::commit();
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'data gagal di hapus', text: $th->getMessage());
            DB::rollback();
        }

        // $this->dispatch('refresh-data')->to(ProfilesTable::class);
    }

    public function getKota()
    {
        $this->dataKota = City::where('province_code', $this->form->provinsi)->get();
    }
    public function render()
    {
        $dataProvinsi = Province::all();
        return view('livewire.admin.profiles.profiles-create', compact('dataProvinsi'));
    }
}