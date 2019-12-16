<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class ComidaController extends Controller
{
    public function consumirApiComida()
    {


        $client = new Client([
            'base_uri' => 'https://www.themealdb.com/api/json/v1/1/',
            'timeout' => 2.0,
        ]);

        $response = $client->request('GET', 'random.php');

        $comidas = Json_decode(($response->getBody()->getContents()));

        //$texo="Esto es una prueba";
        foreach ($comidas as $comida) {
            
            $codigo = $comida[0]->idMeal;
            $nombre = $comida[0]->strMeal;
            $instrucciones = $comida[0]->strInstructions;
            $img = $comida[0]->strMealThumb;
            $video = $comida[0]->strYoutube;

            $url_video = substr($video, 32);

            for ($i = 1; $i <= 20; $i++) {
                $numeroIngrediente = "strIngredient" . $i;
                $ingrediente = $comida[0]->$numeroIngrediente;
                if (empty($ingrediente)) {
                    break;
                } else {
                    $ingredientes[$i] = $ingrediente;
                }
            }
        }
        $cadena = implode(', ', $ingredientes);

            $verificarInsert = DB::table('comidas')->where('idcomida', '=',$codigo);

            if(!$verificarInsert->count()){
                $insert = DB::table('comidas')->insert(array(
                    'idcomida' => $codigo,
                    'nombre' => $nombre,
                    'ingredientes' => $cadena,
                    'instrucciones' => $instrucciones,
                    'imagen_url' => $img,
                    'clip_url' => $url_video,
                    'fecha_insert' => date('Y, m, d')
                ));
                
            }else{
                echo "La comida ya existe";
            }


        return view('comidas_random', array(
            'codigo' => $codigo,
            'nombre' => $nombre,
            'instrucciones' => $instrucciones,
            'img' => $img,
            'url_video' => $url_video,
            'ingredientes' => $ingredientes
        ));
    }

    public function listarComidas()
    {
        $comidas = DB::table('comidas')
            ->orderBy('fecha_insert', 'desc')
            ->get();

        return view(
            'index',
            ['comidas' => $comidas]
        );
    }
}
