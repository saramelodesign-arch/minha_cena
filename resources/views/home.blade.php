@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')
    <div class="text-center">

        <h1 class="mb-4">É a Minha Cena!</h1>

        <p class="mb-4">
            Plataforma dedicada à música, onde é possível consultar bandas e os seus álbuns.
        </p>

        <img src="{{ asset('images/home.jpg') }}" class="img-fluid rounded" alt="Música" style="max-width: 600px;">

        <div class="mt-4">
            <a href="{{ url('/bands') }}" class="btn btn-primary">
                Ver Bandas
            </a>
        </div>

    </div>
@endsection
