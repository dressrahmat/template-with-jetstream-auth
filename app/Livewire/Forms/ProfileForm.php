<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Profile;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class ProfileForm extends Form
{
    public ?Profile $profile;

    public $id;

    #[Rule('required', as: 'Nama Depan')]
    public $nama_depan;

    #[Rule('required', as: 'Id User')]
    public $id_user;

    #[Rule('required', as: 'Nama Belakang')]
    public $nama_belakang;

    #[Rule('required', as: 'Tanggal Lahir')]
    public $tanggal_lahir;

    #[Rule('required', as: 'Nomor Telepon')]
    public $nomor_telepon;

    #[Rule('required', as: 'Jenis Kelamin')]
    public $jenis_kelamin;

    #[Rule('required', as: 'Agama')]
    public $agama;

    #[Rule('required', as: 'Provinsi')]
    public $provinsi;

    #[Rule('required', as: 'Kota')]
    public $kota;

    #[Rule('required', as: 'Alamat')]
    public $alamat;

    #[Rule('required|image|max:1024|mimes:jpg,jpeg,png|dimensions:width=1080,height=1080', as: 'Photo Profile')]
    public $photo_profile;

    public function setForm(Profile $profile)
    {
        $this->profile = $profile;

        $this->photo_profile = $profile->photo_profile;
        $this->nama_depan = $profile->nama_depan;
        $this->nama_belakang = $profile->nama_belakang;
        $this->tanggal_lahir = $profile->tanggal_lahir;
        $this->nomor_telepon = $profile->nomor_telepon;
        $this->jenis_kelamin = $profile->jenis_kelamin;
        $this->agama = $profile->agama;
        $this->provinsi = $profile->provinsi;
        $this->kota = $profile->kota;
        $this->alamat = $profile->alamat;
    }

    public function store($user)
    {
        $profile = Profile::create([
            'id_user' => $user->id,
            'nama_depan' => $this->nama_depan,
            'nama_belakang' => $this->nama_belakang,
            'tanggal_lahir' => $this->tanggal_lahir,
            'nomor_telepon' => $this->nomor_telepon,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'provinsi' => $this->provinsi,
            'kota' => $this->kota,
            'alamat' => $this->alamat,
        ]);
        
        if ($this->photo_profile) {
            // Periksa jika gambar diunggah dan merupakan instance dari UploadedFile
            $folderPath = 'uploads/images/profile/';
            $fileName = time() . '.' . $this->photo_profile->getClientOriginalExtension();
            $this->photo_profile->storeAs('public/' . $folderPath, $fileName);
            $this->photo_profile = $folderPath . $fileName;

            $profile->update([
                'photo_profile' => $this->photo_profile,
            ]);
        }


        $this->reset();
    }

    public function update()
    {
        $this->profile->update([
            'nama_profile' => $this->nama_profile,
            'id_program' => $this->id_program,
            'tempat_pelaksanaan' => $this->tempat_pelaksanaan,
            'waktu_pelaksanaan' => $this->waktu_pelaksanaan,
            'tanggal_pelaksanaan' => $this->tanggal_pelaksanaan,
            'slug' => Str::slug($this->nama_profile),
        ]);

        if (!is_string($this->photo_profile)) {
            // Periksa jika gambar diunggah dan merupakan instance dari UploadedFile
            $folderPath = 'uploads/images/profile/';
            $fileName = time() . '.' . $this->photo_profile->getClientOriginalExtension();
            $this->photo_profile->storeAs('public/' . $folderPath, $fileName);
            $this->photo_profile = $folderPath . $fileName;

            // Hapus gambar lama jika ada
            $oldPhotoPath = $this->profile->photo_profile;
            if ($oldPhotoPath && Storage::disk('public')->exists($oldPhotoPath)) {
                Storage::disk('public')->delete($oldPhotoPath);
            }

            $this->profile->update([
                'photo_profile' => $this->photo_profile,
            ]);
        }
    }
}