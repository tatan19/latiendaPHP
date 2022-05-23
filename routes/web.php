<?php

use Illuminate\Support\Facades\Route;
//dependecia al controlador
use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta en laravel
Route::get('hola' , function(){
    echo"Holaaaaaa";
 }       );


 Route::get('arreglos', function(){
     $estudiantes=["AN" => "Ana", "Juana", "Paola"];
     echo"<pre>";
     var_dump($estudiantes);
     echo "</pre>";
     echo "</hr>";
     //agregar posicion
     $estudiantes["CR"] = "Cristian";
     echo "<pre>";
     var_dump($estudiantes);
     echo "</pre>";
     //retirar elementos

     echo "<hr/>";
     unset($estudiantes["JU"]);
     echo "<pre>";
     var_dump($estudiantes);
     echo "</pre>";
    });



Route::get('paises', function(){
        $paises=[
            "colombia"=> [
                "capital"=>"Bogota",
                "modeda" =>"Peso",
                "poblacion"=>51.6,
                "ciudades"=> [
                    "Bogotá",
                    "Medellin",
                    "Cali"

                ]
            ], 

            "Peru"=>[
                "capital"=>"Lima",
                "modeda" =>"Sol",
                "poblacion"=>32.97,
                "ciudades"=> [
                    "Cuzco",
                    "Piura"
                ]
            ], 
            
            "Paraguay"=>[
                "capital"=>"Asuncion",
                "modeda" =>"Guarani",
                "poblacion"=>7.1,
                "ciudades"=>[
                    "Ciudad del este"
                ]

            ]


            
        ];
        
    // foreach($paises as $pais => $infopais ){
         //echo "<h1>$pais</h1>";
         //foreach($infopais as $clave => $valor){
             //echo"$clave : $valor<br/>";
        

         //echo "capital:".$infopais["capital"];
         //echo "modeda:".$infopais["modeda"];
         //echo"<br>";
         //echo "poblacion:".$infopais["poblacion"];
         //echo "<hr/>";

     //mostrar la vista de paises

     return view('paises')
     ->with("paises", $paises);
      
    });

    Route::get('prueba', function(){
        return view('productos.new');
    });
    
    //Crear rutas REST
    Route::resource('productos', ProductoController::class);

