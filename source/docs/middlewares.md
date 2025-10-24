---
title: Middleware
description: Implementa middleware para procesar requests y responses de forma modular.
extends: _layouts.documentation
section: content
---

# Middleware

<div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-green-700">
                <strong>Pipeline de Middleware:</strong> Syverum incluye un sistema robusto de middleware que te permite procesar requests y responses de forma modular, similar a Laravel pero más ligero.
            </p>
        </div>
    </div>
</div>

El middleware en Syverum actúa como una capa intermedia entre el request y el controlador, permitiéndote ejecutar código antes y después de que se procese la petición. Es perfecto para autenticación, logging, CORS, validación y más.

---

## ¿Qué es el Middleware?

El middleware es código que se ejecuta **antes** de que tu controlador procese la petición. Puedes tener múltiples middleware ejecutándose en secuencia, creando un "pipeline" de procesamiento.

```
Request → Middleware 1 → Middleware 2 → Middleware 3 → Controller → Response
```

---

## Crear Middleware

## Middleware con interfaz

Esta es la forma más robusta y recomendada para crear middleware en Syverum. Al implementar la interfaz `MiddlewareInterface`, garantizas que tu middleware tenga la estructura correcta y sea compatible con el sistema de middleware del framework.

**Ventajas de usar la interfaz:**
- **Type safety**: PHP puede verificar que implementas correctamente el método `process()`
- **Consistencia**: Todos los middleware siguen el mismo patrón
- **IDE support**: Mejor autocompletado y detección de errores
- **Testing**: Más fácil de testear y mockear

El método `process()` recibe un callable `$next` que representa el siguiente middleware o controlador en el pipeline. Debes llamarlo para continuar la ejecución.

```php
<?php


namespace App\Http\Middleware;

use Core\Support\Middleware\Contracts\MiddlewareInterface;
use Core\Support\Http\Response;

class AuthMiddleware implements MiddlewareInterface
{
    public function process(callable $next): mixed
    {
        // Lógica antes del controlador
        if (!$this->isAuthenticated()) {
            return Response::html('No autorizado', 401);
        }
        
        // Continuar al siguiente middleware/controlador
        $response = $next();
        
        // Lógica después del controlador (opcional)
        $this->logAccess();
        
        return $response;
    }
    
    private function isAuthenticated(): bool
    {
        // Implementar lógica de autenticación
        return isset($_SESSION['user_id']);
    }
    
    private function logAccess(): void
    {
        // Log del acceso
        error_log('Usuario autenticado accedió a la ruta');
    }
}
```

## Middleware como función

Para casos simples o middleware rápidos, puedes usar una función simple en lugar de una clase. Esta aproximación es más ligera pero menos flexible que usar una clase.

**Cuándo usar funciones:**
- **Middleware simples**: Para lógica básica como logging o headers
- **Prototipado rápido**: Para probar ideas rápidamente
- **Middleware específicos**: Que solo se usan en un lugar

**Limitaciones:**
- No puedes usar inyección de dependencias
- Más difícil de testear
- No puedes mantener estado entre requests
- Menos organizado para proyectos grandes

```php
<?php

use Core\Support\Http\Response;

function LogMiddleware(callable $next): mixed
{
    $startTime = microtime(true);
    
    // Log del request
    error_log('Request iniciado: ' . $_SERVER['REQUEST_URI']);
    
    $response = $next();
    
    // Log del response
    $duration = microtime(true) - $startTime;
    error_log('Request completado en: ' . $duration . 's');
    
    return $response;
}
```

## Middleware como clase callable

Esta aproximación combina la flexibilidad de las clases con la simplicidad de las funciones. Al implementar el método mágico `__invoke()`, tu clase se convierte en un callable que puede ser usado directamente como middleware.

**Ventajas de usar `__invoke()`:**
- **Flexibilidad**: Puedes usar constructores para inyección de dependencias
- **Simplicidad**: No necesitas implementar interfaces
- **Reutilización**: Puedes instanciar la clase y usar el objeto múltiples veces
- **Estado**: Puedes mantener propiedades de la clase

