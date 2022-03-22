@extends('layouts.dashtw')

@section('firstscript')
<title>Usuarios</title>
@livewireStyles
@endsection

@section('content')
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="flex flex-col pt-4 px-2">
            <div class="-my-2 py-2 overflow-x-auto">
                <div class="w-full overflow-scroll mx-auto" style="height: 80vh;">
                    <table class="w-full whitespace-nowrap bg-white">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td><td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td><td>{{$user->email}}</td><td>{{$user->role}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('endscript')
@endsection