@extends('layout')
    
@section('content')
        <h1>Editar contacto</h1>
    <div>
        <form  method="post" action="{{ route('contacto.update', $contacto->id)}}">
        {!! csrf_field() !!}
            <div class="form-group">
                <input type="text" id="nombre" name="nombre" class="form-control" value="{!!  $contacto->nombre !!}" aria-label="Sizing example input" aria-describedby="name" >
            </div>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" id="telefono" name="telefono" class="form-control" value="{!!  $contacto->telefono !!}" aria-label="Sizing example input" aria-describedby="mobile">
            </div>
            @error('telefono')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" id="direccion" name="direccion" class="form-control" value="{!!  $contacto->direccion !!}" aria-label="Sizing example input" aria-describedby="address">
            </div>
            @error('direccion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-danger" type="submit">Actualizar</button>
        </form>
    </div>
@endsection