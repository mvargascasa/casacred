@extends('layouts.dashtw')

@section('firstscript')
    <title>Nuevo Dash</title>
@endsection


@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto">
    <div class="container mx-auto px-6 py-2">

<h3 class="text-gray-700 text-3xl font-medium">Palabras Buscadas</h3>    
        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    WORD</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    SOURCE</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    IP</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    CREATED</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($words as $wd)
                            <tr>
                                <td class="px-4 py-1 border-b">{{$wd->id}}</td>
                                <td class="px-4 py-1 border-b">{{$wd->word}}</td>
                                <td class="px-4 py-1 border-b">{{$wd->source}}</td>
                                <td class="px-4 py-1 border-b">{{$wd->ip}}</td>
                                <td class="px-4 py-1 border-b">{{$wd->created_at->format('d M H:s')}}</td>
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