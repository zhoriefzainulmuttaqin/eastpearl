<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check() && Auth::guard('admin')->user()->active == 1) {
            return redirect()->to('/app-admin')->with("msg_status", "danger")->with('msg', '<strong>Maaf.</strong> <br> Silahkan login terlebih dahulu!');
        }
        return $next($request);
    }
}
