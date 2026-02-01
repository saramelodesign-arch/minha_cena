@extends('layouts.main_layout')

@section('title', 'Adicionar Banda')

@section('content')
<h1>Adicionar Banda</h1>

<form method="POST" action="/add-band" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="photo" class="form-control">
    </div>

    <button class="btn btn-success">Criar</button>
</form>
@endsection
