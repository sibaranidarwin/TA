<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id', 'nama_tiket', 'anak', 'dewasa',
        'total_harga',
        'status', 'kode', 'tgl_wisata'
    ];

    public function getTanggalWisataAttribute()
    {
        if ($this->attributes['tanggal_wisata'] != null) {
            $value = Carbon::parse($this->attributes['tanggal_wisata']);
            $parse = $value->locale('id');
            return $parse->translatedFormat('l, d F Y');
        }
    }
}
