@extends('layouts.webmobile')

@section('header')
    <title>{{$listing->product_code}} {{$listing->listing_title}} - CasaCredito</title>
    <meta name="description" content="{{mb_substr(trim(strip_tags($listing->listing_description)),0,180)}}..."/>
    <meta name="keywords" content="Casas en venta en cuenca ecuador, Apartamentos en venta en cuenca ecuador, terrenos en venta en cuenca ecuador, lotes en venta en cuenca ecuador">

    <meta property="og:url"                content="{{route('web.detail',$listing->slug)}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="{{$listing->listing_title}}" />
    <meta property="og:description"        content="{{mb_substr(trim(strip_tags($listing->listing_description)),0,180)}}..." />
    
    @php $firstImg = array_filter(explode("|", $listing->images)) @endphp
    <meta property="og:image"              content="{{url('uploads/listing/600',$firstImg[0]??'')}}" />
    <style>
            
        .hide-scroll-bar { -ms-overflow-style: none; scrollbar-width: none;        }
        .hide-scroll-bar::-webkit-scrollbar { display: none;        }

        .dropdown:focus-within .dropdown-menu {
            opacity:1;
            transform: translate(0) scale(1);
            visibility: visible;
        }
    </style>
@endsection

@section('content') 


<div>
    <div class="m-auto">
        <div class="overflow-hidden bg-white">
        
            <div class="relative">
                    <img id="imgPrinc" onclick="openModal('modalimgdet')" style="height:200px" src="https://casacredito.com/uploads/listing/600/{{$firstImg[0]??''}}" alt="Placeholder" class="object-cover w-full" />

                    <div style="top:60px" class="absolute right-0 py-4 z-20" onclick="imgnext()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="darkred">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                          </svg>
                    </div>
                    <div style="top:60px" class="absolute left-0 py-4 z-20" onclick="imgprev()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="darkred">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                          </svg>
                    </div>

                    <div class="absolute top-0 right-0 ml-24 dropdown">
                        <span class="rounded-md shadow-sm">
                            <button class="sharebtn relative flex z-10 bg-white border rounded-md p-2 opacity-50 hover:opacity-100 focus:outline-none focus:border-blue-400" title="click to enable menu">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-5 w-6 my-1 text-red-900">
                                  <path fill="currentColor" d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z">
                                  </path>
                                </svg>
                            </button>
                        </span>
                        <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                            <div class="absolute right-0 w-40 mt-2 origin-top-right bg-white border border-gray-200 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                            <div class="py-1">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{route('web.detail',$listing->slug)}}" target="_blank" title="Share on Facebook" class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                                        <img class="mx-2" src="{{asset('img/casacredito-facebook.svg')}}" alt="Facebook Casacredito" width="20" height="20">
                                        <span class="text-gray-600">Facebook</span>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text={{route('web.detail',$listing->slug)}}" target="_blank" title="Share on Whatsapp" class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                                        <img class="mx-2" src="{{asset('img/casacredito-whatsapp.svg')}}" alt="Whatsapp Casacredito" width="20" height="20">
                                        <span class="text-gray-600">Whatsapp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>


            <div class="p-1 border-b border-red-100 overflow-x-auto h-20  flex hide-scroll-bar" id="boxImgList">
                <template id="imgList">
                    @php $ii=0; @endphp
                    @foreach ($firstImg as $img)                    
                        <img onclick="princImg('{{$ii++}}')" src="https://casacredito.com/uploads/listing/300/{{$img??''}}" class="h-16 px-1 object-cover">
                    @endforeach

                </template>
            </div>

            <div class="py-2 border-b border-red-100">
                <div class="flex items-center justify-between px-4" >
                    <div class="text-2xl text-red-700">$ <span class="font-semibold">{{number_format($listing->property_price)}}</span>
                    </div>
                    <p class="text-2xl"><span class="text-gray-300">COD:</span><span class="font-semibold text-red-700">{{$listing->product_code}}</span></p>
                </div>
            </div>
            @if($listing->listingtypestatus!='alquilar')
            @php
                $setenta = $listing->property_price*0.70;
                $cuotas = $setenta/88;
            @endphp
            <div class="">
                <div class="w-full py-1 text-sm text-white align-bottom flex-col px-2 bg-red-800">
                    Cuotas desde <span class="font-semibold">${{number_format($cuotas,0)}}</span> con financimiento
                </div>
            </div>
            @endif
            <div class="p-1">
                <div class="text-sm  flexalign-bottom flex-col px-2 text-gray-400 uppercase">{{$listing->address}}</div>
            </div>

            <div class="px-1">
                <div class="flex align-bottom flex-col tracking-tight text-xl leading-tight  px-2 font-semibold uppercase">{{$listing->listing_title}}</div>
            </div>

            @php
                $typestatus['en-venta'] = 'VENTA';
                $typestatus['alquilar'] = 'ALQUILER';
                $typestatus['proyectos'] = 'PROYECTOS';

                $bedroom=0;$bathroom=0;$garage=0;                                  
                if(!empty($listing->heading_details)){
                    $allheadingdeatils=json_decode($listing->heading_details); 
                    foreach($allheadingdeatils as $singleedetails){ 
                                    unset($singleedetails[0]);								
                        for($i=1;$i<=count($singleedetails);$i++){ 
                        if($i%2==0){  
                            if($singleedetails[$i-1]==41 || $singleedetails[$i-1]==86 || $singleedetails[$i-1]==49) $bedroom+=$singleedetails[$i];
                            if($singleedetails[$i-1]==48 || $singleedetails[$i-1]==76 || $singleedetails[$i-1]==81 || $singleedetails[$i-1]==49) $bathroom+=$singleedetails[$i];
                            if($singleedetails[$i-1]==43) $garage+=$singleedetails[$i];									  
                        }								   
                        }								
                        $i++;
                    }
                }
            @endphp
            

            <div class="p-1">
                <div class="text-sm flex align-bottom flex-col px-2 text-yellow-500 uppercase"> 
                    {{$types->where('id',$listing->listingtype)->first()->type_title??''}} - {{$typestatus[$listing->listingtypestatus]??''}} 
                </div>
            </div>

            <div class="flex py-4 px-2 text-sm">
                @if($listing->construction_area)
                <img class="flex ml-2 object-scale-down" width="19" height="10" src="/assets/images/house.png" alt="">
                <span class="ml-1 text-red-700">{{$listing->construction_area}}m<sup>2</sup></span> @endif
                @if($listing->land_area)
                <img class="flex ml-2 object-scale-down" width="17" height="10" src="/assets/images/floor.png" alt="">
                <span class="ml-1 text-red-700">{{$listing->land_area}}m<sup>2</sup></span> @endif

                @if($bedroom>0)
                <img class="flex ml-2 object-scale-down" width="19" height="10" src="/assets/images/bed-black.png" alt="">
                <span class="ml-1 text-red-700">{{$bedroom}}</span> @endif
                @if($bathroom>0)
                <img class="flex ml-2 object-scale-down" width="19" height="10" src="/assets/images/bathroom-black.png" alt="">
                <span class="ml-1 text-red-700">{{$bathroom}}</span> @endif
                @if($garage>0)
                <img class="flex ml-2 object-scale-down" width="19" height="10" src="/assets/images/garage-black.png" alt="">
                <span class="ml-1 text-red-700">{{$garage}}</span> @endif
            </div>
    

        </div>
        <div class="m-4 p-2 border rounded border-red-100 text-sm bg-white">
            <h4 class="text-lg font-semibold px-2 text-red-900 tracking-wide ">DESCRIPCION</h4>
            <hr class="my-2">{!!$listing->listing_description!!}</div>
        
        @if(is_array(json_decode($listing->heading_details)))
        <div class="m-4 p-2 border rounded border-red-100 text-sm bg-white">
            <h4 class="text-lg font-semibold px-2 text-red-900 tracking-wide ">DETALLES</h4>
            <hr class="my-2">
            
            @foreach(json_decode($listing->heading_details) as $dets)
            <h4 class="font-semibold pt-4 px-2 tracking-wide ">{{$dets[0]}}</h4>
           <ul class="grid grid-cols-2 gap-2">

            <?php unset($dets[0]); $printControl=0; ?>        
            @foreach($dets as $det)
                @if($printControl==0)
                  <?php $printControl=1; ?>                          

            <li><span class="flex"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg> @foreach ($details as $detail) @if($detail->id==$det) {{$detail->charac_titile}} @endif  @endforeach</span></li>


              @else                
              <?php $printControl=0; ?>
            
            @endif
        @endforeach    
            
              
           </ul>
           @endforeach  
        </div>
        @endif
        
        @if( count(array_filter(explode(",", $listing->listinglistservices)))>0 )
        <div class="m-4 p-2 border rounded border-red-100 text-sm bg-white">
            <h4 class="text-lg font-semibold px-2 text-red-900 tracking-wide ">SERVICIOS</h4>
            <hr class="my-2">

            <ul class="grid grid-cols-2 gap-2"> 
                @foreach(array_filter(explode(",", $listing->listinglistservices)) as $serv)
                    <li><span class="flex"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>  @foreach ($services as $service) @if($service->id==$serv) {{$service->charac_titile}} @endif  @endforeach </span></li>
                @endforeach    
            </ul>
        </div>
        @endif

        @if( count(array_filter(explode(",", $listing->listingcharacteristic)))>0 )
        <div class="m-4 p-2 border rounded border-red-100 text-sm bg-white">
            <h4 class="text-lg font-semibold px-2 text-red-900 tracking-wide ">BENEFICIOS</h4>
            <hr class="my-2">
            <ul class="grid grid-cols-2 gap-2">                 
                @foreach(array_filter(explode(",", $listing->listingcharacteristic)) as $bene)
                    <li><span class="flex"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>@foreach ($benefits as $benef) @if($benef->id==$bene) {{$benef->charac_titile}} @endif  @endforeach</span></li>
                @endforeach    
        </div>
        @endif

    </div>
