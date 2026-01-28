<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $bulan, $tahun, $userId;

    public function __construct($bulan, $tahun, $userId)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->userId = $userId;
    }

    public function collection()
    {
        return Transaksi::with(['akun', 'kategori'])
            ->where('user_id', $this->userId)
            ->whereMonth('tanggal', $this->bulan)
            ->whereYear('tanggal', $this->tahun)
            ->get();
    }

    public function headings(): array
    {
        return ['Tanggal', 'Akun', 'Kategori', 'Tipe', 'Jumlah', 'Keterangan'];
    }

    public function map($trx): array
    {
        return [
            $trx->tanggal,
            $trx->akun->nama_akun,
            $trx->kategori->nama,
            $trx->kategori->tipe,
            $trx->jumlah,
            $trx->keterangan,
        ];
    }
}
