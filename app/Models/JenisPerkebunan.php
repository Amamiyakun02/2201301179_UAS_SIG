<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JenisPerkebunan extends Model
{
    use HasFactory;

    protected $table = 'jenis_perkebunan';
    protected $fillable = [
        'nama',
        'warna',
        'id_icon',
    ];

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class, 'id_icon');
    }

    public function perkebunan()
    {
        return $this->hasMany(Kebun::class, 'id_jenis');
    }

}
