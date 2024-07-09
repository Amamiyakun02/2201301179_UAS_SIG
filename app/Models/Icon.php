<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Icon extends Model
{
    use HasFactory;

    protected $table = 'icon';
    protected $fillable = [
        'nama',
        'url_icon',
    ];

    public function jenisPerkebunan()
    {
        return $this->hasMany(JenisPerkebunan::class, 'id_icon');
    }
}
