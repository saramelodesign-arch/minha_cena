@extends('layouts.main_layout')

@section('title', 'Utilizadores')

@section('content')
    <h1 class="mb-4">Lista de Utilizadores</h1>

    @if(auth()->user()->user_type == 1)
        <a href="/add-user" class="btn btn-primary mb-3">Adicionar Utilizador</a>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="/users/{{ $user->id }}" class="btn btn-sm btn-info">Ver</a>

                        @if(auth()->user()->user_type == 1)
                            <a href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-warning">
                                Editar
                            </a>

                            <form action="/users/{{ $user->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Tens a certeza?')">
                                    Apagar
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
