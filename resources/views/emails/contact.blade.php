<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
</head>
<body>
    <h1>Departamento de gestion</h1>
    <p>Formulario de contacto</p>
    <p><strong>Nombre: </strong>{{$contacto['name']}}</p>
    <p><strong>Correo: </strong>{{$contacto['email']}}</p>
    <p><strong>Mensaje: </strong>{{$contacto['mensaje']}}</p>
    <p>Es un correo automatico, no responder</p>
</body>
</html>