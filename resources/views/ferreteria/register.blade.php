@extends('layouts.ferreteria_info') {{-- Usamos el layout simple sin sidebar --}}

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg p-4" style="background-color: #f8f9fa;">
                    <div class="card-body text-center">
                        <i class="fas fa-user-plus fa-4x text-secondary mb-4" style="color: #6c757d;"></i> {{-- Icono de usuario con signo más --}}
                        <h2 class="text-3xl font-bold text-gray-800 mb-4" style="color: #343a40;">Registro de Cliente</h2>
                        <p class="text-muted mb-4">Crea una cuenta para acceder a todas las funciones de la Ferretería.</p>

                        <form action="{{ route('ferreteria.register.post') }}" method="POST">
                            @csrf
                            <div class="mb-3 text-left">
                                <label for="name" class="form-label text-gray-700 font-semibold" style="color: #495057;">Nombre:</label>
                                <input type="text" class="form-control rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="name" name="name" required autofocus placeholder="Tu Nombre Completo" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger text-sm mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 text-left">
                                <label for="email" class="form-label text-gray-700 font-semibold" style="color: #495057;">Email:</label>
                                <input type="email" class="form-control rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="email" name="email" required placeholder="tu@email.com" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger text-sm mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 text-left">
                                <label for="password" class="form-label text-gray-700 font-semibold" style="color: #495057;">Contraseña:</label>
                                <input type="password" class="form-control rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="password" name="password" required placeholder="••••••••">
                                @error('password')
                                    <span class="text-danger text-sm mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4 text-left">
                                <label for="password_confirmation" class="form-label text-gray-700 font-semibold" style="color: #495057;">Confirmar Contraseña:</label>
                                <input type="password" class="form-control rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="password_confirmation" name="password_confirmation" required placeholder="••••••••">
                                @error('password_confirmation')
                                    <span class="text-danger text-sm mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn w-100 py-2 rounded-md shadow-sm transition duration-200 ease-in-out" style="background-color: #dc3545; border-color: #dc3545; color: white;">
                                Registrarme
                            </button>
                        </form>
                        <p class="text-sm text-gray-600 mt-3">¿Ya tienes cuenta? <a href="{{ route('ferreteria.login') }}" class="text-blue-500 hover:underline" style="color: #007bff;">Inicia Sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection