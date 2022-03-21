@extends('layouts.layout')

@section('content')

    <h2>Editar Registro</h2>

    <form action="/casas/{{$casa->id}}" method="POST" class="row g-3" style="width: 100%;">
        @method('PUT')
        @csrf

        <div class="col-md-10">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Nombre propiedad" value="{{$casa->name}}">
        </div>

        <div class="col-md-5">
            <label for="" class="form-label">Ciudad</label>
            <input type="text" class="form-control" name="city" placeholder="Ciudad" value="{{$casa->city}}">
        </div>

        <div class="col-5">
            <label for="" class="form-label">Estado</label>
            <input type="text" class="form-control" name="state" placeholder="Estado" value="{{$casa->state}}">
        </div>

        <div class="col-md-6">
          <label for="" class="form-label">Información</label>
          <input type="text" class="form-control" name="information" placeholder="Precio: $99,Construcción: 335m,..."  value="{{$casa->information}}">
        </div>

        <div class="col-md-4">
            <label for="" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="category"  value="{{$casa->category}}">
        </div>

        <div class="col-md-10">
            <span class="input-group-text">Descripción</span>
            <textarea class="form-control" aria-label="With textarea" name="description" rows="5">{{$casa->description}}</textarea>
        </div>

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFileLang" lang="es">
            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
          </div>

        <div class="col-10">
            <a href="{{ route('casas.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>

@endsection