<div class="bg-white">
    @if($view == 'grid')
    <div class="grid sm:grid-cols-4 gap-4 mx-4">
        @foreach ($properties as $propertie)
            @php
                $firstImg = array_filter(explode("|", $propertie->images)) ;
                $dirImg = $firstImg[0]??'';
            @endphp
            <div class="rounded overflow-hidden shadow-lg w-full relative mt-4 mb-2 hover-trigger relative">
                {{-- web.detail  --}}
                {{-- {{route('admin.listings.edit',$propertie->id)}} --}}
                @if(Auth::user()->role == "user")
                    <a href="@if(Route::current()->getName() == "admin.myproperties" || Auth::user()->role == "administrator") {{ route('admin.listings.edit', $propertie->id) }} @else {{ route('admin.show.listing', $propertie->id) }} @endif" target="_blank">
                @endif

                @if ($dirImg != null)
                <img class="w-full" src="https://casacredito.com/uploads/listing/600/{{$dirImg}}" alt="{{ $propertie->listing_title}}">
                @else
                <div class="relative">
                    <img class="w-full" src="{{ asset('img/sin-imagenes.jpg') }}" alt="Sunset in the mountains">
                    <div class="absolute top-0 left-0 w-full h-full" style="display: flex; justify-content: center; align-items: center">
                        <p style="color: #ffffff" class="flex">Sin imágenes</p>
                    </div>
                </div>
                @endif

                <div class="absolute left-0" style="top: 30px">
                    @if($propertie->available != null)
                        @if($propertie->available == 2)
                            <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; background-color: #b11213; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">NO DISPONIBLE</div>
                        @else
                            <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; background-color: #01842a; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">DISPONIBLE</div>
                        @endif
                    @endif
                </div>

                <div class="absolute left-0 top-0">
                    @if($propertie->status == 1)
                        <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; background-color: #01842a; color: #ffffff; padding: 3px 5px 3px 5px; border-radius: 10px;">ON</div>
                    @else
                        <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; background-color: #b11213; color: #ffffff; padding: 3px 5px 3px 5px; border-radius: 10px">OFF</div>
                    @endif
                </div>

                <div class="px-6 py-2">
                <div class="font-bold text-sm">{{ $propertie->listing_title}}</div>
                <p class="text-gray-700 text-base">
                    {{ $propertie->address}}
                </p>
                <p>@if(Auth::id()==123)<span style="font-size: 10px">{{$propertie->slug}}</span> <br>@endif</p>
                </div>
                <div class="px-4 py-2">
                <span class="inline-block bg-gray-200 rounded-full px-2 text-sm font-semibold text-gray-700">{{ $propertie->listingtypestatus}}</span>
                <p class="mx-2 text-red-600 font-extrabold text-xl">${{ number_format($propertie->property_price)}}</p class="mx-2 text-red-600 font-bold">
                </div>
                <div class="absolute bottom-0 right-0 flex" style="margin-right: 20px; margin-bottom: 20px">
                    <div class="mr-2">
                        @if ($propertie->listing_type==2)
                            <img src="{{ asset('img/pagada.png') }}" alt="Pagada" title="Propiedad pagada">
                        @elseif($propertie->listing_type==1)
                            <img src="{{ asset('img/free.png') }}" alt="Gratis" title="Propiedad gratis">
                        @endif
                    </div>
                    <div class="mr-2">
                        @if ($propertie->listingtagstatus==2 && $propertie->listingtype != 26)
                            <img src="{{ asset('img/worker.png') }}" alt="Constructora" title="Constructora">
                        @endif
                    </div>
                    <div class="text-xs font-semibold" style="background-color: #017cd3; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">
                        COD: {{ $propertie->product_code }}
                    </div>
                </div>

                @if(Auth::user()->role == "administrator")
                <div class="absolute bg-white border border-grey-100 px-4 py-2 hover-target" style="top: 5px; right: 5px;">
                    {{-- @if(Auth::user()->role == "user")
                        @if ($propertie->listing_type==2)
                        <div class="flex">
                            <img src="{{ asset('img/pagada.png') }}" alt="Pagada">
                            <p class="text-red-500 text-xs font-bold">DE PAGO</p>
                        </div>
                        @elseif($propertie->listing_type==1)
                        <div class="flex">
                            <img src="{{ asset('img/free.png') }}" alt="Gratis">
                            <p class="text-red-500 text-xs font-bold">NO ES DE PAGO</p>
                        </div>
                        @endif
                        @if ($propertie->listingtagstatus==2 && $propertie->listingtype != 26)
                            <div class="flex">
                                <img src="{{ asset('img/worker.png') }}" alt="Constructora">
                                <p class="text-red-500 text-xs font-bold">CONSTRUCTORA</p>
                            </div>
                        @endif
                    @elseif(Auth::user()->role == "administrator") --}}
                    <div class="flex">
                        <a target="_blank" href="{{ route('admin.show.listing', $propertie) }}" style="text-decoration: none">
                            <p class="text-green-500 text-xs font-bold">Ver propiedad</p>
                        </a>
                    </div>
                    <div class="flex">
                        <a target="_blank" href="{{ route('home.tw.edit', $propertie) }}" style="text-decoration: none">
                            <p class="text-yellow-500 text-xs font-bold">Editar propiedad</p>
                        </a>
                    </div>
                </div>
                @endif
                @if(Auth::user()->role == "user")
                    </a>
                @endif
            </div>
        @endforeach
        <input type="hidden" id="pagActual" value="{{$pagActual}}">
        <input type="hidden" id="firstItem" value="{{$firstItem}}">
        <input type="hidden" id="totalProperties2" value="{{$totalProperties}}">

    </div>

    @elseif($view == 'list')

    <table class="w-full whitespace-nowrap bg-white">
        <thead>
            <tr class="sticky top-0">
                <th class="px-1 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    </th>
                <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    </th>
                <th class="w-2 px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    COD</th>
                <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Status</th>
                <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Precio</th>
                <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Detalle</th>
                <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Categoria</th>
                <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Tipo</th>
                <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    User</th>
            </tr>    
            {{-- <tr><th></th><th></th>
                <th class="px-2"> <input class="block w-24 py-2 border rounded-md pl-2" 
                    id="b_code" name="b_code" type="text" placeholder="Código..."></th>
                <td class="px-2">
                    <select class="block w-14 py-2 border rounded-md"
                     id="b_status" name="b_status"  class="w-20" style="color: gray">
                            <option value="" selected>Seleccione</option>
                            <option value="A">Activa</option>
                            <option value="D">Desactivada</option>
                    </select>
                </td>
                <th>
                    <select class="block w-14 py-2 border rounded-md"
                     id="b_price" name="b_price"  class="w-20" style="color: gray">
                            <option value="" selected>Seleccione</option>
                            <option value="ASC">Ascendente</option>
                            <option value="DESC">Descendente</option>
                    </select>
                </th>
                <th class="px-2" style="width: 40%"><input class="block w-full py-2 border rounded-md pl-2"
                    id="b_detalle" name="b_detalle" type="text" placeholder="Ingrese un sector..."></th>
                <td class="w-14">  
                    <select class="block w-full py-2 border rounded-md"
                    id="b_categoria" style="color: gray">
                            <option value="" selected>Seleccione</option>	
                            <option value="23">Casas </option>
                            <option value="24">Departamentos </option>
                            <option value="25">Casas Comerciales</option>
                            <option value="26">Terrenos</option>
                            <option value="29">Quintas</option>
                            <option value="30">Haciendas</option>
                            <option value="32">Locales Comerciales</option>
                            <option value="35">Oficinas</option>
                            <option value="36">Suites</option>
                    </select>
                </td>
                <td class="w-40 px-2">  
                    <select class="block w-full py-2 border rounded-md"
                    id="b_tipo" style="max-width:200px; color: gray">
                            <option value="" selected>Seleccione</option>
                            <option value="en-venta">Venta</option>
                            <option value="alquilar">Alquiler</option>
                    </select>
            </td>
            <td></td>
            </tr>   --}}
        </thead>
    <tbody>
        @foreach ($properties as $pro)    
    
            @php 
                $firstImg = array_filter(explode("|", $pro->images)) ;
                $dirImg = $firstImg[0]??'';
    
                $categoria='';
                    if($pro->listingtype==23) $categoria='Casas';
                    if($pro->listingtype==24) $categoria='Departamentos';
                    if($pro->listingtype==25) $categoria='Casas Comerciales';
                    if($pro->listingtype==26) $categoria='Terrenos';
                    if($pro->listingtype==29) $categoria='Quintas';
                    if($pro->listingtype==30) $categoria='Haciendas';
                    if($pro->listingtype==32) $categoria='Locales Comerciales';
                    if($pro->listingtype==35) $categoria='Oficinas';
                    if($pro->listingtype==36) $categoria='Suites';
    
            @endphp
        <tr class="hover:bg-gray-100 border-0 border-b border-gay-200 text-xs">
            <td style="width: 1px;background-color: @if($pro->status==1) royalblue @else red @endif"></td>            
            <td class="w-16"> <img class="w-16" src="https://casacredito.com/uploads/listing/300/{{$dirImg}}" alt=""> </td>
            <td class="text-center"><span class="font-semibold">{{$pro->product_code}}</span><br><span style="color:darkgray;font-size:11px">{{$pro->created_at->format('dMy')}}</span></td>            
            <td class="text-center w-12">
                @if ($pro->status==1) <span class="font-semibold text-blue-800">Activa</span>
                @else <span class="font-semibold text-gray-800">Desactivada</span>         @endif
            </td>
            <td class="px-2 w-12 text-center">{{number_format($pro->property_price)}} <br><span style="font-size: 12px;color:darkgray">{{number_format($pro->property_price_min)}}</span> </td>
            <td class="p-2"> 
                @if(Auth::id()==123)<span style="font-size: 10px">{{$pro->slug}}</span> <br>@endif
                <a href="{{route('admin.listings.edit',$pro->id)}}" target="_blank" class="font-semibold text-blue-800">{{$pro->listing_title}}</a><br> {{$pro->address}} </td>
            <td class="font-semibold w-14 flex justify-center pt-4">{{$categoria}}</td>
            <td class="w-40 text-center">{{$pro->listingtypestatus}}</td>
            <td>{{$pro->user->name??''}}</td>
            </tr>
            @endforeach
            <tr><td colspan="6">
            <input type="hidden" id="pagActual" value="{{$pagActual}}">
            <input type="hidden" id="firstItem" value="{{$firstItem}}">
            <input type="hidden" id="totalProperties2" value="{{$totalProperties}}">
            </td></tr>
    
        </tbody>
    </table>
    @endif
