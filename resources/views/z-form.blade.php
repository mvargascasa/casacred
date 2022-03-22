


<div class="form-group">
    {!! Form::label('fname', 'Nombres:') !!}
    {!! Form::text('fname', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('interest', 'General',['id'=>'interest']) !!}
</div>

<div class="form-group">
    {!! Form::label('tlf', 'Teléfonos:') !!}
    {!! Form::text('tlf', null, ['class' => 'form-control','rows' => '2']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','rows' => '2']) !!}
</div>

<div class="form-group">
    {!! Form::label('message', 'Comentario:') !!}
    {!! Form::text('message', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::button('Enviar',  ['class' => 'btn btn-lg btn-danger btn-block mt-4','style'=>'background-color:darkred',
    'onclick'=>'sendFormLead()']) !!}
</div>

