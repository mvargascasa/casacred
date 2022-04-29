<div class="bg-white">
    <div class="grid sm:grid-cols-3 gap-4 mx-4">
        @foreach ($properties as $propertie)
            @php
                $firstImg = array_filter(explode("|", $propertie->images)) ;
                $dirImg = $firstImg[0]??'';
            @endphp
            <div class="rounded overflow-hidden shadow-lg w-full relative mt-4 mb-2">
                <a href="{{route('admin.listings.edit',$propertie->id)}}" target="_blank">
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
                <div class="absolute top-0 left-0">
                    @if($propertie->status == 1)
                    <div class="text-sm font-semibold" style="margin-top: 10px; margin-left:10px; background-color: #00a032; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">ACTIVA</div>
                    @else
                    <div class="text-sm font-semibold" style="margin-top: 10px; margin-left:10px; background-color: #b11213; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">DESACTIVADA</div>
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
                <div class="absolute bottom-0 right-0" style="margin-right: 20px; margin-bottom: 20px">
                    <div class="text-xs font-semibold" style="background-color: #017cd3; color: #ffffff; padding: 3px 10px 3px 10px; border-radius: 10px">
                        COD: {{ $propertie->product_code }}
                    </div>
                </div>
                </a>
            </div>
        @endforeach
    </div>

    {{-- <tbody>
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
    
        </tbody> --}}

            <input type="hidden" id="pagActual" value="{{$pagActual}}">
            <input type="hidden" id="firstItem" value="{{$firstItem}}">
            <input type="hidden" id="totalProperties2" value="{{$totalProperties}}">
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
    let b_price     = document.getElementById('b_price').value;

    @this.set('code', b_code);  
    @this.set('status', b_status);  
    @this.set('detalle', b_detalle);  
    @this.set('categoria', b_categoria);  
    @this.set('tipo', b_tipo);
    @this.set('price', b_price);
    @this.set('pressButtom', 1);
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
