<div class="my-3 row">     
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
<hr>


