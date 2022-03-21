@extends('layouts.layout');

@section('content')

    <a href="/casas" class="btn btn-primary"><i class="fa-solid fa-angle-left"></i></a>
    <center><h2>{{$casa->name}}</h2></center>
    <br><br>

    <div class="row">
        <div class="col-md-6">
            <img src="{{$casa->imageBase}}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Localidad</h3>
            <p>{{$casa->city}}, {{$casa->state}}</p>
            <h3>Categoria</h3>
            <p>{{$casa->category}}</p>
            <h3>Información</h3>
            @if ($casa->information != "")
                @foreach(explode(',', $casa->information) as $info)
                    <p>{{$info}}</p>
                @endforeach
            @endif
            <h3>Descripción</h3>
            <p>{{$casa->description}}</p>
        </div>
    </div>
@endsection