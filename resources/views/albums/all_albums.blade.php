@extends('layouts.main_layout')

@section('title', 'Álbuns')

@section('content')
<h1>Álbuns de {{ $band->name }}</h1>

@if (auth()->check() && auth()->user()->user_type == 1)
    <a href="{{ url('/bands/' . $band->id . '/albums/add') }}"
       class="btn btn-primary mb-3">
        Adicionar Álbum
    </a>
@endif

<div class="row">
@foreach ($band->albums as $album)
    <div class="col-md-4 mb-3">
        <div class="card">
            <img src="{{ $album->cover
                    ? asset('storage/' . $album->cover)
                    : asset('images/nophoto.jpg') }}"
                 class="card-img-top">

            <div class="card-body">
                <h5>{{ $album->name }}</h5>
                <p>{{ $album->release_date }}</p>

                @auth
                    <a href="{{ url('/albums/' . $album->id . '/edit') }}"
                       class="btn btn-sm btn-warning">
                        Editar
                    </a>
                    @endauth

                    @if (auth()->check() && auth()->user()->user_type == 1)
                    <form action="{{ url('/albums/' . $album->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Tens a certeza?')">
                            Apagar
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endforeach
</div>

<a href="{{ url('/bands/' . $band->id) }}"
   class="btn btn-secondary mt-3">
    Voltar à Banda
</a>
@endsection
