<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nicolaslopezj\Searchable\SearchableTrait;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'pendaftaran_id';

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
            'polikliniks.nama_poliklinik' => 3,
        ],
        'joins' => [
            'pasiens' => ['pasiens.pasien_id','pendaftarans.pasien_id'],
            'polikliniks' => ['polikliniks.poliklinik_id','pendaftarans.poliklinik_id'],
        ],
    ];
    /**
     * Get the user that owns the Pendaftaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien(): BelongsTo
    {
        // $primaryKey = 'id';
        // return $this->belongsTo(Pasien::class);

        // jika protected $primaryKey = 'pasien_id'; maka :
        return $this->belongsTo(Pasien::class, 'pasien_id', 'pasien_id')->withDefault();
    }

    /**
     * Get the user that owns the Poliklinik
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poliklinik(): BelongsTo
    {
        return $this->belongsTo(Poliklinik::class, 'poliklinik_id', 'poliklinik_id')->withDefault();
    }
}
