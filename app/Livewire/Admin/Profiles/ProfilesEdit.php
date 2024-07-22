<?php

namespace App\Livewire\Admin\Profiles;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\ProfileForm;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;

class ProfilesEdit extends Component
{
    use WithFileUploads;
    
    public ProfileForm $form;

    public $dataKota;

    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->form->setForm($user->profile);
        $codeProvinsi = Province::where('name', $this->form->provinsi)->first('code');
        $this->form->provinsi = $codeProvinsi->code;
        $codeKota = City::where('name', $this->form->kota)->first('code');
        $this->changeProvinsi();
        $this->form->kota = $codeKota->code;
    }

    public function edit()
    {
        $this->form->provinsi = Province::where('code', $this->form->provinsi)->first()->name;
        $this->form->kota = City::where('code', $this->form->kota)->first()->name;
        DB::beginTransaction();
        try {
            $simpan = $this->form->update($this->user);
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil diupdate');
            DB::commit();
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'data gagal di hapus', text: $th->getMessage());
            DB::rollBack();
        }

        // $this->dispatch('refresh-data')->to(MasjidsTable::class);
    }

    public function changeProvinsi()
    {
        $this->dataKota = City::where('province_code', $this->form->provinsi)->get();
    }
    public function render()
    {
        $dataProvinsi = Province::all();
        return view('livewire.admin.profiles.profiles-edit', compact('dataProvinsi'));
    }
}