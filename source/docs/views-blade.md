---
title: Vistas
description: Trabaja con vistas Blade para crear interfaces de usuario elegantes y dinámicas.
extends: _layouts.documentation
section: content
---

# Vistas

<div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-6 mb-8 rounded-r-lg shadow-sm">
    <div class="flex items-start">
            <p class="text-sm text-green-700 leading-relaxed">
              <strong>Motor de plantillas Blade</strong> Syverum incluye soporte completo para Blade, el poderoso motor de plantillas de Laravel, permitiéndote crear interfaces de usuario elegantes y mantenibles.
            </p>
    </div>
</div>

Las vistas en Syverum te permiten separar la lógica de presentación de la lógica de negocio. Puedes usar tanto **Blade** (recomendado) como **PHP simple** para crear tus plantillas. Las vistas se renderizan automáticamente y se integran perfectamente con los controladores y modelos.

## ¿Qué es Blade?

Blade es un motor de plantillas poderoso y elegante que te permite crear vistas dinámicas usando una sintaxis simple y expresiva. A diferencia del PHP tradicional, Blade proporciona:

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-2">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Sintaxis limpia</span>
        </div>
        <p class="text-sm text-gray-600">Estructuras de control (`@if`, `@foreach`, etc.)</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-2">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Herencia de plantillas</span>
        </div>
        <p class="text-sm text-gray-600">Reutilizar layouts comunes</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-2">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <span class="font-semibold text-gray-800">Componentes reutilizables</span>
        </div>
        <p class="text-sm text-gray-600">Elementos de UI consistentes</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-2">
            <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Escape automático</span>
        </div>
        <p class="text-sm text-gray-600">Previene vulnerabilidades XSS</p>
    </div>
</div>

<div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-lg p-4 mb-6">
    <div class="flex items-center">
        <svg class="w-6 h-6 text-yellow-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
        <span class="font-semibold text-yellow-800">Compilación optimizada</span>
        <span class="ml-2 text-yellow-700">que mejora el rendimiento</span>
    </div>
</div>

## Ventajas de usar Blade

```php
<!-- Blade - Más legible -->
@if($user->isActive())
    <span class="badge badge-success">Activo</span>
@endif
```

```php
<!-- PHP tradicional - Menos legible -->
<?php if($user->isActive()): ?>
    <span class="badge badge-success">Activo</span>
<?php endif; ?>
```

**Herencia de plantillas:**

```php
@extends('layouts.app')

@section('content')
<!-- Tu contenido aquí -->
@endsection
```

**Componentes reutilizables:**

```php
@include('components.header')
@include('components.user-card', ['user' => $user])
```

---

## Estructura de directorios

Syverum busca las vistas en la siguiente estructura por defecto. La organización de directorios sigue convenciones que facilitan el mantenimiento y la organización de tu aplicación.

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
            </svg>
            <span class="font-semibold text-gray-800">layouts/</span>
        </div>
        <p class="text-sm text-gray-600">Plantillas base que definen la estructura general de las páginas</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <span class="font-semibold text-gray-800">components/</span>
        </div>
        <p class="text-sm text-gray-600">Componentes reutilizables como headers, footers, cards, etc.</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
            </svg>
            <span class="font-semibold text-gray-800">[entidad]/</span>
        </div>
        <p class="text-sm text-gray-600">Vistas específicas organizadas por funcionalidad (users, posts, etc.)</p>
    </div>
</div>

## Convenciones de nombres

**Archivos de vista:**

- Nombres descriptivos: `index.blade.php`
- Patrón RESTful: `show.blade.php`
- Separación con puntos: `users.index`

**Directorios:**

- Nombres en plural: `users/`, `posts/`
- Consistencia con rutas y controladores
- Agrupar vistas relacionadas

<div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-lg p-6 mb-8 shadow-lg">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center">
            <svg class="w-6 h-6 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="text-gray-300 font-semibold text-lg">Estructura del proyecto</span>
        </div>
        <div class="flex items-center space-x-2">
            <span class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full">Syverum</span>
            <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full">Blade</span>
        </div>
    </div>
    <div class="bg-gray-900 rounded-lg p-4 border border-gray-700">
        <pre class="text-gray-300 text-sm leading-relaxed">proyecto/
├── resources/
│ └── views/ # Directorio principal de vistas
│ ├── layouts/ # Plantillas base
│ ├── components/ # Componentes reutilizables
│ ├── users/ # Vistas específicas de usuarios (opcional)
│ └── posts/ # Vistas específicas de posts (opcional)</pre>
    </div>
</div>

---

## Crear una vista

Las vistas se pueden crear desde controladores o directamente como archivos. Syverum proporciona múltiples formas de trabajar con vistas de manera eficiente.

<div class="space-y-6 mb-8">
        <div class="flex items-center mb-4">
            <h4 class="text-lg font-semibold">Desde controlador</h4>
        </div>
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">PHP</span>
                    <span class="ml-2 text-sm text-gray-600">UserController</span>
                </div>
                <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
            </div>
            <pre class="text-sm overflow-x-auto"><code class="language-php">class UserController
{
    public function index(): Response
    {
        $users = User::all();
        
        // Retornar vista con datos
        return view('users.index', ['users' => $users]);
        
        // O usando compact() para pasar variables
        return view('users.index', compact('users'));
    }
    
    public function show(string $id): Response
    {
        $user = User::findOrFail($id);
        
        // Vista con múltiples variables
        return view('users.show', [
            'user' => $user,
            'title' => 'Perfil de Usuario',
            'showActions' => true
        ]);
    }
}</code></pre>

    <div class="bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-lg p-6">
        <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
            </svg>
            <h4 class="text-lg font-semibold text-purple-800">Estructura de archivos</h4>
        </div>

        <div class="bg-white rounded-lg p-4 border border-purple-200">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center">
                    <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">Estructura</span>
                    <span class="ml-2 text-sm text-gray-600">resources/views/</span>
                </div>
                <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
            </div>
            <pre class="text-sm overflow-x-auto">resources/views/

├── layouts/
│ ├── app.blade.php # Layout principal
│ └── guest.blade.php # Layout para invitados
├── users/
│ ├── index.blade.php # Lista de usuarios
│ ├── show.blade.php # Mostrar usuario
│ ├── create.blade.php # Formulario crear
│ └── edit.blade.php # Formulario editar
└── components/
├── header.blade.php # Componente header
└── footer.blade.php # Componente footer</pre>

</div>
</div>

</div>

---

## Estructuras de control

Las estructuras de control en Blade te permiten crear lógica condicional y bucles de manera elegante y legible. Blade proporciona directivas especiales que comienzan con `@` para manejar diferentes tipos de estructuras de control.

## Condicionales

Los condicionales te permiten mostrar contenido diferente según las condiciones:

<div class="space-y-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">@if</span>
                <span class="ml-2 text-sm text-gray-600">Condición simple</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@if($user->isActive())
    &lt;span class="badge badge-success"&gt;Activo&lt;/span&gt;
@endif</code></pre>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">@if...@elseif...@else</span>
                <span class="ml-2 text-sm text-gray-600">Múltiples condiciones</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@if($user->isActive())
    &lt;span class="badge badge-success"&gt;Activo&lt;/span&gt;

@elseif($user->isPending())
&lt;span class="badge badge-warning"&gt;Pendiente&lt;/span&gt;
@else
&lt;span class="badge badge-danger"&gt;Inactivo&lt;/span&gt;
@endif</code></pre>

</div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">@unless</span>
                <span class="ml-2 text-sm text-gray-600">Condición negativa</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@unless($user->isAdmin())
    &lt;p&gt;Contenido solo para usuarios no administradores&lt;/p&gt;

@endunless</code></pre>

</div>

</div>

## Bucles

Los bucles te permiten iterar sobre colecciones de datos:

<div class="space-y-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-2 py-1 rounded-full">@foreach</span>
                <span class="ml-2 text-sm text-gray-600">Iterar sobre arrays/colecciones</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@foreach($users as $user)
    &lt;div class="user-card"&gt;
        &lt;h3&gt;{{ $user->name }}&lt;/h3&gt;
        &lt;p&gt;{{ $user->email }}&lt;/p&gt;
    &lt;/div&gt;
