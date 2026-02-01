@extends('layouts.main_layout')

@section('title', 'Álbuns')

@section('content')
<h1>Álbuns de {{ $band->name }}</h1>

@if(auth()->user()?->user_type == 1)
    <a href="/bands/{{ $band->id }}/albums/add" class="btn btn-primary mb-3">
        Adicionar Álbum
    </a>
@endif

<div class="row">
@foreach ($band->albums as $album)
    <div class="col-md-4 mb-3">
        <div class="card">
            @if ($album->cover)
                <img src="{{ asset('storage/' . $album->cover) }}" class="card-img-top">
            @endif
            <div class="card-body">
                <h5>{{ $album->name }}</h5>
                <p>{{ $album->release_date }}</p>
            </div>
        </div>
    </div>
@endforeach
</div>

<a href="/bands" class="btn btn-secondary">Voltar às bandas</a>
@endsection
