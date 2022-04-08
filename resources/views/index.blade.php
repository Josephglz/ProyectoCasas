@extends('layouts.layout')

@section('content')
<h2>Registro de Propiedades</h2><br><br>

<div class="container">
    <div class="row">
        <div class="col-8"><a href="casas/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a></div>
        <div class="col-4">
            <div class="d-flex justify-content-end col">
                {{$casas->links()}}
            </div>
        </div>
    </div>
</div>

    <table class = "table table-dark table-striped mt-4 ">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Localidad</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ultm. Actualización</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if (count($casas) > 0)
                @foreach ($casas as $casa)
                    <tr class="table-light">
                        <th scope="row">{{$casa->id}}</th>
                        <td>{{$casa->name}}</td>
                        <td>{{$casa->city}}, {{$casa->state}}</td>
                        <td>{{$casa->category}}</td>
                        <td>{{$casa->updated_at}}</td>
                        <td>
                            <a href="/casas/{{$casa->id}}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                            <a href="/casas/{{$casa->id}}/edit" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a>
                            <form action="/casas/{{$casa->id}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar la casa {{$casa->id}}?');" ><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="table-light">
                    <td colspan="6">No hay registros</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection