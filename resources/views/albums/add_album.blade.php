@extends('layouts.main_layout')

@section('title', 'Adicionar Álbum')

@section('content')
<h1>Adicionar Álbum a {{ $band->name }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" enctype="multipart/form-data"
      action="{{ url('/bands/' . $band->id . '/albums/add') }}">
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
    <a href="{{ url('/bands/' . $band->id . '/albums') }}" class="btn btn-secondary ms-2">
        Cancelar
    </a>
</form>
@endsection
