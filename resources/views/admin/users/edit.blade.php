@extends('layouts.dashtw')

@section('firstscript')
<title>Usuarios</title>
@livewireStyles
@endsection

@section('content')
<div class="m-6">
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Editar Usuario</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Formulario -->
            <div>
                {!! Form::model($user, ['route' => ['users.update',$user->id],'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'space-y-4']) !!}   
                
                    <div class="grid grid-cols-2">
                        <div>
                            {!! Form::label('name', 'Nombre', ['class' => 'block text-sm font-medium text-gray-600']) !!}
                            {!! Form::text('name', null, ['class' => 'mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:outline-none py-2']) !!}
                        </div>

                        <div>
                            {!! Form::label('code', 'Codigo Asesor', ['class' => 'block text-sm font-medium text-gray-600']) !!}
                            {!! Form::text('code', null, ['class' => 'mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:outline-none py-2', 'placeholder' => 'GH-1234']) !!}
                        </div>
                    </div>


                    <div>
                        {!! Form::label('email', 'Correo', ['class' => 'block text-sm font-medium text-gray-600']) !!}
                        {!! Form::email('email', null, ['class' => 'mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:outline-none py-2']) !!}
                    </div>

                    <div>
                        {!! Form::label('status', 'Estado', ['class' => 'block text-sm font-medium text-gray-600']) !!}
                        {!! Form::select('status',['0'=>'DESACTIVADO','1'=>'ACTIVO'], null,['class' => 'mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:outline-none py-2']) !!}
                    </div>

                    <div>
                        {!! Form::label('role', 'Rol', ['class' => 'block text-sm font-medium text-gray-600']) !!}
                        {!! Form::select('role',['administrator'=>'ADMIN','user'=>'USER','ASESOR'=>'ASESOR'], null,['class' => 'mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:outline-none py-2']) !!}
                    </div>

                    <div>
                        {!! Form::label('profile_image', 'Foto de perfil', ['class' => 'block text-sm font-medium text-gray-600']) !!}
                        {!! Form::file('profile_image', ['class' => 'mt-1 w-full border-gray-300 rounded-lg shadow-sm']) !!}
                    </div>

                    <div class="flex space-x-4">
                        {!! Form::submit('Guardar', ['class' => 'bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition cursor-pointer']) !!}
                        <button type="button" onclick="openModal()" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                            Cambiar Contraseña
                        </button>
                    </div>
                    
                {!! Form::close() !!}
            </div>

            <!-- Imagen -->
            <div class="flex flex-col items-center justify-center">
                @if ($user->profile_photo_path != null)
                    <img class="w-32 h-32 object-cover rounded-full shadow-md" 
                         src="{{asset('uploads/profiles/'.$user->profile_photo_path)}}" 
                         alt="Imagen de perfil">
                @else
                    <p class="text-gray-500">El usuario <span class="font-semibold">{{$user->name}}</span> no tiene foto de perfil</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Form hidden para cambiar pass -->
{!! Form::model($user, ['route' => ['users.changepass',$user->id],'method' => 'PUT', 'enctype' => 'multipart/form-data','id'=>'formpass']) !!}   
{!! Form::hidden('password', null, ['id' => 'passwordField']) !!}
{!! Form::close() !!}

<!-- Modal -->
<div id="passwordModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-2xl shadow-lg w-96">
        <h3 class="text-lg font-bold mb-4">Cambiar Contraseña</h3>
        <input type="password" id="newPassword" class="w-full border-gray-300 rounded-lg shadow-sm focus:outline-none py-2 mb-4" placeholder="Ingrese nueva contraseña">
        <div class="flex justify-end space-x-2">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancelar</button>
            <button onclick="submitPassword()" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Guardar</button>
        </div>
    </div>
</div>
@endsection

@section('endscript')
<script>
    const openModal = () => {
        document.getElementById('passwordModal').classList.remove('hidden');
    }

    const closeModal = () => {
        document.getElementById('passwordModal').classList.add('hidden');
    }

    const submitPassword = () => {
        let result = document.getElementById('newPassword').value;
        if(result.length >= 6){
            document.getElementById('passwordField').value = result;
            document.getElementById('formpass').submit();
        }else{
            alert('La contraseña debe tener al menos 6 caracteres');
        }
    }
</script>
@endsection
