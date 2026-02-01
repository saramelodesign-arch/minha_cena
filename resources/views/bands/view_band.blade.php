@extends('layouts.main_layout')

@section('title', 'Banda')

@section('content')

<h1 class="mb-4">{{ $band->name }}</h1>

<img src="{{ $band->photo
        ? asset('storage/' . $band->photo)
        : asset('images/nophoto.jpg') }}"
     alt="Foto da banda"
     width="200"
     class="mb-3">

<p>{{ $band->description ?? 'Sem descrição disponível.' }}</p>

<a href="{{ url('/bands') }}" class="btn btn-secondary">
    Voltar
</a>

<a href="{{ url('/bands/' . $band->id . '/albums') }}" class="btn btn-info ms-2">
    Ver Álbuns
</a>

@auth
    <hr>

    <a href="{{ url('/bands/' . $band->id . '/edit') }}" class="btn btn-warning">
        Editar
    </a>
    @endauth

    @if (auth()->check() && auth()->user()->user_type == 1)
    <form action="{{ url('/bands/' . $band->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger"
                onclick="return confirm('Tens a certeza?')">
            Apagar
        </button>
    </form>
@endif


@endsection
