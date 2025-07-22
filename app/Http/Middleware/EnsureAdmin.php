<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        dd(auth()->user());

        if (!$user) {
            // Belum login, redirect ke home atau login
            return redirect('/');
        }

        if ($user->role !== 'admin') {
            // Sudah login tapi bukan admin, redirect ke home
            return redirect('/');
        }

        return $next($request);
    }
}
