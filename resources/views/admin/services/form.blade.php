{{-- <div class="my-3 row">     
    <div class="col-sm-4">          
        {!! Form::label('title', 'Titulo Corto (Caja de Servicios)', ['class' => 'form-label font-weight-bold']) !!}
        {!! Form::text('title', null, ['class' => 'form-control form-control-sm']) !!}
    </div>   
    <div class="col-sm-4">          
        {!! Form::label('parent', 'Servicio Principal', ['class' => 'form-label font-weight-bold']) !!}
        {!! Form::select('parent',$services->pluck('title','id'),    null,    ['class' => 'form-select form-select-sm']) !!}
    </div>
    <div class="col-sm-4">          
        {!! Form::label('status', 'Status', ['class' => 'form-label font-weight-bold']) !!}
        {!! Form::select('status',['1'=>'ACTIVO','0'=>'DESACTIVADO'],    null,    ['class' => 'form-select form-select-sm']) !!}
    </div>
</div>

<div class="mb-3">        
    {!! Form::label('page_title', 'Titulo en Google', ['class' => 'form-label font-weight-bold']) !!}
    {!! Form::text('page_title', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="mb-3">
    {!! Form::label('page_metatags', 'Keywords', ['class' => 'form-label font-weight-bold']) !!}
    {!! Form::text('page_metatags', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="mb-3">
    {!! Form::label('page_seocescription', 'Meta Descripcion en Google', ['class' => 'form-label font-weight-bold']) !!}
    {!! Form::text('page_seocescription', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="mb-3 row">
    <div class="alert alert-secondary">       
        <span style="color:darkgray">Vista Previa en Buscador Google</span>
        <div style="width:600px;">
            <span id="goo_title" style="color:darkblue;font-size: 18px;text-transform: uppercase;">
                @isset($service->page_title){{$service->page_title}}@endisset</span><br>            
        <span id="goo_descript">@isset($service->page_seocescription){{$service->page_seocescription}}@endisset</span>
        </div>
    </div>
</div>
<div class="row pt-4">
    <div class="col-sm-4">
        {!! Form::label('imgicon', 'Icono', ['class' => 'form-label font-weight-bold']) !!}
        {!! Form::file('imgicon',['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-8">
        {!! Form::label('imgheader', 'Imagen de Cabecera', ['class' => 'form-label font-weight-bold']) !!}
        {!! Form::file('imgheader',['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">            
        @isset($service->image){{$service->image}}<br>                    
            <img src="{{url('uploads/services',$service->image)}}" width="50">
        @endisset
    </div>
    <div class="col-sm-4">            
        @isset($service->headerimg){{$service->headerimg}}<br>
            <img src="{{url('uploads/services',$service->headerimg)}}" alt="" width="150">
        @endisset
    </div>
</div>

<div class="mb-3">
    {!! Form::label('headertxt', 'Titulo en Imagen de Cabecera', ['class' => 'form-label font-weight-bold']) !!}
    {!! Form::text('headertxt', null, ['class' => 'form-control form-control-sm']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Contenido', ['class' => 'form-label font-weight-bold']) !!}
    {!! Form::textarea('description', $service->description ?? '',
    ['class' => 'form-control','rows' => '10']) !!}
</div>






<br>

<button type="submit" class="btn btn-primary">Guardar</button>
<hr> --}}


{{-- new code with tailwind --}}

<div class="my-3 grid grid-cols-3 gap-4">     
    <div>          
        {!! Form::label('title', 'Titulo Corto (Caja de Servicios)', ['class' => 'font-semibold']) !!}
        {!! Form::text('title', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
    </div>   
    <div>          
        {!! Form::label('parent', 'Servicio Principal', ['class' => 'font-semibold']) !!}
        {!! Form::select('parent',$services->pluck('title','id'),    null,    ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
    </div>
    <div>          
        {!! Form::label('status', 'Status', ['class' => 'font-semibold']) !!}
        {!! Form::select('status',['1'=>'ACTIVO','0'=>'DESACTIVADO'],    null,    ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
    </div>
</div>

<div class="grid grid-cols-1 mt-5">
    <div>        
        {!! Form::label('page_title', 'Titulo en Google', ['class' => 'font-semibold']) !!}
        {!! Form::text('page_title', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
    </div>
</div>

<div class="grid grid-cols-1 mt-5">
    <div>
        {!! Form::label('page_metatags', 'Keywords', ['class' => 'font-semibold']) !!}
        {!! Form::textarea('page_metatags', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'rows' => 4]) !!}
    </div>
</div>

<div class="grid grid-cols-1 mt-5">
    <div>
        {!! Form::label('page_seocescription', 'Meta Descripcion en Google', ['class' => 'font-semibold']) !!}
        {!! Form::text('page_seocescription', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
        <div class="text-sm text-gray-500 font-semibold mt-2">
            <p><b id="count_char">0</b> caracteres de 160 (Óptimo)</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-2 mt-5">
    <div class="bg-gray-300 rounded p-3 shadow">       
        <span class="text-gray-600">Vista Previa en Buscador Google</span>
        <div style="width:600px;">
            <span id="goo_title" style="color:darkblue;font-size: 18px;text-transform: uppercase;">
                @isset($service->page_title){{$service->page_title}}@endisset</span><br>            
        <span id="goo_descript">@isset($service->page_seocescription){{Str::limit($service->page_seocescription, 160)}}@endisset</span>
    </div>
    @if(isset($service->page_seocescription) && strlen($service->page_seocescription) > 160)
        <div class="bg-yellow-200 rounded mt-5 shadow-md">
            <p class="px-4 py-1 font-semibold">⚠ La cantidad de caracteres de la meta descripcion no es óptima</p>
        </div>
    @endif
</div>
</div>

<div class="grid grid-cols-2 mt-5 gap-4">
    <div>
        {!! Form::label('imgicon', 'Icono', ['class' => 'font-semibold']) !!}
        {!! Form::file('imgicon',['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
        <div>            
            @isset($service->image){{$service->image}}<br>                    
                <img src="{{url('uploads/services',$service->image)}}" width="50">
            @endisset
        </div>
    </div>
    <div>
        {!! Form::label('imgheader', 'Imagen de Cabecera', ['class' => 'font-semibold']) !!}
        {!! Form::file('imgheader',['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
        <div class="col-sm-4">            
            @isset($service->headerimg){{$service->headerimg}}<br>
                <img src="{{url('uploads/services',$service->headerimg)}}" alt="" width="150">
            @endisset
        </div>
    </div>
</div>

<div class="grid grid-cols-1 mt-5">
    <div>
        {!! Form::label('headertxt', 'Titulo en Imagen de Cabecera', ['class' => 'font-semibold']) !!}
        {!! Form::text('headertxt', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
    </div>
</div>

<div class="grid grid-cols-1 mt-5">
    <div>
        {!! Form::label('description', 'Contenido', ['class' => 'font-semibold']) !!}
        {!! Form::textarea('description', $service->description ?? '',
        ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline','rows' => '10']) !!}
    </div>
</div>

<br>

<div class="mb-5 text-center">
    <button type="submit" class="bg-green-500 text-white rounded px-5 py-1 hover:shadow-lg">💾 Guardar</button>
</div>
<hr>

