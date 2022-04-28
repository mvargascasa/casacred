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
