    @php            
        if(isset($listing->id)) $default = null; else $default = '0';
        if(Auth::user()->role == 'administrator') $classStatus = ['class' => 'form-select form-select-sm','readonly'=>'readonly'];
        else $classStatus = ['class' => 'form-select form-select-sm'];
        if(isset($lastcode->product_code)){ $codelast=(int)filter_var($lastcode->product_code, FILTER_SANITIZE_NUMBER_INT); $newcode = $codelast+1; }else $newcode = null;
    @endphp
        
    <div class="my-3 row">     
        <div class="col-sm-4">          
            {!! Form::label('product_code', 'Codigo de Propiedad', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::text('product_code', $newcode, ['class' => 'form-control form-control-sm']) !!}
        </div>
        <div class="col-sm-4">       
            {!! Form::label('listing_type', 'Seleccione Plan', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::select('listing_type',['2'=>'PAGO','1'=>'GRATIS'],    null,    ['class' => 'form-select form-select-sm']) !!}
        </div>

        <div class="col-sm-4">
            {!! Form::label('status', 'Status', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::select('status',['0'=>'DESACTIVADO','1'=>'ACTIVO'], $default, $classStatus) !!}
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-6">          
            {!! Form::label('owner_name', 'Nombre de Propietario', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::text('owner_name', null, ['class' => 'form-control form-control-sm']) !!}
        </div>
    </div>

    <div class="mb-3">
        {!! Form::label('listing_title', 'Titulo de Propiedad', ['class' => 'form-label font-weight-bold']) !!}
        {!! Form::text('listing_title', null, ['class' => 'form-control form-control-sm']) !!}
        @if(isset($listing->id) && Auth::id()==123)
            <a href="{{route('admin.reslug',$listing->id)}}" target="_blank">{{$listing->slug}}</a>            
        @endif
    </div>

    <div class="mb-3">
        {!! Form::label('meta_description', 'Meta Descripcion en Google', ['class' => 'form-label font-weight-bold']) !!}
        {!! Form::text('meta_description', null, ['class' => 'form-control form-control-sm']) !!}
    </div>


    <div class="alert alert-secondary">       
            <span style="color:darkgray">Vista Previa en Buscador Google</span>
            <div style="width:600px;">
                <span id="goo_title" style="color:darkblue;font-size: 18px;text-transform: uppercase;">
                    @isset($listing->listing_title){{$listing->listing_title}}@endisset</span><br>            
            <span id="goo_descript">@isset($listing->meta_description){{$listing->meta_description}}@endisset</span>
            </div>
      </div>


    <div class="mb-3 row">
        <div class="col-sm-3">          
            {!! Form::label('construction_area', 'Construcción', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::text('construction_area', null, ['class' => 'form-control form-control-sm']) !!}
        </div>
        <div class="col-sm-3">          
            {!! Form::label('land_area', 'Superficie', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::text('land_area', null, ['class' => 'form-control form-control-sm']) !!}
        </div>
        <div class="col-sm-3">          
            {!! Form::label('Front', 'Frente', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::text('Front', null, ['class' => 'form-control form-control-sm']) !!}
        </div>
        <div class="col-sm-3">          
            {!! Form::label('Fund', 'Fondo', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::text('Fund', null, ['class' => 'form-control form-control-sm']) !!}
        </div>
    </div>
    

    <div class="mb-3 row">
        <div class="col-sm-6">
            {!! Form::label('property_price', 'Precio Max', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::text('property_price', null, ['class' => 'form-control form-control-sm']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('property_price_min', 'Precio Min', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::text('property_price_min', null, ['class' => 'form-control form-control-sm']) !!}
        </div>
    </div>
    
    <div class="mb-3">
        {!! Form::label('address', 'Localidad: (Provincia, Canton, Sector) Ej: Azuay, Cuenca, Batan ', ['class' => 'form-label font-weight-bold']) !!}
        {!! Form::text('address', null, ['class' => 'form-control form-control-sm']) !!}
    </div>

    <div class="mb-3 row">
        <div class="col-sm-6">          
            {!! Form::label('state', 'Provincia', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::select('state',[''=>'Selecione']+$states->pluck('name','name')->toArray(),    
            null,    ['id'=>'state','class' => 'form-select form-select-sm'],$optAttrib) !!}
        
        </div>
        <div class="col-sm-6">          
            {!! Form::label('city', 'Ciudad', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::select('city',
            isset($cities) ? $cities->pluck('name','name')->toArray() : [''=>'Selecione']            
            ,    null,    ['id'=>'city','class' => 'form-select form-select-sm']) !!}
        
        </div>
    </div>
    
    <div class="mb-3">
        {!! Form::label('listing_description', 'Descripcion de Propiedad', ['class' => 'form-label font-weight-bold']) !!}
        {!! Form::textarea('listing_description', 
        isset($listing->listing_description) && $listing->listing_description!=null ? $listing->listing_description : '',
        ['class' => 'form-control','rows' => '3']) !!}
    </div>

    <div class="mb-3 row">
        <div class="col-sm-4"> 
            {!! Form::label('listingtype', 'Tipo', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::select('listingtype',$types->pluck('type_title','id'),    null,    ['class' => 'form-select form-select-sm']) !!}
        </div>
        <div class="col-sm-4">     
            {!! Form::label('listingtypestatus', 'Tipo', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::select('listingtypestatus',$categories->pluck('status_title','slug'),    null,    ['class' => 'form-select form-select-sm']) !!}
        </div>
        <div class="col-sm-4">  
            {!! Form::label('listingtagstatus', 'Etiqueta', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::select('listingtagstatus',$tags->pluck('tags_title','id'),    null,    ['class' => 'form-select form-select-sm']) !!}
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-sm-12">          
            <h4 class="font-weight-bold">Beneficios</h4>         
        </div>

        @foreach ($benefits as $bene)
        
        <div class="col-md-4">
            <div class="form-check">                
            {!! Form::checkbox("checkBene[]", $bene->id, 
            isset($listing->listingcharacteristic) && in_array($bene->id,explode(",", $listing->listingcharacteristic)) ? true : false,
            ['class' => 'form-check-input', 'type'=>'checkbox', 'id'=>"checkBene$bene->id" ]) !!}
            {!! Form::label("checkBene[]", $bene->charac_titile, ['class' => 'form-check-label']) !!}
            </div>
        </div>
        @endforeach

    </div>


    <div class="row mb-3">
        <div class="col-sm-12">          
            <h4 class="font-weight-bold">Servicios</h4>          
        </div>
        @foreach ($services as $serv)        
            <div class="col-md-4">
                <div class="form-check">                
                {!! Form::checkbox("checkServ[]", $serv->id, 
                isset($listing->listinglistservices) && in_array($serv->id,explode(",", $listing->listinglistservices)) ? true : false,
                ['class' => 'form-check-input', 'type'=>'checkbox', 'id'=>"checkServ$serv->id" ]) !!}
                {!! Form::label("checkServ[]", $serv->charac_titile, ['class' => 'form-check-label']) !!}
                </div>
            </div>
        @endforeach
    </div>



    
<div class="mb-3">
    <label for="example" class="form-label font-weight-bold">Galeria de Imagenes</label>
    <div class="form-file">
        <input type="file" class="form-file-input" name="galleryImages[]" id="galleryImages" multiple onchange="changetxtgallery(this)">
        <label class="form-file-label" for="galleryImages">
          <span class="form-file-text" id="txtGallery">...</span>
          <span class="form-file-button">Browse</span>
        </label>
      </div>      
</div>  
<div class="row">
    <div class="col-sm-12"><span class="text-primary px-2 font-weight-bold">Imagen Principal</span> </div>
    <ul id="sortable" class="list-inline">
        @isset($listing)
            <?php $ii=0; ?>
            @foreach(array_filter(explode("|", $listing->images)) as $img)
                <?php $ii++; ?>
                <li class="list-inline-item" id="imageUpload{{$ii}}">           <div style="position: relative">
                <img style="width:150px;height:110px" id="previewImg" src="{{url('uploads/listing/300',$img)}}" class="img-responsive img-thumbnail" alt="">
                <span class="badge bg-danger" onclick="delImageUpload({{$ii}})"
                style="position: absolute; top 10px;right: 0px;">X</span><input type="hidden" value="{{$img}}" name="updatedImages[]">
                </div>        </li>
            @endforeach
        @endisset
      </ul>
</div>


<div id="rowsHeader">
    @if(isset($listing) && is_array(json_decode($listing->heading_details)))
    <?php $ii=-1; ?>
        @foreach(json_decode($listing->heading_details) as $dets)
        <div class="row">
            <?php $ii++; ?>
            <div class="mb-3 col-12">
                <label for="example" class="form-label font-weight-bold">Título de Detalle</label>             
                <div class="input-group">  
                    <input type="text" class="form-control" name="details{{$ii}}[]" value="{{$dets[0]}}">
                    <button type="button" class="btn btn-danger" onclick="delrowHeader(this)">Eliminar</button>
                </div>
            </div>
        
            <?php unset($dets[0]); $printControl=0; ?>

            <div class="col-8">
            @foreach($dets as $det)
                @if($printControl==0)
                <?php $printControl=1; ?>                
                    <div class="row">
                        <div class="col-12">
                                    <div class="input-group mb-3">
                    {!! Form::select('details'.$ii.'[]',$details->pluck('charac_titile','id'), $det   ,    ['class' => 'form-select']) !!}
                @else                
                <?php $printControl=0; ?>
                                    <input type="number" name="details{{$ii}}[]" class="form-control" value="{{!is_numeric($det)?1:$det}}" pattern="[0-9]+" onkeydown="return false" >
                                        <button type="button" class="btn btn-danger" onclick="delrowDetail(this)">Eliminar</button>
                                    </div>
                        </div>
                    </div> 
                @endif
            @endforeach
            </div>
            <div class="col-4"></div>
            <div class="col-12">
                <div class="float-right " > 
                    <button type="button" class="btn btn-success"  onclick="addRowDetail(this,{{$ii}})">Agregar Nuevo Detalle</button> 
                </div>
            </div>
        </div>

        @endforeach
        
    @else
    @if(!isset($listing))
        <div class="row">

            <div class="mb-3 col-12">
                <label for="example" class="form-label font-weight-bold">Título de Detalle</label>                
                <div class="input-group">  
                    <input type="text" class="form-control" id="example" name="details0[]">
                    <button type="button" class="btn btn-danger" onclick="delrowHeader(this)">Eliminar</button>
                </div>
            </div>

            <div class="col-8" name="detailstest">
                <div class="row">
                    <div class="col-12">
                                <div class="input-group mb-3">
                                    <select class="form-select"  name="details0[]">
                                        @foreach ($details as $detail)
                                            <option value="{{$detail->id}}">{{$detail->charac_titile}}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="details0[]" class="form-control" pattern="[0-9]+" onkeydown="return false" value="1">
                                    <button type="button" class="btn btn-danger" onclick="delrowDetail(this)">Eliminar</button>
                                </div>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-12">
                <div class="float-right " > 
                    <button type="button" class="btn btn-success"  onclick="addRowDetail(this)">Agregar Nuevo Detalle</button> 
                </div>
            </div>
        </div>
        @endif        
@endif

</div>
<div class="row py-2">
    <div class="col-12">
        <div class="float-right " > <button  onclick="addRowHeader()" type="button" class="btn btn-info">Agregar Nuevo Titulo</button> </div>
    </div>
</div>

<br>

   <button type="submit" class="btn btn-primary">Guardar</button>
    <hr>
    
  
  