</div>


    
@push('scripts')
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('totalProperties').innerText="{{$properties->total()}}";
    document.getElementById('unoalcien').innerText="{{$pagActual}}";
    
    Livewire.hook('element.updated', (el,comp) => {
        document.getElementById('totalProperties').innerText= @this.totalProperties;
        document.getElementById('unoalcien').innerText = @this.pagActual;
    });

    const pagActual = @this.pagActual;

});

function filter_properties(){
    let b_code      = document.getElementById('b_code').value;
    let b_status    = document.getElementById('b_status').value;
    let b_detalle   = document.getElementById('b_detalle').value;
    let b_categoria = document.getElementById('b_categoria').value;
    let b_tipo      = document.getElementById('b_tipo').value;
    //let b_price     = document.getElementById('b_price').value;
    let b_view      = document.getElementById('view').value;
    let b_available = document.getElementById('b_available').value; //variable para buscar por disponibilidad
    let b_current_url = document.getElementById('b_current_url').value; //saber la ruta actual


    //variables nuevas para buscar por pais, provincia y ciudad
    //let b_country   = document.getElementById('b_country').value;
    let b_state     = document.getElementById('b_state').value;
    let b_city      = document.getElementById('b_city').value;

    //variables nuevas para buscar por precio y ordenar asc o desc
    let b_maxprice = document.getElementById('maxprice').value;
    let b_minprice = document.getElementById('minprice').value;

    let b_order_asc = document.getElementById('asc');
    let b_order_desc = document.getElementById('desc');

    let order_aux;

    if(b_order_asc.checked){
        @this.set('price', b_order_asc.value);
    } else if(b_order_desc.checked){
        @this.set('price', b_order_desc.value);
    }

    @this.set('code', b_code);  
    @this.set('status', b_status);  
    @this.set('detalle', b_detalle);  
    @this.set('categoria', b_categoria);  
    @this.set('tipo', b_tipo);
    //@this.set('price', b_price);
    @this.set('pressButtom', 1);

    @this.set('view', b_view); //para renderizar de nuevo y cambie de vista
    @this.set('available', b_available); //buscar por disponibilidad
    @this.set('current_url', b_current_url); //mandar la actual url -> si es myproperties

    //@this.set('country', b_country);
    @this.set('state', b_state);
    @this.set('city', b_city);

    @this.set('fromprice', b_minprice);
    @this.set('uptoprice', b_maxprice);

    document.getElementById('pricemaxmin').style.display = "none";
}

    
const nextpage = () => {
    let pagActual    = document.getElementById('pagActual').value;
    let firstItem    = document.getElementById('firstItem').value;
    let totalProperties    = document.getElementById('totalProperties2').value;
    console.log('Actual: '+pagActual);        console.log('Total de Paginas: '+ (Math.ceil(totalProperties/50)) );
    if( Math.ceil(totalProperties/50)>pagActual ){
        @this.nextPage()
    }
}
const prevpage = () => {
    let pagActual    = document.getElementById('pagActual').value;
    if(pagActual>1){
        @this.previousPage()
    }else{        
        console.log(pagActual);
    }
}
</script>

@endpush
