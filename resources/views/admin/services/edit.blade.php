@extends('layouts.dashtw')
@section('firstscript')
<title>Dashboard</title>
@endsection

@section('content')
    
<div class="px-10 mt-5" style="overflow: auto; margin-left: 5%; margin-right: 5%">
    <div>
        <div class="row py-2">
            @if(isset($service))
            <h4 class="text-red-500 font-semibold text-lg">Editando Servicio  <span style="color:darkgray">Creado: {{$service->created_at->format('d M y')}}</span></h4>
            {!! Form::model($service, ['route' => ['admin.services.update',$service->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            @else
            <h4 class="text-red-500 font-semibold text-lg">Nuevo Servicio</h4>
            {!! Form::open(['route' => 'admin.services.store','enctype' => 'multipart/form-data']) !!}
            @endif

            @include('admin.services.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('endscript')

{{-- <script src="https://cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script> --}}
<script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        CKEDITOR.replace('description');
    });
    
    //count_char

    let input_meta_description = document.querySelector("input[name='page_seocescription']");
    input_meta_description.addEventListener('keyup', () => {
        alert('entra');
    })
</script>
@endsection