@extends('layouts.main_layout')

@section('title', 'Editar Utilizador')

@section('content')
    <h1 class="mb-4">Editar Utilizador</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="photo" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
