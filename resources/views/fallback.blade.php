@extends('layouts.main_layout')

@section('title', 'Página não encontrada')

@section('content')
    <div class="text-center">
        <h1 class="mb-4">Página não encontrada</h1>

        <p>
            O endereço que tentou aceder não existe ou não está disponível.
        </p>

        <a href="{{ url('/') }}" class="btn btn-primary mt-3">
            Voltar à página inicial
        </a>
    </div>
@endsection
