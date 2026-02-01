@extends('layouts.main_layout')

@section('title', 'Adicionar Álbum')

@section('content')
<h1>Adicionar Álbum a {{ $band->name }}</h1>

<form method="POST" enctype="multipart/form-data"
      action="/bands/{{ $band->id }}/albums/add">
    @csrf

    <div class="mb-3">
        <label>Nome do Álbum</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Capa</label>
        <input type="file" name="cover" class="form-control">
    </div>

    <div class="mb-3">
        <label>Data de Lançamento</label>
        <input type="date" name="release_date" class="form-control">
    </div>

    <button class="btn btn-success">Criar</button>
</form>
@endsection
