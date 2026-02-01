@extends('layouts.main_layout')

@section('title', 'Dashboard')

@section('content')

    <h1 class="mb-4">Dashboard</h1>

    <div class="alert alert-success">
        Olá, {{ auth()->user()->name }}. És o Gestor da aplicação. Aqui podes criar, editar e apagar bandas e álbuns.
    </div>


    <hr>

    <h4>Gestão</h4>

    <ul>
        <li>
            <a href="{{ url('/users') }}">Gerir Utilizadores</a>
        </li>
        <li>
            <a href="{{ url('/bands') }}">Gerir Bandas</a>
        </li>
    </ul>

@endsection
