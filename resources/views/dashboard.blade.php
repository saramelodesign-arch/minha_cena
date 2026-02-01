@extends('layouts.main_layout')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="alert alert-success">
        Olá, {{ auth()->user()->name }}. És o Gestor da aplicação.
    </div>

    <p>
        Esta área é restrita a utilizadores com permissões de administração.
    </p>
@endsection
