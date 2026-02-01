@extends('layouts.main_layout')

@section('title', 'Editar Álbum')

@section('content')
<h1>Editar Álbum</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('/albums/' . $album->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="name" value="{{ $album->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data de Lançamento</label>
        <input type="date" name="release_date" value="{{ $album->release_date }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Capa</label>
        <input type="file" name="cover" class="form-control">
    </div>

    <button class="btn btn-primary">Guardar</button>
</form>
@endsection
