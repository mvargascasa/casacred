@extends('layouts.dashtw')

@section('firstscript')
<title>@if(isset($navbar_item->id)) EDIT NAVBAR @else CREATE NAVBAR @endif</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  
@endsection

@php
    $inputs = 'block px-4 py-2 mt-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-md focus:border-red-500 focus:outline-none focus:ring';
@endphp

@section('content')
    <main class="overflow-x-hidden overflow-y-auto m-5">
        <div>
            @if(isset($navbar_item->id))
            {{-- {!! Form::open(['route' => ['admin.seo.navbar.update', $navbar_item->id], 'method' => 'POST']) !!} --}}
            {!! Form::model($navbar_item, ['route' => ['admin.seo.navbar.update',$navbar_item->id],'method' => 'PUT']) !!}
            @else
            {!! Form::open(['route' => 'admin.seo.navbar.store', 'method' => 'POST']) !!}
            @endif
            @csrf
            <div class="grid grid-cols-1">
                <div>
                    {!! Form::label('category_name', 'Categoria', ['class' => 'font-semibold']) !!}
                    {!! Form::select('category_name', ['' => 'Seleccione', 'Casas' => 'Casas', 'Departamentos' => 'Departamentos', 'Casas Comerciales' => 'Casas Comerciales', 'Terrenos' => 'Terrenos', 'Quintas' => 'Quintas', 'Haciendas' => 'Haciendas', 'Locales Comerciales' => 'Locales Comerciales', 'Oficinas' => 'Oficinas', 'Suites' => 'Suites'], null, ['class' => $inputs]) !!}
                </div>
            </div>

            <p class="font-semibold my-3">Items</p>
            <div class="parent">
            @if(isset($navbar_item->items) && count(json_decode($navbar_item->items))>0)
                @php
                    $array = json_decode($navbar_item->items);
                @endphp
                @foreach ($array as $item)
                @php
                    $position = strpos($item, '|');
                @endphp
                    <div class="grid grid-cols-3 my-3">
                        <div class="mx-1">
                            {!! Form::label('anchor_text', 'Anchor Text', ['class' => 'font-semibold']) !!}
                            {!! Form::text('anchor_text[]', substr($item, 0, $position), ['class' => $inputs.' w-full']) !!}                            </div>
                        <div class="mx-1">
                            {!! Form::label('link', 'Link', ['class' => 'font-semibold']) !!}
                            {!! Form::text('link[]', substr($item, $position+1), ['class' => $inputs.' w-full']) !!}
                        </div>
                        <div class="flex items-center mx-5 mt-5">
                            <div class="bg-blue-500 hover:bg-blue-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="addInputLink()">+</div>
                            <div class="bg-red-500 hover:bg-red-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="deleterow(this.parentElement)">-</div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="grid grid-cols-3 my-3">
                    <div class="mx-1">
                        {!! Form::label('anchor_text', 'Anchor Text', ['class' => 'font-semibold']) !!}
                        {!! Form::text('anchor_text[]', null, ['class' => $inputs.' w-full']) !!}
                    </div>
                    <div class="mx-1">
                        {!! Form::label('link', 'Link', ['class' => 'font-semibold']) !!}
                        {!! Form::text('link[]', null, ['class' => $inputs.' w-full']) !!}
                    </div>
                    <div class="flex items-center mx-5">
                        <div class="bg-blue-500 hover:bg-blue-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="addInputLink()">+</div>
                    </div>
                </div>
            @endif
            </div>

            <button class="bg-green-500 text-white p-1 rounded">GUARDAR</button>

            {!! Form::close() !!}
        </div>
    </main>
@endsection

@section('endscript')
<script>
    function addInputLink(){
        let pattern = document.querySelector('.parent');
        let rowTemplate = `<div class="grid grid-cols-3 my-3">
                <div class="mx-1">
                    {!! Form::label('anchor_text', 'Anchor Text', ['class' => 'font-semibold']) !!}
                    {!! Form::text('anchor_text[]', null, ['class' => $inputs.' w-full']) !!}
                </div>
                <div class="mx-1">
                    {!! Form::label('link', 'Link', ['class' => 'font-semibold']) !!}
                    {!! Form::text('link[]', null, ['class' => $inputs.' w-full']) !!}
                </div>
                <div class="flex items-center mx-5">
                    <div class="bg-blue-500 hover:bg-blue-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="addInputLink()">+</div>
                    <div class="bg-red-500 hover:bg-red-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="deleterow(this.parentElement)">-</div>
                </div>
            </div>`;
        pattern.insertAdjacentHTML('beforeend', rowTemplate);
        }

        function deleterow(row){
            //let pattern = document.querySelector('.parent');
            row.parentElement.remove();
        }
</script>
@endsection