@extends('layouts.layout');

@section('content')
<h2>Registro de Propiedades</h2><br><br>


<a href="casas/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>

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
            @foreach ($casas as $casa)
                <tr class="table-light">
                    <td>{{ $casa->id }}</td>
                    <td>{{ $casa->name }}</td>
                    <td>{{ $casa->city }}, {{ $casa->state }}</td>
                    <td>{{ $casa->category }}</td>
                    <td>{{ $casa->updated_at }}</td>
                    <td>
                        <form action="{{ route ('casas.destroy', $casa->id) }}" method="POST">
                            @csrf
                            <a href="{{ route('casas.show', $casa->id) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                            <a href="casas/{{ $casa->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            @method('DELETE')
                            <a type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection