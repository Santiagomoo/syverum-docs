---
title: "¿Qué es Syverum?"
description: "Introducción rápida al framework, motivación y casos de uso."
extends: _layouts.documentation
section: content
---

# ¿Qué es Syverum?

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-blue-700">
                <strong>Syverum</strong> es un framework PHP moderno que hace que el desarrollo web sea simple y divertido. Está diseñado para desarrolladores que quieren construir aplicaciones web rápidamente sin complicaciones innecesarias.
            </p>
        </div>
    </div>
</div>

## ¿Por qué Syverum?

<div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex items-center mb-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Rápido de aprender</h3>
        </div>
        <p class="text-gray-600">Si sabes PHP básico, puedes empezar a construir aplicaciones en minutos.</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex items-center mb-3">
            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Sin configuración compleja</h3>
        </div>
        <p class="text-gray-600">Un comando instala todo lo que necesitas. No hay archivos de configuración complicados.</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex items-center mb-3">
            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Herramientas familiares</h3>
        </div>
        <p class="text-gray-600">Usa Blade para vistas, rutas expresivas y controladores como ya conoces.</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <div class="flex items-center mb-3">
            <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Modular</h3>
        </div>
        <p class="text-gray-600">Agrega solo las funcionalidades que necesitas. No hay peso innecesario.</p>
    </div>
</div>

## ¿Qué incluye?

<div class="bg-gray-50 rounded-lg p-6 mb-8">
  <p class="text-lg text-gray-700 mb-6">
    Syverum viene con todo lo esencial para construir aplicaciones web modernas:
  </p>

  <div class="grid md:grid-cols-2 gap-4">
    <!-- Ruteo -->
    <div class="flex-col items-start">
      <span class="inline-flex items-center px-4 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800 mt-1">
        Ruteo
      </span>
      <div>
        <p class="text-sm text-gray-600">
          Define rutas con <code class="bg-gray-200 px-1 rounded">Route::get()</code>,
          <code class="bg-gray-200 px-1 rounded">Route::post()</code> y más
        </p>
      </div>
    </div>

    <!-- Vistas -->
    <div class="flex-col items-start">
      <span class="inline-flex items-center px-4 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 mt-1">
        Vistas
      </span>
      <div>
        <p class="text-sm text-gray-600">Motor de plantillas poderoso y familiar</p>
      </div>
    </div>

    <!-- Controladores -->
    <div class="flex-col items-start">
      <span class="inline-flex items-center px-4 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 mt-1">
        Controladores
      </span>
      <div>
        <p class="text-sm text-gray-600">Organiza tu lógica de negocio de forma clara</p>
      </div>
    </div>

    <!-- Middleware -->
    <div class="flex-col items-start">
      <span class="inline-flex items-center px-4 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 mt-1">
        Middleware
      </span>
      <div>
        <p class="text-sm text-gray-600">Protege rutas y valida datos fácilmente</p>
      </div>
    </div>

    <!-- Base de datos -->
    <div class="flex-col items-start">
      <span class="inline-flex items-center px-4 py-0.5 rounded-full text-sm font-medium bg-purple-100 text-purple-800 mt-1">
        Base de datos
      </span>
      <div>
        <p class="text-sm text-gray-600">Conexión MySQL lista para usar</p>
      </div>
    </div>

    <!-- DI -->
    <div class="flex-col items-start">
      <span class="inline-flex items-center px-4 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800 mt-1">
        DI
      </span>
      <div>
        <p class="text-sm text-gray-600">El framework resuelve dependencias automáticamente</p>
      </div>
    </div>
  </div>
</div>


## ¿Para quién es Syverum?

<div class="bg-white border border-gray-200 rounded-lg p-6 mb-8">
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Desarrolladores PHP
            </h4>
            <p class="text-gray-600 text-sm">que quieren un framework ligero</p>
        </div>

        <div>
            <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Proyectos nuevos
            </h4>
            <p class="text-gray-600 text-sm">que necesitan empezar rápido</p>
        </div>

        <div>
            <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Equipos pequeños
            </h4>
            <p class="text-gray-600 text-sm">que valoran la simplicidad</p>
        </div>

        <div>
            <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                <svg class="w-5 h-5 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Aplicaciones web
            </h4>
            <p class="text-gray-600 text-sm">tradicionales y APIs simples</p>
        </div>
    </div>
</div>

## ¿Cómo empezar?

<div class="rounded-xl border border-gray-200 bg-white p-5 mb-8">
  <h3 class="text-sm font-medium text-gray-700 mb-3">
    Solo 3 pasos simples
  </h3>

  <ol class="space-y-3">
    <!-- 1 -->
    <li class="flex items-start gap-3">
      <span class="w-6 h-6 rounded-full border border-gray-300 text-xs text-gray-600 flex items-center justify-center mt-0.5">1</span>
      <div class="flex-col grid gap-y-2">
        <span class="block text-gray-900 font-medium">Instala Syverum</span>
        <span class="block text-sm text-gray-500">con un comando</span>
      </div>
    </li>

    <!-- 2 -->
    <li class="flex items-start gap-3">
      <span class="w-6 h-6 rounded-full border border-gray-300 text-xs text-gray-600 flex items-center justify-center mt-0.5">2</span>
      <div class="flex-col grid gap-y-2">
        <span class="block text-gray-900 font-medium leading-5">Crea tu primera ruta</span>
        <span class="block text-sm text-gray-500">y ve el resultado inmediatamente</span>
      </div>
    </li>

    <!-- 3 -->
    <li class="flex items-start gap-3">
      <span class="w-6 h-6 rounded-full border border-gray-300 text-xs text-gray-600 flex items-center justify-center mt-0.5">3</span>
      <div class="flex-col grid gap-y-2">
        <span class="text-gray-900 font-medium leading-5">Construye tu aplicación</span>
        <span class="text-sm text-gray-500">sin complicaciones</span>
      </div>
    </li>
  </ol>

  <div class="mt-4 rounded-lg bg-gray-50 p-3 text-sm text-gray-700">
    <span class="font-medium text-gray-900">Es así de simple.</span>
    No necesitas aprender conceptos complejos ni configurar múltiples archivos.
  </div>
</div>



## Requisitos

<div class="bg-gray-50 rounded-lg p-6 mb-8">
    <div class="grid md:grid-cols-3 gap-4">
        <div class="text-center">
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-2">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            </div>
            <h4 class="font-semibold text-gray-900">PHP 8.1+</h4>
            <p class="text-sm text-gray-600">o superior</p>
        </div>

        <div class="text-center">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            </div>
            <h4 class="font-semibold text-gray-900">Composer</h4>
            <p class="text-sm text-gray-600">gestor de dependencias</p>
        </div>

        <div class="text-center">
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-2">
                <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            </div>
            <h4 class="font-semibold text-gray-900">Node.js</h4>
            <p class="text-sm text-gray-600">para Tailwind CSS</p>
        </div>
    </div>
</div>

## Siguiente paso

<div class="text-center">
    <a href="/docs/installation" class="btn-primary">
        Instalación
        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>

---

<div class="bg-gray-100 rounded-lg p-6 text-center">
    <p class="text-gray-700 italic">
        <strong>Syverum</strong> te ayuda a enfocarte en construir tu aplicación, no en configurar herramientas.
    </p>
</div>