@extends("layouts.app1")
@section("contenido")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    

    <h3>Insertar Cliente </h3>
    <form action="{{route('ciudades.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
        </div>
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" value="{{old('provincia')}}">
        </div>
        <div class="form-group">
            <label for="pais">Pais</label>
            <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="{{old('pais')}}">
        </div>
        <div class="form-group">
            <label for="codigo_postal">Codigo Postal</label>
            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal" value="{{old('codigo_postal')}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/clientes')}}" class="btn btn-secondary">Cancelar</a>

@endsection

