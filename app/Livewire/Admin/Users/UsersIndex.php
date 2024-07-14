<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use App\Imports\UsersImport;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Livewire\Admin\Users\UsersTable;

class UsersIndex extends Component
{
    use WithFileUploads;
    
    public $file;
    
    public function confirmDelete($get_id)
    {
        try {
            User::destroy($get_id);
        } catch (\Throwable $th) {
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'data gagal di hapus', text: $th->getMessage());
        }
        $this->dispatch('refresh-data')->to(UsersTable::class);
    }

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx,csv',
        ]);
        $userId = auth()->user()->id;
        DB::beginTransaction();
        try {
            
            Excel::import(new UsersImport($userId), $this->file->getRealPath());
            
            // Jika berhasil, kembalikan ke halaman sebelumnya dengan pesan sukses
            $this->dispatch('sweet-alert', icon: 'success', title: 'data berhasil disimpan');
            DB::commit();
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {

            $failures = $e->failures();
            $messages = [];
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $messages = $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
            // dd($messages);
            // Jika terjadi kesalahan, kembalikan ke halaman sebelumnya dengan pesan error
            $this->dispatch('modal-sweet-alert', icon: 'error', title: 'data gagal disimpan', text:$messages);
            DB::rollback();
        }
        $this->dispatch('refresh-data')->to(UsersTable::class);
    }
    public function render()
    {
        return view('livewire.admin.users.users-index');
    }
}