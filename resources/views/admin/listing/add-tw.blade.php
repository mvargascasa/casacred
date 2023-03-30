@extends('layouts.dashtw')

@section('firstscript')
<title> @if(isset($listing->id)) Editar: {{$listing->product_code}} {{$listing->listing_title}} @else Crear @endif Propiedad</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- link para el loading button --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  
<style>
    /* input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none; margin: 0;} */
    .modal, .modalSuccess {
      transition: opacity 0.25s ease;
    }
    body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
    }
</style>

@endsection

@section('content')

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">

 <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md mt-10">
    
    @if(session('message'))
        <div class="alert-del bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-2 rounded relative" role="alert">
            {{session('message')}}
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif

    {{-- @if(isset($isvalid) && !$isvalid)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-2 rounded relative">
            <i class="fa-solid fa-circle-exclamation"></i> LA PROPIEDAD TIENE CAMPOS SIN COMPLETAR
        </div>
    @endif --}}
    
    @if(isset($listing->id))
    <div>
        <div class="flex">
            <h2 class="text-lg font-semibold text-red-700">EDITAR PROPIEDAD<span style="color:darkgray"> Creado: {{$listing->created_at->format('d M y')}} ({{$listing->user->name??'User'}})</span></h2>
            @if(Auth::user()->role == "administrator" && $listing->locked)
                <form action="{{route('admin.listings.unlocked', $listing->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gray-300 pl-1 pr-1 rounded">Desbloquear</button>
                </form>
            @endif
        </div>
        <div class="float-right flex" style="margin-top: -30px">
            <form action="{{ route('home.tw.setisinplusvalia') }}" method="POST" class="mr-2">
                @csrf
                <input type="hidden" name="plusvalia" value="{{$listing->id}}">
                <button type="submit" style="outline: none">
                    <i class="fas fa-parking @if(isset($listing) && $listing->plusvalia) text-green-600 @else text-red-600 @endif"></i>
                </button>
            </form>
            <form action="{{ route('home.tw.setoutstanding') }}" method="POST">
                @csrf
                <input type="hidden" id="outstanding" name="outstanding" value="{{$listing->id}}">
                <button type="submit" style="outline: none">
                    <i onclick="setoutstanding()" class="fas fa-star @if($listing->outstanding) text-yellow-400 @else text-gray-400 @endif"></i>
                </button>
            </form>
        </div>
    </div>

    {!! Form::model($listing, ['route' => ['admin.listings.update',$listing->id],'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'formsave']) !!}
    @else
    <h2 class="text-lg font-semibold text-red-700">NUEVA PROPIEDAD</h2>
    {!! Form::open(['route' => 'admin.listings.store','enctype' => 'multipart/form-data', 'id' => 'formsave']) !!}
    @endif

    <hr class="mt-4 mb-4">
    <div class="flex gap-6 justify-center">
        <label id="btnfragment1" style="cursor: pointer" onclick="changefragment('first')" class="bg-red-600 text-white px-5 font-semibold">Información General</label>
        <label id="btnfragment2" style="cursor: pointer" onclick="changefragment('second')" class="font-semibold">Servicios</label>
        <label id="btnfragment3" style="cursor: pointer" onclick="changefragment('third')" class="font-semibold">Informacion adicional</label>
        <label id="btnfragment4" style="cursor: pointer" onclick="changefragment('fourth')" class="font-semibold">Imagenes</label>
    </div>
    <hr class="mt-4">

    @if(Auth::user()->role != "administrator")
        @if(isset($listing->status) && $listing->status == "0")
            <div class="bg-green-300 rounded mt-2 mb-2 p-2"><i class="fa-solid fa-circle-info"></i> El Administrador activará la propiedad una vez los campos hayan sido completados.</div>
        @elseif(isset($listing->status) && $listing->status == "1")
            <div class="bg-green-300 rounded mt-2 mb-2 p-2"><i class="fa-solid fa-circle-info"></i> Si necesita desactivar la propiedad, por favor <a style="color: blue; text-decoration: blue" href="https://crm.notarialatina.com/properties/{{$listing->id}}" target="_blank">comunicarse</a> con el Administrador indicando la razón.</div>
        @elseif(!isset($listing))
            <div class="bg-green-300 rounded mt-2 mb-2 p-2"><i class="fa-solid fa-circle-info"></i> Completar todos los campos para que el Administrador active la nueva propiedad.</div>
        @endif
    @endif


        @php  
            // class
            $inputs = 'block w-full px-4 py-2 mt-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-0 focus:border-red-500 focus:outline-none focus:ring';

            if(isset($listing->id)) $default = null; else $default = '0';
            if(Auth::user()->role == 'administrator') $readonly = ['class' => 'form-select form-select-sm','readonly'=>'readonly'];
            else $classStatus = ['class' => 'form-select form-select-sm'];
            if(isset($lastcode->product_code)){ $codelast=(int)filter_var($lastcode->product_code, FILTER_SANITIZE_NUMBER_INT); $newcode = $codelast+1; }else $newcode = null;
        @endphp

        <div id="first" class="fragment1">
            {!! Form::hidden('fragment', 'first') !!}
            @if (Route::current()->getName() == "admin.listings.edit" || Route::current()->getName() == "home.tw.edit")
                {!! Form::hidden('edit', 1) !!}
            @endif
            <div class="border px-5 py-4 shadow-sm hover:shadow-md">
                <div class="grid grid-cols-3 gap-4 sm:gap-6">
                    <div>          
                        {!! Form::label('product_code', 'Codigo',['class' => 'font-semibold']) !!}
                        {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                        {!! Form::text('product_code', $newcode, ['class' => $inputs.' font-bold', 'disabled']) !!}
                        @else --}}
                        {!! Form::text('product_code', $newcode, ['class' => $inputs.' font-bold', 'readonly']) !!}
                        {{-- @endif --}}
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6 mt-4">
                    <div>
                        {!! Form::label('available', 'Disponibilidad', ['class' => 'font-semibold']) !!}
                        {!! Form::select('available', ['1' => 'DISPONIBLE', '2' => 'NO DISPONIBLE'], null, ['class' => $inputs, 'onchange' => 'requiredFalse(this.value);', 'required']) !!}
                    </div>
                    <div>       
                        {!! Form::label('listing_type', 'Plan',['class' => 'font-semibold']) !!}
                        {{-- @if(isset($listing) && $listing->locked)
                            {!! Form::select('listing_type',['2'=>'PAGO','1'=>'GRATIS'], null, ['class' => $inputs, 'disabled']) !!}
                        @else --}}
                        {!! Form::select('listing_type',['' => 'Seleccione', '2'=>'PAGO','1'=>'GRATIS'], null, ['class' => $inputs]) !!}
                        {{-- @endif --}}
                    </div>
            
                    @if(Auth::user()->role == "administrator")
                        <div>
                            {!! Form::label('status', 'Status',['class' => 'font-semibold']) !!}
                            {{-- @if(isset($listing) && $listing->locked)
                                {!! Form::select('status',['0'=>'DESACTIVADO','1'=>'ACTIVO'], null, ['class' => $inputs, 'disabled']) !!}
                            @else --}}
                                {!! Form::select('status',['0'=>'DESACTIVADO','1'=>'ACTIVO'], null, ['class' => $inputs]) !!}
                            {{-- @endif --}}
                        </div>
                    @else
                        @isset($listing)
                            <div>
                                {!! Form::label('status', 'Estado', ['class' => 'font-semibold']) !!}
                                    @if($listing->status == "0" || $listing->status == "") 
                                        <div class="flex items-center mt-3 text-gray-500">
                                            <div class="bg-red-500 mr-2 rounded-md" style="width: 10px; height: 10px"></div> 
                                            DESACTIVADA
                                        </div>  
                                    @elseif($listing->status == "1") 
                                        <div class="flex items-center mt-3 text-gray-500">
                                            <div class="bg-green-500 mr-2 rounded-md" style="width: 10px; height: 10px"></div> 
                                            ACTIVADA
                                        </div> 
                                    @endif
                            </div>
                        @else
                            <div>
                                {!! Form::label('status', 'Estado', ['class' => 'font-semibold']) !!}
                                <div class="flex items-center mt-3 text-gray-500">
                                    <div class="bg-red-500 mr-2 rounded-md" style="width: 10px; height: 10px"></div> 
                                    DESACTIVADA
                                </div>
                            </div>
                        @endisset
                    @endif
                </div>
                <div id="numfactura" class="grid grid-cols-1 gap-4 mt-3 sm:gap-6 @if(isset($listing) && $listing->listing_type == 2) block  @else hidden @endif">
                    <div>
                        {!! Form::label('num_factura', '# Número de factura', ['class' => 'font-semibold']) !!}
                        {!! Form::text('num_factura', null, ['class' => $inputs]) !!}
                        <div>
                            <p class="font-semibold text-gray-500" style="font-size: 14px"><i class="fas fa-info-circle"></i> La propiedad no podrá ser activada si no cuenta con el número de factura</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-3 border px-5 py-4 relative">
                <div>      
                    {!! Form::label('owner_name', 'Nombre de Propietario', ['class' => 'font-semibold']) !!}
                    @if(isset($listing) && $listing->locked)
                        {!! Form::text('owner_name', null, ['class' =>  $inputs, 'disabled']) !!}
                    @else
                        {!! Form::text('owner_name', null, ['class' =>  $inputs]) !!}
                    @endif
                </div>
                <div>
                    {!! Form::label('identification', 'Cédula de Identidad', ['class' => 'font-semibold']) !!}
                    @if(isset($listing) && $listing->locked)
                    {!! Form::text('identification', null, ['class' => $inputs, 'disabled']) !!}
                    @elseif(Auth::user()->email == "developer2@casacredito.com")
                    {!! Form::text('identification', null, ['class' => $inputs, 'minlength' => 10, 'maxlength' => 10, 'pattern' => '[0-9]+']) !!}
                    @else
                    {!! Form::text('identification', null, ['class' => $inputs, 'minlength' => 10, 'maxlength' => 10, 'pattern' => '[0-9]+']) !!}
                    @endif
                </div>
                <div>
                    {!! Form::label('phone_number', 'Teléfono/Celular', ['class' => 'font-semibold']) !!}
                    @if(isset($listing) && $listing->locked)
                    {!! Form::text('phone_number', null, ['class' => $inputs, 'disabled']) !!}
                    @elseif(Auth::user()->email == "developer2@casacredito.com")
                    {!! Form::text('phone_number', null, ['class' => $inputs, 'minlength' => 7, 'maxlength' => 10, 'pattern' => '[0-9]+']) !!}
                    @else
                    {!! Form::text('phone_number', null, ['class' => $inputs, 'minlength' => 7, 'maxlength' => 10, 'pattern' => '[0-9]+']) !!}
                    @endif
                </div>
                <div>
                    {!! Form::label('owner_email', 'Email del Propietario', ['class' => 'font-semibold']) !!}
                    @if(isset($listing) && $listing->locked)
                    {!! Form::email('owner_email', null, ['class' => $inputs, 'disabled']) !!}
                    @elseif(Auth::user()->email == "developer2@casacredito.com")
                    {!! Form::email('owner_email', null, ['class' => $inputs]) !!}
                    @else
                    {!! Form::email('owner_email', null, ['class' => $inputs]) !!}
                    @endif
                </div>
                <div>
                    {!! Form::label('owner_address', 'Dirección', ['class' => 'font-semibold']) !!}
                    @if(isset($listing) && $listing->locked)
                    {!! Form::text('owner_address', null, ['class' => $inputs, 'disabled']) !!}
                    @elseif(Auth::user()->email == "developer2@casacredito.com")
                    {!! Form::text('owner_address', null, ['class' => $inputs]) !!}
                    @else
                    {!! Form::text('owner_address', null, ['class' => $inputs]) !!}
                    @endif
                </div>
                <p class="bg-red-600 text-white w-64 font-semibold absolute text-center ml-3" style="margin-top: -13px; letter-spacing: 1px">DATOS DEL PROPIETARIO</p>
            </div>
    
            <div class="relative border px-5 py-4 mt-10">
                <div class="gap-4 mt-4 sm:gap-6">
                        {!! Form::label('listing_title', 'Titulo de Propiedad', ['class' => 'font-semibold']) !!}
                        {!! Form::text('listing_title', null, ['class' => $inputs, 'pattern' => '.{50,60}', 'onkeyup' => 'countCharsTitle(this);', 'placeholder' => 'Ej: Casa en Venta en Cuenca - Sector...']) !!}
                    <div id="div_info_character" style="background-color: @if(isset($listing) &&  Str::length($listing->listing_title) >= 50 && Str::length($listing->listing_title) <=60) #9AE6B4 @else #FEB2B2 @endif" class="flex p-1 mt-2">
                        <label style="font-weight: 400">
                            Actual <b id="label_count_title"></b> caracteres. (Mínimo 50 - Máximo 60 caracteres)
                        </label>
                    </div>
                    @if(isset($listing->id) && Auth::id()==123)
                        <a href="{{route('admin.reslug',$listing->id)}}" target="_blank">{{$listing->slug}}</a>            
                    @endif
                </div>
                <div class="gap-4 mt-4 sm:gap-6">
                    {!! Form::label('listing_description', 'Descripción de la propiedad', ['class' => 'font-semibold']) !!}
                    {!! Form::textarea('listing_description', 
                    isset($listing->listing_description) && $listing->listing_description!=null ? $listing->listing_description : '',
                    ['class' => $inputs,'rows' => '3', 'placeholder' => 'Ej: Casa de Venta en Sector ... en Cuenca. Consta de X metros de construcción, X habitaciones, X baños...']) !!}
                </div>
                <div class="grid grid-cols-3 gap-4 mt-4 sm:gap-6">
                    <div>          
                        {!! Form::label('state', 'Provincia', ['class' => 'font-semibold']) !!}
                        {!! Form::select('state',[''=>'Selecione']+$states->pluck('name','name')->toArray(), null, ['id'=>'state','class' => $inputs ], $optAttrib ) !!}
                    </div>
                    <div>          
                        {!! Form::label('city', 'Ciudad', ['class' => 'font-semibold']) !!}
                        {!! Form::select('city', isset($cities) ? $cities->pluck('name','name')->toArray() : [''=>'Selecione'] , null, ['id'=>'city','class' => $inputs ]) !!}
                    </div>
                    <div>
                        {!! Form::label('address', 'Sector (Ej: Ricaurte) ', ['class' => 'font-semibold']) !!}
                        {!! Form::text('address', null, ['class' => $inputs]) !!}
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6 sm:grid-cols-4">
                    <div>          
                        {!! Form::label('construction_area', 'Construcción', ['class' => 'font-semibold']) !!}
                            {!! Form::text('construction_area', null, ['class' => $inputs]) !!}
                    </div>
                    <div>          
                        {!! Form::label('land_area', 'Superficie', ['class' => 'font-semibold']) !!}
                            {!! Form::text('land_area', null, ['class' => $inputs]) !!}
                    </div>
                    <div>          
                        {!! Form::label('Front', 'Frente', ['class' => 'font-semibold']) !!}
                        {!! Form::text('Front', null, ['class' => $inputs]) !!}
                    </div>
        
                    <div>          
                        {!! Form::label('Fund', 'Fondo', ['class' => 'font-semibold']) !!}
                        {!! Form::text('Fund', null, ['class' => $inputs]) !!}
                    </div>
                </div>
                <div class="grid grid-cols-1 bg-gray-200 mt-3 p-3 rounded text-sm">
                    <p>
                        En caso que el tipo de propiedad no cuente con metros de construcción, superficie, frente o fondo, completar el campo con un <b>0</b>
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6">
                    <div>
                        {!! Form::label('property_price', 'Precio Max', ['class' => 'font-semibold']) !!}
                        @if(isset($listing) && $listing->property_price != null && $listing->property_price > 0 && Auth::user()->role != "administrator")
                            {!! Form::text('property_price', null, ['class' => $inputs, 'disabled']) !!}
                        @else
                            {!! Form::text('property_price', null, ['class' => $inputs]) !!}
                        @endif
                    </div>
                    <div>
                        {!! Form::label('property_price_min', 'Precio Min', ['class' => 'font-semibold']) !!}
                        @if(isset($listing) && $listing->property_price_min != null && $listing->property_price_min > 0 && Auth::user()->role != "administrator")
                        {!! Form::text('property_price_min', null, ['class' => $inputs, 'disabled']) !!}
                        @else
                        {!! Form::text('property_price_min', null, ['class' => $inputs]) !!}
                        @endif
                    </div>
                </div>
                
                <div id="divcomment" class="grid grid-cols-1 mt-4" style="display: none">
                    {!! Form::label('comment', 'Comentario', ['class' => 'font-semibold']) !!}
                    {!! Form::textarea('comment', null, ['class' => $inputs, 'rows' => 2, 'placeholder' => 'Ingrese el motivo por el cual cambio el precio']) !!}
                </div>
    
                <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6">
                    <div>          
                        {!! Form::label('lat', 'Latitud', ['class' => 'font-semibold']) !!}
                        @if(Auth::user()->email == "developer2@casacredito.com")
                            {!! Form::text('lat', null, ['class' => $inputs]) !!}
                        @else
                            {!! Form::text('lat', null, ['class' => $inputs]) !!}
                        @endif
                    </div>
                    <div>          
                        {!! Form::label('lng', 'Longitud', ['class' => 'font-semibold']) !!}
                        @if(Auth::user()->email == "developer2@casacredito.com")
                            {!! Form::text('lng', null, ['class' => $inputs]) !!}
                        @else
                            {!! Form::text('lng', null, ['class' => $inputs]) !!}
                        @endif
                    </div>
                </div>
        
    
                <div class="grid grid-cols-1 mt-4">
                    {!! Form::label('cadastral_key', 'Clave Catastral', ['class' => 'font-semibold']) !!}
                    {!! Form::text('cadastral_key', null, ['class' => $inputs]) !!}
                </div>
    
                <p class="bg-red-600 text-white w-64 font-semibold absolute text-center top-0" style="margin-top: -13px; letter-spacing: 1px">DATOS DEL INMUEBLE</p>
            </div>
    
            <div class="relative border px-5 py-4 mt-10">
                <div class="grid grid-cols-3 gap-4">
                    <div> 
                        {!! Form::label('listingtype', 'Categoría', ['class' => 'font-semibold']) !!}
                        {!! Form::select('listingtype',$types->pluck('type_title','id'),    null,    ['class' => $inputs]) !!}
                    </div>
                    <div>     
                        {!! Form::label('listingtypestatus', 'Tipo', ['class' => 'font-semibold']) !!}
                        {!! Form::select('listingtypestatus',$categories->pluck('status_title','slug'),    null,    ['class' => $inputs]) !!}
                    </div>
                    <div>  
                        {!! Form::label('listingtagstatus', 'Etiqueta', ['class' => 'font-semibold']) !!}
                        {!! Form::select('listingtagstatus',$tags->pluck('tags_title','id'),    null,    ['class' => $inputs]) !!}
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 mt-4 sm:gap-6">
                    <div>
                        {!! Form::label('listyears', 'Antiguedad', ['class' => 'font-semibold']) !!}
                        {!! Form::number('listyears',null, ['class' => $inputs]) !!}
                    </div>
                    <div>
                        {!! Form::label('aliquot', 'Condominio/Alicuota', ['class' => 'font-semibold']) !!}
                        {!! Form::text('aliquot', null, ['class' => $inputs]) !!}
                    </div>
                </div>
                <div class="grid grid-cols-1 mt-4">
                    {!! Form::label('observations_type_property', 'Observaciones', ['class' => 'font-semibold']) !!}
                    {!! Form::textarea('observations_type_property', null, ['class' => $inputs, 'rows' => 4]) !!}
                </div>
                <p class="bg-red-600 text-white w-64 font-semibold absolute text-center top-0" style="margin-top: -13px; letter-spacing: 1px">TIPO DE INMUEBLE</p>
            </div>
    
            <div class="border relative px-5 py-4 mt-10">
                <div id="rowsTitles">
                    @if(isset($listing) && is_array(json_decode($listing->heading_details)))
                    @php $ii=-1; @endphp
                        @foreach(json_decode($listing->heading_details) as $dets)
                            @php $ii++; @endphp 
                            <div class="gap-4 mt-4 sm:gap-6">
                                <label class="font-semibold">Titulo</label>
                                <div class="flex flex-row mt-2">
                                    <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details{{$ii}}[]" type="text" value="{{$dets[0]}}"/>
                                </div>            
                            @php unset($dets[0]); $printControl=0; @endphp
                            <div class="font-semibold ml-4 mt-4">Detalles</div>
                                @foreach($dets as $det)
                                    @if($printControl==0)
                                    @php $printControl=1; @endphp                
                                        <div class="flex flex-row mt-2 ml-4">
                                            {!! Form::select('details'.$ii.'[]',$details->pluck('charac_titile','id'), $det   ,    ['class' => 'w-44 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l']) !!}
                                    @else                
                                    @php $printControl=0; @endphp
                                            <input  class="w-24 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300" type="number" name="details{{$ii}}[]" pattern="[0-9]+" onkeydown="return false" value="{{!is_numeric($det)?1:$det}}"/>
                                            <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowDetail(this)">X</button>
                                        </div>
                                    @endif
                                @endforeach
                                <button type="button" class="px-4 py-2 ml-4 mt-4 text-xl leading-5 text-black bg-green-300 rounded" onclick="addRowDetail(this,{{$ii}})">Agregar Detalle</button>
                            </div>    
                        @endforeach
                        </div>
                    @else
                        <div class="gap-4 mt-4 sm:gap-6">
                            <label class="font-semibold">Titulo</label>
                            <div class="flex flex-row mt-2">
                                <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details0[]" type="text"/>
                                <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowTitle(this)">X</button>
                            </div>
                            <div class="font-semibold ml-4 mt-4">Detalles</div>
                            <div class="flex flex-row mt-2 ml-4">
                                <select class="w-44 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details0[]">
                                    @foreach ($details as $detail)
                                        <option value="{{$detail->id}}">{{$detail->charac_titile}}</option>
                                    @endforeach
                                </select>
                                <input  class="w-24 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300" type="number" name="details0[]" pattern="[0-9]+" onkeydown="return false" value="1"/>
                                <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowDetail(this)">X</button>
                            </div>
                            <button type="button" class="px-4 py-2 ml-4 mt-4 text-xl leading-5 text-black bg-green-300 rounded" onclick="addRowDetail(this,0)">Agregar Detalle</button>
                        </div>
                    </div>
                    @endif
                    <button type="button" class="px-4 py-2 mt-4 text-xl leading-5 text-black bg-blue-300 rounded" onclick="addRowTitles()">Agregar Titulo</button>
                    <p class="bg-red-600 text-white w-64 font-semibold absolute text-center top-0" style="margin-top: -13px; letter-spacing: 1px">DETALLES DEL INMUEBLE</p>
            </div>
        </div>

        <div id="second" style="display: none" class="fragment2">
            <div class="border relative px-5 py-4 mt-10">
                <div class="gap-4 mt-4 sm:gap-6">
                    <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3  @if(isset($listing) && $listing->listinglistservices == null) border-red-500 @else border-gray-300 @endif rounded-md px-4 py-2">
                        @foreach ($services as $serv)
                                <label class="inline-flex items-center mt-3">  
                                    {!! Form::checkbox("checkServ[]", $serv->id, 
                                    isset($listing->listinglistservices) && in_array($serv->id,explode(",", $listing->listinglistservices)) ? true : false,
                                    ['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"checkServ$serv->id"]) !!}
                                    <span class="ml-2 text-gray-700">{{$serv->charac_titile}}</span>
                                </label>
                        @endforeach
                    </div>    
                </div>
                <p class="bg-red-600 text-white w-64 font-semibold absolute text-center top-0" style="margin-top: -13px; letter-spacing: 1px">SERVICIOS</p>
            </div>
    
            <div class="border relative px-5 py-4 mt-10">
                <div class="gap-4 mt-4 sm:gap-6">
                    <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3 border-gray-300 rounded-md px-4 py-2">
                        @foreach ($general_characteristics as $general_characteristic)
                                <label class="inline-flex items-center mt-3">  
                                    {!! Form::checkbox("checkgc[]", $general_characteristic->id, isset($listing->listinggeneralcharacteristics) && in_array($general_characteristic->id,explode(",", $listing->listinggeneralcharacteristics)) ? true : false,['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"checkgc$general_characteristic->id"]) !!}
                                    <span class="ml-2 text-gray-700">{{$general_characteristic->title}}</span>
                                </label>
                        @endforeach
                    </div>    
                </div>
                <p class="bg-red-600 text-white w-64 font-semibold absolute text-center top-0" style="margin-top: -13px; letter-spacing: 1px">CARACTERISTICAS GENERALES</p>
            </div>
    
            <div class="border relative px-5 py-4 mt-10">
                <div class="gap-4 mt-4 sm:gap-6">
                    <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3 border-gray-300 rounded-md px-4 py-2">
                        @foreach ($environments as $envir)
                                <label class="inline-flex items-center mt-3">  
                                    {!! Form::checkbox("checkEnvir[]", $envir->id, isset($listing->listingenvironments) && in_array($envir->id,explode(",", $listing->listingenvironments)) ? true : false,['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"checkEnvir$envir->id"]) !!}
                                    <span class="ml-2 text-gray-700">{{$envir->title}}</span>
                                </label>
                        @endforeach
                    </div>    
                </div>
                <p class="bg-red-600 text-white w-64 font-semibold absolute text-center top-0" style="margin-top: -13px; letter-spacing: 1px">AMBIENTES</p>
            </div>
    
            <div class="gap-4 mt-4 sm:gap-6 border relative px-5 py-4 mt-10 shadow-md">
                {{-- <h4 class="font-semibold">Beneficios</h4>    --}}
                <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3 px-4 py-2">
                    @foreach ($benefits as $bene)            
                            <label class="inline-flex items-center mt-3">  
                                {!! Form::checkbox("checkBene[]", $bene->id, 
                                isset($listing->listingcharacteristic) && in_array($bene->id,explode(",", $listing->listingcharacteristic)) ? true : false,
                                ['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"checkBene$bene->id"]) !!}
                                <span class="ml-2 text-gray-700">{{$bene->charac_titile}}</span>
                            </label>
                    @endforeach
                </div>    
                <p class="bg-red-600 text-white w-64 font-semibold absolute text-center top-0 shadow-lg" style="margin-top: -13px; letter-spacing: 1px">BENEFICIOS</p>
            </div>
        </div>

        <div id="third" style="display: none" class="fragment3">
            <div class="gap-4 mt-4 sm:gap-6 border relative px-5 py-4 mt-10 shadow-md">
                <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3 px-4 py-2">
                    <div>
                        <div>
                            <label class="inline-flex items-center mt-3">  
                                <span class="ml-2 text-gray-700 mr-2">Error de Cavida</span>
                                {!! Form::checkbox("cavity_error", null, 
                                isset($listing->cavity_error) && $listing->cavity_error ? true : false,
                                ['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"check_cavity_error"]) !!}
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center mt-3">  
                                <span class="ml-2 text-gray-700 mr-2">VIP</span>
                                {!! Form::checkbox("vip", null, 
                                isset($listing->vip) && $listing->vip ? true : false,
                                ['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox']) !!}
                            </label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label class="inline-flex items-center mt-3">  
                                <span class="ml-2 text-gray-700 mr-2">Hipoteca</span>
                                {!! Form::checkbox("mortgaged", null, 
                                isset($listing->mortgaged) && $listing->mortgaged ? true : false,
                                ['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"check_mortgage"]) !!}
                            </label>
                        </div>
                        <div>
                            {!! Form::text('mount_mortgaged', null, ['class' => $inputs, 'placeholder' => 'Monto $']) !!}
                        </div>
                    </div>
                    <div>
                        <div>
                            {!! Form::text('entity_mortgaged', null, ['class' => $inputs, 'placeholder' => 'Banco']) !!}
                        </div>
                        <div>
                            {!! Form::text('warranty', null, ['class' => $inputs, 'placeholder' => 'Garante']) !!}
                        </div>
                    </div>
                </div>   
                <div id="divlicenciaurbanistica" class="grid grid-cols-1 @if(isset($listing) && $listing->listingtype == 26) block @else hidden @endif">
                    <div class="flex content-center border p-4">
                        <div>
                            <i class="fas fa-map text-red-600"></i> {!! Form::label('planing_license', '¿El terreno posee licencia urbanística?', ['class' => 'font-semibold mr-4']) !!}
                        </div>
                        <div class="form-check form-check-inline">
                            {!! Form::radio('planing_license', '1', null, ['class' => 'form-check-input']) !!}
                            {!! Form::label('inlineRadio1', 'SI', ['class' => 'form-check-label']) !!}
                        </div>
                        <div class="form-check form-check-inline ml-5">
                            {!! Form::radio('planing_license', '0', null, ['class' => 'form-check-input']) !!}
                            {!! Form::label('inlineRadio2', 'NO', ['class' => 'form-check-label']) !!}
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mt-3">
                        {!! Form::label('aval', 'Avaluo de la propiedad', ['class' => 'font-semibold']) !!}
                        {!! Form::number('aval', null, ['class' => $inputs, 'placeholder' => 'Ej: 100000']) !!}
                        <div class="text-xs bg-gray-100 mt-2 p-1 rounded">
                            <i class="fa-solid fa-circle-info"></i> Si necesita obtener el avaluo de la propiedad, puede ingresar al <a target="_blank" class="text-blue-500" href="https://enlinea.cuenca.gob.ec/#/informe-predial">siguiente enlace</a> y consultar por el número de cédula.
                        </div>
                    </div>
                </div> 
                <p class="bg-red-600 text-white w-64 font-semibold absolute text-center top-0 shadow-lg" style="margin-top: -13px; letter-spacing: 1px">DATOS ADICIONALES</p>
            </div>
        </div>


        {{-- <div class="gap-4 mt-4 sm:gap-6">
            <div class="flex">
                {!! Form::label('meta_description', 'Meta Descripcion en Google', ['class' => 'font-semibold']) !!} <div onmouseover="openHelpDescription();" onmouseout="openHelpDescription();" class="pr-1 rounded ml-1" style="padding-left: 3px; cursor: pointer; background-color: #e8eeec">?</div>
            </div>
            <div id="div_help_desc" style="display: none;" class="relative">
                <div class="absolute p-1 rounded" style="font-size: 14px; font-weight: 400; background-color: #e8eeec">La metadescription ayuda a que la publicación sea óptima para Google. La primera letra debe ser en mayúscula y las demás en minúsculas. Es recomendable poner al inicio las mismas palabras del titulo. Ej: Departamento de venta en Sector, Ciudad, Provincia...</div>
            </div>
            {!! Form::text('meta_description', null, ['class' => $inputs, 'pattern' => '.{130,160}', 'onkeyup' => 'countCharsDesc(this);', 'required']) !!}
            <div id="div_info_character_desc" style="background-color: @if(isset($listing) &&  Str::length($listing->meta_description) >= 130 && Str::length($listing->meta_description) <= 160) #9AE6B4 @else #FEB2B2 @endif" class="flex p-1 mt-2 rounded">
                <label style="font-weight: 400">
                    Actual <b id="label_count_desc"></b> caracteres. (Mínimo 130 - Máximo 160 caracteres)
                </label>
            </div>
        </div> --}}

        {{-- @if(Auth::user()->id == 15 || Auth::user()->id == 147)
            <div class="gap-4 mt-4 sm:gap-6">
                {!! Form::label('keywords', 'Keywords', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::textarea('keywords', null, ['class' => $inputs, 'rows' => '3', 'disabled']) !!}
                @else
                {!! Form::textarea('keywords', null, ['class' => $inputs, 'rows' => '3']) !!}
                @endif
            </div>
        @endif

        @isset($listing)
        <div class="gap-4 mt-4 sm:gap-6 bg-gray-200 border rounded px-4 py-2">
            <div class="text-gray-700 text-xs">Vista Previa en Buscador Google</div>
            <div class="font-semibold text-blue-800">{{$listing->listing_title}}</div>
            <div>{{$listing->meta_description}}</div>
        </div>
        @endisset --}}

        {{-- nuevo div para guardar los años de construccion --}}
        {{-- <div class="grid grid-cols-3 gap-4 mt-4"> --}}
            {{-- <div>
                {!! Form::label('listyears', 'Años de construcción', ['class' => 'font-semibold']) !!} <br>
                <span id="rangeValue">Entre 0 a 5 años</span><br>
                {!! Form::range('listyears', null,  ['class' => 'form-range', 'min' => '0', 'max' => '4', 'step' => '1', 'onchange' => 'rangeSlide(this.value)', 'onmousemove' => 'rangeSlide(this.value)']) !!}       
            </div> --}}
            {{-- <div>
                {!! Form::label('credit', '¿Aplica Crédito VIP?', ['class' => 'font-semibold']) !!}
                <div class="flex">
                    <div class="form-check form-check-inline">
                        {!! Form::radio('credit_vip', '1', null, ['class' => 'form-check-input']) !!}
                        {!! Form::label('inlineRadio1', 'SI', ['class' => 'form-check-label']) !!}
                    </div>
                    <div class="form-check form-check-inline ml-5">
                        {!! Form::radio('credit_vip', '0', null, ['class' => 'form-check-input']) !!}
                        {!! Form::label('inlineRadio2', 'NO', ['class' => 'form-check-label']) !!}
                    </div>
                </div>
            </div> --}}
        {{-- </div> --}}
        {{-- termina div --}}

        {{-- <div class="grid grid-cols-1 gap-4 mt-4 sm:gap-6 border">
            <div class="flex content-center px-4 pt-4 pb-4">
                <div>
                    <i class="fas fa-money-check-alt"></i> {!! Form::label('mortgaged', '¿El bien inmueble se encuentra hipotecado?', ['class' => 'font-semibold mr-4']) !!}
                </div>
                <div class="form-check form-check-inline">
                    {!! Form::radio('mortgaged', '1', null, ['class' => 'form-check-input', 'onclick' => 'showinfoentitymortgaged(this)']) !!}
                    {!! Form::label('inlineRadiomortgaged', 'SI', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check form-check-inline ml-5">
                    {!! Form::radio('mortgaged', '0', null, ['class' => 'form-check-input', 'onclick' => 'showinfoentitymortgaged(this)']) !!}
                    {!! Form::label('inlineRadiomortgaged', 'NO', ['class' => 'form-check-label']) !!}
                </div>
            </div>
            <div class="px-4 flex w-full mb-3 @if(isset($listing->mortgaged) && $listing->mortgaged == 1) block @else hidden @endif" id="divinfoentitymortgaged">
                <div class="form-group w-full mr-1">
                    <i class="fas fa-building"></i>{!! Form::label('entity_mortgaged', 'Entidad con la que tiene la hipoteca', ['class' => 'font-semibold ml-1 w-full']) !!}
                    {!! Form::text('entity_mortgaged', null, ['class' => $inputs]) !!}
                </div>
                <div class="form-group w-full ml-1">
                    <i class="fas fa-file-invoice-dollar"></i> {!! Form::label('mount_mortgaged', 'Monto de la hipoteca', ['class' => 'font-semibold ml-1 w-full']) !!}
                    {!! Form::text('mount_mortgaged', null, ['class' => $inputs]) !!}
                </div>
            </div>
        </div> --}}

        <div id="fourth" style="display: none" class="fragment4">
            <div class="gap-4 mt-4 sm:gap-6">
                <label class="font-semibold">Galeria de Imagenes</label>
                <div>
                    {{-- @if(isset($listing) && $listing->locked)
                    <input type="file" class="px-4 py-2 border border-gray-300 rounded-md" name="galleryImages[]" id="galleryImages" accept=".jpg, .jpeg, .png" multiple onchange="changetxtgallery(this)" disabled>
                    @elseif(isset($listing))
                    <input type="file" class="px-4 py-2 border border-gray-300 rounded-md" name="galleryImages[]" id="galleryImages" accept=".jpg, .jpeg, .png" multiple onchange="changetxtgallery(this)">
                    @else --}}
                    <input type="file" class="px-4 py-2 border border-gray-300 rounded-md" name="galleryImages[]" id="galleryImages" accept=".jpg, .jpeg, .png, .mp4" multiple onchange="changetxtgallery(this)">
                    {{-- @endif --}}
                </div>      
                <ul id="gridImages" class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-4 px-4 py-2 border @if(isset($listing) && $listing->images == null) border-red-500 @else border-gray-300 @endif rounded-md">
                    @isset($listing)
                        @php $ii=0; @endphp
                        @foreach(array_filter(explode("|", $listing->images)) as $img)
                            @php $ii++; $imageVerification = asset('uploads/listing/thumb/300/'.$img); @endphp
                            <li class="relative"  id="imageUpload{{$ii}}"> 
                                {{-- @if(isset($listing) && $listing->locked)
                                <button type="button" onclick="delImageUpload({{$ii}})" class="absolute right-0 px-2 rounded bg-red-800 text-white font-bold" disabled>X</button>
                                @else --}}
                                <button type="button" onclick="delImageUpload({{$ii}})" class="absolute right-0 px-2 rounded bg-red-800 text-white font-bold">X</button>
                                {{-- @endif --}}
                                <img class="rounded" src="@if(@getimagesize($imageVerification)){{url('uploads/listing/thumb/300', $img)}} @else {{url('uploads/listing/300',$img)}} @endif">
                                <input type="hidden" value="{{$img}}" name="updatedImages[]">
                            </li>
                        @endforeach
                    @endisset
                </ul>
                @if(isset($listing) && $listing->video)
                    <div id="gridVideo" class="border border-gray-300 rounded-md mt-4 relative">
                        <p class="absolute bg-red-800 text-white px-3 rounded-full" style="top:-10px; left: 15px">Videos</p>
                        <ul class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-3 px-4 py-2">
                            <li class="relative"> 
                                <button type="button" style="z-index: 3" onclick="delVideoUpload('gridVideo')" class="absolute right-0 px-2 rounded bg-red-800 text-white font-bold">X</button>
                                <video class="rounded" src="{{asset('uploads/video/'.$listing->video)}}" autoplay muted loop controls></video>
                                <input type="hidden" value="{{$listing->video}}" name="updatedVideo[]">
                            </li>
                        </ul>
                    </div>
                @endif
            </div>          
        </div>
        
        {{-- @endif --}}

        <hr class="mt-4">
        <div class="flex justify-center mt-6">
            {{-- @if(isset($listing) && $listing->locked)
                <button type="submit" class="px-6 py-2 text-xl leading-5 text-white transition-colors duration-200 transform bg-red-700 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600" disabled>GUARDAR</button>
            @else --}}
                <button id="btnSave" type="submit" class="px-6 py-2 text-xl leading-5 text-white transition-colors duration-200 transform bg-red-700 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">GUARDAR</button>
                @if(Route::current()->getName() == "admin.listings.edit" || Route::current()->getName() == "home.tw.edit")
                <button onclick="saveandclose()" class="px-6 py-2 ml-3 text-xl leading-5 text-white bg-green-500 transition-colors duration-200 transform rounded  focus:outline-none">GUARDAR Y SALIR</button>
                @endif
            {{-- @endif --}}
                {{-- <button type="submit" class="px-6 py-2 text-xl leading-5 text-white transition-colors duration-200 transform bg-red-700 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">GUARDAR</button> --}}
        </div>
    </form>

    @isset($listing)
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>
        
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50">
    
          <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
              <p class="text-md font-bold" id="txttitlemodal">¿Cuál es la razón por la que se desactiva la propiedad?</p>
              <div class="modal-close cursor-pointer z-50">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
              </div>
            </div>
                <input type="text" class="border p-5 rounded-md w-full" name="comment_desact" id="comment_desact"/>
                <div class="flex justify-center pt-2 mt-2">
                  <button onclick="setcomment({{$listing->id}}, this)" class="px-4 bg-green-300 p-3 rounded-lg text-black-500 hover:bg-green-100 hover:text-black-300 mr-2">Guardar</button>
                </div>
            
          </div>
        </div>
      </div>
      @endisset

      {{-- modal success --}}
      <div class="modalSuccess opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>
        
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50">
    
          <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
              <p class="text-2xl font-bold">El comentario se ha enviado</p>
            </div>
                <p>Ahora puede guardar los cambios realizados para que la propiedad se actualice</p>
                <div class="flex justify-center pt-2 mt-2">
                  <button class="modal-close px-4 bg-green-300 p-3 rounded-lg text-black-500 hover:bg-green-100 hover:text-black-300 mr-2">Entendido</button>
                </div>
            
          </div>
        </div>
      </div>

</section>

</main>
@endsection


@section('endscript')
    <script src="{{asset('js/sortable.min.js')}}"></script>
    @if(Route::current()->getName() == "admin.listings.create")
        <script>
            const save = async() => {
            let dataform = new FormData(document.getElementById('formsave'));
            const response = await fetch("{{route('admin.listings.store')}}",
            { body: dataform, method: 'POST', headers: {"X-CSRF-Token": "{!!csrf_token()!!}"}});
            let mensaje = await response.json();
            if(mensaje.success && mensaje.fragment == "first"){ document.getElementById('first').style.display="none";document.getElementById('second').style.display="block";setfragmentvalue('second');changeclass('second');}
            if(mensaje.success && mensaje.fragment == "second"){ document.getElementById('second').style.display="none";document.getElementById('third').style.display="block";setfragmentvalue('third');changeclass('third');}
            if(mensaje.success && mensaje.fragment == "third"){ document.getElementById('third').style.display="none";document.getElementById('fourth').style.display="block";setfragmentvalue('fourth');changeclass('fourth');}
            if(mensaje.success && mensaje.fragment == "fourth"){window.location.replace("{{route('admin.properties')}}");}
            }
        </script>
    @elseif(Route::current()->getName() == "admin.listings.edit" || Route::current()->getName() == "home.tw.edit")
        <script>
            const save = async() => {
            let dataform = new FormData(document.getElementById('formsave'));
            const response = await fetch("{{route('admin.listings.update', $listing->id)}}",
            { body: dataform, method: 'POST', headers: {"X-CSRF-Token": "{!!csrf_token()!!}"}});
            let mensaje = await response.json();
            console.log('saving...');
            if(mensaje.success && mensaje.fragment == "first"){ document.getElementById('first').style.display="none";document.getElementById('second').style.display="block";setfragmentvalue('second');changeclass('second');}
            if(mensaje.success && mensaje.fragment == "second"){ document.getElementById('second').style.display="none";document.getElementById('third').style.display="block";setfragmentvalue('third');changeclass('third');}
            if(mensaje.success && mensaje.fragment == "third"){ document.getElementById('third').style.display="none";document.getElementById('fourth').style.display="block";setfragmentvalue('fourth');changeclass('fourth');}
            if(mensaje.success && mensaje.fragment == "fourth"){window.location.replace("{{route('admin.properties')}}");}
            }
        </script>
    @endif

    <script>

        let form = document.getElementById('formsave');

        // obteniendo el valor del title para mandar a la funcion countChar
        var div_info_character = document.getElementById('div_info_character');
        var div_info_character_desc = document.getElementById('div_info_character_desc');
        var input_listing_title = document.querySelector("input[name='listing_title']");
        var input_meta_description = document.querySelector("input[name='meta_description']"); 
        var label_count_title = document.getElementById('label_count_title');
        var label_count_desc = document.getElementById('label_count_desc');
        
        let selstatus = document.querySelector("select[name='status']");
        if(selstatus) selstatus = selstatus.value; 
        let selavailable = document.querySelector("select[name='available']");
        if(selavailable) selavailable = selavailable.value;

        let selectlistingtype = document.querySelector("select[name='listingtype']");
        selectlistingtype.addEventListener('change', function(){
            let divlicenciaurbanistica = document.getElementById('divlicenciaurbanistica');
            if(selectlistingtype.value == 26){
                document.getElementById("planing_license").required = true;
                divlicenciaurbanistica.classList.remove('hidden');
                divlicenciaurbanistica.classList.add('block');
            } else {
                document.getElementById("planing_license").required = false;
                divlicenciaurbanistica.classList.remove('block');
                divlicenciaurbanistica.classList.add('hidden');
            }   
        });

        //let valueStatus;

        // if(window.location.toString().includes("edit")) {
        //     if(selstatus){
        //         selstatus.addEventListener('change', showDivStatusComment);
        //         valueStatus = document.querySelector("select[name='status']").value;
        //     }
        // }

        //funcion para abrir el modal si el valor del status al inicio es activado y cambia de estado a desactivado
        // function showDivStatusComment(){
        //     if(selstatus.value == 0 && valueStatus == 1){
        //         toggleModal();
        //     }
        // }

        let ischangestatus = false;
        let ischangeplan = false;
        let ischangeavailable = false;

        let btnSave = document.getElementById('btnSave');
        if(btnSave){
            btnSave.addEventListener("click", function(event){
                event.preventDefault();
                let valueStatus = document.querySelector("select[name='status']");
                let valuePlan = document.querySelector("select[name='listing_type']").value;
                let valueAvailable = document.querySelector("select[name='available']").value;
                if(valueStatus) {
                    valueStatus = valueStatus.value;
                    if(selstatus == 1 && valueStatus == 0){
                        ischangestatus = true;
                        event.preventDefault();
                        toggleModal("status");
                    } else if(valuePlan == 1 && selstatus == 0 && valueStatus == 1){
                        ischangeplan = true;
                        event.preventDefault();
                        toggleModal('plan');
                    } else if(valueAvailable == 2 && selavailable == 1) {
                        ischangeavailable = true;
                        event.preventDefault();
                        toggleModal('available');
                    }
                }
                removeelement();
                save();
            });
        }

        // const form = document.getElementById('formsave');

        // ✅ Get all form elements

        if("{{Route::current()->getName()}}" == "admin.listings.create"){
            const formElements = Array.from(form.elements);

            formElements.forEach(element => {
                if(element.name != "_token"){
                    element.addEventListener("focus", () => {
                        savelisting();
                    });
                }
            });
        }

        // let inputowner = document.querySelector("input[name='owner_name']");
        // inputowner.addEventListener("keypress", (event) => {
        //     savelisting();
        // });

        const savelisting = async() => {
            let dataform = new FormData(document.getElementById('formsave'));
            const response = await fetch("{{route('admin.listings.store')}}",
            { body: dataform, method: 'POST', headers: {"X-CSRF-Token": "{!!csrf_token()!!}"}});
            let mensaje = await response.text();
            console.log('saving...');
        }

        function setcomment(listing_id, button){
            let comment = document.getElementById("comment_desact");
            let form = document.getElementById('formsave');
            let value = ""; let type = "";
            if(ischangestatus){value = document.querySelector("select[name='status']").value;type="status";}
            if(ischangeplan){value = document.querySelector("select[name='listing_type']").value;type="plan";}
            if(ischangeavailable){value = document.querySelector("select[name='available']").value;type="available"}
            if(comment.value.length > 4){

                let icon = document.createElement('i');
                icon.classList.add('fa', 'fa-spinner', 'fa-spin', 'ml-2');
                button.classList.add('buttonload');
                button.appendChild(icon);
                
                if(ischangeavailable && value == 2 && selstatus == 1){
                    alert('La propiedad pasará a estar DESACTIVADA debido a que ya NO ESTA DISPONIBLE');
                    document.querySelector("select[name='status']").value = 0;
                }

                $.ajax({
                    url: "{{route('home.tw.setcomment')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "listing_id": listing_id,
                        "type": type,
                        "value": value,
                        "comment" : comment.value
                    },
                    dataType: "json",
                    success: function(response){
                    if(response){
                        icon.classList.remove('fa', 'fa-spinner', 'fa-spin');
                        toggleModal();
                        form.submit();
                        //toggleModalSuccess();
                    } else {
                        alert('Algo salio mal guardando el comentario, por favor recargue la pagina');
                    }
                },
                    error: function(error){
                        console.log('Hubo un error con el servidor, por favor recargue la pagina');
                    }
                });
            } else {
                alert('Por favor complete el campo');
            }
        }

        window.addEventListener('load', (event) => {
            var range =  document.getElementById('listyears').value;
            //rangeSlide(range);
            //document.getElementById('charcount').innerHTML = document.getElementById('metadescription').value.length;
            if(input_listing_title.value.length > 0) label_count_title.innerHTML = input_listing_title.value.length;
            else label_count_title.innerHTML = "0";

            // if(input_meta_description.value.length > 0) label_count_desc.innerHTML = input_meta_description.value.length;
            // else label_count_desc.innerHTML = "0";

            // if('{{isset($listing->id)}}') document.getElementById("mortgaged").required = false;
            // else document.getElementById("mortgaged").required = true;
        });

        function countCharsTitle(object){
            if(object.value.length >= 50 && object.value.length <=60){
                div_info_character.style.backgroundColor = "#9AE6B4";
            } else {
                div_info_character.style.backgroundColor = "#FEB2B2";
            }
            label_count_title.innerHTML = object.value.length;
        }

        function countCharsDesc(object){
            if(object.value.length >= 130 && object.value.length <= 160){
                div_info_character_desc.style.backgroundColor = "#9AE6B4";
            } else {
                div_info_character_desc.style.backgroundColor = "#FEB2B2";
            }
            label_count_desc.innerHTML = object.value.length;
        }

        //mostrando input de comentario si el precio cambia de valor
        let input_price = document.querySelector("[name='property_price']");
        let price = input_price.value;
        input_price.addEventListener('change', () => {
            let divcomment = document.getElementById('divcomment');
            let newprice = input_price.value;
            if(price != "" && price != newprice){
                divcomment.style.display = "block";
                document.querySelector("[name='comment']").required = true;
            } else {
                divcomment.style.display = "none";
                document.querySelector("[name='comment']").required = false;
            }
        });

        //alert(document.querySelector("[name='property_price']").value);
        //alert(document.querySelector("[name='property_price_min']").value);

        // function getLength(input){
        //     document.getElementById('charcount').innerHTML = input.value.length;
        // }

        const gridImages = document.getElementById('gridImages');
        new Sortable(gridImages, {
            swapThreshold: 1,
            animation: 150
        });
        const selState = document.getElementById('state');
        const selCities= document.getElementById('city');
        
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

        const selOptionsDetails = @json($details);
        
    const addRowTitles = () => {
        let idUniq  = new Date().valueOf();
        let InsertOptions ='';
        selOptionsDetails.forEach(opts =>{        InsertOptions +=`<option value="${opts.id}">${opts.charac_titile}</option>`;    });
        let rowTemplate =`
            <div class="gap-4 mt-4 sm:gap-6">
                <label class="font-semibold">Titulo</label>
                <div class="flex flex-row mt-2">
                    <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" type="text" name="details${idUniq}[]" required/>
                    <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowTitle(this)">X</button>
                </div>
                <div class="font-semibold ml-4 mt-4">Detalles</div>
                <div class="flex flex-row mt-2 ml-4">
                    <select class="w-44 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details${idUniq}[]">${InsertOptions}</select>
                    <input  class="w-24 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300" type="number"  name="details${idUniq}[]" pattern="[0-9]+" onkeydown="return false" value="1"/>
                    <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowDetail(this)">X</button>
                </div>
                <button type="button" class="px-4 py-2 ml-4 mt-4 text-xl leading-5 text-black bg-green-300 rounded" onclick="addRowDetail(this,${idUniq})">Agregar Detalle</button>
            </div>`
        document.getElementById('rowsTitles').insertAdjacentHTML('beforeend',rowTemplate);
    }

    const addRowDetail = (row,id=0) =>{
        let InsertOptions ='';
        selOptionsDetails.forEach(opts =>{ InsertOptions +=`<option value="${opts.id}">${opts.charac_titile}</option>`;    });
        let rowTemplate =   `<div class="flex flex-row mt-2 ml-4">
                                <select class="w-44 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details${id}[]">${InsertOptions}</select>
                                <input  class="w-24 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300" type="number" name="details${id}[]" pattern="[0-9]+" onkeydown="return false" value="1"/>
                                <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowDetail(this)">X</button>
                            </div>`;
        row.insertAdjacentHTML('beforebegin',rowTemplate);
    }
    

    const delrowDetail = (row) =>{
        row.parentElement.remove();
    }

    const delrowTitle = (row) =>{
        row.parentElement.parentElement.remove();
    }
    const delImageUpload = (idDiv) =>{
        document.getElementById('imageUpload'+idDiv).remove();
    }

    const delVideoUpload = (idDiv) => {
        document.getElementById(idDiv).remove();
    }

    // const rangeSlide = (value) => {
    //     let stringyearsconstruction;
    //     switch (value) {
    //         case "0":stringyearsconstruction = "Entre 0 a 5 años";break;
    //         case "1":stringyearsconstruction = "Entre 5 a 10 años";break;
    //         case "2":stringyearsconstruction = "Entre 10 a 15 años";break;
    //         case "3":stringyearsconstruction = "Entre 15 a 20 años";break;
    //         case "4":stringyearsconstruction = "Más de 20 años";break;
    //         default:break;
    //     }
    //     document.getElementById('rangeValue').innerHTML = stringyearsconstruction;
    // }

    const openHelpDescription = () => {
        const div_help_desc = document.getElementById('div_help_desc');
        if(div_help_desc.style.display == "none") div_help_desc.style.display = "block";
        else if(div_help_desc.style.display == "block") div_help_desc.style.display = "none";
    }

    form.addEventListener('submit', (event) => {
        let text = "¿Esta seguro de guardar los cambios?";
        if(confirm(text) == true){return true}
        else {event.preventDefault();}
    });

    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
    x.addEventListener('click', function () {
      x.classList.add('hidden');
    })
  );

//   document.querySelector("select[name='available']").addEventListener('change', () => {
//       console.log('prueba');
//   });

    function requiredFalse(available_value){
        if(available_value == 2){
            let inputs = document.getElementsByTagName('input');
            for (let i = 0; i < inputs.length; i++) {
                const element = inputs[i];
                element.required = false;
                    if(element.pattern != null){
                        element.pattern = ".{0,500}";
                    }
                }
            }
        }

    // let openmodal = document.querySelectorAll('.modal-open')
    // for (let i = 0; i < openmodal.length; i++) {
    //   openmodal[i].addEventListener('click', function(event){
    // 	event.preventDefault()
    // 	toggleModal()
    //   })
    // }
    
    // const overlay = document.querySelector('.modal-overlay')
    // overlay.addEventListener('click', toggleModal)
    
    let closemodal = document.querySelectorAll('.modal-close')
    for (let i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    // document.onkeydown = function(evt) {
    //   evt = evt || window.event
    //   let isEscape = false
    //   if ("key" in evt) {
    // 	isEscape = (evt.key === "Escape" || evt.key === "Esc")
    //   } else {
    // 	isEscape = (evt.keyCode === 27)
    //   }
    //   if (isEscape && document.body.classList.contains('modal-active')) {
    // 	toggleModal()
    //   }
    // };
    
    
    function toggleModal (selectchange) {
        let txttitlemodal = document.getElementById('txttitlemodal');
        switch (selectchange) {
            case "status": txttitlemodal.innerHTML = "Por favor, indique la razón por la cual se desactiva la propiedad"; break;
            case "plan"  : txttitlemodal.innerHTML = "Por favor, indique la razón por la cual se activa la propiedad gratis"; break;
            case "available": txttitlemodal.innerHTML = "Por favor, ingrese la razón por la cual la propiedad ya no está disponible"; break;
            default:
                break;
        }
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }

    function toggleModalSuccess(){
        const body = document.querySelector('body')
        const modal = document.querySelector('.modalSuccess')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }

    // function showinfoentitymortgaged(checkbox){
    //     if(checkbox.value == 1){
    //         document.getElementById('divinfoentitymortgaged').classList.remove('hidden');
    //         document.getElementById('divinfoentitymortgaged').classList.add('block');
    //         document.getElementById('entity_mortgaged').required = true;
    //         document.getElementById('mount_mortgaged').required = true;
    //     } else if(checkbox.value == 0){
    //         document.getElementById('divinfoentitymortgaged').classList.remove('block');
    //         document.getElementById('divinfoentitymortgaged').classList.add('hidden');
    //         document.getElementById('entity_mortgaged').required = false;
    //         document.getElementById('mount_mortgaged').required = false;
    //     } 
    // }

    let sellistingtype = document.querySelector("select[name='listing_type']");
    let divnumfactura = document.getElementById('numfactura');

    sellistingtype.addEventListener('change', () => {
        if(sellistingtype.value == 2){
            divnumfactura.classList.remove('hidden');
            divnumfactura.classList.add('block');
            //document.querySelector("input[name='num_factura']").required = true;
        } else if(sellistingtype.value == 1 || sellistingtype.value == ""){
            divnumfactura.classList.remove('block');
            divnumfactura.classList.add('hidden');
            //document.querySelector("input[name='num_factura']").required = false;
        }
    });

    let first_fragment = document.getElementById('first');
    let second_fragment = document.getElementById('second');
    let third_fragment = document.getElementById('third');
    let fourth_fragment = document.getElementById('fourth');

    let btnfragment1 = document.getElementById('btnfragment1');
    let btnfragment2 = document.getElementById('btnfragment2');
    let btnfragment3 = document.getElementById('btnfragment3');
    let btnfragment4 = document.getElementById('btnfragment4');

    const changefragment = (id) => {
        switch (id) {
            case 'first': first_fragment.style.display='block';second_fragment.style.display='none';third_fragment.style.display='none';fourth_fragment.style.display='none';setfragmentvalue('first');changeclass('first');break;
            case 'second': first_fragment.style.display='none';second_fragment.style.display='block';third_fragment.style.display='none';fourth_fragment.style.display='none';setfragmentvalue('second');changeclass('second');break;
            case 'third': first_fragment.style.display='none';second_fragment.style.display='none';third_fragment.style.display='block';fourth_fragment.style.display='none';setfragmentvalue('third');changeclass('third');break;
            case 'fourth': first_fragment.style.display='none';second_fragment.style.display='none';third_fragment.style.display='none';fourth_fragment.style.display='block';setfragmentvalue('fourth');changeclass('fourth');break;
            default: break;
        }
    }

    const setfragmentvalue = (value) => {
        document.querySelector("input[name='fragment']").value = value;
    }

    const changeclass = (fragment) => {
        switch (fragment) {
            case 'first': btnfragment1.classList.add('bg-red-600', 'text-white', 'px-5');btnfragment2.classList.remove('bg-red-600', 'text-white', 'px-5');btnfragment3.classList.remove('bg-red-600', 'text-white', 'px-5');btnfragment4.classList.remove('bg-red-600', 'text-white', 'px-5');break;
            case 'second': btnfragment1.classList.remove('bg-red-600', 'text-white', 'px-5');btnfragment2.classList.add('bg-red-600', 'text-white', 'px-5');btnfragment3.classList.remove('bg-red-600', 'text-white', 'px-5');btnfragment4.classList.remove('bg-red-600', 'text-white', 'px-5');break;
            case 'third': btnfragment1.classList.remove('bg-red-600', 'text-white', 'px-5');btnfragment2.classList.remove('bg-red-600', 'text-white', 'px-5');btnfragment3.classList.add('bg-red-600', 'text-white', 'px-5');btnfragment4.classList.remove('bg-red-600', 'text-white', 'px-5');break;
            case 'fourth': btnfragment1.classList.remove('bg-red-600', 'text-white', 'px-5');btnfragment2.classList.remove('bg-red-600', 'text-white', 'px-5');btnfragment3.classList.remove('bg-red-600', 'text-white', 'px-5');btnfragment4.classList.add('bg-red-600', 'text-white', 'px-5');break;
            default:break;
        }
    } 

    const saveandclose = () => {
        let input = document.createElement('input');
        input.type = "hidden"; input.name = "edit"; input.value = 1;
        let form = document.getElementById('formsave');
        form.appendChild(input);
        form.submit();
    }

    const removeelement = () => {
        let input = document.querySelector("input[name='edit']");
        if(input) input.remove();
    }
    </script>
@endsection