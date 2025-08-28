@extends('layouts.dashtw')

@section('firstscript')
<title>Usuarios</title>
@livewireStyles
@endsection

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <!-- Buscador -->
    <div class="flex justify-center mt-6">
        <form action="{{ route('users.index') }}" method="GET" class="flex space-x-2 w-full max-w-md">
            <input 
                type="text" 
                placeholder="Buscar por nombre o email..." 
                name="q"
                value="{{ request('q') }}" {{-- mantiene el valor --}}
                class="flex-1 px-4 py-2 border rounded-lg shadow-sm 
                       focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            >
            <button 
                type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition"
            >
                Buscar
            </button>
            <a
                href="{{ route('users.index') }}"
                method="GET"
                class="bg-red-500 px-4 py-2 rounded-lg text-white"
            >
            Limpiar
            </a>
        </form>
    </div>

    <!-- Lista -->
    <div class="flex flex-col pt-6 px-4">
        <div class="overflow-hidden border rounded-lg shadow bg-white">
            <table class="w-full text-left border-collapse">
                <!-- Cabecera -->
                <thead class="bg-gray-50 sticky top-0">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>

                <!-- Filas -->
                <tbody class="divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4 text-sm text-gray-700">{{$user->id}}</td>
                            <td class="px-6 py-4 text-sm text-indigo-600 font-medium">
                                <a href="{{route('users.edit',$user->id)}}" class="hover:underline">
                                    {{$user->name}}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{$user->email}}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    @if($user->role == 'administrator') bg-red-100 text-red-700 
                                    @elseif($user->role == 'ASESOR') bg-blue-100 text-blue-700 
                                    @else bg-green-100 text-green-700 @endif">
                                    {{$user->role}}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route('users.edit',$user->id)}}" 
                                   class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $users->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</main>
@endsection

@section('endscript')
@endsection
