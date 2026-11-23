@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">Crear Registro</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">DNI</label>
                    <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror"
                        value="{{ old('dni', $item->dni ?? '') }}" required>
                    @error('dni') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                        value="{{ old('nombre', $item->nombre ?? '') }}" required>
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror"
                        value="{{ old('apellidos', $item->apellidos ?? '') }}" required>
                    @error('apellidos') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $item->email ?? '') }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mt-4">
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection