<div class="bg-white">
    @if(count($properties)>0)
    @if($view == 'grid')
    <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mx-4">
        @foreach ($properties as $propertie)
            @php
                $firstImg = array_filter(explode("|", $propertie->images)) ;
                $dirImg = $firstImg[0]??'';
            @endphp
            <div class="rounded overflow-hidden shadow-lg w-full relative mt-4 mb-2 hover-trigger relative pb-2">
                {{-- web.detail  --}}
                {{-- {{route('admin.listings.edit',$propertie->id)}} --}}
                @if(Auth::user()->role == "user" || Auth::user()->role == "ASESOR")
                    <a href="@if($url_current == "admin.myproperties" || Route::current()->getName() == "admin.myproperties"){{ route('admin.listings.edit', $propertie->id) }} @else {{route('admin.show.listing', $propertie->id)}}@endif" target="_blank">
                        {{-- @if(Route::current()->getName() == "admin.myproperties" || Auth::user()->role == "administrator") {{ route('admin.listings.edit', $propertie->id) }} @else {{ route('admin.show.listing', $propertie->id) }} @endif --}}
                @endif

                @if($dirImg != null || $dirImg != "")
                @php
                    $imageVerification = asset('uploads/listing/thumb/600/'.$dirImg);
                @endphp
                <a target="_blank" href="@if($url_current == "admin.myproperties" || Route::current()->getName() == "admin.myproperties"){{ route('admin.listings.edit', $propertie->id) }} @else {{ route('admin.show.listing', $propertie) }} @endif"><img class="w-full" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.$dirImg)) {{ url('/uploads/listing/thumb/600/', $dirImg) }} @else {{url('uploads/listing/600', $dirImg)}} @endif" alt="{{ $propertie->listing_title}}"></a>
                {{-- @if(@getimagesize($imageVerification)) {{ url('/uploads/listing/thumb/600/', $dirImg) }} @else {{url('uploads/listing/600', $dirImg)}} @endif --}}
                @else
                    <a target="_blank" href="@if($url_current == "admin.myproperties" || Route::current()->getName() =="admin.myproperties"){{route('admin.listings.edit', $propertie->id) }} @else {{ route('admin.show.listing', $propertie) }} @endif"><img class="w-full" src="{{ asset('img/sin-imagenes.jpg') }}" alt="Sunset in the mountains"></a>
                    {{-- <div class="absolute top-0 left-0 w-full h-full" style="display: flex; justify-content: center; align-items: center">
                        <p style="color: #ffffff" class="flex">Sin imágenes</p>
                    </div> --}}
                
                @endif

                {{-- <div class="absolute left-0" style="top: 30px">
                    @if($propertie->available != null)
                        @if($propertie->available == 2)
                            <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; background-color: #b11213; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">NO DISPONIBLE</div>
                        @else
                            <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; background-color: #01842a; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">DISPONIBLE</div>
                        @endif
                    @endif
                </div> --}}

                <div class="absolute left-0 top-0">
                    @if($propertie->status == 1)
                        <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; border-radius: 10px; width: 10px; height: 10px; background-color: #01842a; border-radius: 25px">
                            {{-- <img width="35px" src="{{ asset('img/on.png') }}" alt="ON"> --}}
                        </div>
                    @else
                        <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; border-radius: 10px; width: 10px; height: 10px; background-color: #b11213; border-radius: 25px">
                            {{-- <img width="35px" src="{{ asset('img/off.png') }}" alt="OFF"> --}}
                        </div>
                    @endif
                </div>

                <div class="px-2 py-2">
                <div class="text-xs text-gray-500">{{$propertie->created_at->format('d-M-y')}}</div>
                <div class="font-bold text-sm">{{ Str::limit($propertie->listing_title, 30, '...')}}</div>
                <p class="text-gray-700 text-base">
                    @if(Str::contains($propertie->address, ',')){{ Str::limit($propertie->address, 30, '...')}} @else {{Str::limit($propertie->state . ', ' . $propertie->city . ', ' . $propertie->address, 30, '...') }} @endif
                </p>
                <p>@if(Auth::id()==123)<span style="font-size: 10px">{{$propertie->slug}}</span> <br>@endif</p>
                </div>
                <div class="grid grid-cols-2 px-2 py-2 w-full">
                    <div>
                        <span class="inline-block bg-gray-200 rounded-full px-2 text-sm font-semibold text-gray-700">{{ $propertie->listingtypestatus}}</span>
                        <p class="mx-2 text-red-600 font-extrabold text-xl">${{ number_format($propertie->property_price)}}</p class="mx-2 text-red-600 font-bold">
                    </div>
                    <div style="@if($propertie->listingtagstatus==2 && $propertie->listingtype != 26) margin-left: -20px @else margin-left: 0px @endif">
                        <div class="bottom-0 right-0 flex">
                            @if($propertie->available != null)
                            <div class="mr-1">
                                    @if($propertie->available == 2)
                                        <img title="NO DISPONIBLE" width="28px" src="{{asset('img/not-available.png')}}" alt="NOT AVAILABLE">
                                    @else
                                        <img title="DISPONIBLE" width="28px" src="{{asset('img/available.png')}}" alt="AVAILABLE">
                                    @endif
                                </div>
                            @endif
                            <div class="mr-1">
                                @if ($propertie->listing_type==2)
                                    <img width="28px" src="{{ asset('img/pagada.png') }}" alt="Pagada" title="PROPIEDAD PAGADA">
                                @elseif($propertie->listing_type==1)
                                    <img width="28px" src="{{ asset('img/free.png') }}" alt="Gratis" title="PROPIEDAD GRATIS">
                                @endif
                            </div>
                            <div class="mr-1">
                                @if ($propertie->listingtagstatus==2 && $propertie->listingtype != 26)
                                    <img width="28px" src="{{ asset('img/worker.png') }}" alt="Constructora" title="CONSTRUCTORA">
                                @endif
                            </div>
                            <div style="width:80px; height: auto; background-color: #017cd3; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">
                                <p class="text-xs font-semibold">
                                    COD: {{ $propertie->product_code }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                

                {{-- @if(Auth::user()->role == "administrator")
                <div class="absolute bg-white border border-grey-100 px-4 py-2 hover-target" style="top: 5px; right: 5px;">
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
                @endif --}}
                @if(Auth::user()->role == "user" || Auth::user()->role == "ASESOR")
                    </a>
                @endif

                @if(Auth::user()->role == 'administrator')
                @if(Auth::user()->email == "developer2@casacredito.com")
                    <div class="flex ml-3">
                        <p>h-{{$propertie->bedroom}}</p>
                        <p>b-{{$propertie->bathroom}}</p>
                        <p>g-{{$propertie->garage}}</p>
                    </div>
                @endif
                <div class="flex justify-center">
                    {{-- <a target="_blank" class="btn-view mr-1 p-1 rounded" style="background-color: #c6f6d5" href="{{ route('admin.show.listing', $propertie) }}" style="text-decoration: none;">
                        <p class="text-black text-xs" style="font-weight: 500">Ver propiedad</p>
                    </a> --}}
                    <a target="_blank" class="btn-edit ml-1 p-1 rounded" style="background-color: #c6f6d5" href="{{ route('home.tw.edit', $propertie) }}" style="text-decoration: none">
                        <p class="text-black text-sm" style="font-weight: 500">Editar propiedad</p>
                    </a>
                </div>
                @endif
            </div>
        @endforeach
        <input type="hidden" id="pagActual" value="{{$pagActual}}">
        <input type="hidden" id="firstItem" value="{{$firstItem}}">
        <input type="hidden" id="totalProperties2" value="{{$totalProperties}}">

    </div>

    {{-- DIV PARA SIMILAR PROPERTIES --}}
    @if(count($similar_properties)>0)
    <hr class="mt-3">
    <h3 class="mx-4 text-md mt-3 font-semibold">Propiedades Similares a la Búsqueda</h3>
    <div class="grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mx-4">
        @foreach ($similar_properties as $s_propertie)
            @php
                $firstImg = array_filter(explode("|", $s_propertie->images)) ;
                $dirImg = $firstImg[0]??'';
            @endphp
            <div class="rounded overflow-hidden shadow-lg w-full relative mt-4 mb-2 hover-trigger relative pb-2">
                @if(Auth::user()->role == "user" || Auth::user()->role == "ASESOR")
                    <a href="@if($url_current == "admin.myproperties" || Route::current()->getName() == "admin.myproperties"){{ route('admin.listings.edit', $s_propertie->id) }} @else {{route('admin.show.listing', $s_propertie->id)}}@endif" target="_blank">
                @endif

                @if($dirImg != null || $dirImg != "")
                @php
                    $imageVerification = asset('uploads/listing/thumb/600/'.$dirImg);
                @endphp
                <a target="_blank" href="@if($url_current == "admin.myproperties" || Route::current()->getName() == "admin.myproperties"){{ route('admin.listings.edit', $s_propertie->id) }} @else {{ route('admin.show.listing', $s_propertie) }} @endif"><img class="w-full" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.$dirImg)) {{ url('/uploads/listing/thumb/600/', $dirImg) }} @else {{url('uploads/listing/600', $dirImg)}} @endif" alt="{{ $propertie->listing_title}}"></a>
                @else
                    <a target="_blank" href="@if($url_current == "admin.myproperties" || Route::current()->getName() =="admin.myproperties"){{route('admin.listings.edit', $s_propertie->id) }} @else {{ route('admin.show.listing', $s_propertie) }} @endif"><img class="w-full" src="{{ asset('img/sin-imagenes.jpg') }}" alt="Sunset in the mountains"></a>
                @endif
                <div class="absolute left-0 top-0">
                    @if($s_propertie->status == 1)
                        <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; border-radius: 10px; width: 10px; height: 10px; background-color: #01842a; border-radius: 25px">
                            {{-- <img width="35px" src="{{ asset('img/on.png') }}" alt="ON"> --}}
                        </div>
                    @else
                        <div class="text-xs font-semibold" style="margin-top: 5px; margin-left:5px; border-radius: 10px; width: 10px; height: 10px; background-color: #b11213; border-radius: 25px">
                            {{-- <img width="35px" src="{{ asset('img/off.png') }}" alt="OFF"> --}}
                        </div>
                    @endif
                </div>

                <div class="px-2 py-2">
                <div class="text-xs text-gray-500">{{$s_propertie->created_at->format('d-M-y')}}</div>
                <div class="font-bold text-sm">{{ Str::limit($s_propertie->listing_title, 30, '...')}}</div>
                <p class="text-gray-700 text-base">
                    @if(Str::contains($s_propertie->address, ',')){{ Str::limit($s_propertie->address, 30, '...')}} @else {{Str::limit($s_propertie->state . ', ' . $s_propertie->city . ', ' . $s_propertie->address, 30, '...') }} @endif
                </p>
                <p>@if(Auth::id()==123)<span style="font-size: 10px">{{$s_propertie->slug}}</span> <br>@endif</p>
                </div>
                <div class="grid grid-cols-2 px-2 py-2 w-full">
                    <div>
                        <span class="inline-block bg-gray-200 rounded-full px-2 text-sm font-semibold text-gray-700">{{ $s_propertie->listingtypestatus}}</span>
                        <p class="mx-2 text-red-600 font-extrabold text-xl">${{ number_format($s_propertie->property_price)}}</p class="mx-2 text-red-600 font-bold">
                    </div>
                    <div style="@if($s_propertie->listingtagstatus==2 && $s_propertie->listingtype != 26) margin-left: -20px @else margin-left: 0px @endif">
                        <div class="bottom-0 right-0 flex">
                            @if($s_propertie->available != null)
                            <div class="mr-1">
                                    @if($s_propertie->available == 2)
                                        <img title="NO DISPONIBLE" width="28px" src="{{asset('img/not-available.png')}}" alt="NOT AVAILABLE">
                                    @else
                                        <img title="DISPONIBLE" width="28px" src="{{asset('img/available.png')}}" alt="AVAILABLE">
                                    @endif
                                </div>
                            @endif
                            <div class="mr-1">
                                @if ($s_propertie->listing_type==2)
                                    <img width="28px" src="{{ asset('img/pagada.png') }}" alt="Pagada" title="PROPIEDAD PAGADA">
                                @elseif($s_propertie->listing_type==1)
                                    <img width="28px" src="{{ asset('img/free.png') }}" alt="Gratis" title="PROPIEDAD GRATIS">
                                @endif
                            </div>
                            <div class="mr-1">
                                @if ($s_propertie->listingtagstatus==2 && $s_propertie->listingtype != 26)
                                    <img width="28px" src="{{ asset('img/worker.png') }}" alt="Constructora" title="CONSTRUCTORA">
                                @endif
                            </div>
                            <div style="width:80px; height: auto; background-color: #017cd3; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">
                                <p class="text-xs font-semibold">
                                    COD: {{ $s_propertie->product_code }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->role == "user" || Auth::user()->role == "ASESOR")
                    </a>
                @endif

                @if(Auth::user()->role == 'administrator')
                @if(Auth::user()->email == "developer2@casacredito.com")
                    <div class="flex ml-3">
                        <p>h-{{$s_propertie->bedroom}}</p>
                        <p>b-{{$s_propertie->bathroom}}</p>
                        <p>g-{{$s_propertie->garage}}</p>
                    </div>
                @endif
                <div class="flex justify-center">
                    <a target="_blank" class="btn-edit ml-1 p-1 rounded" style="background-color: #c6f6d5" href="{{ route('home.tw.edit', $s_propertie) }}" style="text-decoration: none">
                        <p class="text-black text-sm" style="font-weight: 500">Editar propiedad</p>
                    </a>
                </div>
                @endif
            </div>
        @endforeach
    </div>
    @endif

    {{-- TERMINA DIV DE SIMILAR PROPERTIES --}}

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
                <a href="{{route('admin.listings.edit',$pro->id)}}" target="_blank" class="font-semibold text-blue-800">{{$pro->listing_title}}</a><br> @if(Str::contains($pro->address, ',')) {{$pro->address}} @else {{$pro->state}}, {{$pro->city}}, {{$pro->address}} @endif</td>
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
    @else
    <div class="flex justify-center p-5 font-semibold">
        <p>
            No hemos encontrado propiedades
        </p>
    </div>
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

