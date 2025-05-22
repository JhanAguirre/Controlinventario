@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="text-3xl font-bold text-blue-700 mb-4">Quiénes Somos</h1>
                                <p class="text-gray-700 mb-4">
                                    <strong>InventarioTech</strong> es una empresa líder en el desarrollo de soluciones de software para la gestión de inventario.
                                    Nos dedicamos a proporcionar herramientas robustas, escalables y fáciles de usar que permiten a las empresas de todos los tamaños
                                    optimizar sus operaciones, reducir costos y mejorar la eficiencia en la cadena de suministro.
                                </p>
                                <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Nuestra Misión</h2>
                                <p class="text-gray-700 mb-4">
                                    Capacitar a las empresas con tecnología de punta para una gestión de inventario inteligente y proactiva,
                                    impulsando su crecimiento y competitividad en el mercado.
                                </p>
                                <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Nuestra Visión</h2>
                                 <p class="text-gray-700 mb-4">
                                    Ser reconocidos como el socio estratégico preferido para soluciones de gestión de inventario,
                                    transformando la forma en que las empresas administran sus activos a nivel global.
                                </p>
                            
                            </div>
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1533227268415-79ce713a8635?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Equipo de InventarioTech" class="img-fluid rounded-lg shadow-md">
                            </div>
                        </div>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-8 mb-4">Información Técnica</h2>
                        <p class="text-gray-700 mb-4">
                            En InventarioTech, utilizamos una arquitectura de software de última generación para garantizar el rendimiento,
                            la seguridad y la escalabilidad de nuestras soluciones. Nuestro equipo de desarrollo altamente calificado
                            se especializa en las siguientes tecnologías:
                        </p>
                        <ul class="list-disc list-inside text-gray-600">
                            <li><strong>Lenguajes de Programación:</strong> PHP (Laravel Framework), JavaScript (Vue.js, React)</li>
                            <li><strong>Bases de Datos:</strong> MySQL, PostgreSQL</li>
                            <li><strong>Infraestructura:</strong> AWS, Azure, Servidores Linux</li>
                            <li><strong>Metodologías:</strong> Agile (Scrum, Kanban)</li>
                            <li><strong>Control de Versiones:</strong> Git</li>
                            <li><strong>Pruebas:</strong> Pruebas unitarias, Pruebas de integración, Pruebas de extremo a extremo</li>
                        </ul>
                        <p class="text-gray-700 mt-4">
                            Nos comprometemos a mantenernos a la vanguardia de la tecnología, adoptando las mejores prácticas de la industria
                            para ofrecer a nuestros clientes soluciones innovadoras y de alta calidad.
                        </p>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">Volver al Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