@endforeach</code></pre>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">@foreach</span>
                <span class="ml-2 text-sm text-gray-600">Con índices</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@foreach($users as $index => $user)
    &lt;div class="user-card" data-index="{{ $index }}"&gt;
        &lt;h3&gt;{{ $user->name }}&lt;/h3&gt;
    &lt;/div&gt;

@endforeach</code></pre>

</div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">@for</span>
                <span class="ml-2 text-sm text-gray-600">Bucles con contador</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@for($i = 0; $i < 10; $i++)
    &lt;p&gt;Iteración {{ $i }}&lt;/p&gt;

@endfor</code></pre>

</div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">@while</span>
                <span class="ml-2 text-sm text-gray-600">Bucles condicionales</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@while($condition)
    &lt;p&gt;Contenido&lt;/p&gt;

@endwhile</code></pre>

</div>

</div>

## Manejo de datos vacíos

Blade proporciona formas elegantes de manejar colecciones vacías:

<div class="space-y-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-teal-100 text-teal-800 text-xs font-semibold px-2 py-1 rounded-full">@forelse</span>
                <span class="ml-2 text-sm text-gray-600">Alternativa elegante a if/foreach</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@forelse($users as $user)
    &lt;p&gt;{{ $user->name }}&lt;/p&gt;
@empty
    &lt;p&gt;No hay usuarios registrados.&lt;/p&gt;
@endforelse</code></pre>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">@if</span>
                <span class="ml-2 text-sm text-gray-600">Verificación manual con empty()</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@if(empty($users))
    &lt;p&gt;No hay usuarios registrados.&lt;/p&gt;

@else
@foreach($users as $user)
&lt;p&gt;{{ $user->name }}&lt;/p&gt;
@endforeach
@endif</code></pre>

</div>

</div>

## Cuándo usar cada estructura

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
    <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold text-green-800">@if</span>
        </div>
        <p class="text-sm text-green-700">Para mostrar/ocultar contenido según condiciones simples</p>
    </div>
    
    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span class="font-semibold text-blue-800">@foreach</span>
        </div>
        <p class="text-sm text-blue-700">Para iterar sobre colecciones de datos (usuarios, posts, etc.)</p>
    </div>
    
    <div class="bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-200 rounded-lg p-4">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
            </svg>
            <span class="font-semibold text-purple-800">@for</span>
        </div>
        <p class="text-sm text-purple-700">Para generar contenido repetitivo con contador (paginación, listas numeradas)</p>
    </div>
    
    <div class="bg-gradient-to-br from-orange-50 to-red-50 border border-orange-200 rounded-lg p-4">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <span class="font-semibold text-orange-800">@forelse</span>
        </div>
        <p class="text-sm text-orange-700">Para manejar listas que pueden estar vacías de forma elegante</p>
    </div>
    
    <div class="bg-gradient-to-br from-cyan-50 to-blue-50 border border-cyan-200 rounded-lg p-4">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-cyan-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span class="font-semibold text-cyan-800">@while</span>
        </div>
        <p class="text-sm text-cyan-700">Para bucles complejos con condiciones dinámicas</p>
    </div>
    
    <div class="bg-gradient-to-br from-yellow-50 to-amber-50 border border-yellow-200 rounded-lg p-4">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold text-yellow-800">@unless</span>
        </div>
        <p class="text-sm text-yellow-700">Para condiciones negativas más legibles que @if(!condition)</p>
    </div>
</div>

---

## Layouts y herencia

Los layouts en Blade te permiten crear plantillas base que pueden ser extendidas por otras vistas, evitando la duplicación de código y manteniendo consistencia en tu aplicación.

## ¿Qué es un layout?

Un layout es una plantilla base que define la estructura común de tus páginas (HTML, CSS, JavaScript, navegación, etc.). Las vistas individuales pueden extender estos layouts y definir solo su contenido específico.

## Ventajas de usar layouts

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
            </svg>
            <span class="font-semibold text-gray-800">Reutilización de código</span>
        </div>
        <p class="text-sm text-gray-600">Define una vez la estructura común</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Mantenimiento fácil</span>
        </div>
        <p class="text-sm text-gray-600">Cambios en el layout se aplican a todas las páginas</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Consistencia</span>
        </div>
        <p class="text-sm text-gray-600">Todas las páginas mantienen el mismo diseño base</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
            </svg>
            <span class="font-semibold text-gray-800">Flexibilidad</span>
        </div>
        <p class="text-sm text-gray-600">Puedes tener múltiples layouts para diferentes secciones</p>
    </div>
</div>

## Layout principal

El layout principal define la estructura base de tu aplicación:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2 py-1 rounded-full">Layout</span>
            <span class="ml-2 text-sm text-gray-600">resources/views/layouts/app.blade.php</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="text-sm overflow-x-auto"><code class="language-php">&lt;!-- resources/views/layouts/app.blade.php --&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang="es"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;@yield('title', 'Mi Aplicación')&lt;/title&gt;
    &lt;link href="{{ asset('css/app.css') }}" rel="stylesheet"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;!-- Header --&gt;
    @include('components.header')
    
    &lt;!-- Contenido principal --&gt;
    &lt;main class="container"&gt;
        @yield('content')
    &lt;/main&gt;
    
    &lt;!-- Footer --&gt;
    @include('components.footer')
    
    &lt;script src="{{ asset('js/app.js') }}"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
</div>

<div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-4 mb-6">
    <div class="flex items-center mb-3">
        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-semibold text-blue-800">Elementos clave del layout:</span>
    </div>
    <ul class="space-y-2 text-sm text-blue-700">
        <li class="flex items-center">
            <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
            <code class="bg-blue-100 px-2 py-1 rounded text-xs">@yield('title', 'Mi Aplicación')</code> - Define una sección con valor por defecto
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
            <code class="bg-blue-100 px-2 py-1 rounded text-xs">@include('components.header')</code> - Incluye componentes reutilizables
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-blue-400 rounded-full mr-3"></span>
            <code class="bg-blue-100 px-2 py-1 rounded text-xs">@yield('content')</code> - Define dónde se insertará el contenido específico
        </li>
    </ul>
</div>

## Vista que extiende el layout

Las vistas individuales extienden el layout y definen su contenido:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">Vista</span>
            <span class="ml-2 text-sm text-gray-600">resources/views/users/index.blade.php</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="text-sm overflow-x-auto"><code class="language-php">&lt;!-- resources/views/users/index.blade.php --&gt;
@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
&lt;div class="row"&gt;
&lt;div class="col-12"&gt;
&lt;h1&gt;Usuarios&lt;/h1&gt;

        @forelse($users as $user)
            &lt;div class="card mb-3"&gt;
                &lt;div class="card-body"&gt;
                    &lt;h5 class="card-title"&gt;{{ $user->name }}&lt;/h5&gt;
                    &lt;p class="card-text"&gt;{{ $user->email }}&lt;/p&gt;
                    &lt;a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-primary"&gt;
                        Ver Perfil
                    &lt;/a&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        @empty
            &lt;div class="alert alert-info"&gt;
                No hay usuarios registrados.
            &lt;/div&gt;
        @endforelse
    &lt;/div&gt;

&lt;/div&gt;
@endsection</code></pre>

</div>

<div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4 mb-6">
    <div class="flex items-center mb-3">
        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-semibold text-green-800">Directivas de herencia:</span>
    </div>
    <ul class="space-y-2 text-sm text-green-700">
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <code class="bg-green-100 px-2 py-1 rounded text-xs">@extends('layouts.app')</code> - Especifica qué layout extender
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <code class="bg-green-100 px-2 py-1 rounded text-xs">@section('title', 'Lista de Usuarios')</code> - Define el contenido de una sección
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <code class="bg-green-100 px-2 py-1 rounded text-xs">@section('content')...@endsection</code> - Define una sección con contenido multilínea
        </li>
    </ul>
</div>

