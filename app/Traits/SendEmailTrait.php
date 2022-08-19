<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait SendEmailTrait{
    
    public function sendemail(Request $request){
        
        $to = "info@casacredito.com,hserrano@casacredito.com,ventas@casacredito.com"; //info@casacredito.com,hserrano@casacredito.com,ventas@casacredito.com
        $subject = "Lead Casa Credito - " . strip_tags($request->name) . " | " . date(now());
        switch ($request->interest) {
            case 'Busca Alquiler':
                $message = "<br><strong><h3>Información</h3></strong>
                    <br>Interes: " . strip_tags($request->interest) . "
                    <br>Nombre: " . strip_tags($request->name). "
                    <br>Teléfono: " .strip_tags($request->phone) . "
                    <br>Provincia: " . strip_tags($request->state) . "
                    <br>Ciudad: " . strip_tags($request->city) . "
                ";
                break;
            case 'Poner en Alquiler':
                $message = "<br><strong><h3>Información</h3></strong>
                    <br>Interes: " . strip_tags($request->interest) . "
                    <br>Nombre: " . strip_tags($request->name). "
                    <br>Teléfono: " .strip_tags($request->phone) . "
                    <br>Tipo: " . strip_tags($request->type) . "
                    <br>Provincia: " . strip_tags($request->province) . "
                    <br>Ciudad: " . strip_tags($request->city) . "
                ";
                break;
            case 'Vender una propiedad':
                $message = "<br><strong><h3>Información</h3></strong>
                    <br>Interes: " . strip_tags($request->interest) . "
                    <br>Nombre: " . strip_tags($request->name). "
                    <br>Teléfono: " .strip_tags($request->phone) . "
                    <br>Email: " . strip_tags($request->email) . "
                    <br>Tipo de propiedad: " . strip_tags($request->tipopropiedad) . "
                    <br>Provincia: " . strip_tags($request->province) . "
                    <br>Ciudad: " . strip_tags($request->city) . "
                ";
                break;
            case 'Venta de propiedad':
                $message = "<br><strong><h3>Información</h3></strong>
                    <br>Interes: " . strip_tags($request->interest) . "
                    <br>Nombre: " . strip_tags($request->fname). " " . strip_tags($request->flastname). "
                    <br>Teléfono: " .strip_tags($request->tlf) . "
                    <br>Tipo de propiedad: " . strip_tags($request->ftype) . "
                    <br>Provincia: " . strip_tags($request->fstate) . "
                    <br>Ciudad: " . strip_tags($request->fcity) . "
                    <br>Sector: " . strip_tags($request->fsector) . "
                    <br>Años de construcción: " . strip_tags($request->fyears) . "
                    <br>Precio Estimado: " . strip_tags($request->fprice) . "
                    <br>Fuente: Website
                ";
                break;
            case 'Créditos Hipotecarios':
            case 'Créditos de Consumo':
            case 'Créditos de Construcción':
                $message = "<br><strong><h3>Información</h3></strong>
                    <br>Interes: " . strip_tags($request->interest) . "
                    <br>Nombre: " . strip_tags($request->name). "
                    <br>Teléfono: " .strip_tags($request->phone) . "
                    <br>Email: " . strip_tags($request->email) . "
                    <br>Mensaje: " . strip_tags($request->message) . "
                ";
                break;
            case 'Venta o Renta de Propiedad':
                $message = "<br><strong><h3>Información del Lead <img width='30px' height='15px' src='https://casacredito.com/img/logo_actualizado2.png'/></h3></strong>
                    <br><b>Nombre:</b> " . strip_tags($request->nombre). "
                    <br><b>Teléfono:</b> " .strip_tags($request->telefono) . "
                    <br><b>Email:</b> " . strip_tags($request->email) . "
                    <br><b>Interes:</b> " . strip_tags($request->interest) . "
                    <br><b>Mensaje:</b> " . strip_tags($request->mensaje) . "
                ";
                break;
            default:
                $message = "<br><strong><h3>Información</h3></strong>
                    <br>Nombre: " . strip_tags($request->nombre). "
                    <br>Teléfono: " .strip_tags($request->telefono) . "
                    <br>Email: " . strip_tags($request->email) . "
                    <br>Mensaje: " . strip_tags($request->mensaje) . "
                ";
                break;
        }
        
        $header = 'From: <leads@casacredito.com>' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n".
            'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;
        
        mail('sebas31051999@gmail.com', $subject, $message, $header);
        return(mail($to,  $subject, $message, $header));
    }

}
