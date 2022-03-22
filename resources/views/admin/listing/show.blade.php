@extends('layouts.dash')
@section('header')
    <title>Admin - {{$listing->listing_title}}</title>
@endsection

@section('content')
<div class="col-md-10">
    <div class="row py-2">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8 card">
          @if (session('status'))
              <div class="alert alert-success mt-2" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          @if (session('alert'))
              <div class="alert alert-success mt-2" role="alert">
                  {{ session('alert') }}
              </div>
          @endif
          <h4 class="p-2 text-danger">Editando Propiedad  
              <span style="color:darkgray">Creado: {{$listing->created_at->format('d M y')}} Por: {{$listing->user->name??'User'}}</span>
            </h4>
          
            <div class="my-3 row border-bottom">     
                <div class="col-sm-4">
                    <label class="form-label text-muted">Codigo de Propiedad</label><br>
                    <label class="font-weight-bold">{{$listing->product_code}}</label>
                </div>
                <div class="col-sm-4">       
                    <label class="form-label text-muted">Plan</label><br>
                    <label class="font-weight-bold">{{$listing->listing_type=='2'?'Pago':'Gratis'}}</label>
                </div>
                <div class="col-sm-4">       
                    <label class="form-label text-muted">Status</label><br>
                    <label class="font-weight-bold">{{$listing->status=='1'?'ACTIVO':'DESACTIVADO'}}</label>   
                </div>
            </div>
            
            <div class="mb-3 row border-bottom">
                <div class="col-sm-6">          
                    <label class="form-label text-muted">Nombre de Propietario</label><br>
                    <label class="font-weight-bold">{{$listing->owner_name}}</label> 
                </div>
            </div>
        
            <div class="mb-3 border-bottom">
                <label class="form-label text-muted">Titulo de Propiedad</label><br>
                <label class="font-weight-bold">{{$listing->listing_title}}</label> 
            </div>        
        
            <div class="mb-3 row border-bottom">
                <div class="col-sm-3">
                    <label class="form-label text-muted">Construcción</label><br>
                    <label class="font-weight-bold">{{$listing->construction_area}}</label> 
                </div>
                <div class="col-sm-3">
                    <label class="form-label text-muted">Superficie</label><br>
                    <label class="font-weight-bold">{{$listing->land_area}}</label> 
                </div>
                <div class="col-sm-3">
                    <label class="form-label text-muted">Frente</label><br>
                    <label class="font-weight-bold">{{$listing->Front}}</label> 
                </div>
                <div class="col-sm-3">
                    <label class="form-label text-muted">Fondo</label><br>
                    <label class="font-weight-bold">{{$listing->Fund}}</label> 
                </div>
            </div>
            
        
            <div class="mb-3 row border-bottom">
                <div class="col-sm-6">
                    <label class="form-label text-muted">Precio Max</label><br>
                    <label class="font-weight-bold">{{$listing->property_price}}</label> 
                </div>
                <div class="col-sm-6">
                    <label class="form-label text-muted">Precio Min</label><br>
                    <label class="font-weight-bold">{{$listing->property_price_min}}</label> 
                </div>
            </div>
            
            <div class="mb-3 border-bottom">
                <label class="form-label text-muted">Localidad</label><br>
                <label class="font-weight-bold">{{$listing->address}}</label> 
            </div>
        
            <div class="mb-3 row border-bottom">
                <div class="col-sm-6">          
                    <label class="form-label text-muted">Provincia</label><br>
                    <label class="font-weight-bold">{{$listing->state}}</label> 
                </div>
                <div class="col-sm-6">   
                    <label class="form-label text-muted">Ciudad</label><br>
                    <label class="font-weight-bold">{{$listing->city}}</label>                  
                </div>
            </div>
            
            <div class="mb-3 border-bottom">
                <label class="form-label font-weight-bold">Descripcion de Propiedad</label><br>
                {!!$listing->listing_description!!}
            </div>
        
            <div class="mb-3 row border-bottom">
                <div class="col-sm-4"> 
                    <label class="form-label text-muted">Tipo</label><br>
                    <label class="font-weight-bold">{{$types->where('id',$listing->listingtype)->first()->type_title??''}}</label>   
                </div>
                <div class="col-sm-4">     
                    <label class="form-label text-muted">Tipo</label><br>
                    <label class="font-weight-bold">{{$categories->where('slug',$listing->listingtypestatus)->first()->status_title??''}}</label>  
                </div>
                <div class="col-sm-4">  
                    <label class="form-label text-muted">Tipo</label><br>
                    <label class="font-weight-bold">{{$tags->where('id',$listing->listingtagstatus)->first()->tags_title??''}}</label>   
                </div>
            </div>

            <div class="mb-3 row border-bottom">
                <h6 class="card-title text-danger">BENEFICIOS</h6> 
                @if( count(array_filter(explode(",", $listing->listingcharacteristic)))>0 )
                    <div class="row m-2 p-2 border border-light rounded">
                        @foreach(array_filter(explode(",", $listing->listingcharacteristic)) as $bene)
                                    <div class="col-lg-3 col-md-4 col-12 p-1">
                                        <i class="fas fa-check px-2 text-muted"></i>
                                        <span class="text-muted small">@foreach ($benefits as $benef) @if($benef->id==$bene) {{$benef->charac_titile}} @endif  @endforeach</span>
                                    </div>
                        @endforeach    
                    </div> 
                @endif
            </div>   
            
            <div class="mb-3 row border-bottom">
                <h6 class="card-title text-danger">SERVICIOS</h6>
                @if( count(array_filter(explode(",", $listing->listinglistservices)))>0 )
                    <div class="row m-2 p-2 border border-light rounded">
                        @foreach(array_filter(explode(",", $listing->listinglistservices)) as $serv)
                                    <div class="col-lg-3 col-md-4 col-12 p-1">
                                        <i class="fas fa-check px-2 text-muted"></i>
                                        <span class="text-muted small">@foreach ($services as $service) @if($service->id==$serv) {{$service->charac_titile}} @endif  @endforeach</span>
                                    </div>
                        @endforeach  
                    </div>
                @endif
          </div>


            
          <div class="mb-3 row border-bottom">
                <h6 class="card-title text-danger pt-4">DETALLES</h6>
              
                @if(is_array(json_decode($listing->heading_details)))
                    @foreach(json_decode($listing->heading_details) as $dets)
                        <span class="p-4 font-weight-bold">{{$dets[0]}}</span><br>
                        <div class="row m-2 p-2 border border-light rounded">
                        <?php unset($dets[0]); $printControl=0; ?>        
                        @foreach($dets as $det)
                            @if($printControl==0)
                                <?php $printControl=1; ?>                          
                                <div class="col-lg-3 col-md-4 col-12 p-1">
                                    <i class="fas fa-check px-2 text-muted"></i>
                                    <span class="text-muted small">@foreach ($details as $detail) @if($detail->id==$det) {{$detail->charac_titile}} @endif  @endforeach</span>
                                </div>
                            @else                
                                <?php $printControl=0; ?>
                            
                            @endif
                        @endforeach    
                        </div> 
                    @endforeach  
                @endif 
          </div>    

          
<div class="row">
    <div class="col-sm-12"><span class="text-primary px-2 font-weight-bold">Imagen Principal</span> </div>
    <ul id="sortable" class="list-inline">
        @isset($listing)
            <?php $ii=0; ?>
            @foreach(array_filter(explode("|", $listing->images)) as $img)
                <?php $ii++; ?>
                <li class="list-inline-item" id="imageUpload{{$ii}}">           <div style="position: relative">
                <img style="width:150px;height:110px" id="previewImg" src="{{url('uploads/listing',$img)}}" class="img-responsive img-thumbnail" alt="">
                <input type="hidden" value="{{$img}}" name="updatedImages[]">
                </div>        </li>
            @endforeach
        @endisset
      </ul>
</div>


          
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection