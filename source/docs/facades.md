---
title: "Facades"
description: "Acceso estático a servicios del core: Route y Request."
extends: _layouts.documentation
section: content
---

# Facades

Syverum incluye fachadas ligeras para simplificar operaciones comunes.

## `Core\Facades\Route`

```php
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store']);
```

Métodos encadenables:

- `name('ruta.nombre')`
- `middleware('AuthMiddleware')`

## `Core\Facades\Request`

```php
$capture = Request::capture();
// Retorna: ['endpoint' => '...', 'method' => 'GET']
```

Usa helpers en vistas: `route('name')` y `asset('path')`.