**Cuándo usar esta aproximación:**
- Cuando necesitas inyección de dependencias pero no quieres implementar interfaces
- Para middleware que necesitan configuración inicial
- Cuando quieres mantener estado entre requests

```php
<?php


namespace App\Http\Middleware;

use Core\Support\Http\Response;

class CorsMiddleware
{
    public function __invoke(callable $next): mixed
    {
        // Headers CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        
        // Manejar preflight requests
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            return Response::html('', 200);
        }
        
        return $next();
    }
}
```

---

## Registrar Middleware

Antes de poder usar middleware en tus rutas, necesitas registrarlos en el sistema. Syverum te ofrece varias formas de hacerlo, desde aliases simples hasta middleware globales que se ejecutan automáticamente.

**Tipos de registro:**
- **Aliases**: Nombres cortos para referenciar middleware
- **Globales**: Middleware que se ejecutan en todas las rutas
- **Directos**: Usar clases directamente sin registro previo

## Usando aliases

Los aliases te permiten usar nombres cortos y memorables para tus middleware en lugar de escribir el nombre completo de la clase cada vez.

**Ventajas de los aliases:**
- **Legibilidad**: `'auth'` es más claro que `AuthMiddleware::class`
- **Mantenibilidad**: Puedes cambiar la clase sin afectar las rutas
- **Consistencia**: Mismo nombre en toda la aplicación
- **Flexibilidad**: Puedes cambiar la implementación fácilmente

```php
<?php


namespace App\Providers;

use Core\Support\DI\Contracts\ContainerInterface;
use Core\Support\DI\Contracts\ServiceProviderInterface;
use Core\Application\Middleware\Handler;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CorsMiddleware;

class MiddlewareServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->singleton(Handler::class, function () use ($container) {
            $handler = new Handler($container);
            
            // Registrar aliases de middleware
            $handler->alias('auth', AuthMiddleware::class);
            $handler->alias('cors', CorsMiddleware::class);
            $handler->alias('log', LogMiddleware::class);
            $handler->alias('admin', AdminMiddleware::class);
            
            return $handler;
        });
    }
}
```

## Middleware global

Los middleware globales se ejecutan automáticamente en todas las rutas de tu aplicación, sin necesidad de especificarlos individualmente. Son perfectos para funcionalidades transversales como CORS, logging, o headers de seguridad.

**Cuándo usar middleware globales:**
- **CORS**: Para APIs que necesitan acceso desde diferentes dominios
- **Logging**: Para registrar todas las peticiones
- **Seguridad**: Headers de seguridad que deben aplicarse siempre
- **Performance**: Middleware de caché o compresión

**Consideraciones importantes:**
- Se ejecutan en TODAS las rutas, incluyendo errores 404
- Pueden afectar el rendimiento si son muy pesados
- El orden de ejecución es importante
- Algunos middleware pueden no ser apropiados para todas las rutas

```php
<?php


namespace App\Providers;

use Core\Support\DI\Contracts\ContainerInterface;
use Core\Support\DI\Contracts\ServiceProviderInterface;
use Core\Application\Middleware\Handler;

class MiddlewareServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->singleton(Handler::class, function () use ($container) {
            $handler = new Handler($container);
            
            // Middleware globales
            $handler->alias('global.cors', CorsMiddleware::class);
            $handler->alias('global.log', LogMiddleware::class);
            
            return $handler;
        });
    }
}
```

---

## Usar Middleware en Rutas

Una vez registrados tus middleware, puedes aplicarlos a rutas específicas o grupos de rutas. Syverum te ofrece flexibilidad total para controlar exactamente dónde y cómo se ejecutan tus middleware.

**Estrategias de aplicación:**
- **Individual**: Un middleware por ruta
- **Múltiples**: Varios middleware en secuencia
- **Condicional**: Middleware que se aplican según condiciones
- **Grupos**: Middleware compartidos entre rutas relacionadas

