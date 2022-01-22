@extends("layouts.app2")



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


  
  <!-- formulario de contacto en html y css -->  

  <div class="contact_form">

    <div class="formulario">      
      <h1>Formulario de contacto</h1>
        <h3>Escríbenos y en breve los pondremos en contacto contigo</h3>


          <form action="{{route('contacto.store')}}" method="post">     
            @csrf  
                <p>
                  <label for="name" class="colocar_nombre">Nombre
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="name" required="obligatorio"  placeholder="Escribe tu nombre">
                </p>
              
                <p>
                  <label for="email" class="colocar_email">Email
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="email" name="email" required="obligatorio"  placeholder="Escribe tu Email">
                </p>

                <p>
                  <label for="mensaje" class="colocar_mensaje">Mensaje
                    <span class="obligatorio">*</span>
                  </label>                     
                                    <textarea name="mensaje" class="texto_mensaje" id="mensaje" required="obligatorio" placeholder="Deja aquí tu comentario..."></textarea> 
                                </p>                    
              
                <button type="submit" name="enviar_formulario" id="enviar"><p> Enviar</p></button>
                <p class="aviso">
                  <span class="obligatorio"> * </span>los campos son obligatorios.
                </p> 
                <a href="{{url('/home')}}" class="btn btn-primary bi bi-arrow-bar-left"> Volver</a>         
            
          </form>
    </div>  
  </div>

  @if (session('info'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Correo enviado Correctamente',
                timer: 1500,
            })
        </script>
    @endif
@endsection