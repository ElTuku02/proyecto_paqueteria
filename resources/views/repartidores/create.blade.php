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

<script>
    Swal.fire({
                
                icon: 'warning',
                title: '¡Recordatorio!',
                text: 'La letra del dni debe ser mayucula',
                showConfirmButton: false,
                timer: 1500
                
            });
</script>

    <h3>Insertar Repartidor </h3>
    <form action="{{route('repartidores.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" placeholder="dni" value="{{old('dni')}}">
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="{{old('nombre')}}">
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos" value="{{old('apellidos')}}">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{old('telefono')}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="f_nacimiento">Fecha nacimiento</label>
            <input type="date" class="form-control" id="f_nacimiento" name="f_nacimiento" placeholder="Fecha nacimiento" value="{{old('f_nacimiento')}}">
        </div>
        <div class="form-group">
            <label for="ciudad_id">Trabaja en</label>
            <input type="text" class="form-control" id="ciudad_id" name="ciudad_id" placeholder="Trabaja en" value="{{old('ciudad_id')}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/clientes')}}" class="btn btn-secondary">Cancelar</a>

@endsection