## Middleware individual

La forma más simple de aplicar middleware es uno por ruta. Es perfecto para casos donde solo necesitas una funcionalidad específica.

**Casos de uso comunes:**
- **Autenticación**: Solo en rutas protegidas
- **Validación**: Solo en rutas que reciben datos
- **Autorización**: Solo en rutas administrativas

```php
<?php
// routes/web.php

use App\Controllers\UserController;

// Middleware en ruta individual
Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware('auth')
    ->name('admin.users');

Route::post('/admin/users', [UserController::class, 'store'])
    ->middleware('auth', 'admin')
    ->name('admin.users.store');
```

## Múltiples middleware

Cuando necesitas aplicar varios middleware a una ruta, puedes especificarlos en el orden que quieres que se ejecuten. El orden es crucial porque cada middleware puede depender del anterior.

**Consideraciones del orden:**
- **CORS primero**: Para manejar preflight requests
- **Logging temprano**: Para registrar todo el proceso
- **Autenticación antes de autorización**: Verificar identidad antes de permisos
- **Validación antes del controlador**: Asegurar datos válidos

**Patrones comunes:**
- `cors → log → auth → admin` (API administrativa)
- `cors → log → auth` (API protegida)
- `log → validate → controller` (Formularios)

```php
<?php
// routes/web.php

// Múltiples middleware en una ruta
Route::get('/api/users', [UserController::class, 'index'])
    ->middleware('cors', 'auth', 'log')
    ->name('api.users');

Route::post('/api/users', [UserController::class, 'store'])
    ->middleware('cors', 'auth', 'admin', 'log')
    ->name('api.users.store');
```

## Middleware con clases directas

A veces prefieres usar las clases directamente sin registrarlas como aliases. Esto es útil cuando tienes middleware específicos que solo se usan una vez o cuando quieres ser explícito sobre qué clase se está usando.

**Cuándo usar clases directas:**
- **Middleware específicos**: Que solo se usan en una ruta
- **Testing**: Para usar mocks o stubs específicos
- **Claridad**: Cuando quieres ser explícito sobre la implementación
- **Configuración**: Cuando necesitas pasar parámetros al constructor

**Ventajas:**
- **Explícito**: Sabes exactamente qué clase se ejecuta
- **Flexible**: Puedes instanciar con parámetros específicos
- **Sin registro**: No necesitas registrarlos previamente

```php
<?php
// routes/web.php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\AdminMiddleware;

// Usar clases directamente
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(AuthMiddleware::class, AdminMiddleware::class)
    ->name('admin.dashboard');
```

---

## Ejemplos de Middleware Comunes

## Middleware de Autenticación

```php
<?php


namespace App\Http\Middleware;

use Core\Support\Middleware\Contracts\MiddlewareInterface;
use Core\Support\Http\Response;

class AuthMiddleware implements MiddlewareInterface
{
    public function process(callable $next): mixed
    {
        if (!$this->checkAuth()) {
            return Response::html('
                <h1>Acceso Denegado</h1>
                <p>Debes iniciar sesión para acceder a esta página.</p>
                <a href="/login">Iniciar Sesión</a>
            ', 401);
        }
        
        return $next();
    }
    
    private function checkAuth(): bool
    {
        // Verificar sesión
        if (!isset($_SESSION['user_id'])) {
            return false;
        }
        
        // Verificar token JWT (opcional)
        if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $token = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
            return $this->validateJWT($token);
        }
        
        return true;
    }
    
    private function validateJWT(string $token): bool
    {
        // Implementar validación JWT
        return !empty($token);
    }
}
```

## Middleware de Administrador

```php
<?php


namespace App\Http\Middleware;

use Core\Support\Middleware\Contracts\MiddlewareInterface;
use Core\Support\Http\Response;

class AdminMiddleware implements MiddlewareInterface
{
    public function process(callable $next): mixed
    {
        if (!$this->isAdmin()) {
            return Response::html('
                <h1>Acceso Denegado</h1>
                <p>No tienes permisos de administrador.</p>
            ', 403);
        }
        
        return $next();
    }
    
    private function isAdmin(): bool
    {
        if (!isset($_SESSION['user_id'])) {
            return false;
        }
        
        // Verificar rol de usuario
        $userRole = $_SESSION['user_role'] ?? 'user';
        return $userRole === 'admin';
    }
}
```

