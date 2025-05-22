@extends('layouts.ferreteria_info') {{-- Extiende el nuevo layout --}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="text-3xl font-bold text-blue-700 mb-4">Contáctenos</h1>
                                <p class="text-gray-700 mb-4">
                                    En InventarioTech, valoramos tu comunicación. Si tienes alguna pregunta, comentario o necesitas soporte,
                                    no dudes en ponerte en contacto con nosotros a través de los siguientes medios:
                                </p>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-envelope mr-2 text-blue-500"></i><strong>Email:</strong> info@inventariotech.com</li>
                                    <li><i class="fas fa-phone mr-2 text-blue-500"></i><strong>Teléfono:</strong> +1 (555) 123-4567</li>
                                    <li><i class="fas fa-map-marker-alt mr-2 text-blue-500"></i><strong>Dirección:</strong> 123 Calle Principal, Ciudad, Estado, País</li>
                                </ul>

                                <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Formulario de Contacto</h2>
                                <p class="text-gray-700 mb-4">
                                    También puedes utilizar el siguiente formulario para enviarnos un mensaje directamente:
                                </p>
                                <form>
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" placeholder="Tu nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Tu email">
                                    </div>
                                    <div class="form-group">
                                        <label for="mensaje">Mensaje</label>
                                        <textarea class="form-control" id="mensaje" rows="5" placeholder="Tu mensaje"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Enviar mensaje</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Contáctenos" class="img-fluid rounded-lg shadow-md">
                            </div>
                        </div>
                        <a href="{{ route('ferreteria.ayuda') }}" class="btn btn-secondary mt-4">Volver a Ayuda</a> {{-- Botón modificado --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection