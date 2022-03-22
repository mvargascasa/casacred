@extends('layouts.dash')
@section('header')
<title>Dashboard</title>
@endsection

@section('content')
    
<div class="col-md-10">
    <div class="container">
        <div class="row py-2">
            @if(isset($service))
            <h4 class="p-2 text-danger">Editando Servicio  <span style="color:darkgray">Creado: {{$service->created_at->format('d M y')}}</span></h4>
            {!! Form::model($service, ['route' => ['admin.services.update',$service->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            @else
            <h4 class="p-2 text-danger">Nuevo Servicio</h4>
            {!! Form::open(['route' => 'admin.services.store','enctype' => 'multipart/form-data']) !!}
            @endif

            @include('admin.services.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="https://cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        CKEDITOR.replace('description');
    });
</script>
@endsection