## Middleware de Logging

```php
<?php


namespace App\Http\Middleware;

use Core\Support\Middleware\Contracts\MiddlewareInterface;

class LogMiddleware implements MiddlewareInterface
{
    public function process(callable $next): mixed
    {
        $startTime = microtime(true);
        $requestId = uniqid('req_');
        
        // Log del request
        $this->log('REQUEST', [
            'id' => $requestId,
            'method' => $_SERVER['REQUEST_METHOD'],
            'uri' => $_SERVER['REQUEST_URI'],
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
        ]);
        
        $response = $next();
        
        // Log del response
        $duration = microtime(true) - $startTime;
        $this->log('RESPONSE', [
            'id' => $requestId,
            'duration' => round($duration, 4),
            'status' => $response->status() ?? 200
        ]);
        
        return $response;
    }
    
    private function log(string $type, array $data): void
    {
        $logEntry = date('Y-m-d H:i:s') . " [{$type}] " . json_encode($data) . PHP_EOL;
        file_put_contents('storage/logs/app.log', $logEntry, FILE_APPEND);
    }
}
```

## Middleware de CORS

```php
<?php


namespace App\Http\Middleware;

use Core\Support\Middleware\Contracts\MiddlewareInterface;
use Core\Support\Http\Response;

class CorsMiddleware implements MiddlewareInterface
{
    public function process(callable $next): mixed
    {
        // Headers CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        header('Access-Control-Max-Age: 86400');
        
        // Manejar preflight requests
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            return Response::html('', 200);
        }
        
        return $next();
    }
}
```

## Middleware de Rate Limiting

```php
<?php


namespace App\Http\Middleware;

use Core\Support\Middleware\Contracts\MiddlewareInterface;
use Core\Support\Http\Response;

class RateLimitMiddleware implements MiddlewareInterface
{
    private int $maxRequests = 100;
    private int $timeWindow = 3600; // 1 hora
    
    public function process(callable $next): mixed
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $key = "rate_limit_{$ip}";
        
        if (!$this->checkRateLimit($key)) {
            return Response::html('
                <h1>Demasiadas solicitudes</h1>
                <p>Has excedido el límite de solicitudes. Intenta más tarde.</p>
            ', 429);
        }
        
        return $next();
    }
    
    private function checkRateLimit(string $key): bool
    {
        $file = "storage/cache/{$key}.json";
        
        if (!file_exists($file)) {
            $this->createRateLimitFile($file);
            return true;
        }
        
        $data = json_decode(file_get_contents($file), true);
        $now = time();
        
        // Limpiar requests antiguos
        $data['requests'] = array_filter($data['requests'], function($timestamp) use ($now) {
            return ($now - $timestamp) < $this->timeWindow;
        });
        
        if (count($data['requests']) >= $this->maxRequests) {
            return false;
        }
        
        // Agregar nuevo request
        $data['requests'][] = $now;
        file_put_contents($file, json_encode($data));
        
        return true;
    }
    
    private function createRateLimitFile(string $file): void
    {
        $data = [
            'requests' => [time()]
        ];
        file_put_contents($file, json_encode($data));
    }
}
```

---

## Middleware con Inyección de Dependencias

Una de las ventajas más poderosas de usar clases para middleware es la capacidad de usar inyección de dependencias. Esto te permite acceder a servicios del contenedor de dependencias, como bases de datos, loggers, o cualquier otro servicio registrado.

**Beneficios de la inyección de dependencias:**
- **Acceso a servicios**: Puedes usar cualquier servicio registrado en el contenedor
- **Testing**: Fácil de mockear dependencias para pruebas
- **Flexibilidad**: Puedes cambiar implementaciones sin modificar el middleware
- **Reutilización**: El mismo middleware puede usar diferentes servicios según el contexto

