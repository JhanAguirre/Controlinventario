@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;"><i class="fas fa-user-circle mr-2"></i> Mi Perfil</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Gestiona la información de tu cuenta.</p>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-2 rounded-lg p-4" style="background-color: #F8F9FA; border-color: #CBD5E0;">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Información Personal</h2>
                        <div class="mb-3">
                            <strong>Nombre:</strong> {{ $user->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong> {{ $user->email }}
                        </div>
                        {{-- Puedes añadir más campos aquí si tu modelo User los tiene (ej. dirección, teléfono) --}}
                        {{--
                        <div class="mb-3">
                            <strong>Dirección:</strong> {{ $user->address ?? 'No especificada' }}
                        </div>
                        --}}
                        <div class="mt-4">
                            <a href="{{ route('ferreteria.profile.edit') }}" class="btn btn-primary">
                                <i class="fas fa-edit mr-2"></i> Editar Perfil
                            </a>
                            <a href="{{ route('ferreteria.profile.orders') }}" class="btn btn-info ms-2">
                                <i class="fas fa-receipt mr-2"></i> Mis Pedidos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection