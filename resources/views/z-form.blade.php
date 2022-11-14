

<div class="row">
    <div class="col-sm-6 col-6">
        <div class="form-group">
            {!! Form::label('fname', 'Nombre:', ['class' => 'mb-1 font-weight-bolder']) !!}
            {!! Form::text('fname', null, ['class' => 'form-control']) !!}
            {!! Form::hidden('interest', 'General',['id'=>'interest']) !!}
        </div>
    </div>
    <div class="col-sm-6 col-6">
        <div class="form-group">
            {!! Form::label('flastname', 'Apellido', ['class' => 'mb-1 font-weight-bolder']) !!}
            {!! Form::text('flastname', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group my-2">
    {!! Form::label('tlf', 'Teléfono/Celular:', ['class' => 'mb-1 font-weight-bolder']) !!}
    {!! Form::number('tlf', null, ['class' => 'form-control','rows' => '2']) !!}
</div>

<div class="form-group my-2">
    {!! Form::label('email', 'Email:', ['class' => 'mb-1 font-weight-bolder']) !!}
    {!! Form::email('email', null, ['class' => 'form-control','rows' => '2']) !!}
</div>

<div class="form-group my-2">
    {!! Form::label('message', 'Comentario:', ['class' => 'mb-1 font-weight-bolder']) !!}
    {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ej: Me interesa esta propiedad y deseo que me contacten']) !!}
</div>

<div class="form-group my-2">
    {!! Form::button('Enviar',  ['class' => 'btn btn-lg btn-danger btn-block mt-4','style'=>'background-color:darkred',
    'onclick'=>'sendFormLead()']) !!}
</div>