## Layouts anidados

Puedes crear layouts que extienden otros layouts para diferentes secciones:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-2 py-1 rounded-full">Layout Admin</span>
            <span class="ml-2 text-sm text-gray-600">resources/views/layouts/admin.blade.php</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="text-sm overflow-x-auto"><code class="language-php">&lt;!-- resources/views/layouts/admin.blade.php --&gt;
@extends('layouts.app')

@section('content')
&lt;div class="admin-layout"&gt;
&lt;!-- Sidebar --&gt;
@include('admin.components.sidebar')

    &lt;!-- Contenido del admin --&gt;
    &lt;div class="admin-content"&gt;
        @yield('admin-content')
    &lt;/div&gt;

&lt;/div&gt;
@endsection</code></pre>

</div>

<div class="bg-gradient-to-r from-cyan-50 to-blue-50 border border-cyan-200 rounded-lg p-4 mb-6">
    <div class="flex items-center mb-3">
        <svg class="w-5 h-5 text-cyan-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-semibold text-cyan-800">Casos de uso para layouts anidados:</span>
    </div>
    <ul class="space-y-2 text-sm text-cyan-700">
        <li class="flex items-center">
            <span class="w-2 h-2 bg-cyan-400 rounded-full mr-3"></span>
            <strong>Layout de administración:</strong> Extiende el layout principal pero agrega sidebar y navegación específica
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-cyan-400 rounded-full mr-3"></span>
            <strong>Layout de blog:</strong> Extiende el principal pero agrega widgets de blog
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-cyan-400 rounded-full mr-3"></span>
            <strong>Layout de API:</strong> Layout minimalista para respuestas JSON/XML
        </li>
    </ul>
</div>

## Múltiples layouts

Puedes tener diferentes layouts para diferentes secciones:

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Layout para invitados</span>
        </div>
        <pre class="text-xs bg-gray-50 p-2 rounded"><code class="language-php">@extends('layouts.guest')</code></pre>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Layout para usuarios autenticados</span>
        </div>
        <pre class="text-xs bg-gray-50 p-2 rounded"><code class="language-php">@extends('layouts.app')</code></pre>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Layout para administradores</span>
        </div>
        <pre class="text-xs bg-gray-50 p-2 rounded"><code class="language-php">@extends('layouts.admin')</code></pre>
    </div>
</div>

## Mejores prácticas

**Recomendaciones para layouts:**

- **Usa nombres descriptivos:** `app.blade.php`, `admin.blade.php`, `guest.blade.php`
- **Mantén layouts simples:** Evita lógica compleja en los layouts
- **Usa secciones con valores por defecto:** `@yield('title', 'Título por defecto')`
- **Organiza por funcionalidad:** Diferentes layouts para diferentes secciones de tu app

---

## Componentes e includes

