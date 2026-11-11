<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
public function handle(Request $request, Closure $next, string $role): Response
{
    // Cek menggunakan ->value karena role adalah sebuah Enum
    if ($request->user() && $request->user()->role->value !== $role) {
        abort(403, 'ANDA TIDAK MEMILIKI HAK AKSES KE HALAMAN INI.');
    }

    return $next($request);
}

}
