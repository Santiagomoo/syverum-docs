---
title: Preguntas frecuentes
description: Respuestas rápidas a dudas comunes sobre Syverum.
extends: _layouts.documentation
section: content
---

# Preguntas frecuentes (FAQ)

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
    <div class="flex">
        <div class="flex items-center">
            <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm text-blue-700">
                Aquí encontrarás respuestas a las preguntas más comunes sobre Syverum. 
                Haz clic en cada sección para expandir las preguntas y respuestas detalladas.
            </p>
        </div>
    </div>
</div>

<div class="space-y-4">
    <!-- General -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('general')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">General</h3>
                <p class="text-sm text-gray-600">Preguntas básicas sobre Syverum y sus características</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="general-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="general-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Qué es Syverum?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Syverum</strong> es un framework PHP moderno inspirado en Laravel, diseñado para ser ligero, rápido y fácil de usar. Incluye características como:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Sistema de rutas robusto</li>
                            <li>Middleware pipeline</li>
                            <li>Inyección de dependencias</li>
                            <li>Motor de vistas Blade</li>
                            <li>Sistema de modelos</li>
                            <li>CLI propio para automatización</li>
                        </ul>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Syverum es para APIs o vistas?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Ambos.</strong> Syverum está diseñado para ser versátil:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li><strong>APIs:</strong> El sistema de rutas y controladores funciona perfectamente para APIs REST</li>
                            <li><strong>Vistas:</strong> Soporte completo para vistas Blade para aplicaciones web tradicionales</li>
                            <li><strong>Híbrido:</strong> Puedes combinar ambos enfoques en la misma aplicación</li>
                        </ul>
                        <p class="mt-2">El soporte de vistas es opcional, puedes usar solo las APIs si lo prefieres.</p>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Qué versión de PHP necesito?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>PHP 8.1 o superior</strong> es requerido. Syverum aprovecha las características modernas de PHP como:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Tipos de unión</li>
                            <li>Propiedades readonly</li>
                            <li>Enums</li>
                            <li>Atributos (Attributes)</li>
                            <li>Match expressions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Arquitectura y Estándares -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('architecture')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Arquitectura y Estándares</h3>
                <p class="text-sm text-gray-600">PSR, estructura del proyecto y motores de vistas</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="architecture-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="architecture-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Qué PSR sigue Syverum?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2">Syverum se alinea con los siguientes estándares PSR:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li><strong>PSR-4</strong> → Autoload de clases y organización de namespaces</li>
                            <li><strong>PSR-7</strong> → Conceptos de HTTP (Request/Response)</li>
                            <li><strong>PSR-15</strong> → Middleware pipeline</li>
                            <li><strong>PSR-11</strong> → Container interface para inyección de dependencias</li>
                        </ul>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Cómo está organizada la estructura del proyecto?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2">La estructura sigue convenciones similares a Laravel:</p>
                        <pre class="bg-gray-100 p-3 rounded text-xs mt-2"><code>proyecto/
├── app/
│   ├── Controllers/
│   ├── Middleware/
│   ├── Models/
│   └── Providers/
├── config/
├── resources/
│   └── views/
├── routes/
├── storage/
└── public/</code></pre>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Puedo cambiar Blade por otro motor de vistas?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Sí, es posible.</strong> Por defecto se usa <code class="bg-gray-100 px-1 rounded">jenssegers/blade</code>, pero puedes:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Adaptar la <code class="bg-gray-100 px-1 rounded">Factory</code> para conectar otro motor de plantillas</li>
                            <li>Usar Twig, Smarty, o cualquier otro motor</li>
                            <li>Crear tu propio motor de vistas personalizado</li>
                            <li>Usar solo APIs sin motor de vistas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instalación y Configuración -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('installation')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Instalación y Configuración</h3>
                <p class="text-sm text-gray-600">CLI, instalación y dependencias del sistema</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="installation-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="installation-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Existe CLI propia?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Sí.</strong> Syverum incluye el <strong>syverum-installer</strong> que ofrece:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Creación automática de proyectos</li>
                            <li>Generación de controladores</li>
                            <li>Generación de middleware</li>
                            <li>Comandos de bootstrap</li>
                            <li>Configuración automática</li>
                        </ul>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Cómo instalo Syverum?</h4>
                    <div class="text-sm text-gray-700">
                        <pre class="bg-gray-100 p-3 rounded text-xs"><code># Usando Composer
