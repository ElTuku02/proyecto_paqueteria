@extends("layouts.tablas")
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

    <h3>Editar Clientes </h3>
    <form action="{{url('/ciudades')}}/{{$ciudad->id}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{$ciudad->nombre}}">
        </div>
        <div class="form-group">
            <label for="provincia">Provincia</label>
            <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia" value="{{$ciudad->provincia}}">
        </div>
        <div class="form-group">
            <label for="pais">Pais</label>
            <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="{{$ciudad->pais}}">
        </div>
        <div class="form-group">
            <label for="codigo_postal">Codigo Postal</label>
            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal" value="{{$ciudad->codigo_postal}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/clientes')}}" class="btn btn-secondary">Cancelar</a>

@endsection

