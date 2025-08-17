<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutPage(){
        return view('about');
    }

    public function sendLeadAboutContact(Request $request)
    {
        // Construir mensaje HTML
        $message = "
            <br><strong>Nuevo Lead - Modal About Contact</strong>
            <br> Nombre: " . strip_tags($request->name) . " " . strip_tags($request->lastname) . "
            <br> Teléfono: " . strip_tags($request->phone) . "
            <br> Email: " . strip_tags($request->email) . "
            <br> Provincia: " . strip_tags($request->province) . "
            <br> Ciudad: " . strip_tags($request->city) . "
            <br> Servicio: " . strip_tags($request->servicio) . "
            <br> Mensaje: " . strip_tags($request->message) . "
            <br> Fuente: Website - Modal About Contact
        ";

        // Encabezados de correo
        $header = '';
        $header .= 'From: <leads@grupohousing.com>' . "\r\n";
        $header .= 'Reply-To: ' . strip_tags($request->email) . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type:text/html;charset=UTF-8\r\n";

        // Enviar correos
        //mail('info@casacredito.com', 'Lead Grupo Housing: ' . strip_tags($request->name) . " " . strip_tags($request->lastname), $message, $header);
        mail('sebas31051999@gmail.com', 'Lead Grupo Housing: ' . strip_tags($request->name) . " " . strip_tags($request->lastname), $message, $header);

        // Retornar vista de agradecimiento
        return view('thank');
    }

}