Los componentes e includes te permiten crear elementos reutilizables que puedes usar en múltiples vistas, manteniendo tu código DRY (Don't Repeat Yourself) y facilitando el mantenimiento.

## ¿Qué son los componentes?

Los componentes son fragmentos de código Blade que encapsulan una funcionalidad específica y pueden ser reutilizados en diferentes partes de tu aplicación. Son ideales para elementos como headers, footers, cards, botones, formularios, etc.

## Ventajas de usar componentes

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
            </svg>
            <span class="font-semibold text-gray-800">Reutilización</span>
        </div>
        <p class="text-sm text-gray-600">Define una vez, usa en múltiples lugares</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Mantenimiento</span>
        </div>
        <p class="text-sm text-gray-600">Cambios en un componente se aplican automáticamente</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Consistencia</span>
        </div>
        <p class="text-sm text-gray-600">Garantiza que elementos similares se vean iguales</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Organización</span>
        </div>
        <p class="text-sm text-gray-600">Mantiene tu código organizado y modular</p>
    </div>
</div>

## Incluir vistas parciales

La directiva `@include` te permite incluir otros archivos Blade dentro de tu vista:

<div class="space-y-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2 py-1 rounded-full">@include</span>
                <span class="ml-2 text-sm text-gray-600">Incluir componente simple</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@include('components.header')</code></pre>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">@include</span>
                <span class="ml-2 text-sm text-gray-600">Incluir con datos</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@include('components.user-card', ['user' => $user])</code></pre>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">@include</span>
                <span class="ml-2 text-sm text-gray-600">Incluir con múltiples datos</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@include('components.user-card', [
    'user' => $user,
    'showActions' => true,
    'class' => 'highlighted'

])</code></pre>
</div>

</div>

## Componente header

Un ejemplo de componente header reutilizable:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">Header</span>
            <span class="ml-2 text-sm text-gray-600">resources/views/components/header.blade.php</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="text-sm overflow-x-auto"><code class="language-php">&lt;!-- resources/views/components/header.blade.php --&gt;
&lt;header class="navbar navbar-expand-lg navbar-dark bg-dark"&gt;
    &lt;div class="container"&gt;
        &lt;a class="navbar-brand" href="{{ route('home') }}"&gt;
            {{ config('app.name', 'Mi App') }}
        &lt;/a&gt;
        
        &lt;div class="navbar-nav ms-auto"&gt;
            @if(isset($user) && $user)
                &lt;span class="navbar-text"&gt;
                    Bienvenido, {{ $user->name }}
                &lt;/span&gt;
                &lt;a class="nav-link" href="{{ route('users.logout') }}"&gt;Salir&lt;/a&gt;
            @else
                &lt;a class="nav-link" href="{{ route('users.login') }}"&gt;Iniciar Sesión&lt;/a&gt;
            @endif
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/header&gt;</code></pre>
</div>

<div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4 mb-6">
    <div class="flex items-center mb-3">
        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-semibold text-green-800">Características del componente header:</span>
    </div>
    <ul class="space-y-2 text-sm text-green-700">
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <strong>Condicionales:</strong> Muestra contenido diferente según el estado del usuario
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <strong>Configuración:</strong> Usa <code class="bg-green-100 px-2 py-1 rounded text-xs">config()</code> para obtener valores de configuración
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <strong>Rutas:</strong> Genera URLs usando <code class="bg-green-100 px-2 py-1 rounded text-xs">route()</code>
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <strong>Flexibilidad:</strong> Puede recibir datos opcionales
        </li>
    </ul>
</div>

## Componente de tarjeta de usuario

Un componente más complejo que puede recibir parámetros:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">User Card</span>
            <span class="ml-2 text-sm text-gray-600">resources/views/components/user-card.blade.php</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="text-sm overflow-x-auto"><code class="language-php">&lt;!-- resources/views/components/user-card.blade.php --&gt;
&lt;div class="card {{ $class ?? '' }}"&gt;
    &lt;div class="card-body"&gt;
        &lt;h5 class="card-title"&gt;{{ $user->name }}&lt;/h5&gt;
        &lt;p class="card-text"&gt;{{ $user->email }}&lt;/p&gt;
        
        @if($showActions ?? false)
            &lt;div class="card-actions"&gt;
                &lt;a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-sm btn-primary"&gt;
                    Ver
                &lt;/a&gt;
                &lt;a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-secondary"&gt;
                    Editar
                &lt;/a&gt;
            &lt;/div&gt;
        @endif
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
</div>

<div class="bg-gradient-to-r from-orange-50 to-red-50 border border-orange-200 rounded-lg p-4 mb-6">
    <div class="flex items-center mb-3">
        <svg class="w-5 h-5 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-semibold text-orange-800">Características del componente:</span>
    </div>
    <ul class="space-y-2 text-sm text-orange-700">
        <li class="flex items-center">
            <span class="w-2 h-2 bg-orange-400 rounded-full mr-3"></span>
            <strong>Parámetros opcionales:</strong> <code class="bg-orange-100 px-2 py-1 rounded text-xs">$class ?? ''</code> usa valor por defecto si no se proporciona
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-orange-400 rounded-full mr-3"></span>
            <strong>Condicionales:</strong> <code class="bg-orange-100 px-2 py-1 rounded text-xs">$showActions ?? false</code> muestra acciones solo si se solicita
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-orange-400 rounded-full mr-3"></span>
            <strong>Datos requeridos:</strong> <code class="bg-orange-100 px-2 py-1 rounded text-xs">$user</code> debe ser proporcionado siempre
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-orange-400 rounded-full mr-3"></span>
            <strong>Flexibilidad:</strong> Puede ser personalizado con clases CSS adicionales
        </li>
    </ul>
</div>

## Casos de uso comunes

Casos de uso comunes para componentes en aplicaciones reales:

<div class="space-y-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-cyan-100 text-cyan-800 text-xs font-semibold px-2 py-1 rounded-full">Navegación</span>
                <span class="ml-2 text-sm text-gray-600">Componentes de navegación</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@include('components.navigation', ['currentPage' => 'users'])</code></pre>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">Formularios</span>
                <span class="ml-2 text-sm text-gray-600">Componentes de formulario</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@include('components.form-field', [
    'name' => 'email',
    'label' => 'Correo Electrónico',
    'type' => 'email',
    'required' => true

])</code></pre>
</div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full">Alertas</span>
                <span class="ml-2 text-sm text-gray-600">Componentes de alerta</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@include('components.alert', [
    'type' => 'success',
    'message' => 'Usuario creado exitosamente'

])</code></pre>
</div>

</div>

## Mejores prácticas para componentes

Mejores prácticas para crear componentes eficientes y mantenibles:

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Nombres descriptivos</span>
        </div>
        <p class="text-sm text-gray-600">`user-card.blade.php`, `navigation-menu.blade.php`</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Parámetros claros</span>
        </div>
        <p class="text-sm text-gray-600">Usa nombres que indiquen qué datos espera el componente</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
            </svg>
            <span class="font-semibold text-gray-800">Valores por defecto</span>
        </div>
        <p class="text-sm text-gray-600">Proporciona valores por defecto para parámetros opcionales</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Documentación</span>
        </div>
        <p class="text-sm text-gray-600">Comenta qué parámetros requiere cada componente</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-cyan-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Organización</span>
        </div>
        <p class="text-sm text-gray-600">Agrupa componentes relacionados en subdirectorios</p>
    </div>
</div>

## Estructura recomendada de componentes

Estructura recomendada para mantener tus componentes organizados:

<div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-lg p-6 mb-8 shadow-lg">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center">
            <svg class="w-6 h-6 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
            </svg>
            <span class="text-gray-300 font-semibold text-lg">Estructura de componentes</span>
        </div>
        <div class="flex items-center space-x-2">
            <span class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full">Organizado</span>
            <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full">Escalable</span>
        </div>
    </div>
    <div class="bg-gray-900 rounded-lg p-4 border border-gray-700">
        <pre class="text-gray-300 text-sm leading-relaxed">resources/views/components/
├── layout/
│   ├── header.blade.php
│   ├── footer.blade.php
│   └── sidebar.blade.php
├── forms/
│   ├── input.blade.php
│   ├── select.blade.php
│   └── textarea.blade.php
├── cards/
│   ├── user-card.blade.php
│   ├── product-card.blade.php
│   └── post-card.blade.php
└── alerts/
    ├── success.blade.php
    ├── error.blade.php
    └── warning.blade.php</pre>
    </div>
</div>

---

## Formularios

Los formularios en Blade te permiten crear interfaces para que los usuarios interactúen con tu aplicación. Syverum proporciona helpers y directivas especiales para manejar formularios de manera segura y eficiente.

## Elementos esenciales de un formulario

Para crear formularios seguros y funcionales, necesitas considerar estos elementos fundamentales:

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Método HTTP correcto</span>
        </div>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
                <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                <code class="bg-blue-100 px-2 py-1 rounded text-xs">GET</code> - Para búsqueda y filtros
            </li>
            <li class="flex items-center">
                <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                <code class="bg-green-100 px-2 py-1 rounded text-xs">POST</code> - Para crear recursos
            </li>
            <li class="flex items-center">
                <span class="w-2 h-2 bg-orange-400 rounded-full mr-2"></span>
                <code class="bg-orange-100 px-2 py-1 rounded text-xs">PUT/PATCH</code> - Para actualizar
            </li>
            <li class="flex items-center">
                <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                <code class="bg-red-100 px-2 py-1 rounded text-xs">DELETE</code> - Para eliminar
            </li>
        </ul>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Protección CSRF</span>
        </div>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
                <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                <code class="bg-red-100 px-2 py-1 rounded text-xs">@csrf</code> - Genera token de protección
            </li>
            <li class="flex items-center">
                <span class="w-2 h-2 bg-purple-400 rounded-full mr-2"></span>
                <code class="bg-purple-100 px-2 py-1 rounded text-xs">@method('PUT')</code> - Especifica método HTTP
            </li>
        </ul>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span class="font-semibold text-gray-800">Manejo de datos antiguos</span>
        </div>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
                <span class="w-2 h-2 bg-purple-400 rounded-full mr-2"></span>
                <code class="bg-purple-100 px-2 py-1 rounded text-xs">old('field')</code> - Recupera valores anteriores
            </li>
            <li class="flex items-center">
                <span class="w-2 h-2 bg-purple-400 rounded-full mr-2"></span>
                <code class="bg-purple-100 px-2 py-1 rounded text-xs">old('field', $default)</code> - Con valor por defecto
            </li>
        </ul>
    </div>
</div>

## Formulario básico

Un formulario de creación que incluye todos los elementos esenciales:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">Formulario</span>
            <span class="ml-2 text-sm text-gray-600">resources/views/users/create.blade.php</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="text-sm overflow-x-auto"><code class="language-php">&lt;!-- resources/views/users/create.blade.php --&gt;
@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
&lt;div class="row justify-content-center"&gt;
&lt;div class="col-md-6"&gt;
&lt;div class="card"&gt;
&lt;div class="card-header"&gt;
&lt;h4&gt;Crear Nuevo Usuario&lt;/h4&gt;
&lt;/div&gt;
&lt;div class="card-body"&gt;
&lt;form method="POST" action="{{ route('users.store') }}"&gt;
@csrf

                    &lt;div class="mb-3"&gt;
                        &lt;label for="name" class="form-label"&gt;Nombre&lt;/label&gt;
                        &lt;input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name') }}" required&gt;
                    &lt;/div&gt;

                    &lt;div class="mb-3"&gt;
                        &lt;label for="email" class="form-label"&gt;Email&lt;/label&gt;
                        &lt;input type="email" class="form-control" id="email" name="email"
                               value="{{ old('email') }}" required&gt;
                    &lt;/div&gt;

                    &lt;div class="mb-3"&gt;
                        &lt;label for="password" class="form-label"&gt;Contraseña&lt;/label&gt;
                        &lt;input type="password" class="form-control" id="password" name="password" required&gt;
                    &lt;/div&gt;

                    &lt;div class="d-grid"&gt;
                        &lt;button type="submit" class="btn btn-primary"&gt;Crear Usuario&lt;/button&gt;
                    &lt;/div&gt;
                &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

&lt;/div&gt;
@endsection</code></pre>

</div>

<div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4 mb-6">
    <div class="flex items-center mb-3">
        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-semibold text-green-800">Características del formulario básico:</span>
    </div>
    <ul class="space-y-2 text-sm text-green-700">
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <code class="bg-green-100 px-2 py-1 rounded text-xs">@csrf</code> - Protección contra ataques CSRF
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <code class="bg-green-100 px-2 py-1 rounded text-xs">method="POST"</code> - Método correcto para crear recursos
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <code class="bg-green-100 px-2 py-1 rounded text-xs">old('name')</code> - Recupera valores en caso de error de validación
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <code class="bg-green-100 px-2 py-1 rounded text-xs">required</code> - Validación HTML5 básica
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3"></span>
            <code class="bg-green-100 px-2 py-1 rounded text-xs">route('users.store')</code> - Genera URL correcta para el endpoint
        </li>
    </ul>
</div>

## Formulario de edición

Un formulario de actualización que maneja datos existentes:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">Edición</span>
            <span class="ml-2 text-sm text-gray-600">resources/views/users/edit.blade.php</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="text-sm overflow-x-auto"><code class="language-php">&lt;!-- resources/views/users/edit.blade.php --&gt;
@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
&lt;div class="row justify-content-center"&gt;
&lt;div class="col-md-6"&gt;
&lt;div class="card"&gt;
&lt;div class="card-header"&gt;
&lt;h4&gt;Editar Usuario: {{ $user->name }}&lt;/h4&gt;
&lt;/div&gt;
&lt;div class="card-body"&gt;
&lt;form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}"&gt;
@csrf
@method('PUT')

                    &lt;div class="mb-3"&gt;
                        &lt;label for="name" class="form-label"&gt;Nombre&lt;/label&gt;
                        &lt;input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $user->name) }}" required&gt;
                    &lt;/div&gt;

                    &lt;div class="mb-3"&gt;
                        &lt;label for="email" class="form-label"&gt;Email&lt;/label&gt;
                        &lt;input type="email" class="form-control" id="email" name="email"
                               value="{{ old('email', $user->email) }}" required&gt;
                    &lt;/div&gt;

                    &lt;div class="mb-3"&gt;
                        &lt;label for="password" class="form-label"&gt;Nueva Contraseña (opcional)&lt;/label&gt;
                        &lt;input type="password" class="form-control" id="password" name="password"&gt;
                        &lt;div class="form-text"&gt;Deja en blanco para mantener la contraseña actual&lt;/div&gt;
                    &lt;/div&gt;

                    &lt;div class="d-grid gap-2 d-md-flex justify-content-md-end"&gt;
                        &lt;a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-secondary"&gt;
                            Cancelar
                        &lt;/a&gt;
                        &lt;button type="submit" class="btn btn-primary"&gt;Actualizar Usuario&lt;/button&gt;
                    &lt;/div&gt;
                &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

