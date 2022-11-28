@extends('layouts.dashtw')

@section('firstscript')
<title>Usuarios</title>
@livewireStyles
@endsection

@section('content')
    <div class="m-4 p-4 bg-gray-200">
        <div class="grid grid-cols-2">
            <div>
                {!! Form::model($user, ['route' => ['users.update',$user->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}   
        
                {!! Form::text('name', null, ['class' => 'my-2']) !!} <br>
                {!! Form::text('email', null, ['class' => 'my-2']) !!} <br>
                {!! Form::select('status',['0'=>'DESACTIVADO','1'=>'ACTIVO'], null,['class' => 'my-2']) !!} <br>
                {!! Form::select('role',['administrator'=>'ADMIN','user'=>'USER', 'ASESOR' => 'ASESOR'], null,['class' => 'my-2']) !!} <br>
                {!! Form::file('profile_image', ['class' => 'my-2']) !!}
                <br>{!! Form::submit('Enviar',['class' => 'py-2 px-4']) !!}
                {!! Form::close() !!}
                <br><br><br>
                <button onclick="changepass()">Cambiar pass</button>
            </div>
            <div>
                @if ($user->profile_photo_path != null)
                    <img width="100px" height="100px" src="{{asset('uploads/profiles/'.$user->profile_photo_path)}}" alt="Imagen de perfil...">
                @else
                    <p>El usuario {{$user->name}} no tiene foto de perfil</p>
                @endif
            </div>
        </div>
    </div>
    {!! Form::model($user, ['route' => ['users.changepass',$user->id],'method' => 'PUT', 'enctype' => 'multipart/form-data','id'=>'formpass']) !!}   
    {!! Form::hidden('password', null, ['class' => 'my-2']) !!} <br>
    {!! Form::close() !!}

    <!--- Modal -->
    <!--- Modal -->
    

    
@endsection

@section('endscript')
<script>
    const changepass = () => {
        let result = prompt('Ingrese Nuevo Password', );
        if(result.length > 6){
            document.getElementById('formpass').password.value = result;
            document.getElementById('formpass').submit();
        }
    }
</script>
@endsection