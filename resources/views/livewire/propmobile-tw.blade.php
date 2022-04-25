<div>
    
    @php $ii=0; @endphp
    @foreach ($listings as $pro)
    
        @php
            $ii++;
            $imgcover="https://casacredito.com/uploads/listing/600/";	
            $imgpri = explode("|", $pro->images);    
            if(isset($imgpri[0])) $imgpri = $imgcover.$imgpri[0];
            else $imgpri = $imgcover.$pro->cover_image;
        @endphp


    @if($ii==6)
        <div class="p-2 m-auto">
            <div class="overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out border-b border-red-700">
                <img style="cursor: pointer" class="w-full"  onclick="openModal('openLead')" src="{{asset('img/BANNERS-CASA-CREDITO-VENDE-09.webp')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
            </div>
        </div>
    @endif
    @if($ii==11)
        <div class="p-2 m-auto">
            <div class="overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out border-b border-red-700">
                <img style="cursor: pointer" class="w-full" onclick="openModal('openLead')" src="{{asset('img/vende-tu-propiedad-en-casacredito.jpg')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
            </div>
        </div>
    @endif

    <div class="p-2 m-auto"  wire:loading.class="hidden">
        <div class="overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out border-b border-red-700"    >
        
            <div class="relative">
                <a href="{{route('web.detail',$pro->slug)}}"> <img style="height: 10rem;" src="{{$imgpri}}" alt="IMG" class="imgdir rounded object-cover h-40 w-full" /> </a>
                <div class="absolute bottom-0 left-0 bg-yellow-400 rounded px-2 text-white text-xs">{{$pro->category}}</div>
                <div class="absolute bottom-0 right-0 bg-yellow-400 rounded px-2 text-white text-xs">{{$pro->type}}</div>
            </div>
            <div class="p-1">
                <div class="flex items-center justify-between px-2 " >
                    <div class="text-lg text-red-700">$ <span class="font-semibold">{{$pro->property_price}}</span> </div>
                    <p class="text-lg"><span class="text-gray-300">COD:</span><span class="font-semibold text-red-700">{{$pro->product_code}}</span></p>
                </div>
            </div>

            <div class="">
                <div class="flex text-xs align-bottom flex-col px-2 text-gray-400 uppercase">{{$pro->address}}</div>
            </div>

            <div class="">
                <a  href="{{route('web.detail',$pro->slug)}}" class="flex align-bottom flex-col tracking-tight leading-tight  px-2 text-sm font-semibold uppercase">{{$pro->listing_title}}</a>
            </div>

            <div class="flex py-4 px-2 text-xs">
                @if($pro->construction_area)
                <img class="flex ml-2 object-scale-down img-const" width="18" height="10" src="/img/house.png" alt="">
                <span class="ml-1 text-red-700 spn-const"><span class="tmp-const">{{$pro->construction_area}}</span>m<sup>2</sup></span> @endif
                @if($pro->land_area)
                <img class="flex ml-2 object-scale-down img-land" width="16" height="10" src="/img/floor.png" alt="">
                <span class="ml-1 text-red-700 spn-land"><span class="tmp-land">{{$pro->land_area}}</span>m<sup>2</sup></span> @endif
                @if($pro->bedroom)
                <img class="flex ml-2 object-scale-down img-bed" width="18" height="10" src="/img/bed-black.png" alt="">
                <span class="ml-1 text-red-700 spn-bed"><span class="tmp-bed">{{$pro->bedroom}}</span></span> @endif
                @if($pro->bathroom)
                <img class="flex ml-2 object-scale-down img-bath" width="18" height="10" src="/img/bathroom-black.png" alt="">
                <span class="ml-1 text-red-700 spn-bath"><span class="tmp-bath">{{$pro->bathroom}}</span></span> @endif
                @if($pro->garage)
                <img class="flex ml-2 object-scale-down img-park" width="18" height="10" src="/img/garage-black.png" alt="">
                <span class="ml-1 text-red-700 spn-park"><span class="tmp-park">{{$pro->garage}}</span></span> @endif
            </div>
    

        </div>
    </div>
    @endforeach

    @if($listings->count()<6)
        <div class="p-2 m-auto">
            <div class="overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out border-b border-red-700">
                <img style="cursor: pointer" class="w-full"  onclick="openModal('openLead')" src="{{asset('img/BANNERS-CASA-CREDITO-VENDE-09.webp')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
            </div>
        </div>
    @endif
    
    @if($listings->count()<11)
        <div class="p-2 m-auto">
            <div class="overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out border-b border-red-700">
                <img style="cursor: pointer" class="w-full" onclick="openModal('openLead')" src="{{asset('img/vende-tu-propiedad-en-casacredito.jpg')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
            </div>
        </div>
    @endif

    <div>
        
        <input type="hidden" id="pagActual" value="{{$pagActual}}">
        <input type="hidden" id="firstItem" value="{{$firstItem}}">
        <input type="hidden" id="totalProperties2" value="{{$totalProperties}}">
    </div>
    <div  class="p-2 m-auto w-full" wire:loading>
        @for($i=0;$i<10;$i++)
        <div class="p-2 m-auto animate-pulse">
            <div class="overflow-hidden rounded-lg shadow-md bg-white border-b border-red-700">        
                <div class="relative h-40 w-full bg-gray-300"> </div>
                <div class="flex items-center justify-between p-2 ">
                        <div class="w-20 h-6 bg-gray-300 rounded"></div>
                        <div class="w-20 h-6 bg-gray-300 rounded"></div>
                </div>
                <div class="h-4 m-2 bg-gray-300 rounded"> </div>
                <div class="h-6 m-2 bg-gray-300 rounded"> </div>
                <div class="h-6 m-2 bg-gray-300 rounded"> </div>
            </div>
        </div>
        @endfor
    </div>

