@php
    $provinces = DB::table('info_states')->where('country_id', 63)->get();
@endphp

<div class="form-group">
    <label for="name_aval">Nombre y Apellido:</label>
    <input type="text" name="name_aval" id="name_aval" class="form-control" required>
    {!! Form::hidden('interest_aval', 'General',['id'=>'interest_aval']) !!}
</div>

<div class="form-group">
    <label for="phone_aval">Teléfono:</label>
    <input type="number" name="phone_aval" id="phone_aval" class="form-control" required>
</div>

<div class="form-group">
    <label for="email_aval">Email:</label>
    <input type="email" name="email_aval" id="email_aval" class="form-control" required>
</div>

<div class="form-group">
    <label for="message_aval">Comentario:</label>
    <input type="text" name="message_aval" id="message_aval" class="form-control" required>
</div>

<div class="form-group">
    <label for="type">Tipo de propiedad</label>
    <select name="type" id="type" class="form-select" required>
        <option value="">Seleccione</option>
        <option value="Casas">Casas</option>
        <option value="Departamentos">Departamentos</option>
        <option value="Casas Comerciales">Casas Comerciales</option>
        <option value="Terrenos">Terrenos</option>
        <option value="Quintas">Quintas</option>
        <option value="Haciendas">Haciendas</option>
        <option value="Locales Comerciales">Locales Comerciales</option>
        <option value="Oficinas">Oficinas</option>
        <option value="Suites">Suites</option>
    </select>
</div>

<div class="d-flex">
    <div class="form-group" style="width: 100%; margin-right: 1px">
        <label for="state">Provincia:</label>
        <select name="state" id="state" class="form-select" required>
            <option value="">Seleccione</option>
            @foreach ($provinces as $province)
                <option value="{{$province->name}}" data-id="{{ $province->id}}">{{ $province->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group" style="width: 100%">
        <label for="city">Ciudad</label>
        <select name="city" id="city" class="form-select" required>
            <option value="">Elige Ciudad</option>
        </select>
    </div>
</div>

<div class="form-group">
    <button type="button" class="btn btn-lg btn-danger btn-block mt-4" style="background-color:darkred" onclick="sendFormLeadAval()">Enviar</button>
    {{-- {!! Form::button('Enviar',  ['class' => 'btn btn-lg btn-danger btn-block mt-4','style'=>'background-color:darkred',
    'onclick'=>'sendFormLeadAval()']) !!} --}}
</div>

