---
title: Rutas
description: Define rutas HTTP, nómbralas y aplica middlewares.
extends: _layouts.documentation
section: content
---

# Rutas

En esta sección aprenderás a registrar rutas con la fachada `Route`, asignarles nombres y resolver URLs por nombre.

---

## Ejemplo mínimo (`routes/web.php`)

```php
<?php

use Core\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [HomeController::class, 'send']);
```
---

La fachada `Route` delega en `RouteManager` y permite encadenar:

```php
Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware('AuthMiddleware');
```
---

## Resolver rutas por nombre

En vistas puedes generar URLs con `route('nombre')`:

```php
<a href="{{ route('home') }}">Inicio</a>
```
---

## Buenas prácticas

- Usa nombres de ruta consistentes (`seccion.recurso.accion`).
- Mantén controladores delgados; delega lógica al dominio/servicios.
- Emplea middlewares para autenticación/autorización.

---
## Errores comunes

- “Ruta no encontrada …”: verifica el método (GET/POST) y el endpoint exacto.
- “Método o clase no encontrada …”: revisa el nombre del método del controlador.

