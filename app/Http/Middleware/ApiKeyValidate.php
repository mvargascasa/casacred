<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $key = $request->headers->get('api-key');

        if(isset($key) && $key === "Cc2022*@Notify"){
            return $next($request);
        } else {
            return response()->json([
                'error' => 'unauthorized'
            ], 401);
        }


    }
}
