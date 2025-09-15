---
title: Middlewares
description: Intercepta la petición antes del controlador con MiddlewareInterface.
extends: _layouts.documentation
section: content
---

# Middlewares

Los middlewares implementan `Core\Http\Middleware\MiddlewareInterface` y se ejecutan antes del controlador. Úsalos para auth, logging o rate‑limit.

## Contrato y ejecución

```php
use Core\Http\Middleware\MiddlewareInterface;

class AuthMiddleware implements MiddlewareInterface
{
    public function handle(callable $next)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        return $next();
    }
}
```

Asigna el middleware a una ruta:

```php
Route::get('/admin', [AdminController::class, 'dashboard'])
    ->middleware('AuthMiddleware');
```

`MiddlewareRunner` instancia la clase bajo `App\Http\Middleware\{Nombre}`.

