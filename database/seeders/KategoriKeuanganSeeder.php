<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\KategoriKeuangan;
use Illuminate\Database\Seeder;

class KategoriKeuanganSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            // PEMASUKAN
            ['nama' => 'Gaji', 'tipe' => 'pemasukan'],
            ['nama' => 'Bonus', 'tipe' => 'pemasukan'],
            ['nama' => 'Hadiah', 'tipe' => 'pemasukan'],

            // PENGELUARAN
            ['nama' => 'Makanan', 'tipe' => 'pengeluaran'],
            ['nama' => 'Transportasi', 'tipe' => 'pengeluaran'],
            ['nama' => 'Tagihan', 'tipe' => 'pengeluaran'],
            ['nama' => 'Hiburan', 'tipe' => 'pengeluaran'],
            ['nama' => 'Pendidikan', 'tipe' => 'pengeluaran'],
        ];

        foreach ($kategori as $item) {
            KategoriKeuangan::firstOrCreate(
                [
                    'nama' => $item['nama'],
                    'tipe' => $item['tipe'],
                    'user_id' => null,
                ]
            );
        }
    }
}