</div>


<div id="modalimgdet" class="modal z-50 h-screen w-full fixed left-0 top-0 flex flex-col justify-center items-center bg-black hidden" >
    <!-- modal -->
    <div class="mx-auto max-w-2xl">
        <div class="shadow-2xl relative">
          <!-- large image on slides -->
          <div class="mySlides">
            <div class="image1 w-full object-cover">
              <img id="imgdetalle" class="w-full  object-cover" src="https://casacredito.com/uploads/listing/{{$firstImg[0]??''}}" alt="Foto de Propiedad" />
            </div>
          </div>    
          <!-- butttons -->
          <a class="absolute right-0 top-0 flex items-center px-4 py-2 text-red-900 cursor-pointer z-20" onclick="closModal('modalimgdet')">Cerrar(X)</a>
          <a class="absolute left-0  inset-y-0 flex items-center px-4 text-red-900 cursor-pointer text-3xl font-extrabold" onclick="imgdetprev()">❮</a>
          <a class="absolute right-0 inset-y-0 flex items-center px-4 text-red-900 cursor-pointer text-3xl font-extrabold" onclick="imgdetnext()">❯</a>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>

    var imgindex = 0 ;
    const listimages = @json($firstImg);

    const imgnext = () => {
        imgindex++;
        let wdiv = document.getElementById('boxImgList').scrollWidth / listimages.length ;
        if(listimages[imgindex]==undefined) imgindex = 0
        document.getElementById('boxImgList').scrollLeft  = wdiv * imgindex
        document.getElementById('imgPrinc').src = 'https://casacredito.com/uploads/listing/600/'+listimages[imgindex] ;
    }

    const imgprev = () => {
        imgindex--;
        let wdiv = document.getElementById('boxImgList').scrollWidth / listimages.length ;
        if(listimages[imgindex]==undefined) imgindex = listimages.length-1 
        console.log(wdiv * imgindex);
        document.getElementById('boxImgList').scrollLeft  = wdiv * imgindex
        document.getElementById('imgPrinc').src = 'https://casacredito.com/uploads/listing/600/'+listimages[imgindex] ;
    }
    

    const imgdetnext = () => {
        imgindex++;
        let wdiv = document.getElementById('boxImgList').scrollWidth / listimages.length ;
        if(listimages[imgindex]==undefined) imgindex = 0
        document.getElementById('boxImgList').scrollLeft  = wdiv * imgindex
        document.getElementById('imgdetalle').src = 'https://casacredito.com/uploads/listing/'+listimages[imgindex] ;
        document.getElementById('imgPrinc').src = 'https://casacredito.com/uploads/listing/600/'+listimages[imgindex] ;
    }

    const imgdetprev = () => {
        imgindex--;
        let wdiv = document.getElementById('boxImgList').scrollWidth / listimages.length ;
        if(listimages[imgindex]==undefined) imgindex = listimages.length-1 
        console.log(wdiv * imgindex);
        document.getElementById('boxImgList').scrollLeft  = wdiv * imgindex
        document.getElementById('imgdetalle').src = 'https://casacredito.com/uploads/listing/'+listimages[imgindex] ;
        document.getElementById('imgPrinc').src = 'https://casacredito.com/uploads/listing/600/'+listimages[imgindex] ;
    }    

    document.addEventListener("DOMContentLoaded", function(event) {    
        document.getElementById('interest').value = '{{$listing->product_code}}';
        let getImages  = document.getElementById('imgList').content;
        document.getElementById('boxImgList').appendChild(getImages); 
    });
    const princImg = (img) => {
        imgindex = img;
        document.getElementById('imgPrinc').src = 'https://casacredito.com/uploads/listing/600/'+listimages[imgindex] ;
    }

</script>
@endsection
