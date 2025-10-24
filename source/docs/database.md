---
title: Configuración de Base de Datos
description: Configura la conexión a tu base de datos MySQL de forma sencilla y segura.
extends: _layouts.documentation
section: content
---

# Configuración de Base de Datos

<div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-green-700">
                <strong>Conexión MySQL:</strong> Syverum incluye un sistema de conexión a base de datos MySQL integrado que se configura automáticamente usando variables de entorno.
            </p>
        </div>
    </div>
</div>

Syverum utiliza PDO para la conexión a base de datos y se configura automáticamente al iniciar la aplicación. Solo necesitas definir las variables de entorno correctas y el framework se encargará del resto.

---

## Configuración con Variables de Entorno

### Archivo .env

Crea un archivo `.env` en la raíz de tu proyecto con la configuración de tu base de datos:

```bash
# Configuración de Base de Datos
DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=mi_aplicacion
DB_USER=usuario
DB_PASS=contraseña_segura
```

### Variables de entorno disponibles

| Variable | Descripción | Valor por defecto | Requerido |
|----------|-------------|-------------------|-----------|
| `DB_DRIVER` | Driver de base de datos | `mysql` | No |
| `DB_HOST` | Host del servidor | `127.0.0.1` | No |
| `DB_PORT` | Puerto del servidor | `3306` | No |
| `DB_NAME` | Nombre de la base de datos | `null` | **Sí** |
| `DB_USER` | Usuario de la base de datos | `null` | **Sí** |
| `DB_PASS` | Contraseña del usuario | `null` | **Sí** |

---

## Configuración Automática

El framework carga automáticamente la configuración de base de datos al iniciar la aplicación:

```php
// src/core/Support/Database/ServiceProvider.php
public function register(ContainerInterface $container): void
{
    $config = [
        'driver' => getenv('DB_DRIVER') ?: 'mysql',
        'host' => getenv('DB_HOST') ?: '127.0.0.1',
        'port' => getenv('DB_PORT') ?: '3306',
        'database' => getenv('DB_NAME') ?: null,
        'username' => getenv('DB_USER') ?: null,
        'password' => getenv('DB_PASS') ?: null,
    ];

    Connection::configure($config);
}
```

---

## Validación de Configuración

### Verificar conexión

El framework valida automáticamente que todos los parámetros requeridos estén presentes:

```php
// Validación automática en Connection::configure()
if (empty(self::$database['driver']) ||
    empty(self::$database['host']) ||
    empty(self::$database['database']) ||
    empty(self::$database['username'])) {

    self::$database['error'] = 'Faltan datos de conexión. No se intentó conectar.';
}
```

### Verificar estado de conexión

Puedes verificar el estado de la conexión usando el método de debug:

```php
use Core\Services\Database\Connection;

// Obtener información de debug de la conexión
$debugInfo = Connection::getDebugInfo();

/*
Retorna un array con:
[
    'connected' => true/false,
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'port' => '3306',
    'database' => 'mi_aplicacion',
    'username' => 'usuario',
    'password' => '***', // Oculto por seguridad
    'error' => null o mensaje de error
]
*/
```

---

## Configuraciones por Entorno

### Desarrollo Local

```bash
# .env (desarrollo)
DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=mi_app_dev
DB_USER=root
DB_PASS=
```

### Producción

```bash
# .env (producción)
DB_DRIVER=mysql
DB_HOST=mi-servidor.com
DB_PORT=3306
DB_NAME=mi_app_prod
DB_USER=usuario_prod
DB_PASS=contraseña_super_segura_123
```

### Testing

```bash
# .env.testing
DB_DRIVER=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=mi_app_test
DB_USER=test_user
DB_PASS=test_password
```

---

## Configuración Manual (Opcional)

Si necesitas configurar la base de datos manualmente en lugar de usar variables de entorno:

```php
<?php
declare(strict_types=1);

namespace App\Providers;

use Core\Support\DI\Contracts\ContainerInterface;
use Core\Support\DI\Contracts\ServiceProviderInterface;
use Core\Services\Database\Connection;

class DatabaseServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        // Configuración manual
        $config = [
            'driver' => 'mysql',
            'host' => 'localhost',
            'port' => '3306',
            'database' => 'mi_aplicacion',
            'username' => 'mi_usuario',
            'password' => 'mi_contraseña',
        ];

        Connection::configure($config);
    }
}
```

---

## Manejo de Errores

### Errores de configuración

El framework maneja automáticamente los errores de configuración:

```php
// Si faltan parámetros requeridos
$error = Connection::getDebugInfo()['error'];
// "Faltan datos de conexión. No se intentó conectar."

// Si el driver no es soportado
$error = Connection::getDebugInfo()['error'];
// "Driver de base de datos no soportado: postgresql"
```

### Errores de conexión

```php
// Si la conexión falla
$error = Connection::getDebugInfo()['error'];
// "Error al conectar: SQLSTATE[HY000] [1045] Access denied for user..."
```

---

## Verificación de Conexión

### Script de verificación

Crea un script simple para verificar que tu configuración funciona:

