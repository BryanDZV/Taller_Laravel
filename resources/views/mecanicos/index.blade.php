@extends('layout')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h1 class="h4 mb-2">Bienvenido/a, {{ Auth::user()->name }}</h1>
            <p class="text-muted mb-4">Rol actual: <strong>{{ Auth::user()->role }}</strong></p>
            <hr>
            <!-- Contenido del dashboard -->
            <form action="{{ route('logout') }}" method="POST" class="d-inline">

                @csrf
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('¿Estás seguro de que deseas cerrar sesión?')">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
@endsection