@extends("layouts.app1")
@section("contenido")


<script>
    $(document).ready(function() {
        $('#tabla_repartidores').DataTable( {
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
                        url   : "{{url('/repartidores')}}/"+id,
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
    <h1>Repartidores</h1>

    @if(count($repartidores)>0)

        <a style='margin: 15px ' href="{{url('/repartidores/create')}}" class="btn btn-primary bi bi-plus-circle"> Nuevo repartidor</a>
        <a style='margin: 15px ' href="{{url('/repartidores.pdf') }}" class="btn btn-primary bi bi-file-earmark-pdf"> Convertir a PDF</a>
        
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
                    <th class="text-center">Editar</th>
                    <th class="text-center">Borrar</th>
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
                        <td class="text-center"> <form  method="GET" action="{{url('/repartidores')}}/{{$repartidor->id}}/edit">
                            @csrf
                            @method("get")
                            <input type="image" width="32px" src="https://img1.freepng.es/20180708/swz/kisspng-logo-computer-icons-text-writing-icon-5b42c5cfcb1cc1.714771831531102671832.jpg">
                        </form></td>
                        <td class="text-center borrar"> <form method="POST" action="{{url('/repartidores')}}/{{$repartidor->id}}">
                            @csrf
                            @method("delete")
                            <input type="image" width="32px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsS6tLxS5p0wjSsKT1mJLU_WQ0pF28JeTtZAumSNTWWCscn5oJAn2EX7XWY6HuF6q3H68&usqp=CAU">
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
<!--involveninja -->
        </table>
        <a href="{{url('/home')}}" class="btn btn-secondary bi bi-arrow-bar-left"> Volver</a>
        <a href=" {{route('repartidores.restore')}}" class="btn btn-warning bi bi-recycle "> Restaurar</a>
        <a href=" {{route('repartidores.onlyTrashed')}}" class="btn btn-danger bi bi-exclamation-triangle"> Borrado definitivo</a>
    @else
        <h1>No hay repartidores</h1>
    @endif
@endsection