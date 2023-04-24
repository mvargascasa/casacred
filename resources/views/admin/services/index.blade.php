@extends('layouts.dashtw')
@section('header')
<title>Dashboard</title>
@endsection

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-4">
    <div class="grid grid-cols-1 p-4">
          <h1>Servicios</h1>
    </div>
    <div class="grid grid-cols-1">
        <table class="table table-striped">
            <tr><th width="50">Estatus</th><th>Principal</th><th>Sub-Servicio</th></tr>
            @foreach ($services->where('parent',0) as $parent)
            <tr class="text-center border"><td  @if($parent->status==0) class="text-danger" @endif>{{$parent->status==1?'Activo':'Desactivado'}}</td><td>{{$parent->title}} </td>
                <td>
                    @foreach ($services->where('parent',$parent->id) as $serv)
                        <a @if($serv->status==0) class="link-secondary" @endif 
                            href="{{route('admin.services.edit',$serv)}}">{{$serv->title}}</a> {{$serv->status==0 ? '(Desac)' : ''}} <br>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</main>
@endsection