composer create-project syverum/skeleton mi-proyecto

# O usando el CLI
syverum new mi-proyecto</code></pre>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Qué dependencias necesito?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Requisitos mínimos:</strong></p>
                        <ul class="list-disc list-inside space-y-1 mb-3">
                            <li>PHP 8.1+</li>
                            <li>Composer</li>
                            <li>Servidor web (Apache/Nginx)</li>
                            <li>Base de datos (MySQL/PostgreSQL/SQLite)</li>
                        </ul>
                        <p class="mb-2"><strong>Para desarrollo frontend:</strong></p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Node.js 16+</li>
                            <li>npm o yarn</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Desarrollo -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('development')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Desarrollo</h3>
                <p class="text-sm text-gray-600">Rutas, inyección de dependencias y middleware</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="development-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="development-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Cómo funciona el sistema de rutas?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2">Syverum usa un sistema de rutas similar a Laravel:</p>
                        <pre class="bg-gray-100 p-3 rounded text-xs"><code>// Rutas básicas
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

// Rutas con parámetros
Route::get('/users/{id}', [UserController::class, 'show']);

// Rutas con middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});</code></pre>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Cómo funciona la inyección de dependencias?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2">Syverum incluye un contenedor de DI completo:</p>
                        <pre class="bg-gray-100 p-3 rounded text-xs"><code>// Binding básico
container()->bind(UserService::class);

// Singleton
container()->singleton(DatabaseService::class);

