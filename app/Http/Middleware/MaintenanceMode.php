<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MaintenanceMode
{
    public function handle(Request $request, Closure $next)
    {
        $setting = DB::table('system_settings')->first();

        if (
            $setting?->maintenance_mode &&
            Auth::check() &&
            Auth::user()->role === 'member'
        ) {
            abort(503, 'Aplikasi sedang maintenance');
        }

        return $next($request);
    }
}
