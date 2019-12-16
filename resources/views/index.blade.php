<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comidas</title>
</head>
<body>
    <h1>MILES DE RECETAS A SU ALCANCE</h1>
    <h2><a href="{{ action('ComidaController@ConsumirApiComida') }}">Mostrar recetas al asar!</a></h2>
    @if(isset($comidas))
    <div class="lista-comidas">
    <ul>
        @foreach ($comidas as $comida)
        <hr>
            Codigo: {{$comida->idcomida}}<br>
                Nombre: {{$comida->nombre}}
                <li>Ingredientes: {{$comida->ingredientes}}</li>
                Instrucciones: {{$comida->instrucciones}}<br>

                Foto de muestra:<br>
                <img src="{{$comida->imagen_url}}" alt="imagen_muestra" width="200px" height="200px">
            
        @endforeach
    </ul>
    </div>
    @endif

</body>
</html>