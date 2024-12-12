<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        if(auth()->check()  && auth()->user()->role == $role){ 
            return $next($request);
        }
        // return redirect('/dashboard/admin/users');

        if (auth()->user()->role === 'admin') {
            return redirect('/dashboard/admin/users');
        } elseif (auth()->user()->role === 'pelanggan') {
            return redirect('/dashboard/pelanggan/pesanan');
        }elseif (auth()->user()->role === 'pimpinan') {
            return redirect('/dashboard/pimpinan/laporan');
        }else {
            return redirect('/'); // fallback redirect if role is unknown
        }
    
    }
}