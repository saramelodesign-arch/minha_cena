@extends('layouts.main_layout')

@section('title', 'Bandas')

@section('content')
    <h1 class="mb-4">Bandas</h1>

    @if (auth()->check() && auth()->user()->user_type == 1)
        <a href="{{ url('/add-band') }}" class="btn btn-primary mb-3">Adicionar Banda</a>
    @endif

    <div class="row">
        @foreach ($bands as $band)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ $band->photo ? asset('storage/' . $band->photo) : asset('images/nophoto.jpg') }}"
                        alt="Foto da banda" class="card-img-top">


                    <div class="card-body">
                        <h5>{{ $band->name }}</h5>
                        <p class="mb-1">
                            <strong>Álbuns:</strong> {{ $band->albums->count() }}
                        </p>

                        <a href="{{ url('/bands/' . $band->id) }}" class="btn btn-sm btn-info">
                            Ver
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
