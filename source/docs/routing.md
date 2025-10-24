---
title: Rutas
description: Define rutas HTTP, nómbralas y aplica middlewares.
extends: _layouts.documentation
section: content
---

# Rutas

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-blue-700">
                <strong>Ruteo expresivo:</strong> Syverum ofrece un sistema de rutas potente y flexible que te permite definir endpoints de forma clara y concisa.
            </p>
        </div>
    </div>
</div>

El sistema de rutas de Syverum te permite definir endpoints HTTP de manera expresiva, aplicar middleware, nombrar rutas y trabajar con parámetros dinámicos de forma intuitiva.

---

## Definición básica de rutas

Las rutas en Syverum se definen usando el facade `Route` seguido del método HTTP correspondiente. Cada ruta especifica una URL y una función que se ejecutará cuando alguien visite esa URL.

```php
// Ruta GET para la página principal
// Cuando alguien visite '/' (la raíz del sitio), ejecutará esta función
Route::get('/', function() {
    return '¡Hola desde Syverum!'; // Retorna un mensaje de texto plano
});

// Ruta GET para la página "Acerca de"
// Esta ruta carga una vista Blade llamada 'about'
Route::get('/about', function() {
    return view('about'); // Retorna la vista 'about.blade.php'
});

// Ruta POST para el formulario de contacto
// Se ejecuta cuando se envía un formulario a '/contact'
Route::post('/contact', function() {
    return 'Formulario enviado'; // Confirma que el formulario fue procesado
});
```

---

## Métodos HTTP soportados

<div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900" style="margin-bottom:20px!Important;">Métodos básicos</h3>
        
        <div class="space-y-3">
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mr-3">
                    GET
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Route::get()</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-3">
                    POST
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Route::post()</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mr-3">
                    PUT
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Route::put()</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 mr-3">
                    PATCH
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Route::patch()</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 mr-3">
                    DELETE
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Route::delete()</code>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Ejemplos de uso</h3>

        <div class="space-y-3">
            <div>
                <p class="text-sm text-gray-600 mb-1">Página de inicio</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Route::get('/', ...)</code>
            </div>

            <div>
                <p class="text-sm text-gray-600 mb-1">Formulario de contacto</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Route::post('/contact', ...)</code>
            </div>

            <div>
                <p class="text-sm text-gray-600 mb-1">Actualizar perfil</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Route::put('/profile', ...)</code>
            </div>

            <div>
                <p class="text-sm text-gray-600 mb-1">Eliminar artículo</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Route::delete('/posts/{id}', ...)</code>
            </div>
        </div>
    </div>

</div>

---

## Tipos de handlers

Los handlers son las funciones o métodos que se ejecutan cuando se accede a una ruta. Syverum soporta tres formas diferentes de definir handlers:

### 1. Closures (Funciones anónimas)

Las funciones anónimas son ideales para rutas simples que no requieren mucha lógica.

```php
// Usando una función anónima (closure)
// Perfecto para rutas simples o pruebas rápidas
Route::get('/welcome', function() {
    return '¡Bienvenido!'; // Lógica simple directamente en la ruta
});
```

### 2. Controladores con sintaxis de array

Esta es la forma moderna y recomendada para usar controladores.

```php
// Sintaxis moderna usando array
// 'UserController::class' obtiene el nombre completo de la clase
// 'index' es el método que se ejecutará
Route::get('/users', [UserController::class, 'index']);
```

### 3. Controladores con sintaxis de string

Sintaxis más tradicional, pero menos recomendada en versiones modernas.

```php
// Sintaxis tradicional usando string
// 'PostController@index' significa: clase PostController, método index
Route::get('/posts', 'PostController@index');
```

---

## Parámetros de ruta

Los parámetros de ruta te permiten capturar segmentos de la URL y pasarlos como argumentos a tu función o controlador. Son muy útiles para crear URLs dinámicas.

### Sintaxis básica

Los parámetros se definen usando llaves `{}` en la URL y se reciben como argumentos en la función.

```php
// Parámetro simple: captura el ID del usuario
// La URL '/user/123' pasará '123' como parámetro $id
Route::get('/user/{id}', function($id) {
    return "Usuario: {$id}"; // Muestra el ID capturado
});
```

```php
// Parámetros múltiples: captura ID del post y ID del comentario
// La URL '/posts/5/comments/12' pasará '5' como $id y '12' como $commentId
Route::get('/posts/{id}/comments/{commentId}', function($id, $commentId) {
    return "Post {$id}, Comentario {$commentId}"; // Muestra ambos parámetros
});
```

