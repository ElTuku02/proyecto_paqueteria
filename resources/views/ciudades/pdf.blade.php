@extends("layouts.pdf")
@section("contenido")
<h1>Ciudades</h1>
<br>
<table id="tabla_ciudades" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">Codigo</th>
                    <th>Nombre</th>
                    <th>Provincia</th>
                    <th data-orderable="false">Pais</th>
                    <th data-orderable="false">Codigo Postal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ciudades as $ciudad)
                    <tr data-id='{{$ciudad->id}}'>
                        <td>{{$ciudad->id}}</td>
                        <td>{{$ciudad->nombre}}</td>
                        <td>{{$ciudad->provincia}}</td>
                        <td>{{$ciudad->pais}}</td>
                        <td>{{$ciudad->codigo_postal}}</td>
                    </tr>
                @endforeach
            </tbody>
<!--involveninja -->
        </table>
@endsection