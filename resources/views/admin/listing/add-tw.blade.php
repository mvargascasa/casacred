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
    
    @if(isset($listing->id))
    <div class="flex">
        <h2 class="text-lg font-semibold text-red-700">EDITAR PROPIEDAD<span style="color:darkgray"> Creado: {{$listing->created_at->format('d M y')}} ({{$listing->user->name??'User'}}) @if($listing->locked) 🔒 @endif</span></h2>
        @if(Auth::user()->role == "administrator" && $listing->locked)
            <form action="{{route('admin.listings.unlocked', $listing->id)}}" method="POST">
                @csrf
                <button type="submit" class="bg-gray-300 pl-1 pr-1 rounded">Desbloquear</button>
            </form>
        @endif
    </div>

    {!! Form::model($listing, ['route' => ['admin.listings.update',$listing->id],'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'formsave']) !!}
    @else
    <h2 class="text-lg font-semibold text-red-700">NUEVA PROPIEDAD</h2>
    {!! Form::open(['route' => 'admin.listings.store','enctype' => 'multipart/form-data', 'id' => 'formsave']) !!}
    @endif

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
            $inputs = 'block w-full px-4 py-2 mt-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-md focus:border-red-500 focus:outline-none focus:ring';

            if(isset($listing->id)) $default = null; else $default = '0';
            if(Auth::user()->role == 'administrator') $readonly = ['class' => 'form-select form-select-sm','readonly'=>'readonly'];
            else $classStatus = ['class' => 'form-select form-select-sm'];
            if(isset($lastcode->product_code)){ $codelast=(int)filter_var($lastcode->product_code, FILTER_SANITIZE_NUMBER_INT); $newcode = $codelast+1; }else $newcode = null;
        @endphp

        <div class="grid grid-cols-3 gap-4 mt-4 sm:gap-6">
            <div>          
                {!! Form::label('product_code', 'Codigo',['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('product_code', $newcode, ['class' => $inputs.' font-bold', 'disabled']) !!}
                @else --}}
                {!! Form::text('product_code', $newcode, ['class' => $inputs.' font-bold', 'readonly']) !!}
                {{-- @endif --}}
            </div>
            <div>       
                {!! Form::label('listing_type', 'Plan',['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                    {!! Form::select('listing_type',['2'=>'PAGO','1'=>'GRATIS'], null, ['class' => $inputs, 'disabled']) !!}
                @else
                    {!! Form::select('listing_type',['2'=>'PAGO','1'=>'GRATIS'], null, ['class' => $inputs, ]) !!}
                @endif
            </div>
    
            @if(Auth::user()->role == "administrator")
                <div>
                    {!! Form::label('status', 'Status',['class' => 'font-semibold']) !!}
                    @if(isset($listing) && $listing->locked)
                        {!! Form::select('status',['0'=>'DESACTIVADO','1'=>'ACTIVO'], null, ['class' => $inputs, 'disabled']) !!}
                    @else
                        {!! Form::select('status',['0'=>'DESACTIVADO','1'=>'ACTIVO'], null, ['class' => $inputs]) !!}
                    @endif
                </div>
            @else
                @isset($listing)
                    <div>
                        {!! Form::label('status', 'Estado', ['class' => 'font-semibold']) !!}
                            @if($listing->status == "0") 
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

        {{-- <div id="comment_plan" class="grid grid-cols-1 gap-4 mt-4 sm:gap-6" style="display: none">
            <div>
                {!! Form::label('comment_plan', 'Ingrese una razón por la que el plan es GRATIS', ['class' => 'font-semibold']) !!}
                {!! Form::text('comment_plan', null, ['class' => $inputs]) !!}
            </div>
        </div> --}}

        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
            <div>      
                {!! Form::label('owner_name', 'Nombre de Propietario', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                    {!! Form::text('owner_name', null, ['class' =>  $inputs, 'disabled']) !!}
                @else
                    {!! Form::text('owner_name', null, ['class' =>  $inputs, 'required']) !!}
                @endif
            </div>
            <div>
                {!! Form::label('owner_email', 'Email del Propietario', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::email('owner_email', null, ['class' => $inputs, 'disabled']) !!}
                @elseif(Auth::user()->email == "developer2@casacredito.com")
                {!! Form::email('owner_email', null, ['class' => $inputs]) !!}
                @else
                {!! Form::email('owner_email', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>
            <div>
                {!! Form::label('available', 'Disponibilidad', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                    {!! Form::select('available', [null => 'SELECCIONE', '1' => 'DISPONIBLE', '2' => 'NO DISPONIBLE'], null, ['class' => $inputs, 'disabled']) !!}
                @else
                    {!! Form::select('available', ['1' => 'DISPONIBLE', '2' => 'NO DISPONIBLE'], null, ['class' => $inputs, 'onchange' => 'requiredFalse(this.value);', 'required']) !!}
                @endif
            </div>
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            {!! Form::label('listing_title', 'Titulo de Propiedad', ['class' => 'font-semibold']) !!}
            @if(isset($listing) && $listing->locked)
                {!! Form::text('listing_title', null, ['class' => $inputs, 'disabled']) !!}
            @else
            {{-- 'minlength' => 50, 'maxlength' => 60, --}}
                {!! Form::text('listing_title', null, ['class' => $inputs, 'pattern' => '.{50,60}', 'onkeyup' => 'countCharsTitle(this);', 'required']) !!}
            @endif
            <div id="div_info_character" style="background-color: @if(isset($listing) &&  Str::length($listing->listing_title) >= 50 && Str::length($listing->listing_title) <=60) #9AE6B4 @else #FEB2B2 @endif" class="flex p-1 mt-2 rounded">
                <label style="font-weight: 400">
                    Actual <b id="label_count_title"></b> caracteres. (Mínimo 50 - Máximo 60 caracteres)
                </label>
            </div>
            @if(isset($listing->id) && Auth::id()==123)
                <a href="{{route('admin.reslug',$listing->id)}}" target="_blank">{{$listing->slug}}</a>            
            @endif
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            <div class="flex">
                {!! Form::label('meta_description', 'Meta Descripcion en Google', ['class' => 'font-semibold']) !!} <div onmouseover="openHelpDescription();" onmouseout="openHelpDescription();" class="pr-1 rounded ml-1" style="padding-left: 3px; cursor: pointer; background-color: #e8eeec">?</div>
            </div>
            <div id="div_help_desc" style="display: none;" class="relative">
                <div class="absolute p-1 rounded" style="font-size: 14px; font-weight: 400; background-color: #e8eeec">La metadescription ayuda a que la publicación sea óptima para Google. La primera letra debe ser en mayúscula y las demás en minúsculas. Es recomendable poner al inicio las mismas palabras del titulo. Ej: Departamento de venta en Sector, Ciudad, Provincia...</div>
            </div>
            @if(isset($listing) && $listing->locked)
            {!! Form::text('meta_description', null, ['class' => $inputs, 'disabled']) !!}
            @else
            {!! Form::text('meta_description', null, ['class' => $inputs, 'pattern' => '.{130,160}', 'onkeyup' => 'countCharsDesc(this);', 'required']) !!}
            @endif

            {{-- <label>Caracteres Actual: <b id="charcount"></b></label>
            @if(!isset($listing->meta_description))
            <div class="bg-yellow-200 p-2 mt-3 rounded">
                La descripción que se mostrara en Google debe contener entre <b>140</b> y <b>155</b> caracteres.
            </div>
            @endif --}}
            <div id="div_info_character_desc" style="background-color: @if(isset($listing) &&  Str::length($listing->meta_description) >= 130 && Str::length($listing->meta_description) <= 160) #9AE6B4 @else #FEB2B2 @endif" class="flex p-1 mt-2 rounded">
                <label style="font-weight: 400">
                    Actual <b id="label_count_desc"></b> caracteres. (Mínimo 130 - Máximo 160 caracteres)
                </label>
            </div>
        </div>

        @if(Auth::user()->id == 15 || Auth::user()->id == 147)
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
        @endisset

        <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6">
            <div>
                {!! Form::label('property_price', 'Precio Max', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                    {!! Form::text('property_price', null, ['class' => $inputs, 'disabled']) !!}
                @else
                    {!! Form::text('property_price', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>
            <div>
                {!! Form::label('property_price_min', 'Precio Min', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::text('property_price_min', null, ['class' => $inputs, 'disabled']) !!}
                @else
                {!! Form::text('property_price_min', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>
        </div>

        <div id="divcomment" class="grid grid-cols-1 mt-4" style="display: none">
            {!! Form::label('comment', 'Comentario', ['class' => 'font-semibold']) !!}
            {!! Form::textarea('comment', null, ['class' => $inputs, 'rows' => 2, 'placeholder' => 'Ingrese el motivo por el cual cambio el precio']) !!}
        </div>


        <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6 sm:grid-cols-4">
            <div>          
                {!! Form::label('construction_area', 'Construcción', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                    {!! Form::text('construction_area', null, ['class' => $inputs, 'disabled']) !!}
                @elseif(Auth::user()->email == "developer2@casacredito.com")
                    {!! Form::text('construction_area', null, ['class' => $inputs]) !!}
                @else
                    {!! Form::text('construction_area', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>
            <div>          
                {!! Form::label('land_area', 'Superficie', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                    {!! Form::text('land_area', null, ['class' => $inputs, 'disabled']) !!}
                @elseif(Auth::user()->email == "developer2@casacredito.com")
                    {!! Form::text('land_area', null, ['class' => $inputs]) !!}
                @else
                    {!! Form::text('land_area', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>
            <div>          
                {!! Form::label('Front', 'Frente', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::text('Front', null, ['class' => $inputs, 'disabled']) !!}
                @elseif(Auth::user()->email == "developer2@casacredito.com")
                {{-- {!! Form::text('Front', null, ['class' => $inputs, 'min' => 1, 'max' => 5, 'title' => 'Por favor, ingrese una cantidad mayor a 0',  'required']) !!} --}}
                {!! Form::text('Front', null, ['class' => $inputs]) !!}
                @else
                {!! Form::text('Front', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>

            <div>          
                {!! Form::label('Fund', 'Fondo', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::text('Fund', null, ['class' => $inputs, 'disabled']) !!}
                @elseif(Auth::user()->email == "developer2@casacredito.com")
                {!! Form::text('Fund', null, ['class' => $inputs]) !!}
                @else
                {!! Form::text('Fund', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 bg-gray-200 mt-3 p-3 rounded text-sm">
            <p>
                En caso que el tipo de propiedad no cuente con metros de construcción, superficie, frente o fondo, completar el campo con un <b>0</b>
            </p>
        </div>

        {{-- nuevo div para guardar los años de construccion --}}
        <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6 sm:grid-cols-4">
            <div>
                {!! Form::label('listyears', 'Años de construcción', ['class' => 'font-semibold']) !!} <br>
                <span id="rangeValue">Entre 0 a 5 años</span>
                @if(isset($listing) && $listing->locked)
                {!! Form::range('listyears', null,  ['class' => 'form-range', 'min' => '0', 'max' => '4', 'step' => '1', 'onchange' => 'rangeSlide(this.value)', 'onmousemove' => 'rangeSlide(this.value)', 'disabled']) !!}
                @else
                {!! Form::range('listyears', null,  ['class' => 'form-range', 'min' => '0', 'max' => '4', 'step' => '1', 'onchange' => 'rangeSlide(this.value)', 'onmousemove' => 'rangeSlide(this.value)']) !!}
                @endif
            </div>
        </div>
        {{-- termina div --}}

        <div class="grid grid-cols-3 gap-4 mt-4 sm:gap-6">
            <div>          
                {!! Form::label('state', 'Provincia', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::select('state',[''=>'Selecione']+$states->pluck('name','name')->toArray(), null, ['id'=>'state','class' => $inputs, 'disabled' ], $optAttrib ) !!}
                @else
                {!! Form::select('state',[''=>'Selecione']+$states->pluck('name','name')->toArray(), null, ['id'=>'state','class' => $inputs, 'required' ], $optAttrib ) !!}
                @endif
            </div>
            <div>          
                {!! Form::label('city', 'Ciudad', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::select('city', isset($cities) ? $cities->pluck('name','name')->toArray() : [''=>'Selecione'] , null, ['id'=>'city','class' => $inputs, 'disabled' ]) !!}
                @else
                {!! Form::select('city', isset($cities) ? $cities->pluck('name','name')->toArray() : [''=>'Selecione'] , null, ['id'=>'city','class' => $inputs, 'required' ]) !!}
                @endif
            </div>
            <div>
                {!! Form::label('address', 'Sector (Ej: Ricaurte) ', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::text('address', null, ['class' => $inputs, 'disabled']) !!}
                @else
                {!! Form::text('address', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>
        </div>
        
        {{-- <div class="gap-4 mt-4 sm:gap-6">
            {!! Form::label('address', 'Localidad: (Provincia, Canton, Sector) Ej: Azuay, Cuenca, Batan ', ['class' => 'font-semibold']) !!}
            {!! Form::text('address', null, ['class' => $inputs, 'required']) !!}
        </div> --}}

        <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6">
            <div>          
                {!! Form::label('lat', 'Latitud', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::text('lat', null, ['class' => $inputs, 'disabled']) !!}
                @elseif(Auth::user()->email == "developer2@casacredito.com")
                {!! Form::text('lat', null, ['class' => $inputs]) !!}
                @else
                {!! Form::text('lat', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>
            <div>          
                {!! Form::label('lng', 'Longitud', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::text('lng', null, ['class' => $inputs, 'disabled']) !!}
                @elseif(Auth::user()->email == "developer2@casacredito.com")
                {!! Form::text('lng', null, ['class' => $inputs]) !!}
                @else
                {!! Form::text('lng', null, ['class' => $inputs, 'required']) !!}
                @endif
            </div>
            {{-- <div>
                {!! Form::label('ubication_url', 'URL de la Ubicaión', ['class' => 'font-semibold']) !!}
                {!! Form::text('ubication_url', null, ['class' => $inputs, 'required']) !!}
            </div> --}}
        </div>
        
        <div class="grid grid-cols-3 gap-4 mt-4 sm:gap-6">
            <div> 
                {!! Form::label('listingtype', 'Categoría', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::select('listingtype',$types->pluck('type_title','id'),    null,    ['class' => $inputs, 'disabled']) !!}
                @else
                {!! Form::select('listingtype',$types->pluck('type_title','id'),    null,    ['class' => $inputs, 'required']) !!}
                @endif
            </div>
            <div>     
                {!! Form::label('listingtypestatus', 'Tipo', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::select('listingtypestatus',$categories->pluck('status_title','slug'),    null,    ['class' => $inputs, 'disabled']) !!}
                @else
                {!! Form::select('listingtypestatus',$categories->pluck('status_title','slug'),    null,    ['class' => $inputs, 'required']) !!}
                @endif
            </div>
            <div>  
                {!! Form::label('listingtagstatus', 'Etiqueta', ['class' => 'font-semibold']) !!}
                @if(isset($listing) && $listing->locked)
                {!! Form::select('listingtagstatus',$tags->pluck('tags_title','id'),    null,    ['class' => $inputs, 'disabled']) !!}
                @else
                {!! Form::select('listingtagstatus',$tags->pluck('tags_title','id'),    null,    ['class' => $inputs, 'required']) !!}
                @endif
            </div>
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            {!! Form::label('listing_description', 'Descripcion de Propiedad', ['class' => 'font-semibold']) !!}
            @if(isset($listing) && $listing->locked)
            {!! Form::textarea('listing_description', 
            isset($listing->listing_description) && $listing->listing_description!=null ? $listing->listing_description : '',
            ['class' => $inputs,'rows' => '3', 'disabled']) !!}
            @else
            {!! Form::textarea('listing_description', 
            isset($listing->listing_description) && $listing->listing_description!=null ? $listing->listing_description : '',
            ['class' => $inputs,'rows' => '3', 'required']) !!}
            @endif
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            <h4 class="font-semibold">Beneficios</h4>   
            <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3 border border-gray-300 rounded-md px-4 py-2">
                @foreach ($benefits as $bene)            
                        <label class="inline-flex items-center mt-3">  
                            @if(isset($listing) && $listing->locked)
                            {!! Form::checkbox("checkBene[]", $bene->id, 
                            isset($listing->listingcharacteristic) && in_array($bene->id,explode(",", $listing->listingcharacteristic)) ? true : false,
                            ['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"checkBene$bene->id", 'disabled' ]) !!}
                            <span class="ml-2 text-gray-700">{{$bene->charac_titile}}</span>
                            @else
                            {!! Form::checkbox("checkBene[]", $bene->id, 
                            isset($listing->listingcharacteristic) && in_array($bene->id,explode(",", $listing->listingcharacteristic)) ? true : false,
                            ['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"checkBene$bene->id"]) !!}
                            <span class="ml-2 text-gray-700">{{$bene->charac_titile}}</span>
                            @endif
                        </label>
                @endforeach
            </div>    
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            <h4 class="font-semibold">Servicios</h4>   
            <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3 border border-gray-300 rounded-md px-4 py-2">
                @foreach ($services as $serv)
                        <label class="inline-flex items-center mt-3">  
                            @if(isset($listing) && $listing->locked)
                            {!! Form::checkbox("checkServ[]", $serv->id, 
                            isset($listing->listinglistservices) && in_array($serv->id,explode(",", $listing->listinglistservices)) ? true : false,
                            ['class' => 'form-check-input', 'type'=>'checkbox', 'id'=>"checkServ$serv->id", 'disabled']) !!}
                            <span class="ml-2 text-gray-700">{{$serv->charac_titile}}</span>
                            @else
                            {!! Form::checkbox("checkServ[]", $serv->id, 
                            isset($listing->listinglistservices) && in_array($serv->id,explode(",", $listing->listinglistservices)) ? true : false,
                            ['class' => 'form-check-input', 'type'=>'checkbox', 'id'=>"checkServ$serv->id"]) !!}
                            <span class="ml-2 text-gray-700">{{$serv->charac_titile}}</span>
                            @endif
                        </label>
                @endforeach
            </div>    
        </div>

        <hr class="mt-4">

        <div class="gap-4 mt-4 sm:gap-6">
            <label class="font-semibold">Galeria de Imagenes</label>
            <div>
                @if(isset($listing) && $listing->locked)
                <input type="file" class="px-4 py-2 border border-gray-300 rounded-md" name="galleryImages[]" id="galleryImages" accept=".jpg, .jpeg, .png" multiple onchange="changetxtgallery(this)" disabled>
                @elseif(isset($listing))
                <input type="file" class="px-4 py-2 border border-gray-300 rounded-md" name="galleryImages[]" id="galleryImages" accept=".jpg, .jpeg, .png" multiple onchange="changetxtgallery(this)">
                @else
                <input type="file" class="px-4 py-2 border border-gray-300 rounded-md" name="galleryImages[]" id="galleryImages" accept=".jpg, .jpeg, .png" multiple onchange="changetxtgallery(this)" required>
                @endif
            </div>      
            <ul id="gridImages" class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-4 px-4 py-2 border border-gray-300 rounded-md">
                @isset($listing)
                    @php $ii=0; @endphp
                    @foreach(array_filter(explode("|", $listing->images)) as $img)
                        @php $ii++; $imageVerification = asset('uploads/listing/thumb/300/'.$img); @endphp
                        <li class="relative"  id="imageUpload{{$ii}}"> 
                            @if(isset($listing) && $listing->locked)
                            <button type="button" onclick="delImageUpload({{$ii}})" class="absolute right-0 px-2 rounded bg-red-800 text-white font-bold" disabled>X</button>
                            @else
                            <button type="button" onclick="delImageUpload({{$ii}})" class="absolute right-0 px-2 rounded bg-red-800 text-white font-bold">X</button>
                            @endif
                            <img class="rounded" src="@if(@getimagesize($imageVerification)){{url('uploads/listing/thumb/300', $img)}} @else {{url('uploads/listing/300',$img)}} @endif">
                            <input type="hidden" value="{{$img}}" name="updatedImages[]">
                        </li>
                    @endforeach
                @endisset
            </ul>
        </div>  
        
        <hr class="mt-4">
        <h5 class="font-semibold mt-4">DETALLES DE PROPIEDAD</h5>

        
        <div id="rowsTitles">

        @if(isset($listing) && is_array(json_decode($listing->heading_details)))
        @php $ii=-1; @endphp
            @foreach(json_decode($listing->heading_details) as $dets)
                @php $ii++; @endphp 

                <div class="gap-4 mt-4 sm:gap-6">
                    <label class="font-semibold">Titulo</label>
                    <div class="flex flex-row mt-2">
                        @if(isset($listing) && $listing->locked)
                        <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details{{$ii}}[]" type="text" value="{{$dets[0]}}" disabled/>
                        @elseif(isset($listing))
                        <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details{{$ii}}[]" type="text" value="{{$dets[0]}}"/>
                        <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowTitle(this)">X</button>
                        @else
                        <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details{{$ii}}[]" type="text" value="{{$dets[0]}}" required/>
                        @endif
                    </div>            
                @php unset($dets[0]); $printControl=0; @endphp
    
                <div class="font-semibold ml-4 mt-4">Detalles</div>
                    @foreach($dets as $det)
                        @if($printControl==0)
                        @php $printControl=1; @endphp                
                            <div class="flex flex-row mt-2 ml-4">
                                @if(isset($listing) && $listing->locked)
                                {!! Form::select('details'.$ii.'[]',$details->pluck('charac_titile','id'), $det   ,    ['class' => 'w-44 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l', 'disabled']) !!}
                                @else
                                {!! Form::select('details'.$ii.'[]',$details->pluck('charac_titile','id'), $det   ,    ['class' => 'w-44 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l']) !!}
                                @endif
                        @else                
                        @php $printControl=0; @endphp
                                @if(isset($listing) && $listing->locked)
                                <input  class="w-24 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300" type="number" name="details{{$ii}}[]" pattern="[0-9]+" onkeydown="return false" value="{{!is_numeric($det)?1:$det}}" disabled/>
                                @else
                                <input  class="w-24 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300" type="number" name="details{{$ii}}[]" pattern="[0-9]+" onkeydown="return false" value="{{!is_numeric($det)?1:$det}}"/>
                                <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowDetail(this)">X</button>
                                @endif
                            </div>
                        @endif
                    @endforeach
                    @if(isset($listing) && $listing->locked)
                    <button type="button" class="px-4 py-2 ml-4 mt-4 text-xl leading-5 text-black bg-green-300 rounded" onclick="addRowDetail(this,{{$ii}})" disabled>Agregar Detalle</button>
                    @else
                    <button type="button" class="px-4 py-2 ml-4 mt-4 text-xl leading-5 text-black bg-green-300 rounded" onclick="addRowDetail(this,{{$ii}})">Agregar Detalle</button>
                    @endif
                </div>    
            @endforeach
            </div>
            
        @else

            <div class="gap-4 mt-4 sm:gap-6">
                <label class="font-semibold">Titulo</label>
                <div class="flex flex-row mt-2">
                    <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details0[]" type="text" required/>
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
                @if(isset($listing) && $listing->locked)
                <button type="button" class="px-4 py-2 ml-4 mt-4 text-xl leading-5 text-black bg-green-300 rounded" onclick="addRowDetail(this,0)" disabled>Agregar Detalle</button>
                @else
                <button type="button" class="px-4 py-2 ml-4 mt-4 text-xl leading-5 text-black bg-green-300 rounded" onclick="addRowDetail(this,0)">Agregar Detalle</button>
                @endif
            </div>
        </div>
        @endif
        @if((isset($listing) && $listing->locked))
            <button type="button" class="px-4 py-2 mt-4 text-xl leading-5 text-black bg-blue-300 rounded" onclick="addRowTitles()" disabled>Agregar Titulo</button>
        @else
            <button type="button" class="px-4 py-2 mt-4 text-xl leading-5 text-black bg-blue-300 rounded" onclick="addRowTitles()">Agregar Titulo</button>
        @endif

        <hr class="mt-4">
        <div class="flex justify-center mt-6">
            @if(isset($listing) && $listing->locked)
                <button type="submit" class="px-6 py-2 text-xl leading-5 text-white transition-colors duration-200 transform bg-red-700 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600" disabled>GUARDAR</button>
            @else
                <button id="btnSave" type="submit" class="px-6 py-2 text-xl leading-5 text-white transition-colors duration-200 transform bg-red-700 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">GUARDAR</button>
            @endif
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
    <script>

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
            });
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
            rangeSlide(range);
            //document.getElementById('charcount').innerHTML = document.getElementById('metadescription').value.length;
            if(input_listing_title.value.length > 0) label_count_title.innerHTML = input_listing_title.value.length;
            else label_count_title.innerHTML = "0";

            if(input_meta_description.value.length > 0) label_count_desc.innerHTML = input_meta_description.value.length;
            else label_count_desc.innerHTML = "0";
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

    const rangeSlide = (value) => {
        let stringyearsconstruction;
        switch (value) {
            case "0":stringyearsconstruction = "Entre 0 a 5 años";break;
            case "1":stringyearsconstruction = "Entre 5 a 10 años";break;
            case "2":stringyearsconstruction = "Entre 10 a 15 años";break;
            case "3":stringyearsconstruction = "Entre 15 a 20 años";break;
            case "4":stringyearsconstruction = "Más de 20 años";break;
            default:break;
        }
        document.getElementById('rangeValue').innerHTML = stringyearsconstruction;
    }

    const openHelpDescription = () => {
        const div_help_desc = document.getElementById('div_help_desc');
        if(div_help_desc.style.display == "none") div_help_desc.style.display = "block";
        else if(div_help_desc.style.display == "block") div_help_desc.style.display = "none";
    }

    let form = document.getElementById('formsave');

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
    </script>
@endsection