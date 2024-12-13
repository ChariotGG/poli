<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poliklinik extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'poliklinik_id';

    /**
     * Get all of the comments for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'poliklinik_id', 'poliklinik_id');
    }
}
