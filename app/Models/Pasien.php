<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'pasien_id';

    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'pasiens.nama' => 1,
            'pasiens.no_pasien' => 2,
            // 'polikliniks.nama_poliklinik' => 3,
        ],
        // 'joins' => [
        //     'pasiens' => ['pasiens.pasien_id','pendaftarans.pasien_id'],
        //     'polikliniks' => ['polikliniks.poliklinik_id','pendaftarans.poliklinik_id'],
        // ],
    ];

    /**
     * Get all of the comments for the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'pasien_id', 'pasien_id');
    }
}
