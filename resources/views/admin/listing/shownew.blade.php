@extends('layouts.dashtw')
@section('header')
<title>Dashboard</title>
@endsection

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto">
    <div class="container mx-auto px-8 py-2">
        <h3 class="text-red-800 text-3xl font-semibold pb-4 uppercase">Registrar Propiedad</h3>  

        <div class="grid lg:grid-cols-3 gap-6  pb-4">

            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-gray-600 px-1">Codigo de Propiedad</label> </p>
                </div>    
                <p> {!! Form::text('product_code', null, ['class' => 'form-input w-full']) !!} </p>
            </div>      
      
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="lastname" class="bg-white text-gray-600 px-1">Seleccione Plan</label> </p>
                </div>
                <p> {!! Form::select('listing_type',['2'=>'PAGO','1'=>'GRATIS'],    null,    ['class' => 'form-select w-full']) !!} </p>
            </div>

            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="lastname" class="bg-white text-gray-600 px-1">Status</label> </p>
                </div>
                <p> {!! Form::select('status',['1'=>'ACTIVO','0'=>'DESACTIVADO'],    null,    ['class' => 'form-select w-full']) !!} </p>
            </div>

        </div>

        <div class="grid lg:grid-cols-3 gap-6 py-4">
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-gray-600 px-1">Nombre de Propietario</label> </p>
                </div>
                <p> {!! Form::text('owner_name', null, ['class' => 'form-input w-full']) !!} </p>
            </div>
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p> <label for="name" class="bg-white text-gray-600 px-1">Precio Minimo</label> </p>
                </div>
                <p> {!! Form::text('property_price_min', null, ['class' => 'form-input w-full']) !!} </p>
            </div>
              
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p> <label for="name" class="bg-white text-gray-600 px-1">Precio Maximo</label> </p>
                </div>
                <p> {!! Form::text('property_price', null, ['class' => 'form-input w-full']) !!} </p>
            </div>

        </div>        

        <div class="grid gap-6 py-4">
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-black px-1">Titulo de Propiedad</label> </p>
                </div>
                <p> {!! Form::text('listing_title', null, ['class' => 'form-input w-full']) !!} </p>
            </div>

        </div>

        <div class="grid grid-cols-4 gap-1 py-4">
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-gray-600 px-1">Constr</label> </p>
                </div>
                <p> {!! Form::text('construction_area', null, ['class' => 'form-input w-full']) !!} </p>
            </div>
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-gray-600 px-1">Superf</label> </p>
                </div>
                <p> {!! Form::text('land_area', null, ['class' => 'form-input w-full']) !!} </p>
            </div>
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-gray-600 px-1">Frente</label> </p>
                </div>
                <p> {!! Form::text('Front', null, ['class' => 'form-input w-full']) !!} </p>
            </div>
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-gray-600 px-1">Fondo</label> </p>
                </div>
                <p> {!! Form::text('Fund', null, ['class' => 'form-input w-full']) !!} </p>
            </div>

        </div>  

        <div class="grid py-4">
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-gray-600 px-1">Localidad:</label> </p>
                </div>
                <p> {!! Form::text('address', null, ['class' => 'form-input w-full']) !!} </p>
            </div>
            <div class="text-gray-600 px-1 text-xs"> (Provincia, Canton, Sector) Ej: Azuay, Cuenca, Batan </div>

        </div>  

        <div class="flex py-4">   

            <div class="grid grid-cols-2 w-full lg:w-1/2 gap-1 pb-4">
                
                <div class="relative">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p> <label for="name" class="bg-white text-gray-600 px-1">Provincia</label> </p>
                    </div>
                    <p> {!! Form::select('state',[''=>'Selecione']+$states->pluck('name','name')->toArray(),    
                                            null, ['id'=>'state','class' => 'form-select rounded w-full'],$optAttrib) !!} </p>
                </div>
                
                <div class="relative">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p> <label for="name" class="bg-white text-gray-600 px-1">Ciudad</label> </p>
                    </div>
                    <p> {!! Form::select('city', isset($cities) ? $cities->pluck('name','name')->toArray() : [''=>'Selecione']            
                                                , null, ['id'=>'city','class' => 'form-select rounded w-full']) !!} </p>
                </div>                

            </div> 

        </div>        

        <div class="grid py-4">
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-gray-600 px-1">Descripcion de Propiedad</label> </p>
                </div>
                <p>   {!! Form::textarea('listing_description', 
                    isset($listing->listing_description) && $listing->listing_description!=null ? $listing->listing_description : '',
                    ['class' => 'form-textarea w-full','rows' => '3']) !!} </p>
            </div>

        </div>

        <div class="grid lg:grid-cols-3 gap-6 py-4">
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p> <label for="name" class="bg-white text-gray-600 px-1">Tipo</label> </p>
                </div>
                <p> {!! Form::select('listingtypestatus',$categories->pluck('status_title','slug'),    null,    ['class' => 'form-select w-full']) !!} </p>
            </div>
            
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="name" class="bg-white text-gray-600 px-1">Categoría</label> </p>
                </div>
                <p> {!! Form::select('listingtype',$types->pluck('type_title','id'),    null,    ['class' => 'form-select w-full']) !!}
                </p>
            </div>
              
            <div class="relative">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                  <p> <label for="name" class="bg-white text-gray-600 px-1">Etiqueta</label> </p>
                </div>
                <p> {!! Form::select('listingtagstatus',$tags->pluck('tags_title','id'),    null,    ['class' => 'form-select w-full']) !!} </p>
            </div>

        </div>

        <div  id="simpleList" class="simpleList grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6 py-4">
            @php
                $ii = 0;
            @endphp
            @foreach(array_filter(explode("|", $listing->images)) as $img)
                <div  class="cursor-pointer relative" style="background-image: url('{{url('uploads/listing/300/',$img)}}');width:150px;height:110px;background-size: cover;">
                    <input type="hidden" value="" name="updatedImages[]">
                    <span class="absolute top-0 right-0 text-xs text-white font-bold py-1  px-2 rounded bg-red-800" onclick="alert('X')">X</span>
                    <span class="absolute bottom-0 right-0 text-xs text-white font-bold py-1  px-2 rounded bg-black opacity-50" onclick="test({{$ii++}})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                          </svg>
                    </span>
                </div>
            @endforeach
        </div>
    
    
        
      
        
        
    <div id="viewImg"  class="hidden another-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
		<div class="border border-blue-500 shadow-lg modal-container bg-white w-full md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
			<div class="modal-content relative  py-4 text-left px-0 md:px-6">
				<!--Title-->
				<div class="flex justify-between items-center">
					<p class="text-2xl font-bold text-gray-500"></p>
					<div class="modal-close px-4 cursor-pointer z-50" onclick="hiddenView('another-modal')">
						<svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
							</path>
						</svg>
					</div>
				</div>
                
                <div class="absolute inset-y-0 left-0 top-1/2 px-4" onclick="lastImg()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="darkred">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
                
                <div class="absolute inset-y-0 right-0 top-1/2 px-4" onclick="nextImg()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="darkred">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                </div>
				<!--Body-->
				<div class=" flex justify-center">                   
                        <img id="imgSrc" style="max-height: calc( 100vh - 100px ) " class="self-center" src="" alt="">
				</div>
			</div>
		</div>
	</div>
    
        
        
    </div>
