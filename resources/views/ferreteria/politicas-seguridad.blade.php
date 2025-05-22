@extends('layouts.ferreteria_info') {{-- Extiende el nuevo layout --}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="text-3xl font-bold text-blue-700 mb-4">Políticas de Seguridad</h1>
                        <p class="text-gray-700 mb-4">
                            En InventarioTech, nos comprometemos a proteger la seguridad y privacidad de tu información.
                            Estas políticas describen las medidas que implementamos para garantizar la confidencialidad,
                            integridad y disponibilidad de tus datos, respetando tu derecho fundamental a la protección de datos
                            y el debido proceso, inspirado en el concepto de Habeas Corpus.
                        </p>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Principios de Seguridad y Derechos del Usuario</h2>
                        <ul class="list-disc list-inside text-gray-700 mb-4">
                            <li><strong>Confidencialidad:</strong> Protegemos tu información contra accesos no autorizados.  Tienes derecho a la privacidad de tus datos.</li>
                            <li><strong>Integridad:</strong> Mantenemos la precisión y completitud de tus datos.  Tienes derecho a rectificar cualquier información inexacta.</li>
                            <li><strong>Disponibilidad:</strong> Aseguramos que puedas acceder a tu información cuando la necesites.  Tienes derecho a la portabilidad de tus datos.</li>
                            <li><strong>Legalidad:</strong> El procesamiento de tus datos se realiza de acuerdo con las leyes aplicables y con tu consentimiento cuando sea necesario.</li>
                            <li><strong>Transparencia:</strong> Te informamos de manera clara y concisa sobre cómo se utilizan tus datos.</li>
                            <li><strong>Finalidad:</strong> Tus datos se recopilan y procesan para fines específicos y legítimos.</li>
                            <li><strong>Proporcionalidad:</strong> Solo recopilamos los datos necesarios para los fines establecidos.</li>
                            <li><strong>Seguridad por Diseño y por Defecto:</strong> Implementamos medidas de seguridad desde la concepción del sistema y por defecto.</li>
                        </ul>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Medidas de Seguridad</h2>
                        <ul class="list-disc list-inside text-gray-700 mb-4">
                            <li><strong>Cifrado:</strong> Utilizamos cifrado de última generación para proteger tus datos en tránsito y en reposo.</li>
                            <li><strong>Control de Acceso:</strong> Implementamos controles de acceso basados en roles para limitar el acceso a la información sensible.</li>
                            <li><strong>Autenticación:</strong> Requerimos autenticación robusta para verificar tu identidad antes de permitir el acceso al sistema.</li>
                            <li><strong>Monitoreo:</strong> Monitoreamos continuamente nuestros sistemas para detectar y responder a posibles incidentes de seguridad.</li>
                            <li><strong>Actualizaciones:</strong> Mantenemos nuestros sistemas actualizados con los últimos parches de seguridad.</li>
                            <li><strong>Respaldo:</strong> Realizamos copias de seguridad periódicas de tus datos para garantizar su recuperación en caso de desastre.</li>
                            <li><strong>Capacitación:</strong> Capacitamos a nuestro personal en las mejores prácticas de seguridad para proteger tu información.</li>
                            <li><strong>Evaluación de Impacto de Protección de Datos (EIPD):</strong> Realizamos EIPD para identificar y mitigar los riesgos para tu privacidad.</li>
                        </ul>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Tus Derechos Bajo el Habeas Data</h2>
                        <p class="text-gray-700 mb-4">
                            Como usuario de nuestro sistema, tienes los siguientes derechos en relación con tus datos personales:
                        </p>
                        <ul class="list-disc list-inside text-gray-700 mb-4">
                            <li><strong>Derecho de Acceso:</strong> Derecho a obtener confirmación de si se están tratando o no datos personales que te conciernen, y, en tal caso, derecho a acceder a dichos datos.</li>
                            <li><strong>Derecho de Rectificación:</strong> Derecho a obtener sin dilación indebida la rectificación de los datos personales inexactos que te conciernan.</li>
                            <li><strong>Derecho de Supresión ("el derecho al olvido"):</strong> Derecho a obtener sin dilación indebida la supresión de los datos personales que te conciernan.</li>
                            <li><strong>Derecho a la Limitación del Tratamiento:</strong> Derecho a obtener la limitación del tratamiento de los datos personales que te conciernan.</li>
                            <li><strong>Derecho a la Portabilidad de los Datos:</strong> Derecho a recibir los datos personales que te conciernan, que nos hayas facilitado, en un formato estructurado, de uso común y lectura mecánica, y a transmitirlos a otro responsable del tratamiento sin que lo impida el responsable al que se los facilitaste.</li>
                            <li><strong>Derecho de Oposición:</strong> Derecho a oponerte al tratamiento de los datos personales que te conciernan.</li>
                            <li><strong>Derecho a no ser objeto de decisiones individualizadas:</strong> Derecho a no ser objeto de una decisión basada únicamente en el tratamiento automatizado, incluida la elaboración de perfiles, que produzca efectos jurídicos en ti o te afecte significativamente de modo similar.</li>
                        </ul>

                        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-3">Canales para el Ejercicio de tus Derechos</h2>
                        <p class="text-gray-700 mb-4">
                            Para ejercer tus derechos o realizar consultas sobre nuestras políticas de seguridad, puedes contactarnos a través de:
                        </p>
                         <ul class="list-unstyled">
                            <li><i class="fas fa-envelope mr-2 text-blue-500"></i><strong>Email:</strong> protecciondedatos@inventariotech.com</li>
                            <li><i class="fas fa-phone mr-2 text-blue-500"></i><strong>Teléfono:</strong> +1 (555) 987-6543</li>
                            <li><i class="fas fa-map-marker-alt mr-2 text-blue-500"></i><strong>Dirección:</strong> 456 Avenida de la Seguridad, Ciudad, Estado, País</li>
                        </ul>
                        <a href="{{ route('ferreteria.ayuda') }}" class="btn btn-secondary mt-4">Volver a Ayuda</a> {{-- Botón modificado --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
