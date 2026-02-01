@extends('layouts.main_layout')

@section('title', 'Banda')

@section('content')
<h1>{{ $band->name }}</h1>

@if ($band->photo)
    <img src="{{ asset('storage/' . $band->photo) }}" width="200" class="mb-3">
@endif

<p>Banda registada na plataforma.</p>

<a href="/bands" class="btn btn-secondary">Voltar</a>

<a href="/bands/{{ $band->id }}/albums" class="btn btn-info mt-3">
    Ver Álbuns
</a>

@endsection