```php
<?php
// verify-db.php

require_once 'vendor/autoload.php';

use Core\Services\Database\Connection;
use Core\Services\Database\Database;

try {
    // Configurar conexión
    $config = [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'mi_aplicacion',
        'username' => 'usuario',
        'password' => 'contraseña',
    ];
    
    Connection::configure($config);
    
    // Verificar conexión
    $pdo = Database::pdo();
    
    if ($pdo) {
        echo "✅ Conexión exitosa a la base de datos\n";
        
        // Probar consulta simple
        $result = Database::selectOne('SELECT 1 as test');
        echo "✅ Consulta de prueba exitosa: " . json_encode($result) . "\n";
    } else {
        echo "❌ Error de conexión\n";
        $debug = Connection::getDebugInfo();
        echo "Error: " . $debug['error'] . "\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
```

### Ejecutar verificación

```bash
php verify-db.php
```

---

## Configuración Avanzada

### Múltiples conexiones

Aunque Syverum está diseñado para una sola conexión por defecto, puedes extender la funcionalidad:

```php
<?php
declare(strict_types=1);

namespace App\Services;

use Core\Services\Database\Connection;
use PDO;

class DatabaseManager
{
    private static array $connections = [];
    
    public static function addConnection(string $name, array $config): void
    {
        // Crear nueva instancia de conexión para múltiples DBs
        $connection = new class($config) {
            private ?PDO $pdo = null;
            private array $config;
            
            public function __construct(array $config)
            {
                $this->config = $config;
            }
            
            public function getPdo(): ?PDO
            {
                if ($this->pdo === null) {
                    $this->connect();
                }
                return $this->pdo;
            }
            
            private function connect(): void
            {
                $dsn = "mysql:host={$this->config['host']};port={$this->config['port']};dbname={$this->config['database']};charset=utf8mb4";
                $this->pdo = new PDO($dsn, $this->config['username'], $this->config['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            }
        };
        
        self::$connections[$name] = $connection;
    }
    
    public static function connection(string $name = 'default')
    {
        return self::$connections[$name] ?? null;
    }
}

// Uso:
DatabaseManager::addConnection('default', [
    'host' => '127.0.0.1',
    'port' => '3306',
    'database' => 'app_main',
    'username' => 'user1',
    'password' => 'pass1',
]);

DatabaseManager::addConnection('analytics', [
    'host' => '127.0.0.1',
    'port' => '3306',
    'database' => 'app_analytics',
    'username' => 'user2',
    'password' => 'pass2',
]);
```

---

## Mejores Prácticas

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-blue-700">
                <strong>💡 Consejos para configuración de base de datos:</strong>
            </p>
            <ul class="text-sm text-blue-700 mt-2 list-disc list-inside">
                <li><strong>Variables de entorno:</strong> Nunca hardcodees credenciales en el código</li>
                <li><strong>Archivo .env:</strong> Mantén el archivo .env fuera del control de versiones</li>
                <li><strong>Contraseñas seguras:</strong> Usa contraseñas complejas en producción</li>
                <li><strong>Usuarios específicos:</strong> Crea usuarios de DB con permisos mínimos necesarios</li>
                <li><strong>Backup regular:</strong> Configura backups automáticos de tu base de datos</li>
                <li><strong>Monitoreo:</strong> Supervisa el rendimiento y estado de la conexión</li>
            </ul>
        </div>
    </div>
</div>

---

## Troubleshooting

Problemas comunes y soluciones:</strong> Esta sección te ayudará a resolver los errores más frecuentes al configurar la base de datos en Syverum.

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
        <h4 class="font-semibold text-yellow-800 mb-2">❌ "Faltan datos de conexión"</h4>
        <ul class="text-sm text-yellow-700 space-y-1">
            <li>Verifica que todas las variables requeridas estén definidas en `.env`</li>
            <li>Asegúrate de que el archivo `.env` esté en la raíz del proyecto</li>
        </ul>
    </div>
    
    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
        <h4 class="font-semibold text-red-800 mb-2">❌ "Access denied for user"</h4>
        <ul class="text-sm text-red-700 space-y-1">
            <li>Verifica las credenciales de usuario y contraseña</li>
            <li>Asegúrate de que el usuario tenga permisos para acceder a la base de datos</li>
        </ul>
    </div>
    
    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
        <h4 class="font-semibold text-red-800 mb-2">❌ "Unknown database"</h4>
        <ul class="text-sm text-red-700 space-y-1">
            <li>Verifica que el nombre de la base de datos sea correcto</li>
            <li>Asegúrate de que la base de datos exista en el servidor</li>
        </ul>
    </div>
    
    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
        <h4 class="font-semibold text-red-800 mb-2">❌ "Connection refused"</h4>
        <ul class="text-sm text-red-700 space-y-1">
            <li>Verifica que el host y puerto sean correctos</li>
            <li>Asegúrate de que el servidor MySQL esté ejecutándose</li>
        </ul>
    </div>
</div>

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-blue-700">
                <strong>💡 Tip:</strong> Si sigues teniendo problemas, revisa los logs de la aplicación o usa el script de verificación que se muestra en la sección anterior.
            </p>
        </div>
    </div>
</div>

---

## Siguiente paso

<div class="text-center">
    <a href="/docs/dependency-injection" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-colors duration-200">
        Inyección de dependencias
        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>

---

<div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-lg p-6 text-center">
    <p class="text-gray-700">
        <strong>💡 Tip:</strong> Una vez configurada la base de datos, aprende sobre el sistema de inyección de dependencias para gestionar tus servicios y dependencias de forma elegante.
    </p>
</div>
