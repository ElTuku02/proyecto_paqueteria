@extends("layouts.pdf")
@section("contenido")
<h1>Clientes</h1>
<br>
<table id="tabla_clientes" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">Codigo</th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th data-orderable="false">Apellidos</th>
                    <th data-orderable="false">Telefono</th>
                    <th data-orderable="false">Email</th>
                    <th data-orderable="false">Fecha Nacimiento</th>
                    <th class="text-center">Procedencia</th>
                    <th class="text-center">Edad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr data-id='{{$cliente->id}}'>
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->dni}}</td>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->apellidos}}</td>
                        <td>{{$cliente->telefono}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>{{$cliente->f_nacimiento->format('d/m/Y')}}</td>
                        <td>{{$cliente->procedencia}}</td>
                        <td>{{$cliente->f_nacimiento->age}} años</td>
                    </tr>
                @endforeach
            </tbody>
<!--involveninja -->
        </table>
@endsection