&lt;/div&gt;
@endsection</code></pre>

</div>

<div class="bg-gradient-to-r from-orange-50 to-red-50 border border-orange-200 rounded-lg p-4 mb-6">
    <div class="flex items-center mb-3">
        <svg class="w-5 h-5 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span class="font-semibold text-orange-800">Características del formulario de edición:</span>
    </div>
    <ul class="space-y-2 text-sm text-orange-700">
        <li class="flex items-center">
            <span class="w-2 h-2 bg-orange-400 rounded-full mr-3"></span>
            <code class="bg-orange-100 px-2 py-1 rounded text-xs">@method('PUT')</code> - Especifica método HTTP para actualización
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-orange-400 rounded-full mr-3"></span>
            <code class="bg-orange-100 px-2 py-1 rounded text-xs">old('name', $user->name)</code> - Prioriza datos antiguos, usa datos del modelo como fallback
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-orange-400 rounded-full mr-3"></span>
            <strong>Campo opcional:</strong> Contraseña es opcional en edición
        </li>
        <li class="flex items-center">
            <span class="w-2 h-2 bg-orange-400 rounded-full mr-3"></span>
            <strong>Botones de acción:</strong> Cancelar y Actualizar para mejor UX
        </li>
    </ul>
</div>

## Tipos de campos comunes

Diferentes tipos de campos para crear formularios completos:

<div class="space-y-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">Texto</span>
                <span class="ml-2 text-sm text-gray-600">Campos de texto básicos</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">&lt;input type="text" name="name" value="{{ old('name') }}" class="form-control"&gt;
&lt;input type="email" name="email" value="{{ old('email') }}" class="form-control"&gt;
&lt;input type="password" name="password" class="form-control"&gt;</code></pre>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">Área</span>
                <span class="ml-2 text-sm text-gray-600">Área de texto</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">&lt;textarea name="description" class="form-control" rows="4"&gt;{{ old('description') }}&lt;/textarea&gt;</code></pre>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">Select</span>
                <span class="ml-2 text-sm text-gray-600">Lista desplegable</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">&lt;select name="role" class="form-control"&gt;
    &lt;option value=""&gt;Seleccionar rol&lt;/option&gt;
    &lt;option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}&gt;Administrador&lt;/option&gt;
    &lt;option value="user" {{ old('role') == 'user' ? 'selected' : '' }}&gt;Usuario&lt;/option&gt;

&lt;/select&gt;</code></pre>
</div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full">Checkbox</span>
                <span class="ml-2 text-sm text-gray-600">Casillas de verificación</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">&lt;div class="form-check"&gt;
    &lt;input type="checkbox" name="active" value="1"
           {{ old('active') ? 'checked' : '' }} class="form-check-input"&gt;
    &lt;label class="form-check-label"&gt;Usuario activo&lt;/label&gt;

&lt;/div&gt;</code></pre>
</div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded-full">Radio</span>
                <span class="ml-2 text-sm text-gray-600">Botones de opción</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">&lt;div class="form-check"&gt;
    &lt;input type="radio" name="status" value="active"
           {{ old('status') == 'active' ? 'checked' : '' }} class="form-check-input"&gt;
    &lt;label class="form-check-label"&gt;Activo&lt;/label&gt;

&lt;/div&gt;</code></pre>
</div>

</div>

## Manejo de errores

Manejo de errores de validación en formularios:

<div class="space-y-4 mb-6">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded-full">Error específico</span>
                <span class="ml-2 text-sm text-gray-600">Mostrar errores de validación</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@if($errors->has('email'))
    &lt;div class="text-danger"&gt;{{ $errors->first('email') }}&lt;/div&gt;
@endif</code></pre>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center">
                <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-2 py-1 rounded-full">Todos los errores</span>
                <span class="ml-2 text-sm text-gray-600">Mostrar todos los errores</span>
            </div>
        </div>
        <pre class="text-sm"><code class="language-php">@if($errors->any())
    &lt;div class="alert alert-danger"&gt;
        &lt;ul class="mb-0"&gt;
            @foreach($errors->all() as $error)
                &lt;li&gt;{{ $error }}&lt;/li&gt;
            @endforeach
        &lt;/ul&gt;
    &lt;/div&gt;

@endif</code></pre>
</div>

</div>

## Mejores prácticas para formularios

Mejores prácticas para crear formularios seguros y eficientes:

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Seguridad</span>
        </div>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
                <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                <code class="bg-red-100 px-2 py-1 rounded text-xs">@csrf</code> - Protege contra ataques CSRF
            </li>
            <li class="flex items-center">
                <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                <strong>Validación del servidor:</strong> No confíes solo en HTML5
            </li>
        </ul>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span class="font-semibold text-gray-800">Experiencia de usuario</span>
        </div>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
                <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                <code class="bg-blue-100 px-2 py-1 rounded text-xs">old()</code> - Mantiene datos en caso de error
            </li>
            <li class="flex items-center">
                <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                <strong>Feedback claro:</strong> Mensajes de éxito y error
            </li>
        </ul>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Métodos HTTP</span>
        </div>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
                <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                <code class="bg-green-100 px-2 py-1 rounded text-xs">POST</code> - Para crear recursos
            </li>
            <li class="flex items-center">
                <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                <code class="bg-green-100 px-2 py-1 rounded text-xs">PUT</code> - Para actualizar recursos
            </li>
        </ul>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Campos opcionales</span>
        </div>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
                <span class="w-2 h-2 bg-purple-400 rounded-full mr-2"></span>
                <strong>Indica claramente:</strong> Qué campos son opcionales
            </li>
            <li class="flex items-center">
                <span class="w-2 h-2 bg-purple-400 rounded-full mr-2"></span>
                <strong>Valores por defecto:</strong> Proporciona valores sensatos
            </li>
        </ul>
    </div>
</div>

---

## Helpers y funciones útiles

Syverum proporciona una variedad de helpers y funciones que te facilitan el trabajo con vistas, haciendo tu código más limpio y mantenible. Estos helpers manejan tareas comunes como generar URLs, formatear datos, y trabajar con configuraciones.

## Generar URLs

