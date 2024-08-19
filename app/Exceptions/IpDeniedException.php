<?php

namespace App\Exceptions;

use Exception;

class IpDeniedException extends Exception
{

    protected $clientIp;

    public function __construct($clientIp)
    {
        $this->clientIp = $clientIp;
    }

    public function render($request)
    {
        // Puedes devolver una vista específica o la vista de inicio de sesión con el mensaje de error
        return response()->view('auth.login', ['error' => 'Acceso Denegado: '.$this->clientIp], 403);
    }
}

