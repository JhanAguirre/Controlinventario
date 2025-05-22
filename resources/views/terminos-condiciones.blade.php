{{-- resources/views/terminos-condiciones.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="text-3xl font-bold text-blue-700 mb-4">Términos y Condiciones</h1>
                        <p class="text-gray-700 mb-4">
                            Al utilizar el Sistema de Control de Inventario de InventarioTech, aceptas los siguientes términos y condiciones,
                            que rigen tu acceso y uso del sistema.  Estos términos incorporan principios de debido proceso y protección de datos,
                            inspirados en el concepto legal de Habeas Corpus.
                        </p>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Aceptación de los Términos</h2>
                        <p class="text-gray-700 mb-4">
                            Al acceder o utilizar el sistema, confirmas que has leído, entendido y aceptado estos términos en su totalidad.
                            Si no estás de acuerdo con alguno de estos términos, no debes utilizar el sistema.  Reconocemos tu derecho a un
                            proceso justo y transparente en la aplicación de estos términos.
                        </p>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Uso del Sistema y Derechos del Usuario</h2>
                        <ul class="list-disc list-inside text-gray-700 mb-4">
                            <li class="font-semibold">Uso Permitido:</li>
                            <span class="text-gray-700">El sistema está diseñado para el uso exclusivo de la gestión de inventario de tu empresa,
                                 dentro de los límites establecidos por la ley y el debido proceso.</span>
                            <li class="font-semibold">Uso Prohibido:</li>
                            <span class="text-gray-700">No debes utilizar el sistema para ningún propósito ilegal, no autorizado o que viole estos términos.
                                 Tienes derecho a ser informado claramente sobre las razones de cualquier restricción de acceso.</span>
                            <li class="font-semibold">Responsabilidad del Usuario:</li>
                            <span class="text-gray-700">Eres responsable de mantener la confidencialidad de tu cuenta y contraseña,
                                y de todas las actividades que ocurran bajo tu cuenta.  Garantizamos que tus credenciales serán manejadas con la debida diligencia y seguridad.</span>
                           <li class="font-semibold">Derecho a la Información:</li>
                            <span class="text-gray-700">Tienes derecho a acceder a la información sobre el uso de tus datos y la lógica detrás de cualquier decisión automatizada que afecte tu acceso al sistema.</span>
                        </ul>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Propiedad Intelectual</h2>
                        <p class="text-gray-700 mb-4">
                            El sistema y su contenido, incluyendo pero no limitado a software, código, diseño, gráficos y marcas,
                            están protegidos por leyes de propiedad intelectual.  Respetamos tus derechos de propiedad intelectual y te pedimos que hagas lo mismo.
                        </p>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Limitación de Responsabilidad</h2>
                        <p class="text-gray-700 mb-4">
                            En la medida permitida por la ley, InventarioTech no será responsable por ningún daño directo, indirecto,
                            incidental, especial o consecuente que surja de tu uso o imposibilidad de usar el sistema, salvo en casos de negligencia grave o dolo.
                        </p>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Modificaciones a los Términos</h2>
                        <p class="text-gray-700 mb-4">
                            Nos reservamos el derecho de modificar estos términos en cualquier momento. Te notificaremos sobre cualquier
                            cambio importante, y tu uso continuado del sistema después de la notificación constituirá tu aceptación de los
                            términos modificados.  Cualquier modificación que afecte tus derechos fundamentales será notificada con antelación razonable.
                        </p>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Ley Aplicable y Resolución de Disputas</h2>
                        <p class="text-gray-700 mb-4">
                            Estos términos se regirán e interpretarán de acuerdo con las leyes de [Tu país o estado].  En caso de disputa,
                            tienes derecho a acceder a mecanismos de resolución alternativa de conflictos antes de recurrir a la vía judicial.
                        </p>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">Volver al Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
.card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 2rem;
}

h1 {
    color: #0056b3;
    /*font-family: 'Arial', sans-serif;*/
}

h2 {
    color: #004080;
    /*font-family: 'Arial', sans-serif;*/
}

p {
    color: #343a40;
    /*font-family: 'Verdana', sans-serif;*/
    line-height: 1.6;
}

ul {
    list-style-type: disc;
    padding-left: 20px;
    margin-bottom: 1rem;
}

li {
    margin-bottom: 0.5rem;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #5a6268;
}
</style>
@endsection
