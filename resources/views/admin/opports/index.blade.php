@extends('layouts.dashtw')

@section('firstscript')
    <title>Nuevo Dash</title>
@endsection


@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto">
    <div class="container mx-auto px-6 py-2">

<h3 class="text-gray-700 text-3xl font-medium">Oportunidades</h3>    
        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Role</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($opports as $opport)
                            <tr>
                                <td class="px-4 py-1 border-b">{{$opport->ciudad}}</td>
                                <td class="px-4 py-1 border-b">{{$opport->servicio}}</td>
                                <td class="px-4 py-1 border-b">{{$opport->contact->pnombre}} {{$opport->contact->papellido}}</td>
                                <td class="px-4 py-1 border-b">{{$opport->status}}</td>
                                <td class="px-4 py-1 border-b">{{$opport->assig->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                        
    </div>
</main>
@endsection