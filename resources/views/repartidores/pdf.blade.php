@extends("layouts.pdf")
@section("contenido")
<h1>Repartidores</h1>
<br>
<table id="tabla_repartidores" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">Codigo</th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th data-orderable="false">Apellidos</th>
                    <th data-orderable="false">Telefono</th>
                    <th data-orderable="false">Email</th>
                    <th data-orderable="false">Fecha Nacimiento</th>
                    <th class="text-center">Trabaja en</th>
                    <th class="text-center">Numero de Envios</th>
                </tr>
            </thead>
            <tbody>
                @foreach($repartidores as $repartidor)
                    <tr data-id='{{$repartidor->id}}'>
                        <td>{{$repartidor->id}}</td>
                        <td>{{$repartidor->dni}}</td>
                        <td>{{$repartidor->nombre}}</td>
                        <td>{{$repartidor->apellidos}}</td>
                        <td>{{$repartidor->telefono}}</td>
                        <td>{{$repartidor->email}}</td>
                        <td>{{$repartidor->f_nacimiento}}</td>
                        <td class="text-center">{{$repartidor->ciudad->nombre}}</td>
                        <td class="text-center"><a href="{{url('/repartidor_envios')}}/{{$repartidor->id}}">{{$repartidor->envios->count()}}</a></td>
                    </tr>
                @endforeach
            </tbody>
<!--involveninja -->
        </table>
@endsection