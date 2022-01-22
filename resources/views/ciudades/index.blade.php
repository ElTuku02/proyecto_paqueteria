@extends("layouts.app1")
@section("contenido")


<script>
    $(document).ready(function() {
        $('#tabla_ciudades').DataTable( {
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
                        url   : "{{url('/ciudades')}}/"+id,
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
    <h1>Ciudades</h1>

    @if(count($ciudades)>0)

        <a style='margin: 15px ' href="{{url('/ciudades/create')}}" class="btn btn-primary bi bi-plus-circle"> Nueva ciudad</a>
        <a style='margin: 15px ' href="{{url('/ciudades.pdf') }}" class="btn btn-primary bi bi-file-earmark-pdf"> Convertir a PDF</a>
        
        <table id="tabla_ciudades" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th data-orderable="false">Codigo</th>
                    <th>Nombre</th>
                    <th>Provincia</th>
                    <th data-orderable="false">Pais</th>
                    <th data-orderable="false">Codigo Postal</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Borrar</th>
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
                        <td class="text-center"> <form  method="GET" action="{{url('/ciudades')}}/{{$ciudad->id}}/edit">
                            @csrf
                            @method("get")
                            <input type="image" width="32px" src="https://img1.freepng.es/20180708/swz/kisspng-logo-computer-icons-text-writing-icon-5b42c5cfcb1cc1.714771831531102671832.jpg">
                        </form></td>
                        <td class="text-center borrar"> <form method="POST" action="{{url('/ciudades')}}/{{$ciudad->id}}">
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
        <a href=" {{route('ciudades.restore')}}" class="btn btn-warning bi bi-recycle "> Restaurar</a>
        <a href=" {{route('ciudades.onlyTrashed')}}" class="btn btn-danger bi bi-exclamation-triangle"> Borrado definitivo</a>
    @else
        <h1>No hay ciudades</h1>
    @endif
@endsection