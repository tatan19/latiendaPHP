<?php

namespace App\Http\Controllers;
use  App\Models\Categoria;
use App\Models\Marca;
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
        //Acceder  los datos del formulario
        //
       // echo"<pre>";
        //var_dump($request->imagen);
        //echo"<pre>";

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
        echo "producto registrado";
        
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