Los helpers de URL te permiten generar enlaces de manera segura y mantenible:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">URL Routes</span>
            <span class="ml-2 text-sm text-gray-600">Generar URLs por nombre de ruta</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Generar URL por nombre de ruta --&gt;
&lt;a href="{{ route('users.show', ['id' =&gt; $user-&gt;id]) }}"&gt;Ver Usuario&lt;/a&gt;

&lt;!-- Generar URL con parámetros múltiples --&gt;
&lt;a href="{{ route('posts.show', ['userId' =&gt; $user-&gt;id, 'postId' =&gt; $post-&gt;id]) }}"&gt;
Ver Post
&lt;/a&gt;

&lt;!-- Generar URL absoluta --&gt;
&lt;img src="{{ route('images.avatar', ['id' =&gt; $user-&gt;id]) }}" alt="Avatar"&gt;</code></pre>

</div>

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">Assets</span>
            <span class="ml-2 text-sm text-gray-600">URL para archivos estáticos</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- CSS y JavaScript --&gt;
&lt;link href="{{ asset('css/app.css') }}" rel="stylesheet"&gt;
&lt;script src="{{ asset('js/app.js') }}"&gt;&lt;/script&gt;

&lt;!-- Imágenes --&gt;
&lt;img src="{{ asset('images/logo.png') }}" alt="Logo"&gt;

&lt;!-- Con versión para cache busting --&gt;
&lt;link href="{{ asset('css/app.css?v=' . time()) }}" rel="stylesheet"&gt;</code></pre>

</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span class="font-semibold text-gray-800">Mantenibilidad</span>
        </div>
        <p class="text-sm text-gray-600">Si cambias una ruta, se actualiza automáticamente</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Seguridad</span>
        </div>
        <p class="text-sm text-gray-600">Previene URLs malformadas</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
            </svg>
            <span class="font-semibold text-gray-800">Flexibilidad</span>
        </div>
        <p class="text-sm text-gray-600">Funciona con diferentes entornos (desarrollo, producción)</p>
    </div>
</div>

## Formateo de datos

Los helpers de formateo te ayudan a presentar datos de manera consistente:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2 py-1 rounded-full">Dates</span>
            <span class="ml-2 text-sm text-gray-600">Formatear fechas</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Formatear fechas --&gt;
&lt;p&gt;Creado: {{ date('d/m/Y H:i', strtotime($user-&gt;created_at)) }}&lt;/p&gt;
&lt;p&gt;Último acceso: {{ date('d/m/Y', strtotime($user-&gt;last_login)) }}&lt;/p&gt;

&lt;!-- Fechas relativas --&gt;
&lt;p&gt;Hace {{ \Carbon\Carbon::parse($user-&gt;created_at)-&gt;diffForHumans() }}&lt;/p&gt;</code></pre>

</div>

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">Numbers</span>
            <span class="ml-2 text-sm text-gray-600">Formatear números</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Formatear números --&gt;
&lt;p&gt;Precio: ${{ number_format($product-&gt;price, 2) }}&lt;/p&gt;
&lt;p&gt;Puntuación: {{ number_format($user-&gt;rating, 1) }}/5&lt;/p&gt;
&lt;p&gt;Vistas: {{ number_format($post-&gt;views) }}&lt;/p&gt;</code></pre>
</div>

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">Text</span>
            <span class="ml-2 text-sm text-gray-600">Formatear texto</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Limitar texto --&gt;
&lt;p&gt;{{ Str::limit($post-&gt;content, 150) }}&lt;/p&gt;
&lt;p&gt;{{ Str::limit($user-&gt;bio, 100, '...') }}&lt;/p&gt;

&lt;!-- Capitalizar texto --&gt;
&lt;p&gt;{{ ucfirst($user-&gt;name) }}&lt;/p&gt;
&lt;p&gt;{{ ucwords($user-&gt;full_name) }}&lt;/p&gt;

&lt;!-- Convertir a mayúsculas/minúsculas --&gt;
&lt;p&gt;{{ strtoupper($user-&gt;role) }}&lt;/p&gt;
&lt;p&gt;{{ strtolower($user-&gt;email) }}&lt;/p&gt;</code></pre>

</div>

## Condicionales avanzadas

Blade proporciona directivas adicionales para lógica condicional compleja:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-2 py-1 rounded-full">Roles</span>
            <span class="ml-2 text-sm text-gray-600">Verificar roles y permisos</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Verificar roles --&gt;
@if($user-&gt;role === 'admin')
    &lt;div class="admin-panel"&gt;
        &lt;!-- Contenido solo para administradores --&gt;
    &lt;/div&gt;
@endif

&lt;!-- Verificar múltiples condiciones --&gt;
@if($user-&gt;isActive() && $user-&gt;hasPermission('edit'))
&lt;button class="btn btn-primary"&gt;Editar&lt;/button&gt;
@endif</code></pre>

</div>

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded-full">Switch</span>
            <span class="ml-2 text-sm text-gray-600">Switch/Case para múltiples opciones</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Switch/Case --&gt;
@switch($user-&gt;status)
    @case('active')
        &lt;span class="badge badge-success"&gt;Activo&lt;/span&gt;
        @break
    @case('pending')
        &lt;span class="badge badge-warning"&gt;Pendiente&lt;/span&gt;
        @break
    @case('inactive')
        &lt;span class="badge badge-danger"&gt;Inactivo&lt;/span&gt;
        @break
    @default
        &lt;span class="badge badge-secondary"&gt;Desconocido&lt;/span&gt;
@endswitch</code></pre>
</div>

## Helpers de configuración

Accede a valores de configuración de tu aplicación:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-cyan-100 text-cyan-800 text-xs font-semibold px-2 py-1 rounded-full">Config</span>
            <span class="ml-2 text-sm text-gray-600">Obtener configuración</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Obtener configuración --&gt;
&lt;title&gt;{{ config('app.name', 'Mi Aplicación') }}&lt;/title&gt;
&lt;p&gt;Versión: {{ config('app.version', '1.0') }}&lt;/p&gt;

&lt;!-- Configuración de base de datos --&gt;
&lt;p&gt;Base de datos: {{ config('database.default') }}&lt;/p&gt;</code></pre>

</div>

## Helpers de sesión y autenticación

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">Auth</span>
            <span class="ml-2 text-sm text-gray-600">Verificar autenticación y sesión</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Verificar autenticación --&gt;
@if(auth()-&gt;check())
    &lt;p&gt;Bienvenido, {{ auth()-&gt;user()-&gt;name }}&lt;/p&gt;
@else
    &lt;a href="{{ route('login') }}"&gt;Iniciar Sesión&lt;/a&gt;
@endif

&lt;!-- Datos de sesión --&gt;
@if(session('success'))
&lt;div class="alert alert-success"&gt;{{ session('success') }}&lt;/div&gt;
@endif

@if(session('error'))
&lt;div class="alert alert-danger"&gt;{{ session('error') }}&lt;/div&gt;
@endif</code></pre>

</div>

## Helpers de validación

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded-full">Validation</span>
            <span class="ml-2 text-sm text-gray-600">Verificar errores de validación</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Verificar errores --&gt;
@if($errors-&gt;has('email'))
    &lt;div class="text-danger"&gt;{{ $errors-&gt;first('email') }}&lt;/div&gt;
@endif

&lt;!-- Mostrar todos los errores --&gt;
@if($errors-&gt;any())
    &lt;div class="alert alert-danger"&gt;
        &lt;ul&gt;
            @foreach($errors-&gt;all() as $error)
&lt;li&gt;{{ $error }}&lt;/li&gt;
@endforeach
&lt;/ul&gt;
&lt;/div&gt;
@endif</code></pre>

</div>

## Helpers personalizados

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">Custom</span>
            <span class="ml-2 text-sm text-gray-600">Helpers personalizados</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Helper personalizado para formatear moneda --&gt;
&lt;p&gt;Precio: {{ formatCurrency($product-&gt;price) }}&lt;/p&gt;

&lt;!-- Helper para generar avatares --&gt;
&lt;img src="{{ generateAvatar($user-&gt;email) }}" alt="Avatar"&gt;

