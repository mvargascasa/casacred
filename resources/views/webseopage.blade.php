@extends('layouts.web')
@section('header')
<title>{{$seopage->title_google}}</title>
@endsection

@section('content')

    <section id="bg-header" style="background: rgba(8, 8, 8, 0.449); background-size: cover;background-position: center; width: 100%; background-repeat: no-repeat; background-blend-mode: darken;">
      <div class="row pt-5 mb-5" style="height: 250px; width: 100%">
          <h1 class="text-center text-white">{{$seopage->title}}</h1>
          <p class="text-center text-white">{{$seopage->description}}</p>
          <div class="text-center text-white mb-2">
              {!!$seopage->info_header!!}
          </div>
      </div>
    </section>

    <div class="container">

        {{-- header --}}

        {{-- listando propiedades --}}
        @foreach ($listings as $listing)
        <div class="card row mb-3 shadow-sm card-listing mx-5" style="border-top:1px #FA7B34 solid">
            <div class="row pr-0">
                <div class="col-sm-6 col-md-6 col-lg-4 p-0">
                  <div class="col p-0">
                      <div class="card" style="border:none">
                        
                        <div id="carouselControls{{$listing->id}}" class="carousel slide card-img-top" data-ride="carousel"  data-interval="false">
                          <div class="carousel-inner" style="max-height: 150px;">
                            @php $iiListing=0 @endphp
                            @if($ismobile==true)
                                @php 
                                  $firstImg = array_filter(explode("|", $listing->images)); 
                                  $imageVerification = asset('uploads/listing/thumb/600/'.$firstImg[0]); 
                                @endphp
                                <div class="carousel-item @if($iiListing==0) active @endif">
                                  <img loading="lazy" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.$firstImg[0])) {{url('uploads/listing/thumb/600',$firstImg[0]??'')}} @else {{url('uploads/listing/600',$firstImg[0]??'')}} @endif" class="d-block w-100" alt="{{$listing->listing_title}}-{{$iiListing++}}">
                                  {{-- @if(@getimagesize($imageVerification)) {{url('uploads/listing/thumb/600',$firstImg[0]??'')}} @else {{url('uploads/listing/600',$firstImg[0]??'')}} @endif --}}
                                  {{-- @if(@getimagesize($imageVerification)) {{url('uploads/listing/thumb/600',$firstImg[0]??'')}} @else https://casacredito.com/uploads/listing/600/{{$firstImg}} @endif --}}
                                </div>
                            @else
                              @php
                                  $imageVerification = asset('uploads/listing/thumb/600/'. strtok($listing->images, '|'));
                              @endphp
                                @foreach(array_filter(explode("|", $listing->images)) as $img)              
                                  <div class="carousel-item @if($iiListing==0) active @endif">
                                    <img loading="lazy" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.$img)) {{url('uploads/listing/thumb/600',$img)}} @else {{url('uploads/listing/600',$img)}} @endif" class="d-block w-100" alt="{{$listing->listing_title}}-{{$iiListing++}}">
                                    {{-- @if(@getimagesize($imageVerification)) {{url('uploads/listing/thumb/600',$img)}} @else {{url('uploads/listing/600',$img)}} @endif --}}
                                  </div>
                                @endforeach
                            @endif
                          </div>
                          <a class="carousel-control-prev" href="#carouselControls{{$listing->id}}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselControls{{$listing->id}}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
         
                        <div class="card-body">
                          <div class="d-flex justify-content-center text-danger">Precio: $ <span class=" font-weight-bold"> {{number_format($listing->property_price, 0, ',', '.')}}</span></div>
                          </div>
                      </div>
                  </div>
                </div>   
              <div class="col-sm-6 col-md-6 col-lg-8"> 
                  <div onclick="window.location.href('{{route('web.detail',$listing->slug)}}');return false;" style="cursor:pointer;">
                    
                    <div class="text-muted font-weight-bold float-left pb-1">COD:<span class="font-weight-bold text-danger">{{$listing->product_code}}</span> </div>
                    <div class="float-right px-3 py-0" style="color:white;font-size: 13px;background-color: #FA7B34">
                        @foreach ($types as $type) @if ($type->id==$listing->listingtype) {{$type->type_title}} @endif @endforeach
                      </div>                
                      {{-- <div class="float-right small px-2" style="color:#FA7B34;font-weight: 500">
                        @foreach ($categories as $cat) @if ($cat->slug==$listing->listingtypestatus) {{$cat->status_title}} @endif @endforeach
                      </div> --}}
                      <br>
                      <div class="w-100  font-weight-bold text-truncate"><a class="link-dark link-sindeco" href="{{route('web.detail',$listing->slug)}}">{{$listing->listing_title}}</a></div>
                    <div class="p-0 small font-weight-bold text-muted">@if(Str::contains($listing->address, ',')){{$listing->address}} @else {{$listing->state}}, {{$listing->city}}, {{$listing->address}}@endif</div>
                    <div class="small lh-sm" style="max-height:50px; overflow: hidden;">{{mb_substr(strip_tags($listing->listing_description),0,200)}}...</div>
                      @php
                          $bedroom=0; //bedroom 41&86&49 //garage 43 //bathroom 48&76&81 // squarefit 44
                            $bathroom=0;$garage=0;$squarefit=0;
                            if(!empty($listing->heading_details)){
                              $allheadingdeatils=json_decode($listing->heading_details); 
                              foreach($allheadingdeatils as $singleedetails) {
                                unset($singleedetails[0]);
                                for($i=1;$i<=count($singleedetails);$i++) { 
                                  if($i%2==0) {  
                                    if($singleedetails[$i-1]==41 || $singleedetails[$i-1]==86 || $singleedetails[$i-1]==49)
                                    { 
                                        if(empty($singleedetails[$i])){ $bedroom+=0; }else{
                                        $bedroom+=$singleedetails[$i]; }
                                    }
                                    if($singleedetails[$i-1]==48 || $singleedetails[$i-1]==76 || $singleedetails[$i-1]==81)
                                    {
                                        if(empty($singleedetails[$i])){ $bathroom+=0; }else{
                                        $bathroom+=$singleedetails[$i]; }
                                    }
                                    if($singleedetails[$i-1]==43)
                                    {
                                        if(empty($singleedetails[$i])){ $garage+=0; }else{
                                        $garage+=$singleedetails[$i]; }
                                    }
                                  }
                                }
                                $i++;
                              }
                                                  }
      
                            
                      @endphp
                      <div class="py-2">
                        @if($listing->construction_area>0)<img src="{{asset('img/house.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$listing->construction_area}} m<sup>2</sup> </span> @endif
                        @if($listing->land_area>0)<img src="{{asset('img/floor.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$listing->land_area}} m<sup>2</sup> </span> @endif
                        @if($bedroom>0)<img src="{{asset('img/bed-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bedroom}} </span> @endif
                        @if($bathroom>0)<img src="{{asset('img/bathroom-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bathroom}} </span> @endif
                        @if($garage>0)<img src="{{asset('img/garage-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$garage}} </span> @endif
                      </div>
                </div>
                <div class="py-2">
                  <button class="btn btn-outline-secondary btn-sm px-1 d-none d-sm-inline-block" 
                data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('COD {{$listing->product_code}}')"><i class="fas fa-comment"></i> Solicitar Informacion</button>
                 
                <button class="btn btn-danger btn-sm px-1 d-block d-sm-none" 
                data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('COD {{$listing->product_code}}')"><i class="fas fa-comment"></i> Solicitar Informacion</button>
                <div class="d-block d-sm-none py-1"></div>
                <a href="tel:+593983849073  " class="btn btn-outline-secondary btn-sm px-1" style="font-size:13px;"><i class="fas fa-phone"></i> LLamar Ecuador</a>
                  <a href="tel:+17186903740" class="btn btn-outline-secondary btn-sm px-1" style="font-size:13px;"><i class="fas fa-phone"></i> Estados Unidos</a>
                </div>
              </div>   
            </div>
        </div>
        @endforeach

        @if(!$seopage->category == 0)
        <div class="d-flex justify-content-center">
            {{$listings->links()}}
        </div>
        @else
        <div>
          @if(isset($seopage->similarlinks_g) && count(json_decode($seopage->similarlinks_g))>0)
              <p>{{$seopage->subtitle_if_general}}</p>
              <div class="row mt-2 mb-4">
                @php
                  $array = json_decode($seopage->similarlinks_g);
                @endphp
                @foreach ($array as $similarlink_g)
                  @php
                    $position = strpos($similarlink_g, '|');
                  @endphp
                  <div class="col-sm-4 my-2">
                    <a href="{{substr($similarlink_g, $position+1)}}">{{substr($similarlink_g, 0, $position)}}</a>  
                  </div>  
                @endforeach
              </div>
            @endif
        </div>
        @endif
        {{-- section footer --}}
        <div class="row">
            <div>
                {!! $seopage->info_footer !!}
            </div>

            {{-- links --}}
            @if(isset($seopage->similarlinks) && count(json_decode($seopage->similarlinks))>0)
            <hr>
              <p class="display-6">También te puede interesar</p>
              <div class="row mt-2 mb-4">
                @php
                  $array = json_decode($seopage->similarlinks);
                @endphp
                @foreach ($array as $similarlink)
                  @php
                    $position = strpos($similarlink, '|');
                  @endphp
                  <div class="col-sm-4 my-2">
                    <a href="{{substr($similarlink, $position+1)}}">{{substr($similarlink, 0, $position)}}</a>  
                  </div>  
                @endforeach
              </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
      window.addEventListener('load', () => {
        let url = "https://www.escafandra.news/wp-content/uploads/2020/11/Catedral-Cuenca-Ecuador-1050x500-1.jpg";
        if("url({{asset($seopage->url_image)}})".includes('img')) url = "{{asset($seopage->url_image)}}";
        document.getElementById('bg-header').style.backgroundImage = "url("+url+")";
        console.log(url);
      });
    </script>
@endsection