

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
    {!! Form::number('tlf', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group my-2">
    {!! Form::label('email', 'Email:', ['class' => 'mb-1 font-weight-bolder']) !!}
    {!! Form::email('email', null, ['class' => 'form-control','rows' => '2']) !!}
</div>

<div class="form-group my-2">
    {!! Form::label('message', 'Comentario:', ['class' => 'mb-1 font-weight-bolder']) !!}
    {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>

<div class="form-group my-2">
    {!! Form::submit('Enviar',  ['class' => 'btn btn-lg btn-block mt-4 text-white','style'=>'background-color:#182741',
    'onclick'=>'sendFormLead(event)']) !!}
</div>

