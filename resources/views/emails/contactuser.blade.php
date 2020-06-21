<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Contacto</h1>
    <p>
        El usuario <b>{{$name}} {{$lastName}}</b> le quiere contactar, a continuación se detalla la información:
    </p>
    <p>
        <b>Correo: </b>{{ $email }}
    </p>
    <p>
        <b>Asunto: </b>{{ $subject }}
    </p>
    <p>
        <b>Mensaje: </b>{{ $messageContact }}
    </p>

</body>
</html>