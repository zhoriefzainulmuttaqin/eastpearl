<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class RedirectOnNull
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response->exception && $response->exception->getMessage() === 'Attempt to read property "active" on null') {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5 style='color: red;'>Maaf Sesi Anda Telah Berakhir, Silakan Login Kembali</h5>");
            return Redirect::to('/app-admin/');
        }

        return $response;
    }
}