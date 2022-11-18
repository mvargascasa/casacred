<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function credito(){
        $states = DB::table('info_states')->where('country_id', 63)->get();
        return view('landing.credito', compact('states'));
    }

    public function sendleadcredito(Request $request){
        $to = "sebas31051999@gmail.com";
        $message = "<br><strong>Nuevo Lead Créditos</strong>
                    <br> <b>Nombre:</b> ". strip_tags($request->name)." " . strip_tags($request->lastname)."
                    <br> <b>Cédula o Pasaporte:</b> " . strip_tags($request->identification) . "
                    <br> <b>Telefono:</b> ".  strip_tags($request->phone)."
                    <br> <b>Email:</b> ".  strip_tags($request->email)."
                    <br> <b>Provincia:</b> " . strip_tags($request->state) . "
                    <br> <b>Ciudad:</b> " . strip_tags($request->city) . "
                    <br> <b>Ingresos Mensuales:</b> De $" . strip_tags($request->monthly_income) . "
                    <br> <b>Monto solicitado:</b> $" . strip_tags($request->amount) . "
                    <br> <b>Fuente:</b> Landing Créditos ";
        $header = "";
        $header .= 'From: <leads_creditos@casacredito.com>' . "\r\n";
        $header .= "Reply-To: ".'info@casacredito.com'."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        return mail($to, "Nuevo Lead Créditos: ".strip_tags($request->name), $message, $header);
    }
}
