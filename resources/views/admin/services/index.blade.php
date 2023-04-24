@extends('layouts.dashtw')
@section('header')
<title>Dashboard</title>
@endsection

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-4">
    <div class="grid grid-cols-1 p-4">
        <div>
            <h1 class="text-xl font-semibold">Servicios</h1>
            <a class="float-right bg-green-500 text-white px-3 rounded shadow hover:shadow-lg" href="{{route('admin.services.create')}}">Crear Nuevo Sub-Servicio</a>
        </div>
    </div>
    <div class="grid grid-cols-1">
        <table class="table-auto shadow">
            <tr class="bg-gray-400"><th class="px-4 py-2">Estatus</th><th class="px-4 py-2">Principal</th><th class="px-4 py-2">Sub-Servicio</th></tr>
            @foreach ($services->where('parent',0) as $parent)
            <tr class="text-center border"><td class="font-bold border px-4 py-2 @if($parent->status==0) text-red-500 @else text-green-500 @endif">{{$parent->status==1?'Activo':'Desactivado'}}</td><td>{{$parent->title}} </td>
                <td class="border px-4 py-2">
                    @foreach ($services->where('parent',$parent->id) as $serv)
                        <a class="text-blue-500" href="{{route('admin.services.edit',$serv)}}">{{$serv->title}}</a> {{$serv->status==0 ? '(Desac)' : ''}} <br>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</main>
@endsection