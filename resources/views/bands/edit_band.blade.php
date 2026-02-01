@extends('layouts.main_layout')

@section('title', 'Editar Banda')

@section('content')
<h1>Editar Banda</h1>

<form method="POST" action="{{ url('/bands/' . $band->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="name" value="{{ $band->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="description" class="form-control" rows="4">{{ $band->description }}</textarea>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="photo" class="form-control">
    </div>

    <button class="btn btn-primary">Guardar</button>
</form>
@endsection
