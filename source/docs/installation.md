---
title: Instalación
description: "Inicia un proyecto con el installer y arráncalo con un solo comando."
extends: _layouts.documentation
section: content
---

# Instalación

<div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-green-700">
                <strong>¡Súper fácil!</strong> Con solo 4 comandos tendrás tu aplicación Syverum funcionando en minutos.
            </p>
        </div>
    </div>
</div>

## Pasos de instalación

<div class="bg-gray-900 rounded-lg p-6 mb-8">
    <div class="flex items-center mb-4">
        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <span class="text-gray-300 font-medium">Terminal</span>
    </div>
    <pre class="text-gray-100"># Instala el instalador de Syverum
<code>composer global require syverum/installer</code>

# Crea un nuevo proyecto
<code>syverum new mi-app</code>

# Entra al proyecto
<code>cd mi-app</code>

# Arranca el entorno de desarrollo
<code>composer run dev</code></pre>
</div>

## ¿Qué hace cada comando?

<div class="space-y-4 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                <span class="text-blue-600 font-semibold text-sm">1</span>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    <code class="bg-gray-100 px-2 py-1 rounded text-sm">composer global require syverum/installer</code>
                </h3>
                <p class="text-gray-600">Instala globalmente el instalador de Syverum y habilita el comando <code class="bg-gray-100 px-1 rounded">syverum</code> en tu terminal.</p>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
                <span class="text-green-600 font-semibold text-sm">2</span>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    <code class="bg-gray-100 px-2 py-1 rounded text-sm">syverum new mi-app</code>
                </h3>
                <p class="text-gray-600">Crea la estructura base del proyecto junto con los archivos necesarios para comenzar.</p>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0 w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-4">
                <span class="text-yellow-600 font-semibold text-sm">3</span>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    <code class="bg-gray-100 px-2 py-1 rounded text-sm">cd mi-app</code>
                </h3>
                <p class="text-gray-600">Entra al directorio del proyecto recién creado.</p>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                <span class="text-purple-600 font-semibold text-sm">4</span>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    <code class="bg-gray-100 px-2 py-1 rounded text-sm">composer run dev</code>
                </h3>
                <p class="text-gray-600">Instala y prepara dependencias, arranca el entorno de desarrollo, levanta el backend y compila el frontend con <strong>Tailwind</strong> y recarga en caliente.</p>
            </div>
        </div>
    </div>
</div>

## Notas importantes

<div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
        <div class="flex items-center mb-3">
            <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-blue-900">Comando mágico</h3>
        </div>
        <p class="text-blue-800 mb-3">
            <code class="bg-blue-100 px-2 py-1 rounded text-sm">composer run dev</code> prepara y levanta el backend y frontend (Tailwind) automáticamente.
        </p>
        <div class="bg-blue-100 rounded-lg p-3">
            <p class="text-sm text-blue-800">
                <strong>💡 Tip:</strong> No necesitas ejecutar <code class="bg-blue-200 px-1 rounded">composer install</code> ni <code class="bg-blue-200 px-1 rounded">npm install</code>.
            </p>
        </div>
    </div>

    <div class="bg-green-50 border border-green-200 rounded-lg p-6">
        <div class="flex items-center mb-3">
            <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
            </svg>
            <h3 class="text-lg font-semibold text-green-900">Puerto por defecto</h3>
        </div>
        <p class="text-green-800 mb-3">
            La aplicación se ejecuta en <strong>http://127.0.0.1:3000</strong>
        </p>
        <div class="bg-green-100 rounded-lg p-3">
            <p class="text-sm text-green-800">
                <strong>⚙️ Configuración:</strong> Para cambiar el puerto, edita el archivo <code class="bg-green-200 px-1 rounded">composer.json</code> y ajusta el script <code class="bg-green-200 px-1 rounded">dev</code>.
            </p>
        </div>
    </div>
</div>

## ¿Qué obtienes?

<div class="bg-gray-50 rounded-lg p-6 mb-8">
    <h3 class="text-lg font-semibold text-gray-900" style="margin-bottom:20px!important;">Estructura del proyecto creado:</h3>
    
    <div class="grid md:grid-cols-2 gap-4">
        <div class="space-y-3">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                </svg>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">app/</code> - Controladores y lógica de negocio</span>
            </div>
            
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">resources/</code> - Vistas Blade y assets</span>
            </div>
            
            <div class="flex items-center">
                <svg class="w-5 h-5 text-purple-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">routes/</code> - Definición de rutas</span>
            </div>
        </div>
        
        <div class="space-y-3">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                </svg>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">public/</code> - Archivos públicos</span>
            </div>
            
        </div>
    </div>
</div>

## Siguiente paso

<div class="text-center">
    <a href="/docs/project-structure" class="btn-primary">
        Estructura del proyecto
        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>