// Resolución automática
class UserController {
    public function __construct(
        private UserService $userService
    ) {}
}</code></pre>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Puedo usar middleware personalizado?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Sí.</strong> Puedes crear middleware de tres formas:</p>
                        <p class="mb-2"><strong>1. Como interfaz:</strong></p>
                        <pre class="bg-gray-100 p-3 rounded text-xs mb-2"><code>class AuthMiddleware implements MiddlewareInterface {
    public function handle($request, $next) {
        // Lógica de autenticación
        return $next($request);
    }
}</code></pre>
                        <p class="mb-2"><strong>2. Como función:</strong></p>
                        <pre class="bg-gray-100 p-3 rounded text-xs mb-2"><code>function authMiddleware($request, $next) {
    // Lógica simple
    return $next($request);
}</code></pre>
                        <p class="mb-2"><strong>3. Como clase callable:</strong></p>
                        <pre class="bg-gray-100 p-3 rounded text-xs"><code>class LogMiddleware {
    public function __invoke($request, $next) {
        // Lógica de logging
        return $next($request);
    }
}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Base de Datos -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('database')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Base de Datos</h3>
                <p class="text-sm text-gray-600">Soporte de bases de datos, configuración y ORM</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="database-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="database-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Qué bases de datos soporta?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2">Syverum soporta múltiples bases de datos:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li><strong>MySQL</strong> (recomendado)</li>
                            <li><strong>PostgreSQL</strong></li>
                            <li><strong>SQLite</strong> (para desarrollo)</li>
                            <li><strong>MariaDB</strong></li>
                        </ul>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Cómo configuro la base de datos?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2">Usa el archivo <code class="bg-gray-100 px-1 rounded">.env</code>:</p>
                        <pre class="bg-gray-100 p-3 rounded text-xs"><code>DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=mi_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña</code></pre>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Puedo usar ORM como Eloquent?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Actualmente no.</strong> Syverum incluye un sistema de modelos básico, pero puedes:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Integrar Eloquent manualmente</li>
                            <li>Usar Doctrine ORM</li>
                            <li>Usar consultas SQL directas</li>
                            <li>Crear tu propio ORM personalizado</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rendimiento y Escalabilidad -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('performance')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Rendimiento y Escalabilidad</h3>
                <p class="text-sm text-gray-600">Velocidad, producción y optimización</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="performance-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="performance-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Es Syverum más rápido que Laravel?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Syverum está diseñado para ser más ligero:</strong></p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Menos dependencias por defecto</li>
                            <li>Arquitectura más simple</li>
                            <li>Menor overhead</li>
                            <li>Carga más rápida</li>
                        </ul>
                        <p class="mt-2">Sin embargo, el rendimiento real depende de tu aplicación específica.</p>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Puedo usar Syverum en producción?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Sí, pero considera:</strong></p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Syverum es relativamente nuevo</li>
                            <li>Revisa la estabilidad de las versiones</li>
                            <li>Haz pruebas exhaustivas</li>
                            <li>Considera Laravel para proyectos críticos</li>
                        </ul>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Cómo optimizo mi aplicación Syverum?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Mejores prácticas:</strong></p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Usa middleware para funcionalidades comunes</li>
                            <li>Implementa caché donde sea apropiado</li>
                            <li>Optimiza consultas de base de datos</li>
                            <li>Usa Service Providers para organizar código</li>
                            <li>Minimiza dependencias innecesarias</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Migración y Compatibilidad -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('migration')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Migración y Compatibilidad</h3>
                <p class="text-sm text-gray-600">Migración desde Laravel, paquetes y soporte</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="migration-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="migration-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Puedo migrar de Laravel a Syverum?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Es posible pero requiere trabajo:</strong></p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>La sintaxis es similar pero no idéntica</li>
                            <li>Algunas características pueden no estar disponibles</li>
                            <li>Necesitarás adaptar código específico</li>
                            <li>Revisa la compatibilidad de paquetes</li>
                        </ul>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Puedo usar paquetes de Laravel?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Depende del paquete:</strong></p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Paquetes que solo usan Eloquent: <strong>No compatibles</strong></li>
                            <li>Paquetes de utilidades: <strong>Posiblemente compatibles</strong></li>
                            <li>Paquetes específicos de Laravel: <strong>No compatibles</strong></li>
                        </ul>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">¿Hay comunidad o soporte?</h4>
                    <div class="text-sm text-gray-700">
                        <p class="mb-2"><strong>Syverum es un proyecto relativamente nuevo:</strong></p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Comunidad pequeña pero creciente</li>
                            <li>Documentación en desarrollo</li>
                            <li>Soporte principalmente a través de GitHub</li>
                            <li>Considera Laravel para proyectos que requieren soporte comercial</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleDropdown(id) {
    const content = document.getElementById(id + '-content');
    const arrow = document.getElementById(id + '-arrow');
    
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        arrow.style.transform = 'rotate(180deg)';
    } else {
        content.classList.add('hidden');
        arrow.style.transform = 'rotate(0deg)';
    }
}
</script>

---

<div class="bg-green-50 border-l-4 border-green-400 p-4 mt-6">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm text-green-700">
                <strong>💡 Tip:</strong> ¿No encontraste tu respuesta? Revisa la documentación específica: 
                <a href="/docs/installation" class="text-green-600 hover:text-green-500">Instalación</a>, 
                <a href="/docs/routing" class="text-green-600 hover:text-green-500">Rutas</a>, 
                <a href="/docs/middlewares" class="text-green-600 hover:text-green-500">Middlewares</a>, 
                <a href="/docs/dependency-injection" class="text-green-600 hover:text-green-500">Inyección de Dependencias</a>, 
                <a href="/docs/database" class="text-green-600 hover:text-green-500">Base de Datos</a>, 
                <a href="/docs/troubleshooting" class="text-green-600 hover:text-green-500">Solución de Problemas</a>.
            </p>
        </div>
    </div>
</div>
