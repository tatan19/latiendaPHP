<?php

namespace App\Http\Controllers;
use  App\Models\Categoria;
use App\Models\Marca;
//dependencia validador
use Illuminate\Support\Facades\Validator;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Sitio en costrucción:D";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccionar marcas
        $marcas = Marca::all();

        $Categoria = Categoria::all();

        return view('productos.new')
        ->with('categorias', $Categoria)
        ->with('marcas', $marcas);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion de datos del formulario

        //1Establecer las regals de validacion a aplicar
        //para la imput
        $reglas = [
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:10|max:20',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "categoria" => 'required',
            "marca" => 'required',
        ];

        $mensajes=[
            "required" => "campo obligatorio",
            "alpha" => "solo letras",
            "numeric" => "solo numeros",
            "imagen" => "debe ser archivo de tipo img",
            "min" => "minimo :min caracteres ",
            "max" => "maximo :max caracteres "

        ];

        //2. Crear el objeto validador
        $v = Validator::make($request ->all(), $reglas, $mensajes);

        //3 validar
        //fails() retorna
        //true: se la validacion falla
        //false si los datos son validos

        if($v->fails()){
            //validacion incorrecta
            //mostrar la vista new
            //llevando lor errores
            return redirect('productos/create')
            ->withErrors($v);
        }else{
        //validacion correcta

        //crear objeto  Uploadedfile
        $archivo = $request->imagen;

        //capturar nombre "original" del archivo
        $nombre_archivo = $archivo->getClientOriginalName();
        var_dump($nombre_archivo);

        //mover al archivo a la carpeta "productos/img"
        $ruta = public_path();
        var_dump($ruta);
        $archivo->move("$ruta/img",$nombre_archivo);

        //registrat productos a ala base de datos
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->desc = $request->desc;
        $producto->precio = $request->precio;
        $producto->imagen = $nombre_archivo;
        $producto->marca_id = $request->marca;
        $producto->categoria_id = $request->categoria;
        $producto->save();
        //redireccionar al formulario y llevar mensaje
        return redirect('productos/create')
            ->with("mensajito", "PRODUCTO REGISATRDO");
            
        }
        //die(var_dump($v->fails()));


        //Acceder  los datos del formulario
        //
       // echo"<pre>";
        //var_dump($request->imagen);
        //echo"<pre>";

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo"Aquí va el detalle de producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit( $producto)
    {
        echo"Aquí va el formulario  para editar con: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
