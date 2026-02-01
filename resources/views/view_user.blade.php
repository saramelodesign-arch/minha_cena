@extends('layouts.main_layout')

@section('title', 'Detalhes do Utilizador')

@section('content')
    <h1 class="mb-4">Detalhes do Utilizador</h1>

    @if ($user->photo)
        <img src="{{ asset('storage/' . $user->photo) }}" class="img-thumbnail mb-3" width="150">
    @else
        <img src="{{ asset('images/default-user.png') }}" class="img-thumbnail mb-3" width="150">
    @endif


    <ul class="list-group">
        <li class="list-group-item"><strong>Nome:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item">
            <strong>Tipo:</strong>
            {{ $user->user_type == 1 ? 'Gestor' : 'Visitante' }}
        </li>
    </ul>

    <a href="/users" class="btn btn-secondary mt-3">Voltar</a>
@endsection
