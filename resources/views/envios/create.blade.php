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
    <form action="{{route('envios.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="producto">Producto</label>
            <input type="text" class="form-control" id="producto" name="producto" placeholder="Producto" value="{{old('producto')}}">
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <input type="text" class="form-control" id="cliente_id" name="cliente_id" placeholder="Cliente" value="{{old('cliente_id')}}">
        </div>
        <div class="form-group">
            <label for="destino_id">Destino</label>
            <input type="text" class="form-control" id="destino_id" name="destino_id" placeholder="Destino" value="{{old('destino_id')}}">
        </div>
        <div class="form-group">
            <label for="repartidor_id">Repartidor</label>
            <input type="text" class="form-control" id="repartidor_id" name="repartidor_id" placeholder="Repartidor" value="{{old('repartidor_id')}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/clientes')}}" class="btn btn-secondary">Cancelar</a>

@endsection

