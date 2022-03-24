<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait SendEmailTrait{
    
    public function sendemail(Request $request){

        $to = "sebas31051999@gmail.com";
        $subject = "Lead " . strip_tags($request->interest) . " | " . date(now());
        $message = "<br><strong><h3>Información</h3></strong>
                    <br>Nombre: " . strip_tags($request->nombre). "
                    <br>Teléfono: " .strip_tags($request->telefono) . "
                    <br>Email: " . strip_tags($request->email) . "
                    <br>Mensaje: " . strip_tags($request->mensaje) . "
        ";

        $header = 'From: <leads@casacredito.com>' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n".
            'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;
    
        return(mail($to,  $subject, $message, $header));

    }

}