</div>


@push('scripts')
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('totalProperties').innerText="{{$listings->total()}}";
    document.getElementById('unoalcien').innerText="{{$pagActual}}";

    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries());
        if(params.searchtxt) document.getElementById('schtext').value  = params.searchtxt
        if(params.order)     document.getElementById('schorder').value = params.order
        if(params.type)      document.getElementById('schtype').value = params.type 
        if(params.category)  document.getElementById('schcat').value   = params.category
        if(params.fromprice)  document.getElementById('schpricef').value   = params.fromprice
        if(params.uptoprice)  document.getElementById('schpricet').value   = params.uptoprice
        if(params.superf)  document.getElementById('schsuperf').value   = params.superf
        if(params.supert)  document.getElementById('schsupert').value   = params.supert

    Livewire.hook('element.updated', (el,comp) => {
        document.getElementById('totalProperties').innerText= @this.totalProperties;
        document.getElementById('unoalcien').innerText = @this.pagActual;
    });

    const pagActual = @this.pagActual;

});

function filter_properties(){
        window.scrollTo(0,0)
    let schtext  = document.getElementById('schtext').value;
    let schorder = document.getElementById('schorder').value;
    let schtype  = document.getElementById('schtype').value;
    let schcat   = document.getElementById('schcat').value;
    let schpricef   = document.getElementById('schpricef').value;
    let schpricet   = document.getElementById('schpricet').value;
    let schsuperf   = document.getElementById('schsuperf').value;
    let schsupert   = document.getElementById('schsupert').value;

    let schtag = document.getElementById('schtag').value; //nueva variable para filtrar por tags
    //let schrange = document.getElementById('schrange').value; //nueva variable para filtrar por anios de construccion

    @this.set('searchtxt', schtext);  
    @this.set('order', schorder);  
    @this.set('category', schcat);  
    @this.set('type', schtype);
    @this.set('fromprice', schpricef);
    @this.set('uptoprice', schpricet);
    @this.set('superf', schsuperf);
    @this.set('supert', schsupert);
    @this.set('pressButtom', 1);
    @this.set('tags', schtag); //enviando la nueva variable a la clase
    //@this.set('range', schrange);

    closModal('modalSearch')
}


function filter_clear(){
    document.getElementById('schtext').value   = '';
    document.getElementById('schorder').value  = '';
    document.getElementById('schtype').value   = '';
    document.getElementById('schcat').value    = '';
    document.getElementById('schpricef').value = '';
    document.getElementById('schpricet').value = '';
    document.getElementById('schsuperf').value = '';
    document.getElementById('schsupert').value = '';
    document.getElementById('schtag').value = '';
    //document.getElementById('schrange').value = '';
}

    
const nextpage = () => {
        window.scrollTo(0,0)
    let pagActual    = document.getElementById('pagActual').value;
    let firstItem    = document.getElementById('firstItem').value;
    let totalProperties    = document.getElementById('totalProperties2').value;
    console.log('Actual: '+pagActual);        console.log('Total de Paginas: '+ (Math.ceil(totalProperties/20)) );
    if( Math.ceil(totalProperties/20)>pagActual ){
        @this.nextPage()
    }
}
const prevpage = () => {
        window.scrollTo(0,0)
    let pagActual    = document.getElementById('pagActual').value;
    if(pagActual>1){
        @this.previousPage()
    }else{        
        console.log(pagActual);
    }
}
</script>
@endpush