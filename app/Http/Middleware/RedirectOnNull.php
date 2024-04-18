<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class RedirectOnNull
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Periksa jika terjadi kesalahan "Attempt to read property 'active' on null"
        if ($response->exception && $response->exception->getMessage() === 'Attempt to read property \'active\' on null') {
            // Redirect ke rute '/app-admin/'
            return Redirect::to('/app-admin/');
        }

        return $response;
    }
}