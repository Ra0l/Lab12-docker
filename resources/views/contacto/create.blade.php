@extends('layout')
    
@section('content')
        <h1>Registrar contacto</h1>
    <div>
        <form action="{{ route('contacto.store') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" aria-label="Sizing example input" aria-describedby="name" placeholder="Ingrese nombre">
            </div>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}" aria-label="Sizing example input" aria-describedby="mobile" placeholder="Ingrese Telefono">
            </div>
            @error('telefono')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion') }}" aria-label="Sizing example input" aria-describedby="address" placeholder="Ingrese Direccion">
            </div>
            @error('direccion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-danger" type="submit">Registrar</button>
        </form>
    </div>
@endsection
