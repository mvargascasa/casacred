<?php

// app/Http/Middleware/CheckIpMiddleware.php

namespace App\Http\Middleware;

use App\Exceptions\IpDeniedException;
use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class CheckIpMiddleware
{
    public function handle($request, Closure $next)
    {
        $clientIp = $request->ip();
        $allowedIps = Config::get('office_ips.allowed_ips');

        if (!in_array($clientIp, $allowedIps)) {
            // Lanzar la excepción personalizada
            throw new IpDeniedException($clientIp);
        }

        return $next($request);
    }
}
