@extends('layouts.dashtw')

@section('firstscript')
<title> @if(isset($listing->id)) Editar: {{$listing->product_code}} {{$listing->listing_title}} @else Crear @endif Propiedad</title>
@endsection

@section('content')

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">

 <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md mt-10">
    
    
    @if(isset($listing->id))
    <h2 class="text-lg font-semibold text-red-700">EDITAR PROPIEDAD<span style="color:darkgray"> Creado: {{$listing->created_at->format('d M y')}} ({{$listing->user->name??'User'}})</span></h2>
    {!! Form::model($listing, ['route' => ['admin.listings.update',$listing->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
    <h2 class="text-lg font-semibold text-red-700">NUEVA PROPIEDAD</h2>
    {!! Form::open(['route' => 'admin.listings.store','enctype' => 'multipart/form-data']) !!}
    @endif

    <hr class="mt-4">

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
                {!! Form::text('product_code', $newcode, ['class' => $inputs.' font-bold']) !!}
                {{-- @endif --}}
            </div>
            <div>       
                {!! Form::label('listing_type', 'Plan',['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::select('listing_type',['2'=>'PAGO','1'=>'GRATIS'], null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::select('listing_type',['2'=>'PAGO','1'=>'GRATIS'], null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
    
            <div>
                {!! Form::label('status', 'Status',['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::select('status',['0'=>'DESACTIVADO','1'=>'ACTIVO'], null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::select('status',['0'=>'DESACTIVADO','1'=>'ACTIVO'], null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>      
                {!! Form::label('owner_name', 'Nombre de Propietario', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('owner_name', null, ['class' =>  $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::text('owner_name', null, ['class' =>  $inputs]) !!}
                {{-- @endif --}}
            </div>
            <div>
                {!! Form::label('available', 'Disponibilidad', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::select('available', [null => 'SELECCIONE', '1' => 'DISPONIBLE', '2' => 'NO DISPONIBLE'], null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::select('available', [null => 'SELECCIONE', '1' => 'DISPONIBLE', '2' => 'NO DISPONIBLE'], null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            {!! Form::label('listing_title', 'Titulo de Propiedad', ['class' => 'font-semibold']) !!}
            {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
            {!! Form::text('listing_title', null, ['class' => $inputs, 'disabled']) !!}
            @else --}}
            {!! Form::text('listing_title', null, ['class' => $inputs]) !!}
            {{-- @endif --}}
            @if(isset($listing->id) && Auth::id()==123)
                <a href="{{route('admin.reslug',$listing->id)}}" target="_blank">{{$listing->slug}}</a>            
            @endif
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            {!! Form::label('meta_description', 'Meta Descripcion en Google', ['class' => 'font-semibold']) !!}
            {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
            {!! Form::text('meta_description', null, ['class' => $inputs, 'disabled']) !!}
            @else --}}
            {!! Form::text('meta_description', null, ['class' => $inputs]) !!}
            {{-- @endif --}}
        </div>
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
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('property_price', null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::text('property_price', null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
            <div>
                {!! Form::label('property_price_min', 'Precio Min', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('property_price_min', null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::text('property_price_min', null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
        </div>


        <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6 sm:grid-cols-4">
            <div>          
                {!! Form::label('construction_area', 'Construcci??n', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('construction_area', null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::text('construction_area', null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
            <div>          
                {!! Form::label('land_area', 'Superficie', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('land_area', null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::text('land_area', null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
            <div>          
                {!! Form::label('Front', 'Frente', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('Front', null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::text('Front', null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
            <div>          
                {!! Form::label('Fund', 'Fondo', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('Fund', null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::text('Fund', null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
        </div>

        {{-- nuevo div para guardar los a??os de construccion --}}
        <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6 sm:grid-cols-4">
            <div>
                {!! Form::label('listyears', 'A??os de construcci??n', ['class' => 'font-semibold']) !!} <br>
                <span id="rangeValue">Entre 0 a 5 a??os</span>
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::range('listyears', null,  ['class' => 'form-range', 'min' => '0', 'max' => '4', 'step' => '1', 'onchange' => 'rangeSlide(this.value)', 'onmousemove' => 'rangeSlide(this.value)', 'disabled']) !!}
                @else --}}
                {!! Form::range('listyears', null,  ['class' => 'form-range', 'min' => '0', 'max' => '4', 'step' => '1', 'onchange' => 'rangeSlide(this.value)', 'onmousemove' => 'rangeSlide(this.value)']) !!}
                {{-- @endif --}}
            </div>
        </div>
        {{-- termina div --}}

        <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6">
            <div>          
                {!! Form::label('state', 'Provincia', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::select('state',[''=>'Selecione']+$states->pluck('name','name')->toArray(), null, ['id'=>'state','class' => $inputs, 'disabled' ], $optAttrib ) !!}
                @else --}}
                {!! Form::select('state',[''=>'Selecione']+$states->pluck('name','name')->toArray(), null, ['id'=>'state','class' => $inputs ], $optAttrib ) !!}
                {{-- @endif --}}
            </div>
            <div>          
                {!! Form::label('city', 'Ciudad', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::select('city', isset($cities) ? $cities->pluck('name','name')->toArray() : [''=>'Selecione'] , null, ['id'=>'city','class' => $inputs, 'disabled' ]) !!}
                @else --}}
                {!! Form::select('city', isset($cities) ? $cities->pluck('name','name')->toArray() : [''=>'Selecione'] , null, ['id'=>'city','class' => $inputs ]) !!}
                {{-- @endif --}}
            </div>
        </div>
        
        <div class="gap-4 mt-4 sm:gap-6">
            {!! Form::label('address', 'Localidad: (Provincia, Canton, Sector) Ej: Azuay, Cuenca, Batan ', ['class' => 'font-semibold']) !!}
            {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
            {!! Form::text('address', null, ['class' => $inputs, 'disabled']) !!}
            @else --}}
            {!! Form::text('address', null, ['class' => $inputs]) !!}
            {{-- @endif --}}
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4 sm:gap-6">
            <div>          
                {!! Form::label('lat', 'Latitud', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('lat', null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::text('lat', null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
            <div>          
                {!! Form::label('lng', 'Longitud', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::text('lng', null, ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::text('lng', null, ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
        </div>
        
        <div class="grid grid-cols-3 gap-4 mt-4 sm:gap-6">
            <div> 
                {!! Form::label('listingtype', 'Categor??a', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::select('listingtype',$types->pluck('type_title','id'),    null,    ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::select('listingtype',$types->pluck('type_title','id'),    null,    ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
            <div>     
                {!! Form::label('listingtypestatus', 'Tipo', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::select('listingtypestatus',$categories->pluck('status_title','slug'),    null,    ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::select('listingtypestatus',$categories->pluck('status_title','slug'),    null,    ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
            <div>  
                {!! Form::label('listingtagstatus', 'Etiqueta', ['class' => 'font-semibold']) !!}
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                {!! Form::select('listingtagstatus',$tags->pluck('tags_title','id'),    null,    ['class' => $inputs, 'disabled']) !!}
                @else --}}
                {!! Form::select('listingtagstatus',$tags->pluck('tags_title','id'),    null,    ['class' => $inputs]) !!}
                {{-- @endif --}}
            </div>
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            {!! Form::label('listing_description', 'Descripcion de Propiedad', ['class' => 'font-semibold']) !!}
            {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
            {!! Form::textarea('listing_description', 
            isset($listing->listing_description) && $listing->listing_description!=null ? $listing->listing_description : '',
            ['class' => $inputs,'rows' => '3', 'disabled']) !!}
            @else --}}
            {!! Form::textarea('listing_description', 
            isset($listing->listing_description) && $listing->listing_description!=null ? $listing->listing_description : '',
            ['class' => $inputs,'rows' => '3', 'required']) !!}
            {{-- @endif --}}
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            <h4 class="font-semibold">Beneficios</h4>   
            <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3 border border-gray-300 rounded-md px-4 py-2">
                @foreach ($benefits as $bene)            
                        <label class="inline-flex items-center mt-3">  
                            {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                            {!! Form::checkbox("checkBene[]", $bene->id, 
                            isset($listing->listingcharacteristic) && in_array($bene->id,explode(",", $listing->listingcharacteristic)) ? true : false,
                            ['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"checkBene$bene->id", 'disabled' ]) !!}
                            <span class="ml-2 text-gray-700">{{$bene->charac_titile}}</span>
                            @else --}}
                            {!! Form::checkbox("checkBene[]", $bene->id, 
                            isset($listing->listingcharacteristic) && in_array($bene->id,explode(",", $listing->listingcharacteristic)) ? true : false,
                            ['class' => 'form-checkbox h-5 w-5 text-red-600', 'type'=>'checkbox', 'id'=>"checkBene$bene->id" ]) !!}
                            <span class="ml-2 text-gray-700">{{$bene->charac_titile}}</span>
                            {{-- @endif --}}
                        </label>
                @endforeach
            </div>    
        </div>

        <div class="gap-4 mt-4 sm:gap-6">
            <h4 class="font-semibold">Servicios</h4>   
            <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3 border border-gray-300 rounded-md px-4 py-2">
                @foreach ($services as $serv)
                        <label class="inline-flex items-center mt-3">  
                            {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                            {!! Form::checkbox("checkServ[]", $serv->id, 
                            isset($listing->listinglistservices) && in_array($serv->id,explode(",", $listing->listinglistservices)) ? true : false,
                            ['class' => 'form-check-input', 'type'=>'checkbox', 'id'=>"checkServ$serv->id", 'disabled']) !!}
                            <span class="ml-2 text-gray-700">{{$serv->charac_titile}}</span>
                            @else --}}
                            {!! Form::checkbox("checkServ[]", $serv->id, 
                            isset($listing->listinglistservices) && in_array($serv->id,explode(",", $listing->listinglistservices)) ? true : false,
                            ['class' => 'form-check-input', 'type'=>'checkbox', 'id'=>"checkServ$serv->id" ]) !!}
                            <span class="ml-2 text-gray-700">{{$serv->charac_titile}}</span>
                            {{-- @endif --}}
                        </label>
                @endforeach
            </div>    
        </div>

        <hr class="mt-4">

        <div class="gap-4 mt-4 sm:gap-6">
            <label class="font-semibold">Galeria de Imagenes</label>
            <div>
                {{-- @if(isset($listing) && $listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                <input type="file" class="px-4 py-2 border border-gray-300 rounded-md" name="galleryImages[]" id="galleryImages" accept=".jpg, .jpeg, .png" multiple onchange="changetxtgallery(this)" disabled>
                @else --}}
                <input type="file" class="px-4 py-2 border border-gray-300 rounded-md" name="galleryImages[]" id="galleryImages" accept=".jpg, .jpeg, .png" multiple onchange="changetxtgallery(this)">
                {{-- @endif --}}
            </div>      
            <ul id="gridImages" class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-4 px-4 py-2 border border-gray-300 rounded-md">
                @isset($listing)
                    @php $ii=0; @endphp
                    @foreach(array_filter(explode("|", $listing->images)) as $img)
                        @php $ii++; @endphp
                        <li class="relative"  id="imageUpload{{$ii}}"> 
                            {{-- @if(!($listing->user_id != Auth::user()->id && Auth::user()->role == "user")) --}}
                            <button type="button" onclick="delImageUpload({{$ii}})" class="absolute right-0 px-2 rounded bg-red-800 text-white font-bold">X</button>
                            {{-- @endif --}}
                            <img class="rounded" src="{{url('uploads/listing/300',$img)}}">
                            <input type="hidden" value="{{$img}}" name="updatedImages[]">
                        </li>
                    @endforeach
                @endisset
            </ul>
        </div>  
        
        <hr class="mt-4">
        <h5 class="font-semibold mt-4">DETALLES DE PROPIEDAD </h5>

        
        <div id="rowsTitles">

        @if(isset($listing) && is_array(json_decode($listing->heading_details)))
        @php $ii=-1; @endphp
            @foreach(json_decode($listing->heading_details) as $dets)
                @php $ii++; @endphp 

                <div class="gap-4 mt-4 sm:gap-6">
                    <label class="font-semibold">Titulo</label>
                    <div class="flex flex-row mt-2">
                        @if($listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                        <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details{{$ii}}[]" type="text" value="{{$dets[0]}}" disabled/>
                        @else
                        <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" name="details{{$ii}}[]" type="text" value="{{$dets[0]}}"/>
                        <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowTitle(this)">X</button>
                        @endif
                    </div>            
                @php unset($dets[0]); $printControl=0; @endphp
    
                <div class="font-semibold ml-4 mt-4">Detalles</div>
                    @foreach($dets as $det)
                        @if($printControl==0)
                        @php $printControl=1; @endphp                
                            <div class="flex flex-row mt-2 ml-4">
                                {{-- @if($listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                                {!! Form::select('details'.$ii.'[]',$details->pluck('charac_titile','id'), $det   ,    ['class' => 'w-44 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l', 'disabled']) !!}
                                @else --}}
                                {!! Form::select('details'.$ii.'[]',$details->pluck('charac_titile','id'), $det   ,    ['class' => 'w-44 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l']) !!}
                                {{-- @endif --}}
                        @else                
                        @php $printControl=0; @endphp
                                {{-- @if($listing->user_id != Auth::user()->id && Auth::user()->role == "user")
                                <input  class="w-24 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300" type="number" name="details{{$ii}}[]" pattern="[0-9]+" onkeydown="return false" value="{{!is_numeric($det)?1:$det}}" disabled/>
                                @else --}}
                                <input  class="w-24 h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300" type="number" name="details{{$ii}}[]" pattern="[0-9]+" onkeydown="return false" value="{{!is_numeric($det)?1:$det}}"/>
                                <button class="w-12 h-10 py-2 bg-red-700 text-white rounded-r text-sm" type="button" onclick="delrowDetail(this)">X</button>
                                {{-- @endif --}}
                            </div>
                        @endif
                    @endforeach
                    {{-- @if(!($listing->user_id != Auth::user()->id && Auth::user()->role == "user")) --}}
                    <button type="button" class="px-4 py-2 ml-4 mt-4 text-xl leading-5 text-black bg-green-300 rounded" onclick="addRowDetail(this,{{$ii}})">Agregar Detalle</button>
                    {{-- @endif --}}
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
        {{-- @isset($listing)
            @if(!($listing->user_id != Auth::user()->id && Auth::user()->role == "user")) --}}
            <button type="button" class="px-4 py-2 mt-4 text-xl leading-5 text-black bg-blue-300 rounded" onclick="addRowTitles()">Agregar Titulo</button>
            {{-- @endif
        @endisset --}}


       
        
        
        <hr class="mt-4">
        <div class="flex justify-center mt-6">
            @isset($listing)
                {{-- @if(!($listing->user_id != Auth::user()->id && Auth::user()->role == "user")) --}}
                <button type="submit" class="px-6 py-2 text-xl leading-5 text-white transition-colors duration-200 transform bg-red-700 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">GUARDAR</button>
                {{-- @endif --}}
            @else
                <button type="submit" class="px-6 py-2 text-xl leading-5 text-white transition-colors duration-200 transform bg-red-700 rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">GUARDAR</button>
            @endisset
        </div>
    </form>
</section>


</main>
@endsection


@section('endscript')
    <script src="{{asset('js/sortable.min.js')}}"></script>
    <script>    
        window.addEventListener('load', (event) => {
            var range =  document.getElementById('listyears').value;
            rangeSlide(range);
        });

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
                    <input  class="w-full h-10 px-4 py-2 text-gray-700 bg-white text-sm border border-gray-300 rounded-l" type="text" name="details${idUniq}[]"/>
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
            case "0":stringyearsconstruction = "Entre 0 a 5 a??os";break;
            case "1":stringyearsconstruction = "Entre 5 a 10 a??os";break;
            case "2":stringyearsconstruction = "Entre 10 a 15 a??os";break;
            case "3":stringyearsconstruction = "Entre 15 a 20 a??os";break;
            case "4":stringyearsconstruction = "M??s de 20 a??os";break;
            default:break;
        }
        document.getElementById('rangeValue').innerHTML = stringyearsconstruction;
    }
    </script>
@endsection