</main>
@endsection

@section('endscript')
<script src="{{asset('js/sortable.min.js')}}"></script>
<script>
    const simpleList = document.getElementById('simpleList');
    const sortable = Sortable.create(simpleList);    
    
    const ImagesList = @json( array_filter(explode("|", $listing->images)) );

    const selState = document.getElementById('state');
    const selCities= document.getElementById('city');

    var selected = 0;

    const test = (id) => {
        selected = id;
        document.getElementById('imgSrc').src = "{{url('uploads/listing/')}}/" + ImagesList[id]; 
        document.getElementById('viewImg').classList.toggle("hidden");
    }
    const hiddenView = () => {        
        document.getElementById('viewImg').classList.toggle("hidden");
    }

    const nextImg = () => {
        let next = selected + 1 ;
        if(ImagesList[next]){
            selected = next;
            document.getElementById('imgSrc').src = "{{url('uploads/listing/')}}/" + ImagesList[next]; 
        } else{
            selected = 0;
             document.getElementById('imgSrc').src = "{{url('uploads/listing/')}}/" + ImagesList[0];   
        }

    }

    const lastImg = () => {
        let last = selected - 1 ;
        if(ImagesList[last]){
            selected = last;
            document.getElementById('imgSrc').src = "{{url('uploads/listing/')}}/" + ImagesList[last];  
        } else {
            selected = 0;
            document.getElementById('imgSrc').src = "{{url('uploads/listing/')}}/" + ImagesList[0];   
        }

    }
    
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
    const changetxtgallery = (photos) =>{
        document.getElementById('txtGallery').innerText = 'Fotos Subidas: '+photos.files.length;
    }
  
    const delImageUpload = (idDiv) =>{
        document.getElementById('imageUpload'+idDiv).remove();
    }
    const addRowHeader = () => {   
          let idUniq  = new Date().valueOf();
          let InsertOptions ='';
          selOptionsDetails.forEach(opts =>{        InsertOptions +=`<option value="${opts.id}">${opts.charac_titile}</option>`;    });
          let rowTemplate =`<div class="row">  <div class="mb-3 col-12">
              <label for="example" class="form-label font-weight-bold">Título de Detalle</label>
              <div class="input-group">  
              <input type="text" class="form-control" name="details${idUniq}[]">
              <button type="button" class="btn btn-danger" onclick="delrowHeader(this)">Eliminar</button>
                      </div>
          </div>
  
          <div class="col-8">   
              <div class="row">
                  <div class="col-12">
                      <div class="input-group mb-3">        
                          <select class="form-select" name="details${idUniq}[]">${InsertOptions}</select>
                          <input type="number" name="details${idUniq}[]" class="form-control" pattern="[0-9]+" onkeydown="return false" value="1">
                          <button type="button" class="btn btn-danger" onclick="delrowDetail(this)">Eliminar</button>
                      </div>  
                  </div> 
              </div> 
          </div>      
              
          <div class="col-4"></div>
  
  
  
          <div class="col-12">    <div class="float-right " >
          <button type="button" class="btn btn-success" onclick="addRowDetail(this,${idUniq})">Agregar Nuevo Detalle</button>     </div></div></div>`
          
          document.getElementById('rowsHeader').insertAdjacentHTML('beforeend',rowTemplate);
          //document.getElementById('rowsHeader').appendChild(rowTemplate);
          //parentElement.childNodes[0]
  }
    
  const addRowDetail = (row,id=0) => {
          let InsertOptions ='';
          selOptionsDetails.forEach(opts =>{        InsertOptions +=`<option value="${opts.id}">${opts.charac_titile}</option>`;    });
          let rowTemplate =`<div class="row"><div class="col-12">    <div class="input-group mb-3">        
              <select class="form-select" name="details${id}[]">${InsertOptions}</select>
                  <input type="number" name="details${id}[]" class="form-control" pattern="[0-9]+" onkeydown="return false" value="1">
                  <button type="button" class="btn btn-danger" onclick="delrowDetail(this)">Eliminar</button>
              </div>  </div>  </div>`;
              row.parentElement.parentElement.parentElement.childNodes[3].insertAdjacentHTML('beforeend',rowTemplate);
  }
  const delrowHeader = (row) =>{
      row.parentElement.parentElement.parentElement.remove();
  }
  const delrowDetail = (row) =>{
      row.parentElement.parentElement.remove();
  }
    //Array.from(field.photo.files).forEach(file => { ... });
  </script>
@endsection