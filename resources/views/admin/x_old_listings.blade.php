@extends('layouts.dash')
@section('header')
<title>Dashboard</title>
<style>
    .pagination{
        margin:0;
    }
</style>
@livewireStyles

@endsection

@section('content')
    <div class="col-md-10 p-4">
        <table class="table">
            <tr>
                <th>IMG</th>   <th>CODE</th>   <th>TITLE</th>   <th>TIPO</th>   <th>????</th>   <th>PAGO</th>   <th>STATUS</th>  
            </tr>
            <tr>
                <td><button class="btn btn-info btn-sm">Buscar</button></td>
                <td><input type="text"  class="form-control form-control-sm" style="width: 60px"/></td>
                <td>Activas: {{$listings}}</td>
                <td><input type="text"  class="form-control form-control-sm" style="width: 60px"/></td>
                <td><input type="text"  class="form-control form-control-sm" style="width: 60px"/></td>
                <td><input type="text"  class="form-control form-control-sm" style="width: 60px"/></td>
                <td><input type="text"  class="form-control form-control-sm" style="width: 60px"/></td>

            </tr>
            <livewire:proplist-admin />
        </table>
    </div>
@endsection
@section('scripts')
@livewireScripts

@endsection