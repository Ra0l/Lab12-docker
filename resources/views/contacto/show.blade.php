@extends('layout')

@section('content')
    <h1>Resultados de busqueda:</h1>
    @if(!empty($mensaje) != null)
        <div class="alert alert-danger" role="alert">
            {{ $mensaje }}
        </div>
    @else
    <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title">{{ $contacto->nombre }}</h1>
               <b> Numero de celular:</b>
                <p class="card-text">{{ $contacto->telefono }}</p>
                <b>Direccion:</b>
                <p class="card-text">{{ $contacto->direccion }}</p>
                
                <a href="{{ route('contacto.edit', $contacto->id)}}" class="btn btn-info">Editar</a>

                <a href="{{ route('contacto.delete', $contacto->id) }}" class="btn btn-danger">Eliminar</a>
               
            </div>
        </div>
        <hr>
    @endif
@endsection
