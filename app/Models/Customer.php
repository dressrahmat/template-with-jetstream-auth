<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'hobbies'];

    protected $casts = ['hobbies' => 'array'];

    /**
     * Get all of the service for the Customer
     */
    public function service(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get all of the reward for the Customer
     */
    public function reward(): HasMany
    {
        return $this->hasMany(Reward::class);
    }
}
