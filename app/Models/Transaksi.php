<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'kategori_keuangan_id',
        'akun_keuangan_id',
        'user_id',
        'jumlah',
        'keterangan'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function akun()
    {
        return $this->belongsTo(AkunKeuangan::class, 'akun_keuangan_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriKeuangan::class, 'kategori_keuangan_id');
    }
}
