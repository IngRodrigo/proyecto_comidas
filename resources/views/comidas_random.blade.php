<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comidas</title>
</head>
<body>
    <h1>COMIDA:{{$nombre}}</h1>
    <h2><a href="{{ action('ComidaController@listarComidas') }}">Mostrar lista de comidas guardadas</a></h2>
    <h2><a href="{{ action('ComidaController@ConsumirApiComida') }}">Mostrar más recetas al asar</a></h2>
    <ul>
    @foreach($ingredientes as $ingrediente)
        <li>{{$ingrediente}}</li>
    @endforeach
    </ul>
    <p>{{$instrucciones}}</p>
    <img src="{{$img}}" alt="Imagen">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$url_video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    
    </body>
</html>