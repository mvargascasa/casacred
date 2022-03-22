@extends('layouts.dash')
@section('header')
@if(isset($listing))
    <title>Admin - Editar: {{$listing->listing_title}}</title>
@else
    <title>Admin - Nueva Propiedad</title>
@endif
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
          @if(isset($listing))
          <h4 class="p-2 text-danger">Editando Propiedad  <span style="color:darkgray">Creado: {{$listing->created_at->format('d M y')}}</span></h4>
          {!! Form::model($listing, ['route' => ['admin.listingupdate',$listing->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
          @else
          <h4 class="p-2 text-danger">Nueva Propiedad</h4>
          {!! Form::open(['route' => 'admin.listingstore','enctype' => 'multipart/form-data']) !!}
          @endif
          
          @include('admin.listing.form')
          {!! Form::close() !!}
          
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
  $( function() {
    $( "#sortable" ).sortable();
  } );

  
  const selState = document.getElementById('state');
  const selCities= document.getElementById('city');
  
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