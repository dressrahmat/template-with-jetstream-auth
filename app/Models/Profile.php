<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = [
        'id_user', 'photo_profile', 'nama_depan', 'nama_belakang', 'jenis_kelamin', 'tanggal_lahir', 'nomor_telepon', 'agama', 'provinsi', 'kota', 'alamat'
    ];
}