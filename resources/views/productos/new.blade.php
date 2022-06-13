@extends('layouts.menu')

@section('contenido')

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="row">
    <h1 class="blue-text text-darken-4">Nuevo producto xd: </h1>
</div>

<div class="row">
<form action="{{route('productos.store')}}" 
class="col s8" 
method="POST"
enctype="multipart/form-data"
>
@csrf
    <div class="row">
        <div class="col s8 input-field">
            <input type="text" id="nombre" name="nombre"  class="validate" placeholder="nombre de producto" >
            <label for="nombre">nombre de producto </label> 
        </div>
    </div> 

    <div class="row">
    <div class="col s8 input-field"><textarea 
            name="desc"
            id="desc"
            class="materialize-textarea"
            placeholder="Descripción de producto" ></textarea>
            <label for="desc">descripción</label>
        </div>
        </div>
    <div class="row">
        <div class="col s8 input-field">
            <input 
            type="text"
            id="precio"
            name="precio"
            placeholder="Precio de producto" >
            <label for="precio">Precio</label>
        </div>
    </div>

    <div class="row">
        <div class="class s8 file-field input-field">
            <div class="btn">
                <span>Imagen del producto...</span>
                <input type="file" name="imagen">
            </div>
            <div clas="file-path-wrapper">
            <input type="text" class="file-path">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s8 input-field">
            <select name="marca" id="marca">
                 @foreach($marcas as $marca)
                 <option value="{{$marca->id}}">
                    {{$marca->nombre}}
                 </option>
                 @endforeach
            </select>
            <label>Seleccione la marca</label>
        </div>
    </div>

    <div class="row">
        <div class="col s8 input-field">
            <select name="categoria" id="categoria">
                 @foreach($categorias as $categoria)
                 <option  value="{{$categoria->id}}">
                    {{$categoria->nombre}}
                 </option>
                 @endforeach
            </select>
            <label>Seleccione la categoria</label>
        </div>
    </div>

    <div class="row"></div>
    <button class="btn waves-effect waves-light" 
    type="submit" 
    name="action">Guardar producto
    <i class="material-icons right">send</i>
  </button>
</form>
</div>
@endsection