function clear_filters(){
    let b_code      = document.getElementById('b_code').value = "";
    let b_status    = document.getElementById('b_status').value = "";
    let b_detalle   = document.getElementById('b_detalle').value = "";
    let b_categoria = document.getElementById('b_categoria').value = "";
    let b_tipo      = document.getElementById('b_tipo').value = "";
    // let b_view      = document.getElementById('view').value = "";
    let b_current_url = document.getElementById('b_current_url').value = "";

    let b_state     = document.getElementById('b_state').value = "";
    let b_city      = document.getElementById('b_city').value = "";

    let b_maxprice = document.getElementById('maxprice').value = "";
    let b_minprice = document.getElementById('minprice').value = "";

    let b_order_asc = document.getElementById('asc');
    let b_order_desc = document.getElementById('desc');

    let b_asesor = document.getElementById('b_asesor').value = "";

    let b_fromdate = document.getElementById('fromdate').value = "";
    let b_untildate = document.getElementById('untildate').value = "";
    filter_properties(); toggleModal();
}

function filter_properties(){
    let b_code      = document.getElementById('b_code').value;
    let b_status    = document.getElementById('b_status').value;
    let b_detalle   = document.getElementById('b_detalle').value;
    let b_categoria = document.getElementById('b_categoria').value;
    let b_tipo      = document.getElementById('b_tipo').value;
    //let b_price     = document.getElementById('b_price').value;
    let b_view      = document.getElementById('view').value;
    //let b_available = document.getElementById('b_available').value; //variable para buscar por disponibilidad
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

    //filtrar por asesor
    let b_asesor = document.getElementById('b_asesor').value;

    //filter date
    let b_fromdate = document.getElementById('fromdate').value;
    let b_untildate = document.getElementById('untildate').value;

    if(b_untildate < b_fromdate) alert('Formato no valido');

    let order_aux;

    // console.log("Codigo " + b_code);
    // console.log("Status " + b_status);
    // console.log("Detalle " + b_detalle);
    // console.log("Categoria " + b_categoria);
    // console.log("Tipo " + b_tipo);
    // console.log("View " + b_view);
    // console.log("Current URL " + b_current_url);
    // console.log("Estado " + b_state);
    // console.log("Ciudad " + b_city);
    // console.log("Precio maximo " + b_maxprice);
    // console.log("Precio minimo " + b_minprice);
    // console.log("Order 1 "+b_order_asc);
    // console.log("Order 2" + b_order_desc);
    // console.log("Asesor " + b_asesor);
    // console.log("From date " + b_fromdate);
    // console.log("Until date " + b_untildate);

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
    //@this.set('available', b_available); //buscar por disponibilidad
    @this.set('current_url', b_current_url); //mandar la actual url -> si es myproperties

    //@this.set('country', b_country);
    @this.set('state', b_state);
    @this.set('city', b_city);

    @this.set('fromprice', b_minprice);
    @this.set('uptoprice', b_maxprice);

    @this.set('asesor', b_asesor);

    @this.set('fromdate', b_fromdate);
    @this.set('untildate', b_untildate);

    //document.getElementById('pricemaxmin').style.display = "none";
    //document.getElementById('datefilter').style.display = "none";
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
