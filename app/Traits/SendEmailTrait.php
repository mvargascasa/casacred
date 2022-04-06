<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait SendEmailTrait{
    
    public function sendemail(Request $request){
        
        $to = "info@casacredito.com,hserrano@casacredito.com";

        if($request->interest == "Busca Alquiler"){
            $subject = "Lead Casa Credito - " . strip_tags($request->name) . " | " . date(now());
            $message = "<br><strong><h3>Información</h3></strong>
                        <br>Interes: " . strip_tags($request->interest) . "
                        <br>Nombre: " . strip_tags($request->name). "
                        <br>Teléfono: " .strip_tags($request->phone) . "
                        <br>Provincia: " . strip_tags($request->state) . "
                        <br>Ciudad: " . strip_tags($request->city) . "
            ";
    
            $header = 'From: <leads@casacredito.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
            ;
        } else if($request->interest == "Poner en Alquiler"){
            $subject = "Lead Casa Credito - " . strip_tags($request->name) . " | " . date(now());
            $message = "<br><strong><h3>Información</h3></strong>
                        <br>Interes: " . strip_tags($request->interest) . "
                        <br>Nombre: " . strip_tags($request->name). "
                        <br>Teléfono: " .strip_tags($request->phone) . "
                        <br>Tipo: " . strip_tags($request->type) . "
                        <br>Provincia: " . strip_tags($request->province) . "
                        <br>Ciudad: " . strip_tags($request->city) . "
            ";
    
            $header = 'From: <leads@casacredito.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
            ;
        } else {
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
        }
    
        return(mail($to,  $subject, $message, $header));

    }

}
