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

    <h3>Editar Clientes </h3>
    <form action="{{url('/clientes')}}/{{$cliente->id}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" placeholder="dni" value="{{$cliente->dni}}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="{{$cliente->nombre}}">
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos" value="{{$cliente->apellidos}}">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{$cliente->telefono}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$cliente->email}}">
        </div>
        <div class="form-group">
            <label for="f_nacimiento">F_nacimiento</label>
            <input type="text" class="form-control" id="f_nacimiento" name="f_nacimiento" placeholder="F nacimiento" value="{{$cliente->f_nacimiento}}">
        </div>
        <div class="form-group">
            <label for="procedencia">Procedencia</label>
            <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="Procedencia" value="{{$cliente->procedencia}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/clientes')}}" class="btn btn-secondary">Cancelar</a>

@endsection

