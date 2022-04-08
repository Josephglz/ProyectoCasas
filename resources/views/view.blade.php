@extends('layouts.layout')

@section('content')

    <a href="/casas" class="btn btn-primary"><i class="fa-solid fa-angle-left"></i></a>
    <center><h2>{{$casa->name}}</h2></center>
    <br><br>

    <div class="row">
        <div class="col-md-6">
            <img src="/uploads/images/{{$casa->imageBase}}" alt="" class="img-fluid">
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
            <p style="text-align: justify">{{$casa->description}}</p>
        </div>
    </div>

    <br><br>
    <div class="card" style="width: 50%;">
        <div class="card-header">
            <h3>Imagenes</h3>
        </div>
        <div class="card-body">
            <center>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($casa->images as $image)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img class="img-fluid" src="/uploads/images/{{$image->image}}" alt="">
                        </div>
                        @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            </center>
        </div>
    </div>
        
@endsection