### Ejemplos de URLs

- **Perfil de usuario**: `/user/{id}`
- **Artículo específico**: `/posts/{slug}`
- **Categoría y producto**: `/category/{cat}/product/{id}`

---

## Nombres de ruta

Los nombres de ruta te permiten referenciar rutas por un nombre en lugar de la URL completa. Esto es muy útil porque si cambias la URL, solo necesitas actualizarla en un lugar.

### Definición con nombre

Usa el método `->name()` para asignar un nombre único a cada ruta.

```php
// Asigna el nombre 'home' a la ruta '/home'
// Ahora puedes referenciar esta ruta usando route('home')
Route::get('/home', function() {
    return view('home');
})->name('home');

// Asigna el nombre 'about' a la ruta '/about'
// Útil para generar enlaces en las vistas
Route::get('/about', function() {
    return view('about');
})->name('about');
```

### Uso en vistas Blade

Los nombres de ruta son especialmente útiles en las vistas Blade para generar URLs dinámicamente.

```html
<!-- Generar URL por nombre -->
<!-- route('home') genera automáticamente la URL '/home' -->
<a href="{{ route('home') }}">Inicio</a>
<a href="{{ route('about') }}">Acerca de</a>

<!-- Con parámetros -->
<!-- Pasa parámetros como array asociativo -->
<a href="{{ route('user.profile', ['id' => 123]) }}">
    Perfil de Usuario
</a>
```

---

## Middleware

El middleware actúa como un filtro que se ejecuta antes de que la ruta procese la petición. Es perfecto para autenticación, autorización, validación y otras tareas comunes.

### Middleware individual

Aplica un solo middleware a una ruta usando `->middleware()`.

```php
// Protege la ruta '/admin' con middleware de autenticación
// Solo usuarios autenticados podrán acceder a esta ruta
Route::get('/admin', function() {
    return 'Panel de administración';
})->middleware('auth'); // 'auth' verifica que el usuario esté logueado
```

### Múltiples middleware

Puedes aplicar varios middleware a una ruta pasándolos como argumentos separados.

```php
// Aplica dos middleware: autenticación y verificación de email
// El usuario debe estar logueado Y tener email verificado
Route::get('/dashboard', function() {
    return 'Dashboard del usuario';
})->middleware('auth', 'verified'); // 'verified' verifica el email
```

### Middleware con parámetros

Algunos middleware aceptan parámetros para personalizar su comportamiento.

```php
// Middleware de autenticación con parámetro 'admin'
// Solo usuarios autenticados con rol 'admin' podrán acceder
Route::get('/posts/{id}', function($id) {
    return "Post {$id}";
})->middleware('auth:admin'); // 'admin' es el parámetro del middleware
```

---

## API fluida (Method Chaining)

Syverum permite encadenar múltiples métodos en una sola declaración de ruta, haciendo el código más limpio y expresivo.

### Encadenamiento de métodos

Puedes combinar múltiples operaciones en una sola línea usando el encadenamiento de métodos.

```php
// Encadenamiento completo: ruta + nombre + middleware
// Define la ruta, le asigna un nombre y aplica dos middleware
Route::get('/profile/{id}', [UserController::class, 'show'])
    ->name('user.profile')        // Asigna nombre para generar URLs
    ->middleware('auth', 'verified'); // Aplica autenticación y verificación
```

<div class="mt-6 grid md:grid-cols-3 gap-4">
    <div class="text-center">
        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-2">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
        </div>
        <h4 class="font-semibold text-gray-900">Ruta</h4>
        <p class="text-sm text-gray-600">Define el endpoint</p>
    </div>
    
    <div class="text-center">
        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-2">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
        </div>
        <h4 class="font-semibold text-gray-900">Nombre</h4>
        <p class="text-sm text-gray-600">Asigna un nombre</p>
    </div>
    
    <div class="text-center">
        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
        </div>
        <h4 class="font-semibold text-gray-900">Middleware</h4>
        <p class="text-sm text-gray-600">Aplica protección</p>
    </div>
</div>

---

## Ejemplos prácticos

Aquí tienes ejemplos completos de cómo estructurar las rutas para aplicaciones reales.

### Blog simple

Este ejemplo muestra cómo estructurar las rutas para un blog básico con operaciones CRUD completas.

