<?php

// app/Http/Middleware/CheckIpMiddleware.php

namespace App\Http\Middleware;

use App\Exceptions\IpDeniedException;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class CheckIpMiddleware
{
    public function handle($request, Closure $next)
    {
        $clientIp = $request->ip();
        $allowedIps = Config::get('office_ips.allowed_ips');

        // ✅ Correo que puede saltarse la validación de IP
        $bypassEmail = Config::get('office_ips.bypass_email');

        // ✅ Verificar si hay usuario autenticado
        if (Auth::check()) {
            $userEmail = Auth::user()->email;

            // Si el correo coincide con el bypass, saltamos la validación de IP
            if ($userEmail === $bypassEmail) {
                return $next($request);
            }
        }

        // ❌ Validación normal de IP para el resto de usuarios
        if (!in_array($clientIp, $allowedIps)) {
            throw new IpDeniedException($clientIp);
        }

        return $next($request);
    }
}
