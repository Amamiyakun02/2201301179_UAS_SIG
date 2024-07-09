<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kebun extends Model
{
    use HasFactory;

    protected $table = 'kebun';
    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'luas',
        'id_jenis',
        'poligon',
    ];

    public function jenisPerkebunan(): belongsTo
    {
        return $this->belongsTo(JenisPerkebunan::class, 'id_jenis');
    }
}