```php
<?php

// Página de inicio - muestra todos los posts
Route::get('/', [HomeController::class, 'index'])
    ->name('home'); // Nombre para generar enlaces

// Lista de artículos - página que muestra todos los posts
Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index'); // Convención: recurso.index

// Artículo individual - muestra un post específico usando slug
Route::get('/posts/{slug}', [PostController::class, 'show'])
    ->name('posts.show'); // Convención: recurso.show

// Crear artículo (solo autenticados) - formulario para crear post
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create')    // Nombre para el formulario
    ->middleware('auth');      // Solo usuarios logueados

// Guardar artículo - procesa el formulario de creación
Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store')      // Convención: recurso.store
    ->middleware('auth');      // Protegido por autenticación

// Editar artículo - formulario para editar post existente
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])
    ->name('posts.edit')       // Convención: recurso.edit
    ->middleware('auth');      // Solo usuarios logueados

// Actualizar artículo - procesa el formulario de edición
Route::put('/posts/{id}', [PostController::class, 'update'])
    ->name('posts.update')     // Convención: recurso.update
    ->middleware('auth');      // Protegido por autenticación

// Eliminar artículo - elimina un post específico
Route::delete('/posts/{id}', [PostController::class, 'destroy'])
    ->name('posts.destroy')   // Convención: recurso.destroy
    ->middleware('auth');      // Solo usuarios logueados
```

### API REST

Este ejemplo muestra cómo crear una API REST completa para gestionar usuarios.

```php
<?php

// API de usuarios - conjunto completo de rutas REST
// Todas las rutas están protegidas con middleware de API

// Listar usuarios - GET /api/users
Route::get('/api/users', [UserController::class, 'index'])
    ->name('api.users.index')      // Convención API: api.recurso.index
    ->middleware('auth:api');      // Autenticación por API token

// Mostrar usuario específico - GET /api/users/{id}
Route::get('/api/users/{id}', [UserController::class, 'show'])
    ->name('api.users.show')       // Convención API: api.recurso.show
    ->middleware('auth:api');      // Protegido con token de API

// Crear usuario - POST /api/users
Route::post('/api/users', [UserController::class, 'store'])
    ->name('api.users.store')      // Convención API: api.recurso.store
    ->middleware('auth:api');      // Requiere autenticación API

// Actualizar usuario - PUT /api/users/{id}
Route::put('/api/users/{id}', [UserController::class, 'update'])
    ->name('api.users.update')     // Convención API: api.recurso.update
    ->middleware('auth:api');      // Protegido con token de API

// Eliminar usuario - DELETE /api/users/{id}
Route::delete('/api/users/{id}', [UserController::class, 'destroy'])
    ->name('api.users.destroy')    // Convención API: api.recurso.destroy
    ->middleware('auth:api');      // Requiere autenticación API
```

---

## Helpers de URL

Los helpers de URL te permiten generar URLs dinámicamente en tu aplicación, tanto en controladores como en vistas.

### En controladores

Usa el `UrlGenerator` para generar URLs programáticamente en tus controladores.

```php
use Core\Support\Routing\UrlGenerator;

class PostController
{
    // El UrlGenerator se inyecta automáticamente
    public function show(UrlGenerator $urlGenerator)
    {
        // Genera la URL para editar el post con ID 123
        $editUrl = $urlGenerator->route('posts.edit', ['id' => 123]);
        // Resultado: '/posts/123/edit'
        
        return view('post.show', compact('editUrl'));
    }
}
```

### En vistas Blade

Los helpers están disponibles globalmente en las vistas Blade para generar URLs dinámicamente.

```html
<!-- Helper route() - genera URL por nombre de ruta -->
<!-- Útil para crear enlaces dinámicos -->
<a href="{{ route('posts.show', ['slug' => $post->slug]) }}">
    {{ $post->title }}
</a>

<!-- Helper asset() - genera URL para archivos estáticos -->
<!-- Útil para imágenes, CSS, JS -->
<img src="{{ asset('images/logo.png') }}" alt="Logo">

<!-- Helper url() - genera URL absoluta -->
<!-- Útil para formularios y enlaces externos -->
<form action="{{ url('/contact') }}" method="POST">
    <!-- formulario -->
</form>
```

---

## Siguiente paso

<div class="text-center">
    <a href="/docs/controllers" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-colors duration-200">
        Controladores
        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>

---

<div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-6 text-center">
    <p class="text-gray-700">
        <strong>💡 Tip:</strong> Usa nombres descriptivos para tus rutas. Esto hace que tu código sea más mantenible y las URLs más fáciles de generar.
    </p>
</div>