**Servicios comunes en middleware:**
- **Database**: Para logging o validación de datos
- **Logger**: Para logging estructurado
- **Cache**: Para rate limiting o caché de sesiones
- **Config**: Para configuración específica del middleware

```php
<?php


namespace App\Http\Middleware;

use Core\Support\Middleware\Contracts\MiddlewareInterface;
use Core\Support\DI\Contracts\ContainerInterface;
use Core\Support\Http\Response;

class DatabaseLogMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly ContainerInterface $container
    ) {}
    
    public function process(callable $next): mixed
    {
        // Acceder a servicios del contenedor
        $database = $this->container->make(\Core\Services\Database\Database::class);
        
        // Log a base de datos
        $this->logToDatabase($database);
        
        return $next();
    }
    
    private function logToDatabase($database): void
    {
        $database->statement(
            'INSERT INTO request_logs (method, uri, ip, created_at) VALUES (?, ?, ?, ?)',
            [
                $_SERVER['REQUEST_METHOD'],
                $_SERVER['REQUEST_URI'],
                $_SERVER['REMOTE_ADDR'] ?? 'unknown',
                date('Y-m-d H:i:s')
            ]
        );
    }
}
```

---

## Orden de Ejecución

El orden en que defines tus middleware es crucial porque determina la secuencia de ejecución. Cada middleware puede depender del trabajo realizado por los anteriores, y algunos middleware deben ejecutarse antes que otros para funcionar correctamente.

**Principios del orden de ejecución:**
- **De izquierda a derecha**: El primer middleware se ejecuta primero
- **Pipeline unidireccional**: Los middleware se ejecutan en orden hacia el controlador
- **Retorno en orden inverso**: Las respuestas pasan por los middleware en orden inverso
- **Interrupción posible**: Cualquier middleware puede detener la ejecución

**Orden recomendado por tipo:**
1. **CORS**: Debe ser el primero para manejar preflight requests
2. **Logging**: Para registrar todo el proceso desde el inicio
3. **Rate Limiting**: Para proteger contra abuso antes de procesar
4. **Autenticación**: Para verificar identidad del usuario
5. **Autorización**: Para verificar permisos específicos
6. **Validación**: Para validar datos antes del controlador
7. **Controlador**: El punto final del pipeline

```php
<?php
// routes/web.php

// El orden importa:
Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware('cors', 'log', 'auth', 'admin')
    ->name('admin.users');

// Orden de ejecución:
// 1. CorsMiddleware
// 2. LogMiddleware  
// 3. AuthMiddleware
// 4. AdminMiddleware
// 5. UserController@index
```

---

## Mejores Prácticas

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-blue-700">
                <strong>💡 Consejos para middleware:</strong>
            </p>
            <ul class="text-sm text-blue-700 mt-2 list-disc list-inside">
                <li><strong>Orden lógico:</strong> Coloca middleware generales primero (CORS, logging)</li>
                <li><strong>Autenticación temprana:</strong> Verifica autenticación antes de middleware específicos</li>
                <li><strong>Respuestas claras:</strong> Devuelve mensajes de error claros y útiles</li>
                <li><strong>Logging:</strong> Registra eventos importantes para debugging</li>
                <li><strong>Performance:</strong> Evita operaciones costosas en middleware</li>
                <li><strong>Reutilización:</strong> Crea middleware genéricos y reutilizables</li>
            </ul>
        </div>
    </div>
</div>

---

## Siguiente paso

<div class="text-center">
    <a href="/docs/database" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-colors duration-200">
        Base de datos
        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>

---

<div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-lg p-6 text-center">
    <p class="text-gray-700">
        <strong>💡 Tip:</strong> El middleware en Syverum te permite crear aplicaciones seguras y robustas. Úsalo para autenticación, logging, CORS y más funcionalidades transversales.
    </p>
</div>
