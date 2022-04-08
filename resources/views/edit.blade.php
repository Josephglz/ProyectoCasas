@extends('layouts.layout')

@section('content')
    <h2>Editar Registro</h2>

    <form action="/casas/{{ $casa->id }}" method="POST" class="row g-3" style="width: 100%;">
        @method('PUT')
        @csrf

        <div class="col-md-10">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Nombre propiedad" value="{{ $casa->name }}">
        </div>

        <div class="col-md-5">
            <label for="" class="form-label">Ciudad</label>
            <input type="text" class="form-control" name="city" placeholder="Ciudad" value="{{ $casa->city }}">
        </div>

        <div class="col-md-5">
            <label for="" class="form-label">Estado</label>
            <input type="text" class="form-control" name="state" placeholder="Estado" value="{{ $casa->state }}">
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">Información</label>
            <input type="text" class="form-control" name="information" placeholder="Precio: $99,Construcción: 335m,..."
                value="{{ $casa->information }}">
        </div>

        <div class="col-md-4">
            <label for="" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="category" value="{{ $casa->category }}">
        </div>

        <div class="col-md-10">
            <span class="input-group-text">Descripción</span>
            <textarea class="form-control" aria-label="With textarea" name="description"
                rows="5">{{ $casa->description }}</textarea>
        </div>

        <div class="col-md-10">
            <label class="m-2">Imagen Base</label>
            <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="ImageBase">

            <label class="m-2">Lista de Imagenes</label>
            <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
        </div>

        <div class="col-10">
            <a href="{{ route('casas.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>

    <br><br>
    @if (File::exists(public_path('uploads/images/' . $casa->ImageBase)))
        <div class="col-md-10">
            <div class="card text-center">
                <div class="card-header">
                    <h5>Imagen Base</h5>
                </div>
                <div class="card-body">
                    <center>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top img-fluid" src="/uploads/images/{{ $casa->imageBase }}"
                                alt="Imagen Base">
                            <div class="card-body">
                                <h5 class="card-title">Imagen Base</h5>
                                <p class="card-text">{{ $casa->name }}</p>
                                <form action="/deleteimagebase/{{ $casa->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    @endif
    <br>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h5>Imagenes</h5>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Mostrar galería
                        </a>
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="row">
                        @foreach ($casa->images as $image)
                            <div class="card" style="width: 18rem;">
                                <img src="/uploads/images/{{ $image->image }}" alt="" class="card-img-top img-fluid">
                                <div class="card-body">
                                    <h5 class="card-title">Imagen {{ $image->id }}</h5>
                                    <form action="/deleteimage/{{ $image->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection
