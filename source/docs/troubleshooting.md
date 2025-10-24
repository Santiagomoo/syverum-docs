---
title: Solución de problemas
description: Errores comunes y cómo resolverlos rápidamente.
extends: _layouts.documentation
section: content
---

# Solución de problemas

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
  <div class="flex items-center"> <!-- items-center centra verticalmente -->
    <div class="flex items-center justify-center w-8"> <!-- contenedor centrado H+V -->
      <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
      </svg>
    </div>

    <div class="ml-3">
      <p class="text-sm text-blue-700">
        Esta guía cubre los problemas más comunes que puedes encontrar al trabajar con Syverum.
        Haz clic en cada sección para expandir los detalles y soluciones.
      </p>
    </div>

  </div>
</div>

<div class="space-y-4">
    <!-- Problemas de Instalación -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('install')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Problemas de Instalación</h3>
                <p class="text-sm text-gray-600">Errores durante la instalación y configuración inicial</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="install-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="install-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">El instalador no funciona</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> Error al ejecutar <code class="bg-gray-100 px-1 rounded">composer create-project</code> o problemas con el CLI.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Verifica que tienes <strong>PHP 8.1+</strong> instalado: <code class="bg-gray-100 px-1 rounded">php --version</code></li>
                            <li>Confirma que <strong>Composer</strong> está actualizado: <code class="bg-gray-100 px-1 rounded">composer self-update</code></li>
                            <li>Limpia la caché de Composer: <code class="bg-gray-100 px-1 rounded">composer clear-cache</code></li>
                            <li>Verifica permisos de escritura en el directorio de destino</li>
                        </ul>
                    </div>
                </div>
                
                <hr class="border-gray-200">
                
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Error de dependencias</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> <code class="bg-gray-100 px-1 rounded">composer install</code> falla o hay conflictos de versiones.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Actualiza Composer: <code class="bg-gray-100 px-1 rounded">composer self-update</code></li>
                            <li>Elimina <code class="bg-gray-100 px-1 rounded">composer.lock</code> y <code class="bg-gray-100 px-1 rounded">vendor/</code> y ejecuta <code class="bg-gray-100 px-1 rounded">composer install</code> nuevamente</li>
                            <li>Verifica que todas las extensiones PHP requeridas están instaladas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Problemas de Configuración -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('config')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Problemas de Configuración</h3>
                <p class="text-sm text-gray-600">Variables de entorno, base de datos y configuración general</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="config-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="config-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Variables de entorno no cargan</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> <code class="bg-gray-100 px-1 rounded">$_ENV</code> está vacío o las variables no se reconocen.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Confirma que el archivo <code class="bg-gray-100 px-1 rounded">.env</code> existe en la raíz del proyecto</li>
                            <li>Verifica que el archivo tiene permisos de lectura</li>
                            <li>Asegúrate de que el encoding es <strong>UTF-8</strong></li>
                            <li>Revisa que no hay espacios extra en las líneas de configuración</li>
                            <li>Reinicia el servidor web después de cambios en <code class="bg-gray-100 px-1 rounded">.env</code></li>
                        </ul>
                    </div>
                </div>

                <hr class="border-gray-200">

                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Base de datos no conecta</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> Error de conexión a la base de datos.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Verifica las credenciales en <code class="bg-gray-100 px-1 rounded">.env</code>:
                                <pre class="mt-2 bg-gray-100 p-2 rounded text-xs"><code>DB_HOST=localhost

