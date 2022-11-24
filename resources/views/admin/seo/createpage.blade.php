@extends('layouts.dashtw')

@section('firstscript')
<title>Crear Página SEO</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    // tinymce.init({
    //   selector: '#mytextarea',
    //   plugins: [
    //     'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
    //     'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
    //     'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
    //   ],
    //   toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
    //     'alignleft aligncenter alignright alignjustify | ' +
    //     'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
    // });
    // tinymce.init({
    //   selector: '#txtareafooter',
    //   plugins: [
    //     'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
    //     'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
    //     'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
    //   ],
    //   toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
    //     'alignleft aligncenter alignright alignjustify | ' +
    //     'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
    // });
  </script>
@endsection

@php
    $inputs = "block w-full px-4 py-2 mt-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-md focus:border-red-500 focus:outline-none focus:ring";
@endphp

@section('content')
    <main class="overflow-x-hidden overflow-y-auto">
        <div class="mx-5 my-5">
            @if(session('status'))
                <div class="alert-del @if(session('status') == true) bg-green-100 border border-green-400 text-green-700 @else bg-red-100 border border-red-400 text-red-700 @endif px-4 py-3 mb-2 rounded relative" role="alert">
                    @if(session('status') == true) Se guardaron los cambios @else No se pudo actualizar los datos @endif
                    {{-- <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 @if(session('status') == true) text-green-500 @else text-red-500 @endif" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span> --}}
                </div>
            @endif
            @if(isset($seopage->id)) 
            <p class="font-semibold text-center">Editar página</p>
            {!! Form::model($seopage, ['route' => ['admin.seo.update',$seopage->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            @else 
            <p class="font-semibold text-center">Crear página</p> 
            {!! Form::open(['route' => 'admin.seo.store', 'enctype' => 'multipart/form-data', 'method' => 'POST', 'files' => 'true']) !!}
            @endif

            @csrf
            <div class="grid grid-cols-2 my-1">
                <div class="mr-1">
                    {!! Form::label('title', 'Titulo en la página - H1', ['class' => 'font-semibold']) !!}
                    {!! Form::text('title', null, ['class' => $inputs, 'onkeyup' => 'crearURL(this.value)']) !!}
                </div>
                <div class="ml-1">
                    {!! Form::label('title_google', 'Titulo de Google', ['class' => 'font-semibold']) !!}
                    {!! Form::text('title_google', null, ['class' => $inputs]) !!}
                </div>
            </div>

            <div class="grid grid-cols-2 my-1">
                <div class="mr-1">
                    {!! Form::label('slug', 'Slug', ['class' => 'font-semibold']) !!}
                    {!! Form::text('slug', null, ['class' => $inputs]) !!}
                </div>
                <div class="ml-1">
                    {!! Form::label('category', 'Categoria de la Página', ['class' => 'font-semibold']) !!}
                    {!! Form::select('category', [null => "Seleccione", 0 => "General", 1 => "Especifico"], null, ['class' => $inputs, 'required']) !!}
                </div>
            </div>


            {{-- <div class="grid grid-cols-1 my-1">
                {!! Form::label('description', 'Descripción de la página', ['class' => 'font-semibold my-1']) !!}
                {!! Form::textarea('description', null, ['class' => $inputs, 'rows' => 4]) !!}
            </div> --}}

            <div class="grid grid-cols-1 my-1">
                {!! Form::label('meta_description', 'Meta Description', ['class' => 'font-semibold my-1']) !!}
                {!! Form::textarea('meta_description', null, ['class' => $inputs, 'rows' => 4]) !!}
            </div>

            <div class="grid grid-cols-1 my-1">
                {!! Form::label('keywords', 'Keywords', ['class' => 'font-semibold my-1']) !!}
                {!! Form::textarea('keywords', null, ['class' => $inputs, 'rows' => 4]) !!}
            </div>

            {{-- <div class="grid grid-cols-2 my-1 mt-4">
                <div>
                    {!! Form::label('bgimageheader', 'Imagen de Cabecera', ['class' => 'font-semibold']) !!}
                    {!! Form::file('bgimageheader', ['class' => $inputs]) !!}
                </div>
                @if(isset($seopage->url_image))
                <div class="flex justify-center">
                    <img width="150px" src="{{asset($seopage->url_image)}}" alt="">
                </div>
                @else
                <div class="flex justify-center items-center">
                    <p class="text-red-500 font-semibold">No se encontraron imágenes</p>
                </div>
                @endif
            </div> --}}

            <div class="grid grid-cols-1 my-1">
                {!! Form::label('header', 'Información del Header', ['class' => 'font-semibold my-1']) !!}
                {!! Form::textarea('info_header', null, ['class' => $inputs, 'id' => 'mytextarea']) !!}
            </div>
            
            <p class="font-semibold my-2">Escoja la ubicación y el tipo de propiedad que se van a mostrar en esta página</p>
            <div class="grid grid-cols-4 my-1">
                <div class="mr-1 @if(isset($seopage->category) && $seopage->category == 0) hidden @else block @endif">
                    {!! Form::select('state', [''=>'Selecione']+$states->pluck('name','name')->toArray(), null, ['id' => 'state', 'class' => $inputs], $optAttrib) !!}
                </div>
                <div class="ml-1 @if(isset($seopage->category) && $seopage->category == 0) hidden @else block @endif">
                    {!! Form::select('city', isset($cities) ? $cities->pluck('name','name')->toArray() : [''=>'Selecione'] , null, ['id'=>'city','class' => $inputs]) !!}
                </div>
                <div class="ml-1">
                    {!! Form::select('type', [''=>'Tipo de Propiedad']+$types->pluck('type_title','id')->toArray(), null, ['id'=>'city','class' => $inputs]) !!}
                </div>
                <div class="ml-1">
                    {!! Form::select('typestatus', [''=>'Categoría', 'en-venta' => 'Venta', 'alquilar' => 'Alquilar', 'proyectos' => 'Proyectos'], null, ['class' => $inputs]) !!}
                </div>
            </div>

            <div class="my-1 parentg @if(isset($seopage) && $seopage->category == 0) block @else hidden @endif">
                <div>
                    {!! Form::label('subtitle_if_general', 'Texto en Links Similares (General)', ['class' => 'font-semibold']) !!}
                    {!! Form::text('subtitle_if_general', null, ['class' => $inputs]) !!}      
                </div>
                @if(isset($seopage->similarlinks_g) && count(json_decode($seopage->similarlinks_g))>0)
                    @php
                        $array = json_decode($seopage->similarlinks_g);
                    @endphp
                    @foreach ($array as $similarlink_g)
                    @php
                        $position = strpos($similarlink_g, '|');
                    @endphp
                        <div class="grid grid-cols-3 my-3">
                            <div class="mx-1">
                                {!! Form::label('anchor_text_g', 'Anchor Text', ['class' => 'font-semibold']) !!}
                                {!! Form::text('anchor_text_g[]', substr($similarlink_g, 0, $position), ['class' => $inputs]) !!}
                            </div>
                            <div class="mx-1">
                                {!! Form::label('link_g', 'Link', ['class' => 'font-semibold']) !!}
                                {!! Form::text('link_g[]', substr($similarlink_g, $position+1), ['class' => $inputs]) !!}
                            </div>
                            <div class="flex items-center mx-5 mt-5">
                                <div class="bg-blue-500 hover:bg-blue-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="addInputLinkGeneral()">+</div>
                                <div class="bg-red-500 hover:bg-red-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="deleterow(this.parentElement)">-</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="grid grid-cols-3 my-3">
                        <div class="mx-1">
                            {!! Form::label('anchor_text_g', 'Anchor Text', ['class' => 'font-semibold']) !!}
                            {!! Form::text('anchor_text_g[]', null, ['class' => $inputs]) !!}
                        </div>
                        <div class="mx-1">
                            {!! Form::label('link_g', 'Link', ['class' => 'font-semibold']) !!}
                            {!! Form::text('link_g[]', null, ['class' => $inputs]) !!}
                        </div>
                        <div class="flex items-center mx-5">
                            <div class="bg-blue-500 hover:bg-blue-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="addInputLinkGeneral()">+</div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 my-3">
                {!! Form::label('footer', 'Información del Footer', ['class' => 'font-semibold my-1']) !!}
                {!! Form::textarea('info_footer', null, ['class' => $inputs, 'id' => 'txtareafooter']) !!}
            </div>

            <div class="parent">
                @if(isset($seopage->similarlinks) && count(json_decode($seopage->similarlinks))>0)
                    @php
                        $array = json_decode($seopage->similarlinks);
                    @endphp
                    @foreach ($array as $similarlink)
                    @php
                        $position = strpos($similarlink, '|');
                    @endphp
                        <div class="grid grid-cols-3 my-3">
                            <div class="mx-1">
                                {!! Form::label('anchor_text', 'Anchor Text', ['class' => 'font-semibold']) !!}
                                {!! Form::text('anchor_text[]', substr($similarlink, 0, $position), ['class' => $inputs]) !!}
                            </div>
                            <div class="mx-1">
                                {!! Form::label('link', 'Link', ['class' => 'font-semibold']) !!}
                                {!! Form::text('link[]', substr($similarlink, $position+1), ['class' => $inputs]) !!}
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
                            {!! Form::text('anchor_text[]', null, ['class' => $inputs]) !!}
                        </div>
                        <div class="mx-1">
                            {!! Form::label('link', 'Link', ['class' => 'font-semibold']) !!}
                            {!! Form::text('link[]', null, ['class' => $inputs]) !!}
                        </div>
                        <div class="flex items-center mx-5">
                            <div class="bg-blue-500 hover:bg-blue-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="addInputLink()">+</div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="my-3 flex justify-center">
                <button type="submit" class="bg-blue-400 text-white px-4 text-md py-2">Guardar</button>
            </div>

            {!! Form::close() !!}
            {{-- <form method="post">
                <textarea id="mytextarea">Hello, World!</textarea>
              </form> --}}
        </div>
    </main>
@endsection

@section('endscript')
    <script>
        CKEDITOR.replace( 'mytextarea' );
        CKEDITOR.replace( 'txtareafooter' );

        const selState = document.getElementById('state');
        const selCities= document.getElementById('city');

        let selCategory = document.querySelector("select[name='category']");
        selCategory.addEventListener('change', () => {
            switch (selCategory.value) {
                case "0":
                    selState.parentElement.classList.add('hidden');
                    selCities.parentElement.classList.add('hidden');
                    document.querySelector('.parentg').classList.remove('hidden');
                    document.querySelector('.parentg').classList.add('block');
                    break;
                case "1":
                    selState.parentElement.classList.remove('hidden');
                    selCities.parentElement.classList.remove('hidden');
                    document.querySelector('.parentg').classList.add('hidden');
                    document.querySelector('.parentg').classList.remove('block');
                    break;
                default:
                    break;
            }
        });

        function addInputLink(){
            let pattern = document.querySelector('.parent');
            let rowTemplate = `<div class="grid grid-cols-3 my-3">
                    <div class="mx-1">
                        {!! Form::label('anchor_text', 'Anchor Text x', ['class' => 'font-semibold']) !!}
                        {!! Form::text('anchor_text[]', null, ['class' => $inputs]) !!}
                    </div>
                    <div class="mx-1">
                        {!! Form::label('link', 'Link', ['class' => 'font-semibold']) !!}
                        {!! Form::text('link[]', null, ['class' => $inputs]) !!}
                    </div>
                    <div class="flex items-center mx-5">
                        <div class="bg-blue-500 hover:bg-blue-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="addInputLink()">+</div>
                        <div class="bg-red-500 hover:bg-red-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="deleterow(this.parentElement)">-</div>
                    </div>
                </div>`;
            pattern.insertAdjacentHTML('beforeend', rowTemplate);
        }

        function addInputLinkGeneral(){
            let pattern = document.querySelector('.parentg');
            let rowTemplate = `<div class="grid grid-cols-3 my-3">
                    <div class="mx-1">
                        {!! Form::label('anchor_text', 'Anchor Text x', ['class' => 'font-semibold']) !!}
                        {!! Form::text('anchor_text_g[]', null, ['class' => $inputs]) !!}
                    </div>
                    <div class="mx-1">
                        {!! Form::label('link', 'Link', ['class' => 'font-semibold']) !!}
                        {!! Form::text('link_g[]', null, ['class' => $inputs]) !!}
                    </div>
                    <div class="flex items-center mx-5">
                        <div class="bg-blue-500 hover:bg-blue-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="addInputLinkGeneral()">+</div>
                        <div class="bg-red-500 hover:bg-red-600 rounded px-2 text-white mx-1" style="cursor: pointer" onclick="deleterow(this.parentElement)">-</div>
                    </div>
                </div>`;
            pattern.insertAdjacentHTML('beforeend', rowTemplate);
        }

        function deleterow(row){
            //let pattern = document.querySelector('.parent');
            row.parentElement.remove();
        }

        function crearURL(slug) {
 
            // Reemplaza los carácteres especiales | simbolos con un espacio 
            slug = slug.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

            // Corta los espacios al inicio y al final del sluging 
            slug = slug.replace(/^\s+|\s+$/gm, '');

            // Reemplaza el espacio con guión  
            slug = slug.replace(/\s+/g, '-');

            // Creo la URL en el elemento span 'texto-url' 
            document.querySelector("input[name='slug']").value = slug;
        }
    
        selState.addEventListener("change", async function() {
            selCities.options.length = 0;
            let id = selState.options[selState.selectedIndex].dataset.id;
            const response = await fetch("{{url('getcities')}}/"+id );
            const cities = await response.json(); 

            cities.forEach(city => {
                var opt = document.createElement('option');
                opt.appendChild( document.createTextNode(city.name) );
                opt.value = city.name;
                selCities.appendChild(opt);
            });
        });
    </script>
@endsection