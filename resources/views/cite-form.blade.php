
{!! Form::open(['route' => 'web.sendcite', 'method' => 'POST']) !!}
@csrf
<div class="row">
    <div class="col-sm-6 col-6">
        <div class="form-group">
            {!! Form::label('fname', 'Nombre:', ['class' => 'mb-1 font-weight-bolder']) !!}
            {!! Form::text('fname', null, ['class' => 'form-control', 'required']) !!}
            {!! Form::hidden('interest', '',['id'=>'interestcite']) !!}
        </div>
    </div>
    <div class="col-sm-6 col-6">
        <div class="form-group">
            {!! Form::label('flastname', 'Apellido', ['class' => 'mb-1 font-weight-bolder']) !!}
            {!! Form::text('flastname', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>

<div class="form-group my-2">
    {!! Form::label('tlf', 'Teléfono/Celular:', ['class' => 'mb-1 font-weight-bolder']) !!}
    {!! Form::number('tlf', null, ['class' => 'form-control','rows' => '2', 'required']) !!}
</div>

<div class="form-group my-2">
    {!! Form::label('email', 'Email:', ['class' => 'mb-1 font-weight-bolder']) !!}
    {!! Form::email('email', null, ['class' => 'form-control','rows' => '2', 'required']) !!}
</div>

<div class="row">
    <div class="col-sm-6 col-6">
        <div class="form-group my-2">
            {!! Form::label('date', 'Fecha de la cita:', ['class' => 'mb-1 font-weight-bolder']) !!}
            {!! Form::date('date', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
    <div class="col-sm-6 col-6">
        <div class="form-group my-2">
            {!! Form::label('hour', 'Hora de la cita', ['class' => 'mb-1 font-weight-bolder']) !!}
            {!! Form::time('hour', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>

<div class="form-group my-2">
    {!! Form::label('message', 'Comentario:', ['class' => 'mb-1 font-weight-bolder']) !!}
    {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ej: Me interesa esta propiedad y deseo conocerla']) !!}
</div>


<div class="form-group my-2 text-center">
    {!! Form::submit('Enviar',  ['class' => 'btn btn-danger mt-4','style'=>'background-color:darkred']) !!}
</div>

{!! Form::close() !!}