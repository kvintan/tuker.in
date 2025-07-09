<?php

// app/Models/PengambilanSampah.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilanSampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis',
        'jumlah',
        'status',
        'alasan_penolakan',
        'mitra_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mitra()
    {
        return $this->belongsTo(User::class, 'mitra_id');
    }
}

