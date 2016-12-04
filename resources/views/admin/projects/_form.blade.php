<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
    {!! Form::label('url', 'Url') !!}
    {!! Form::input('url','url', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('url') }}</small>
</div>

<div class="form-group{{ $errors->has('end_at') ? ' has-error' : '' }}">
    {!! Form::label('end_at', 'End At') !!}
    {!! Form::input('date','end_at', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('end_at') }}</small>
</div>

