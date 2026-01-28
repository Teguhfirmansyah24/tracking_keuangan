<?php

namespace App\Observers;

use App\Models\User;
use App\Models\AkunKeuangan;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        if ($user->role !== 'member') {
            return;
        }

        $user->akunKeuangan()->create([
            'nama_akun' => 'Dompet Utama',
            'jenis' => 'tunai',
            'saldo_awal' => 0,
        ]);
    }
}
