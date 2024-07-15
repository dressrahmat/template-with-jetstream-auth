<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = [
        'id_user', 'photo_profile', 'nama_depan', 'nama_belakang', 'jenis_kelamin', 'tanggal_lahir', 'nomor_telepon', 'agama', 'provinsi', 'kota', 'alamat'
    ];

    /**
     * Get the user that owns the Profile
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}