&lt;!-- Helper para calcular tiempo transcurrido --&gt;
&lt;p&gt;Última actividad: {{ timeAgo($user-&gt;last_activity) }}&lt;/p&gt;</code></pre>

</div>

## Mejores prácticas para helpers

1. **Usa helpers nativos**: Prefiere helpers de Syverum antes de crear los tuyos
2. **Mantén consistencia**: Usa el mismo formato en toda la aplicación
3. **Documenta helpers personalizados**: Explica qué hace cada helper personalizado
4. **Considera el rendimiento**: Algunos helpers pueden ser costosos computacionalmente
5. **Escape automático**: Blade escapa automáticamente la salida, pero sé consciente de cuándo usar `{!! !!}`

---

## Trabajar con modelos en vistas

Las vistas en Syverum se integran perfectamente con los modelos, permitiéndote mostrar datos de manera elegante y segura. Los modelos proporcionan métodos y propiedades que puedes usar directamente en tus plantillas Blade.

## Mostrar datos de modelos

Los modelos en Syverum proporcionan acceso fácil a sus propiedades y métodos:

**Acceso a propiedades:**

```php
<!-- Acceso directo a propiedades -->
<h1>{{ $user->name }}</h1>
<p>{{ $user->email }}</p>
<p>Rol: {{ $user->role }}</p>
```

**Usar métodos del modelo:**

```php
<!-- Usar métodos del modelo -->
@if($user->isActive())
    <span class="badge badge-success">Activo</span>
@else
    <span class="badge badge-danger">Inactivo</span>
@endif

@if($user->isAdmin())
    <div class="admin-badge">Administrador</div>
@endif
```

## Vista detallada de usuario

Un ejemplo completo de cómo mostrar datos de un modelo:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-teal-100 text-teal-800 text-xs font-semibold px-2 py-1 rounded-full">User Detail</span>
            <span class="ml-2 text-sm text-gray-600">Vista detallada de usuario</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- resources/views/users/show.blade.php --&gt;
@extends('layouts.app')

@section('title', $user-&gt;name)

@section('content')
&lt;div class="row"&gt;
&lt;div class="col-md-8"&gt;
&lt;div class="card"&gt;
&lt;div class="card-header"&gt;
&lt;h3&gt;{{ $user-&gt;name }}&lt;/h3&gt;
&lt;/div&gt;
&lt;div class="card-body"&gt;
&lt;dl class="row"&gt;
&lt;dt class="col-sm-3"&gt;Email:&lt;/dt&gt;
&lt;dd class="col-sm-9"&gt;{{ $user-&gt;email }}&lt;/dd&gt;

                    &lt;dt class="col-sm-3"&gt;Rol:&lt;/dt&gt;
                    &lt;dd class="col-sm-9"&gt;
                        &lt;span class="badge badge-{{ $user-&gt;role === 'admin' ? 'danger' : 'primary' }}"&gt;
                            {{ ucfirst($user-&gt;role) }}
                        &lt;/span&gt;
                    &lt;/dd&gt;

                    &lt;dt class="col-sm-3"&gt;Estado:&lt;/dt&gt;
                    &lt;dd class="col-sm-9"&gt;
                        @if($user-&gt;is_active)
                            &lt;span class="badge badge-success"&gt;Activo&lt;/span&gt;
                        @else
                            &lt;span class="badge badge-danger"&gt;Inactivo&lt;/span&gt;
                        @endif
                    &lt;/dd&gt;

                    &lt;dt class="col-sm-3"&gt;Registrado:&lt;/dt&gt;
                    &lt;dd class="col-sm-9"&gt;{{ date('d/m/Y', strtotime($user-&gt;created_at)) }}&lt;/dd&gt;
                &lt;/dl&gt;

                &lt;!-- Mostrar configuración JSON --&gt;
                @if($user-&gt;settings)
                    &lt;h5&gt;Configuración:&lt;/h5&gt;
                    &lt;ul&gt;
                        @foreach($user-&gt;settings as $key =&gt; $value)
                            &lt;li&gt;&lt;strong&gt;{{ $key }}:&lt;/strong&gt; {{ $value }}&lt;/li&gt;
                        @endforeach
                    &lt;/ul&gt;
                @endif
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;div class="col-md-4"&gt;
        &lt;div class="card"&gt;
            &lt;div class="card-header"&gt;
                &lt;h5&gt;Acciones&lt;/h5&gt;
            &lt;/div&gt;
            &lt;div class="card-body"&gt;
                &lt;div class="d-grid gap-2"&gt;
                    &lt;a href="{{ route('users.edit', ['id' =&gt; $user-&gt;id]) }}" class="btn btn-primary"&gt;
                        Editar Usuario
                    &lt;/a&gt;
                    &lt;a href="{{ route('users.index') }}" class="btn btn-secondary"&gt;
                        Volver a la Lista
                    &lt;/a&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;

&lt;/div&gt;
@endsection</code></pre>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Título dinámico</span>
        </div>
        <p class="text-sm text-gray-600">Usa el nombre del usuario como título</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Condicionales</span>
        </div>
        <p class="text-sm text-gray-600">Muestra contenido diferente según el estado del usuario</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Formateo de datos</span>
        </div>
        <p class="text-sm text-gray-600">Usa helpers para formatear fechas y texto</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <span class="font-semibold text-gray-800">Navegación</span>
        </div>
        <p class="text-sm text-gray-600">Proporciona enlaces a acciones relacionadas</p>
    </div>
</div>

## Lista con paginación simulada

Mostrar colecciones de modelos en listas:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">User List</span>
            <span class="ml-2 text-sm text-gray-600">Lista con paginación simulada</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- resources/views/users/index.blade.php --&gt;
@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
&lt;div class="row"&gt;
&lt;div class="col-12"&gt;
&lt;div class="d-flex justify-content-between align-items-center mb-4"&gt;
&lt;h1&gt;Usuarios&lt;/h1&gt;
&lt;a href="{{ route('users.create') }}" class="btn btn-primary"&gt;
Crear Usuario
&lt;/a&gt;
&lt;/div&gt;

        @if(count($users) &gt; 0)
            &lt;div class="row"&gt;
                @foreach($users as $user)
                    &lt;div class="col-md-4 mb-3"&gt;
                        @include('components.user-card', [
                            'user' =&gt; $user,
                            'showActions' =&gt; true,
                            'class' =&gt; 'h-100'
                        ])
                    &lt;/div&gt;
                @endforeach
            &lt;/div&gt;

            &lt;!-- Paginación simple --&gt;
            &lt;div class="d-flex justify-content-center"&gt;
                &lt;nav aria-label="Paginación de usuarios"&gt;
                    &lt;ul class="pagination"&gt;
                        &lt;li class="page-item disabled"&gt;
                            &lt;span class="page-link"&gt;Anterior&lt;/span&gt;
                        &lt;/li&gt;
                        &lt;li class="page-item active"&gt;
                            &lt;span class="page-link"&gt;1&lt;/span&gt;
                        &lt;/li&gt;
                        &lt;li class="page-item"&gt;
                            &lt;a class="page-link" href="#"&gt;2&lt;/a&gt;
                        &lt;/li&gt;
                        &lt;li class="page-item"&gt;
                            &lt;a class="page-link" href="#"&gt;Siguiente&lt;/a&gt;
                        &lt;/li&gt;
                    &lt;/ul&gt;
                &lt;/nav&gt;
            &lt;/div&gt;
        @else
            &lt;div class="alert alert-info text-center"&gt;
                &lt;h4&gt;No hay usuarios registrados&lt;/h4&gt;
                &lt;p&gt;Comienza creando tu primer usuario.&lt;/p&gt;
                &lt;a href="{{ route('users.create') }}" class="btn btn-primary"&gt;
                    Crear Usuario
                &lt;/a&gt;
            &lt;/div&gt;
        @endif
    &lt;/div&gt;

