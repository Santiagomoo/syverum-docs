---
title: Estructura del proyecto
description: Recorrido por carpetas y módulos de Syverum.
extends: _layouts.documentation
section: content
---

# Estructura del proyecto

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-blue-700">
                <strong>Conoce tu proyecto:</strong> Esta guía te ayuda a entender la organización de carpetas y archivos en Syverum.
            </p>
        </div>
    </div>
</div>

La siguiente guía ofrece un recorrido por las carpetas principales y los módulos del núcleo de **Syverum**, para que te ubiques rápidamente en la arquitectura del framework.

## Estructura principal

<div class="bg-gray-900 rounded-lg p-6 mb-8">
    <div class="flex items-center mb-4">
        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <span class="text-gray-300 font-medium">Estructura del proyecto</span>
    </div>
    <pre class="text-gray-300">mi-app/
├── app/                    # Tu código de aplicación
├── public/                 # Punto de entrada público
├── resources/              # Vistas Blade y assets
├── routes/                 # Definición de rutas
├── tests/                  # Tests de tu aplicación
├── .env                    # Variables de entorno
├── .gitignore              # Archivos ignorados por Git
├── README.md               # Documentación del proyecto
├── composer.json           # Dependencias PHP
├── composer.lock           # Versiones exactas
├── package.json            # Dependencias Node.js
├── package-lock.json       # Versiones exactas Node.js
└── phpunit.xml             # Configuración de tests</pre>
</div>

## Carpetas principales

<div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-center mb-3">
            <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900">app/</h3>
        </div>
        <p class="text-gray-600 mb-3">Código de tu aplicación:</p>
        <ul class="text-sm text-gray-600 space-y-1">
            <li>• Controladores</li>
            <li>• Modelos de dominio</li>
            <li>• Lógica de negocio</li>
            <li>• Servicios personalizados</li>
        </ul>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-center mb-3">
            <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900">resources/</h3>
        </div>
        <p class="text-gray-600 mb-3">Vistas Blade y assets:</p>
        <ul class="text-sm text-gray-600 space-y-1">
            <li>• Plantillas Blade</li>
            <li>• Layouts</li>
            <li>• CSS/SCSS</li>
            <li>• JavaScript</li>
        </ul>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-center mb-3">
            <svg class="w-6 h-6 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900">routes/</h3>
        </div>
        <p class="text-gray-600 mb-3">Definición de rutas:</p>
        <ul class="text-sm text-gray-600 space-y-1">
            <li>• <code class="bg-gray-100 px-1 rounded">web.php</code> - Rutas web</li>
            <li>• <code class="bg-gray-100 px-1 rounded">api.php</code> - Rutas API</li>
            <li>• Middleware por ruta</li>
            <li>• Nombres de ruta</li>
        </ul>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-center mb-3">
            <svg class="w-6 h-6 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900">public/</h3>
        </div>
        <p class="text-gray-600 mb-3">Punto de entrada público:</p>
        <ul class="text-sm text-gray-600 space-y-1">
            <li>• <code class="bg-gray-100 px-1 rounded">index.php</code> - Entrada principal</li>
            <li>• Assets compilados</li>
            <li>• Archivos estáticos</li>
            <li>• Documentos públicos</li>
        </ul>
    </div>
</div>

## Archivos de configuración

<div class="bg-gray-50 rounded-lg p-6 mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Archivos importantes:</h3>
    
    <div class="grid md:grid-cols-2 gap-4">
        <div class="space-y-3">
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-3">
                    Config
                </span>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">.env</code> - Variables de entorno</span>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mr-3">
                    PHP
                </span>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">composer.json</code> - Dependencias PHP</span>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 mr-3">
                    Node
                </span>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">package.json</code> - Dependencias Node.js</span>
            </div>
        </div>
        
        <div class="space-y-3">
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mr-3">
                    Tests
                </span>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">phpunit.xml</code> - Configuración de tests</span>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 mr-3">
                    Git
                </span>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">.gitignore</code> - Archivos ignorados</span>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 mr-3">
                    Docs
                </span>
                <span class="text-gray-700"><code class="bg-gray-200 px-1 rounded">README.md</code> - Documentación</span>
            </div>
        </div>
    </div>
</div>

## Núcleo del framework

<div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-6 mb-8">
    <h3 class="text-lg font-semibold text-gray-900" style="margin-bottom:20px!important;">Arquitectura modular de Syverum:</h3>
    
    <div class="grid md:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg p-4 border border-blue-200">
            <h4 class="font-semibold text-blue-900 mb-2">Boot</h4>
            <p class="text-sm text-blue-800">Carga de entorno y ciclo de vida de la aplicación</p>
        </div>
        
        <div class="bg-white rounded-lg p-4 border border-green-200">
            <h4 class="font-semibold text-green-900 mb-2">Services</h4>
            <p class="text-sm text-green-800">Servicios principales del framework</p>
        </div>
        
        <div class="bg-white rounded-lg p-4 border border-purple-200">
            <h4 class="font-semibold text-purple-900 mb-2">Support</h4>
            <p class="text-sm text-purple-800">Utilidades y helpers del framework</p>
        </div>
    </div>
</div>

## Módulos principales del nucleo

<div class="space-y-4 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Routing</h3>
                <p class="text-gray-600 mb-2">Sistema de rutas expresivo con middleware y nombres:</p>
                <ul class="text-sm text-gray-600 space-y-1 ml-4">
                    <li>• Registro de rutas con <code class="bg-gray-100 px-1 rounded">Route::get()</code></li>
                    <li>• Middleware encadenable</li>
                    <li>• Nombres de ruta para URLs</li>
                    <li>• Parámetros dinámicos</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">ViewRender</h3>
                <p class="text-gray-600 mb-2">Motor de plantillas Blade integrado:</p>
                <ul class="text-sm text-gray-600 space-y-1 ml-4">
                    <li>• Sintaxis Blade familiar</li>
                    <li>• Layouts y componentes</li>
                    <li>• Helpers para vistas</li>
                    <li>• Compilación automática</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Database</h3>
                <p class="text-gray-600 mb-2">Conexión y operaciones de base de datos:</p>
                <ul class="text-sm text-gray-600 space-y-1 ml-4">
                    <li>• Conexión PDO optimizada</li>
                    <li>• Configuración con <code class="bg-gray-100 px-1 rounded">.env</code></li>
                    <li>• Modelos simples</li>
                    <li>• Query builder básico</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0 w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-4">
                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">DI (Dependency Injection)</h3>
                <p class="text-gray-600 mb-2">Container de inyección de dependencias:</p>
                <ul class="text-sm text-gray-600 space-y-1 ml-4">
                    <li>• Resolución automática de dependencias</li>
                    <li>• Service Providers</li>
                    <li>• Binding de servicios</li>
                    <li>• Singleton y transients</li>
                </ul>
            </div>
        </div>
    </div>
</div>

## Siguiente paso

<div class="text-center">
    <a href="/docs/routing" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-colors duration-200">
        Rutas
        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>

---

<div class="bg-gray-100 rounded-lg p-6 text-center">
    <p class="text-gray-700">
        <strong>💡 Tip:</strong> La carpeta <code class="bg-gray-200 px-1 rounded">resources/</code> es el lugar recomendado para tus layouts y vistas Blade.
    </p>
</div>