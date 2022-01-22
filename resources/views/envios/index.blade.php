@extends("layouts.app1")
@section("contenido")


<script>
    $(document).ready(function() {
        $('#tabla_envios').DataTable( {
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
                        url   : "{{url('/envios')}}/"+id,
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
    <h1>Envios</h1>

    @if(count($envios)>0)

        <a style='margin: 15px ' href="{{url('/envios/create')}}" class="btn btn-primary bi bi-plus-circle"> Nuevo envio</a>
        <a style='margin: 15px ' href="{{url('/envios.pdf') }}" class="btn btn-primary bi bi-file-earmark-pdf"> Convertir a PDF</a>
        
        <table id="tabla_envios" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">Codigo</th>
                    <th>Producto</th>
                    <th>Destino</th>
                    <th data-orderable="false">Cliente ID</th>
                    <th data-orderable="false">Repartidor ID</th>
                    <th class="text-center">Borrar</th>
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
                        <td class="text-center borrar"> <form method="POST" action="{{url('/envios')}}/{{$envio->id}}">
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
        <a href=" {{route('envios.restore')}}" class="btn btn-warning bi bi-recycle "> Restaurar</a>
        <a href=" {{route('envios.onlyTrashed')}}" class="btn btn-danger bi bi-exclamation-triangle"> Borrado definitivo</a>
    @else
        <h1>No hay envios</h1>
    @endif
@endsection