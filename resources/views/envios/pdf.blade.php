@extends("layouts.pdf")
@section("contenido")
<h1>Envios</h1>
<br>
<table id="tabla_envios" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">Codigo</th>
                    <th>Producto</th>
                    <th>Destino</th>
                    <th data-orderable="false">Cliente ID</th>
                    <th data-orderable="false">Repartidor ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($envios as $envio)
                    <tr data-id='{{$envio->id}}'>
                        <td>{{$envio->id}}</td>
                        <td>{{$envio->producto}}</td>
                        <td>{{$envio->ciudad->nombre}}</td>
                        <td>{{$envio->cliente_id}}</td>
                        <td>{{$envio->repartidor_id}}</td>
                    </tr>
                @endforeach
            </tbody>
<!--involveninja -->
        </table>
@endsection