DB_PORT=3306
DB_DATABASE=tu_base_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña</code></pre>
</li>
<li>Confirma que el servidor de base de datos está ejecutándose</li>
<li>Verifica que el usuario tiene permisos para acceder a la base de datos</li>
<li>Prueba la conexión manualmente con las mismas credenciales</li>
</ul>
</div>
</div>
</div>
</div>
</div>

    <!-- Problemas de Rutas -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('routes')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Problemas de Rutas</h3>
                <p class="text-sm text-gray-600">Errores 404, middleware y configuración de rutas</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="routes-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="routes-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Error 404 - Ruta no encontrada</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> Las rutas devuelven 404 aunque estén definidas.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Verifica el método HTTP correcto (GET, POST, PUT, DELETE)</li>
                            <li>Comprueba la URL exacta (incluyendo barras <code class="bg-gray-100 px-1 rounded">/</code>)</li>
                            <li>Revisa que la ruta está registrada en <code class="bg-gray-100 px-1 rounded">routes/web.php</code></li>
                            <li>Confirma que el archivo de rutas se está cargando correctamente</li>
                            <li>Verifica que no hay conflictos con rutas similares</li>
                        </ul>
                    </div>
                </div>

                <hr class="border-gray-200">

                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Middleware no se ejecuta</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> El middleware registrado no se ejecuta.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Verifica que el middleware está registrado en <code class="bg-gray-100 px-1 rounded">config/middleware.php</code></li>
                            <li>Confirma que el alias del middleware es correcto</li>
                            <li>Revisa que el middleware está aplicado a la ruta correcta</li>
                            <li>Verifica que la clase del middleware existe y es válida</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Problemas de Vistas -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('views')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Problemas de Vistas</h3>
                <p class="text-sm text-gray-600">Blade, CSS/JS y renderizado de vistas</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="views-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="views-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Vistas Blade no se renderizan</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> Error al cargar vistas o contenido vacío.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Verifica que la vista existe en <code class="bg-gray-100 px-1 rounded">resources/views/</code></li>
                            <li>Confirma que la extensión del archivo es <code class="bg-gray-100 px-1 rounded">.blade.php</code></li>
                            <li>Revisa permisos de lectura en el directorio de vistas</li>
                            <li>Verifica que el directorio <code class="bg-gray-100 px-1 rounded">storage/framework/views</code> existe y tiene permisos de escritura</li>
                            <li>Limpia la caché de vistas: elimina archivos en <code class="bg-gray-100 px-1 rounded">storage/framework/views/</code></li>
                        </ul>
                    </div>
                </div>

                <hr class="border-gray-200">

                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">CSS/JS no se compila</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> Los estilos o scripts no se cargan.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Instala Node.js y npm</li>
                            <li>Ejecuta <code class="bg-gray-100 px-1 rounded">npm install</code> para instalar dependencias</li>
                            <li>Compila los assets: <code class="bg-gray-100 px-1 rounded">npm run build</code> o <code class="bg-gray-100 px-1 rounded">npm run dev</code></li>
                            <li>Verifica las rutas de entrada y salida en <code class="bg-gray-100 px-1 rounded">vite.config.js</code></li>
                            <li>Confirma que los archivos compilados existen en <code class="bg-gray-100 px-1 rounded">public/build/</code></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Problemas de Inyección de Dependencias -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('di')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Problemas de Inyección de Dependencias</h3>
                <p class="text-sm text-gray-600">Resolución de dependencias y Service Providers</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="di-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="di-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Error de resolución de dependencias</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> "Class not found" o errores de binding.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Verifica que la clase existe y está en el namespace correcto</li>
                            <li>Confirma que el autoloader de Composer está funcionando: <code class="bg-gray-100 px-1 rounded">composer dump-autoload</code></li>
                            <li>Revisa que las interfaces están correctamente bindeadas</li>
                            <li>Verifica que no hay dependencias circulares</li>
                            <li>Usa <code class="bg-gray-100 px-1 rounded">container()->has()</code> para verificar si un servicio está registrado</li>
                        </ul>
                    </div>
                </div>

                <hr class="border-gray-200">

                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Service Provider no se carga</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> Los servicios del Service Provider no están disponibles.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Verifica que el Service Provider está registrado en <code class="bg-gray-100 px-1 rounded">config/app.php</code></li>
                            <li>Confirma que la clase del Service Provider existe</li>
                            <li>Revisa que el método <code class="bg-gray-100 px-1 rounded">register()</code> está implementado correctamente</li>
                            <li>Verifica que no hay errores de sintaxis en el Service Provider</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Problemas Generales -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-inset" onclick="toggleDropdown('general')">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Problemas Generales</h3>
                <p class="text-sm text-gray-600">Permisos, caché y otros problemas comunes</p>
            </div>
            <svg class="h-5 w-5 text-gray-400 transform transition-transform duration-200" id="general-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div id="general-content" class="hidden px-6 pb-4">
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Permisos de archivos</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> Errores de permisos al escribir archivos.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Asegura permisos de escritura en <code class="bg-gray-100 px-1 rounded">storage/</code></li>
                            <li>Crea directorios necesarios si no existen</li>
                            <li>Verifica que el usuario del servidor web tiene permisos apropiados</li>
                        </ul>
                    </div>
                </div>

                <hr class="border-gray-200">

                <div>
                    <h4 class="font-semibold text-gray-900 mb-2">Caché corrupta</h4>
                    <p class="text-sm text-gray-700 mb-2"><strong>Síntomas:</strong> Comportamiento inesperado o errores extraños.</p>
                    <div class="text-sm text-gray-700">
                        <strong>Soluciones:</strong>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Limpia la caché de vistas: elimina <code class="bg-gray-100 px-1 rounded">storage/framework/views/</code></li>
                            <li>Limpia la caché de Composer: <code class="bg-gray-100 px-1 rounded">composer clear-cache</code></li>
                            <li>Regenera el autoloader: <code class="bg-gray-100 px-1 rounded">composer dump-autoload</code></li>
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
                <strong>💡 Tip:</strong> Si sigues teniendo problemas, revisa la documentación específica de cada sección: 
                <a href="/docs/installation" class="text-green-600 hover:text-green-500">Instalación</a>, 
                <a href="/docs/routing" class="text-green-600 hover:text-green-500">Rutas</a>, 
                <a href="/docs/middlewares" class="text-green-600 hover:text-green-500">Middlewares</a>, 
                <a href="/docs/dependency-injection" class="text-green-600 hover:text-green-500">Inyección de Dependencias</a>, 
                <a href="/docs/database" class="text-green-600 hover:text-green-500">Base de Datos</a>.
            </p>
        </div>
    </div>
</div>
