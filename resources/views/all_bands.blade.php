@extends('layouts.main_layout')

@section('title', 'Bandas')

@section('content')
<h1 class="mb-4">Bandas</h1>

@if(auth()->user()?->user_type == 1)
    <a href="/add-band" class="btn btn-primary mb-3">Adicionar Banda</a>
@endif

<div class="row">
@foreach ($bands as $band)
    <div class="col-md-4 mb-3">
        <div class="card">
            @if ($band->photo)
                <img src="{{ asset('storage/' . $band->photo) }}" class="card-img-top">
            @endif
            <div class="card-body">
                <h5>{{ $band->name }}</h5>
                <a href="/bands/{{ $band->id }}" class="btn btn-sm btn-info">Ver</a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
