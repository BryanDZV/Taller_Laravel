@extends('layout')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h1 class="h4 mb-2">Bienvenido/a, {{ Auth::user()->nombre }}</h1>
            <p class="text-muted mb-4">Rol actual: <strong>{{ Auth::user()->tipo }}</strong></p>
            <p class="text-muted mb-4">Gestión Administrativa de Clientes</p>
            <hr>
            <!-- Contenido del dashboard -->
            <form action="{{ route('logout') }}" method="POST" class="d-inline">

                @csrf
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('¿Estás seguro de que deseas cerrar sesión?')">
                    Cerrar Sesión
                </button>
            </form>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Listado de Entidad</h2>
                <a href="{{ route('clientes.create') }}" class="btn btn-primary">Nuevo Registro</a>
            </div>

            <div class="table-responsive shadow-sm">
                <table class="table table-striped table-hover bg-white">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>APELLIDOS</th>
                            <th>EMAIL</th>
                            <th class="text-end">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->dni }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellidos }}</td>
                                <td>{{ $cliente->email}}</td>
                                <td class="text-end">

                                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Borrar?')">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 20px;">
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection