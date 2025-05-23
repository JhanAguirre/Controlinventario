@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;"><i class="fas fa-edit mr-2"></i> Editar Perfil</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Actualiza tu información personal.</p>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-2 rounded-lg p-4" style="background-color: #F8F9FA; border-color: #CBD5E0;">
                    <div class="card-body">
                        <form action="{{ route('ferreteria.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Campos para cambiar contraseña (opcional) --}}
                            <h3 class="text-xl font-semibold text-gray-800 mt-5 mb-3">Cambiar Contraseña (Opcional)</h3>
                            <div class="mb-3">
                                <label for="password" class="form-label">Nueva Contraseña:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña:</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i> Guardar Cambios
                            </button>
                            <a href="{{ route('ferreteria.profile.show') }}" class="btn btn-secondary ms-2">
                                <i class="fas fa-times mr-2"></i> Cancelar
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection