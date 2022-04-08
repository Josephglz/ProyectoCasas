@extends('layouts.layout')

@section('content')

    <h2>Crear Registro</h2>
    

    <form action="/casas" method="POST" class="row g-3" style="width: 100%;" enctype="multipart/form-data">
        @csrf
        <div class="col-md-10">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Nombre propiedad">
        </div>

        <div class="col-md-5">
            <label for="" class="form-label">Ciudad</label>
            <input type="text" class="form-control" name="city" placeholder="Ciudad">
        </div>

        <div class="col-5">
            <label for="" class="form-label">Estado</label>
            <input type="text" class="form-control" name="state" placeholder="Estado">
        </div>

        <div class="col-md-6">
          <label for="" class="form-label">Información</label>
          <input type="text" class="form-control" name="information" placeholder="Precio: $99,Construcción: 335m,...">
        </div>

        <div class="col-md-4">
            <label for="" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="category">
        </div>

        <div class="col-md-10">
            <span class="input-group-text">Descripción</span>
            <textarea class="form-control" aria-label="With textarea" name="description" rows="5"></textarea>
        </div>

        <div class="col-md-10">
            <label class="m-2">Imagen Base</label>
            <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="ImageBase">

            <label class="m-2">Lista de Imagenes</label>
            <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
        </div>
        <br>
        <div class="col-10">
            <a href="{{ route('casas.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        <br><br>
    </form>

@endsection