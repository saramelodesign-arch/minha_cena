@extends('layouts.main_layout')

@section('title', 'Adicionar Banda')

@section('content')
    <h1>Adicionar Banda</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/add-band') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <button class="btn btn-success">Criar</button>
        <a href="{{ url('/bands') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
@endsection
