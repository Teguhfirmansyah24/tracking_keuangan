<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

class MaintenanceController
{
    public function toggle()
    {
        $setting = DB::table('system_settings')->first();

        if (! $setting) {
            DB::table('system_settings')->insert([
                'maintenance_mode' => true
            ]);

            return back()->with('success', 'Maintenance mode diaktifkan');
        }

        DB::table('system_settings')->update([
            'maintenance_mode' => ! $setting->maintenance_mode
        ]);

        return back()->with('success', 'Maintenance mode diperbarui');
    }
}
