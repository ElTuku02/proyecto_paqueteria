@extends("layouts.app1")
@section("contenido")


<script>
    $(document).ready(function() {
        $('#tabla_clientes').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    } );

    $(".borrar").click(function(e){
            e.preventDefault();
            const tr=$(this).closest("tr"); //guardamos el tr completo
            const id=tr.data("id");
            Swal.fire({
                
                icon: 'success',
                title: 'Eliminado Correctamente',
                text: 'El usuario a sido eliminado correctamente',
                footer: 'Puedes recuperarlo presinando el boton amarrillo de abajo',
                confirmButtonText: 'OK',
                
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "POST",
                        url   : "{{url('/clientes')}}/"+id,
                        data  : {
                            _token: "{{csrf_token()}}",
                            _method: "delete",
                        },
                        success: function(){
                            tr.fadeOut();
                        }
                    });
                } 
            })
        });
} );
</script>




<body>
    <h1>Clientes</h1>

    @if(count($clientes)>0)

        <a style='margin: 15px ' href="{{url('/clientes/create')}}" class="btn btn-primary bi bi-plus-circle"> Nuevo Cliente</a>
        <a style='margin: 15px ' href="{{url('/clientes.pdf') }}" class="btn btn-primary bi bi-file-earmark-pdf"> Convertir a PDF</a>
        
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
                    <th class="text-center">Editar</th>
                    <th class="text-center">Borrar</th>
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
                        <td class="text-center"> <form  method="GET" action="{{url('/clientes')}}/{{$cliente->id}}/edit">
                            @csrf
                            @method("get")
                            <input type="image" width="32px" src="https://img1.freepng.es/20180708/swz/kisspng-logo-computer-icons-text-writing-icon-5b42c5cfcb1cc1.714771831531102671832.jpg">
                        </form></td>
                        <td class="text-center borrar"> <form method="POST" action="{{url('/clientes')}}/{{$cliente->id}}">
                            @csrf
                            @method("delete")
                            <input class="borrar" type="image" width="32px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsS6tLxS5p0wjSsKT1mJLU_WQ0pF28JeTtZAumSNTWWCscn5oJAn2EX7XWY6HuF6q3H68&usqp=CAU">
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
<!--involveninja -->
        </table>
        <a href="{{url('/home')}}" class="btn btn-secondary bi bi-arrow-bar-left"> Volver</a>
        <a href=" {{route('clientes.restore')}}" class="btn btn-warning bi bi-recycle "> Restaurar</a>
        <a href=" {{route('clientes.onlyTrashed')}}" class="btn btn-danger bi bi-exclamation-triangle"> Borrado definitivo</a>
    @else
        <h1>No hay clientes</h1>
    @endif
@endsection