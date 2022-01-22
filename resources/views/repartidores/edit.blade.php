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

    <h3>Editar Repartidor </h3>
    <form action="{{url('/repartidores')}}/{{$repartidor->id}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" placeholder="dni" value="{{$repartidor->dni}}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="{{$repartidor->nombre}}">
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos" value="{{$repartidor->apellidos}}">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{$repartidor->telefono}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$repartidor->email}}">
        </div>
        <div class="form-group">
            <label for="f_nacimiento">F_nacimiento</label>
            <input type="text" class="form-control" id="f_nacimiento" name="f_nacimiento" placeholder="F nacimiento" value="{{$repartidor->f_nacimiento}}">
        </div>
        <div class="form-group">
            <label for="ciudad_id">Trabaja en</label>
            <input type="text" class="form-control" id="ciudad_id" name="ciudad_id" placeholder="Trabaja en" value="{{$repartidor->ciudad_id}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/repartidores')}}" class="btn btn-secondary">Cancelar</a>

@endsection