&lt;/div&gt;
@endsection</code></pre>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Verificación de datos</span>
        </div>
        <p class="text-sm text-gray-600">Comprueba si hay usuarios antes de mostrar la lista</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <span class="font-semibold text-gray-800">Componentes reutilizables</span>
        </div>
        <p class="text-sm text-gray-600">Usa <code>@include</code> para tarjetas de usuario</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span class="font-semibold text-gray-800">Paginación</span>
        </div>
        <p class="text-sm text-gray-600">Incluye controles de paginación básicos</p>
    </div>
    
    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center mb-3">
            <svg class="w-5 h-5 text-orange-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold text-gray-800">Estado vacío</span>
        </div>
        <p class="text-sm text-gray-600">Muestra mensaje cuando no hay datos</p>
    </div>
</div>

## Trabajar con relaciones

Si tus modelos tienen relaciones, puedes acceder a ellas en las vistas:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2 py-1 rounded-full">Relations</span>
            <span class="ml-2 text-sm text-gray-600">Trabajar con relaciones</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Mostrar posts de un usuario --&gt;
@if($user-&gt;posts)
    &lt;h4&gt;Posts del usuario:&lt;/h4&gt;
    @foreach($user-&gt;posts as $post)
        &lt;div class="post-item"&gt;
            &lt;h5&gt;{{ $post-&gt;title }}&lt;/h5&gt;
            &lt;p&gt;{{ Str::limit($post-&gt;content, 100) }}&lt;/p&gt;
            &lt;small&gt;{{ date('d/m/Y', strtotime($post-&gt;created_at)) }}&lt;/small&gt;
        &lt;/div&gt;
    @endforeach
@endif

&lt;!-- Mostrar comentarios de un post --&gt;
@if($post-&gt;comments)
    &lt;h4&gt;Comentarios:&lt;/h4&gt;
    @foreach($post-&gt;comments as $comment)
&lt;div class="comment"&gt;
&lt;strong&gt;{{ $comment-&gt;user-&gt;name }}:&lt;/strong&gt;
&lt;p&gt;{{ $comment-&gt;content }}&lt;/p&gt;
&lt;/div&gt;
@endforeach
@endif</code></pre>

</div>

## Formateo avanzado de datos

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2 py-1 rounded-full">Dates</span>
            <span class="ml-2 text-sm text-gray-600">Fechas y horas</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Fechas formateadas --&gt;
&lt;p&gt;Registrado: {{ date('d/m/Y', strtotime($user-&gt;created_at)) }}&lt;/p&gt;
&lt;p&gt;Último acceso: {{ date('H:i', strtotime($user-&gt;last_login)) }}&lt;/p&gt;

&lt;!-- Fechas relativas --&gt;
&lt;p&gt;Hace {{ \Carbon\Carbon::parse($user-&gt;created_at)-&gt;diffForHumans() }}&lt;/p&gt;</code></pre>

</div>

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">Numbers</span>
            <span class="ml-2 text-sm text-gray-600">Números y cantidades</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Formatear números --&gt;
&lt;p&gt;Puntuación: {{ number_format($user-&gt;rating, 1) }}/5&lt;/p&gt;
&lt;p&gt;Posts: {{ count($user-&gt;posts) }}&lt;/p&gt;
&lt;p&gt;Seguidores: {{ number_format($user-&gt;followers_count) }}&lt;/p&gt;</code></pre>
</div>

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-1 rounded-full">JSON</span>
            <span class="ml-2 text-sm text-gray-600">Datos JSON</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- Mostrar configuración JSON --&gt;
@if($user-&gt;preferences)
    &lt;h5&gt;Preferencias:&lt;/h5&gt;
    &lt;ul&gt;
        @foreach(json_decode($user-&gt;preferences, true) as $key =&gt; $value)
            &lt;li&gt;&lt;strong&gt;{{ ucfirst($key) }}:&lt;/strong&gt; {{ $value }}&lt;/li&gt;
        @endforeach
    &lt;/ul&gt;
@endif</code></pre>
</div>

## Mejores prácticas para modelos en vistas

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
    <div class="space-y-3">
        <div class="flex items-start">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></span>
            <div>
                <strong class="text-gray-800">Usa métodos del modelo:</strong>
                <p class="text-sm text-gray-600">Prefiere métodos como <code>isActive()</code> sobre verificaciones manuales</p>
            </div>
        </div>
        <div class="flex items-start">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></span>
            <div>
                <strong class="text-gray-800">Maneja datos nulos:</strong>
                <p class="text-sm text-gray-600">Siempre verifica si los datos existen antes de mostrarlos</p>
            </div>
        </div>
        <div class="flex items-start">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></span>
            <div>
                <strong class="text-gray-800">Formatea consistentemente:</strong>
                <p class="text-sm text-gray-600">Usa los mismos helpers de formateo en toda la aplicación</p>
            </div>
        </div>
    </div>
    
    <div class="space-y-3">
        <div class="flex items-start">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></span>
            <div>
                <strong class="text-gray-800">Optimiza consultas:</strong>
                <p class="text-sm text-gray-600">Evita el problema N+1 usando eager loading cuando sea necesario</p>
            </div>
        </div>
        <div class="flex items-start">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></span>
            <div>
                <strong class="text-gray-800">Separa la lógica:</strong>
                <p class="text-sm text-gray-600">Mantén la lógica compleja en el controlador, no en la vista</p>
            </div>
        </div>
        <div class="flex items-start">
            <span class="w-2 h-2 bg-green-400 rounded-full mr-3 mt-2"></span>
            <div>
                <strong class="text-gray-800">Usa componentes:</strong>
                <p class="text-sm text-gray-600">Crea componentes reutilizables para elementos comunes</p>
            </div>
        </div>
    </div>
</div>

---

## PHP Simple (alternativa a Blade)

Si prefieres usar PHP simple en lugar de Blade, Syverum también lo soporta:

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2 py-1 rounded-full">PHP</span>
            <span class="ml-2 text-sm text-gray-600">PHP Simple (alternativa a Blade)</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">&lt;!-- resources/views/users/simple.php --&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;&lt;?= htmlspecialchars($title ?? 'Usuarios') ?&gt;&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Lista de Usuarios&lt;/h1&gt;

    &lt;?php if (empty($users)): ?&gt;
        &lt;p&gt;No hay usuarios registrados.&lt;/p&gt;
    &lt;?php else: ?&gt;
        &lt;ul&gt;
            &lt;?php foreach ($users as $user): ?&gt;
                &lt;li&gt;
                    &lt;strong&gt;&lt;?= htmlspecialchars($user-&gt;name) ?&gt;&lt;/strong&gt;
                    - &lt;?= htmlspecialchars($user-&gt;email) ?&gt;
                &lt;/li&gt;
            &lt;?php endforeach; ?&gt;
        &lt;/ul&gt;
    &lt;?php endif; ?&gt;

&lt;/body&gt;
&lt;/html&gt;</code></pre>

</div>

---

## Configuración y personalización

## Rutas de vistas personalizadas

<div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center">
            <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2 py-1 rounded-full">Config</span>
            <span class="ml-2 text-sm text-gray-600">Rutas de vistas personalizadas</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600 text-sm">Copiar</button>
    </div>
    <pre class="bg-gray-900 rounded-lg p-4 border border-gray-700"><code class="language-php">// En tu ServiceProvider personalizado
use Core\Support\ViewRender\Contracts\ViewRendererInterface;

class AppServiceProvider
{
public function register(ContainerInterface $container): void
{
// Agregar rutas adicionales para vistas
$container-&gt;singleton(ViewRendererInterface::class, function () {
$renderer = new BladeRenderer([
BASE_PATH . '/resources/views',
BASE_PATH . '/packages/custom/views' // Ruta personalizada
]);

            return $renderer;
        });
    }

}</code></pre>

</div>

---

## Siguiente paso

<div class="text-center">
    <a href="/docs/middlewares" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-colors duration-200">
        Middlewares
        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>

---

<div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-lg p-6 text-center">
    <p class="text-gray-700">
        <strong>💡 Tip:</strong> Las vistas en Syverum se integran perfectamente con controladores y modelos. Usa Blade para crear interfaces elegantes y mantenibles.
    </p>
</div>
