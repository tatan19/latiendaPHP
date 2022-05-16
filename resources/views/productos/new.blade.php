@extends('layouts.menu')

@section('contenido')

<div class="row">
    <h1 class="blue-text text-darken-4">Nuevo producto:</h1>
</div>

<div class="row">
<form action="" 
    class="col s8" 
    method="POST">
    <div class="row">
        <div class="col s8 input-field">
            <input type="text" id="nombre" name="nombre" placeholder="nombre de producto" >
            <label for="nombre">nombre de producto</label> 
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

    <div class="class">
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
</form>
</div>
@endsection
