---
title: Inyección de Dependencias
description: Utiliza el contenedor de inyección de dependencias para gestionar servicios y resolver dependencias automáticamente.
extends: _layouts.documentation
section: content
---

# Inyección de Dependencias

<div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-green-700">
                <strong>Contenedor DI Completo:</strong> Syverum incluye un sistema robusto de inyección de dependencias con resolución automática, binding de servicios, singletons y más.
            </p>
        </div>
    </div>
</div>

El sistema de inyección de dependencias (DI) de Syverum te permite gestionar servicios, resolver dependencias automáticamente y mantener un código desacoplado y testeable. Es el corazón del framework y se integra con todos los componentes.

---

## ¿Qué es la Inyección de Dependencias?

**Imagina que eres un chef en un restaurante.** En lugar de ir a la cocina cada vez que necesitas ingredientes, tienes un asistente que te trae todo lo que necesitas cuando lo pides. La inyección de dependencias funciona igual: en lugar de que tus clases vayan a buscar sus dependencias, el contenedor se las "inyecta" automáticamente.

### El problema sin DI

```php
// ❌ Sin inyección de dependencias - la clase crea sus propias dependencias
class UserService 
{
    public function createUser($data) 
    {
        $database = new Database(); // Crear dependencia manualmente
        $emailService = new EmailService(); // Crear dependencia manualmente
        
        // Usar las dependencias...
    }
}
```

**Problemas:** Difícil de testear, acoplado, no flexible.

### La solución con DI

```php
// ✅ Con inyección de dependencias - las dependencias se inyectan automáticamente
class UserService 
{
    public function __construct(
        private readonly Database $database,
        private readonly EmailService $emailService
    ) {}
    
    public function createUser($data) 
    {
        // Las dependencias ya están disponibles
        $this->database->save($data);
        $this->emailService->sendWelcome($data['email']);
    }
}
```

**Beneficios:** Fácil de testear, desacoplado, flexible.

### Ventajas principales

- ✅ **Modular** - Cada componente es independiente y reutilizable
- ✅ **Testeable** - Puedes inyectar mocks para pruebas unitarias
- ✅ **Mantenible** - Cambios centralizados en el contenedor
- ✅ **Flexible** - Puedes cambiar implementaciones fácilmente

---

## Contenedor Principal

**El contenedor es como un almacén inteligente** que sabe dónde está cada cosa y cómo entregártela cuando la necesites. Es el corazón del sistema de DI en Syverum.

### ¿Qué hace el contenedor?

1. **Registra servicios** - Le dices qué clases están disponibles
2. **Resuelve dependencias** - Encuentra automáticamente las dependencias que necesita una clase
3. **Gestiona instancias** - Decide si crear una nueva instancia o reutilizar una existente
4. **Inyecta dependencias** - Pasa automáticamente las dependencias a los constructores

### Acceso al contenedor

```php
use Core\Support\DI\Contracts\ContainerInterface;
use function Core\Support\DI\container;

// Obtener el contenedor global
$container = container();

// O inyectar en constructores
class MyService
{
    public function __construct(
        private readonly ContainerInterface $container
    ) {}
}
```

### Métodos principales del contenedor

```php
$container = container();

// Verificar si existe un binding
if ($container->has(MyService::class)) {
    // El servicio está registrado
}

// Resolver un servicio
$service = $container->make(MyService::class);

// Alias de make()
$service = $container->get(MyService::class);
```

---

## Binding de Servicios

**Binding es como registrar un servicio en el contenedor.** Es como decirle al almacén: "Cuando alguien pida X, dale Y". Hay diferentes formas de hacerlo según tus necesidades.

### Binding básico

**Es como decir:** "Cuando pidan `MyService`, crea una nueva instancia de `MyService`"

```php
use function Core\Support\DI\bind;

// Binding simple - nueva instancia cada vez
bind(MyService::class, MyService::class);

// Binding con clase diferente
bind(PaymentInterface::class, StripePayment::class);

// Binding con closure
bind(EmailService::class, function($container) {
    return new EmailService(
        $container->make(SmtpConfig::class)
    );
});
```

### Singletons

**Los singletons son como tener un solo coche compartido en la familia.** Todos usan la misma instancia, no se crea una nueva cada vez. Perfecto para servicios costosos como conexiones a base de datos o caché.

```php
use function Core\Support\DI\singleton;

// Singleton - misma instancia siempre
singleton(Database::class, Database::class);

// Singleton con closure
singleton(CacheService::class, function($container) {
    return new RedisCache($container->make(RedisConfig::class));
});
```

**¿Cuándo usar singletons?**
- Conexiones a base de datos
- Servicios de caché
- Configuraciones globales
- Servicios que son costosos de crear

### Instancias listas

**Es como traer tu propio objeto al almacén.** Ya tienes algo creado y solo quieres que el contenedor lo entregue cuando alguien lo pida.

```php
use function Core\Support\DI\instance;

// Registrar una instancia ya creada
$config = new AppConfig(['debug' => true]);
instance(AppConfig::class, $config);

// O usando el contenedor directamente
$container->instance('config', $config);
```

**¿Cuándo usar instancias?**
- Objetos que ya tienes creados
- Configuraciones específicas
- Objetos que necesitan inicialización manual

---

## Resolución Automática (Autowiring)

**El autowiring es como tener un asistente súper inteligente** que mira qué necesita tu clase y automáticamente busca y trae todas las dependencias necesarias. ¡No tienes que decirle qué traer!

### ¿Cómo funciona?

1. El contenedor mira el constructor de tu clase
2. Ve qué tipos de parámetros necesita
3. Busca esos tipos en sus registros
4. Los crea automáticamente y los pasa al constructor

### Inyección automática en constructores

```php
class UserService
{
    public function __construct(
        private readonly Database $database,
        private readonly EmailService $emailService,
        private readonly Logger $logger
    ) {}
}

// El contenedor resuelve automáticamente todas las dependencias
$userService = container()->make(UserService::class);
```

### Resolución de interfaces

**Las interfaces son como contratos.** Le dices al contenedor: "Cuando alguien pida `PaymentInterface`, dale `StripePayment`". Esto te permite cambiar implementaciones fácilmente.

```php
// Registrar implementación de interfaz
bind(PaymentInterface::class, StripePayment::class);

class OrderService
{
    public function __construct(
        private readonly PaymentInterface $payment // Se resuelve automáticamente
    ) {}
}

// Si quieres cambiar a PayPal, solo cambias el binding:
// bind(PaymentInterface::class, PayPalPayment::class);
```

**Ventajas de usar interfaces:**
- Fácil cambiar implementaciones
- Código más testeable
- Mejor desacoplamiento

### Parámetros opcionales

**A veces no todas las dependencias son obligatorias.** Puedes marcar algunas como opcionales usando `?` o valores por defecto.

```php
class NotificationService
{
    public function __construct(
        private readonly EmailService $emailService,
        private readonly ?SmsService $smsService = null // Opcional
    ) {}
    
    public function sendNotification($message) 
    {
        $this->emailService->send($message);
        
        // Solo usar SMS si está disponible
        if ($this->smsService) {
            $this->smsService->send($message);
        }
    }
}
```

**Casos de uso para parámetros opcionales:**
- Servicios que no siempre están disponibles
- Funcionalidades premium
- Servicios de desarrollo vs producción

---

## Service Providers

**Los Service Providers son como organizadores de tu almacén.** En lugar de registrar todos los servicios en un solo lugar, los organizas en diferentes "proveedores" según su función.

### ¿Qué son los Service Providers?

- **Organizadores de bindings** - Agrupan servicios relacionados
- **Puntos de configuración** - Donde registras tus servicios
- **Modulares** - Puedes activar/desactivar grupos de servicios
- **Reutilizables** - Puedes usar los mismos providers en diferentes proyectos

### Crear un Service Provider

```php
<?php
declare(strict_types=1);

namespace App\Providers;

use Core\Support\DI\Contracts\ContainerInterface;
use Core\Support\DI\Contracts\ServiceProviderInterface;
use App\Services\EmailService;
use App\Services\SmsService;

class AppServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        // Registrar servicios
        $container->singleton(EmailService::class, function($container) {
            return new EmailService(
                $container->make(SmtpConfig::class)
            );
        });

        $container->bind(SmsService::class, function($container) {
            return new SmsService(
                $container->make(TwilioConfig::class)
            );
        });

        // Registrar aliases
        $container->bind('email', EmailService::class);
        $container->bind('sms', SmsService::class);
    }
}
```

### Registrar Service Providers

**Es como decirle al almacén qué organizadores usar.** Le pasas una lista de providers y el contenedor los carga automáticamente.

```php
use Core\Support\DI\Factory;

// En tu aplicación
$container = Factory::build([
    \App\Providers\AppServiceProvider::class,      // Servicios generales
    \App\Providers\DatabaseServiceProvider::class, // Servicios de BD
    \App\Providers\CacheServiceProvider::class,   // Servicios de caché
]);

// Ahora todos los servicios están registrados automáticamente
```

**Ventajas de usar Service Providers:**
- Organización clara de servicios
- Fácil activar/desactivar funcionalidades
- Reutilización entre proyectos
- Configuración modular

---

## Helpers de DI

**Los helpers son como atajos para usar el contenedor.** En lugar de escribir `container()->make()`, puedes usar funciones más cortas y legibles.

### Funciones helper disponibles

**Estas funciones hacen tu código más limpio y fácil de leer:**

```php
use function Core\Support\DI\{bind, singleton, instance, make, call};

// Binding
bind('service', MyService::class);
singleton('cache', CacheService::class);
instance('config', $configObject);

// Resolución
$service = make(MyService::class);
$service = make(MyService::class, ['param' => 'value']);

// Llamadas a métodos
$result = call([MyService::class, 'method'], ['param' => 'value']);
$result = call('MyService::method', ['param' => 'value']);
```

### Uso en controladores

**Los controladores son el lugar perfecto para usar DI.** Puedes inyectar todos los servicios que necesitas y el framework los resuelve automáticamente.

```php
class UserController
{
    public function __construct(
        private readonly UserService $userService,        // Servicio principal
        private readonly EmailService $emailService,     // Servicio de email
        private readonly ContainerInterface $container    // Contenedor para servicios dinámicos
    ) {}

    public function store(Request $request): Response
    {
        // Usar servicios inyectados directamente
        $user = $this->userService->create($request->body());
        
        // O resolver servicios dinámicamente cuando los necesites
        $notificationService = $this->container->make(NotificationService::class);
        $notificationService->sendWelcome($user);
        
        return Response::json($user);
    }
}
```

**Ventajas en controladores:**
- Servicios disponibles automáticamente
- Fácil testing con mocks
- Código más limpio y legible
- Flexibilidad para servicios dinámicos

---

## Resolución de Métodos

**A veces no necesitas crear toda la clase, solo quieres ejecutar un método específico.** El contenedor puede resolver las dependencias de métodos individuales.

### Llamar métodos con inyección automática

**Es como pedirle al asistente que ejecute una tarea específica** sin tener que crear toda la clase primero.

```php
class OrderProcessor
{
    public function processOrder(Order $order, User $user): void
    {
        // Lógica de procesamiento
    }
}

// El contenedor resuelve automáticamente las dependencias del método
$result = container()->call([OrderProcessor::class, 'processOrder'], [
    'order' => $order,
    'user' => $user
]);
```

### Métodos estáticos

**Los métodos estáticos también pueden recibir dependencias.** El contenedor puede resolver las dependencias incluso para métodos que no requieren instanciar la clase.

```php
class UtilityService
{
    public static function processData(array $data, Logger $logger): array
    {
        // Procesar datos usando el logger
        $logger->info('Processing data...');
        return array_map('strtoupper', $data);
    }
}

// Resolver dependencias de método estático
$result = container()->call('UtilityService::processData', [
    'data' => ['hello', 'world']
]);
// El contenedor automáticamente inyecta Logger
```

**Casos de uso para métodos estáticos con DI:**
- Utilidades que no necesitan estado
- Funciones helper con dependencias
- Procesadores de datos

### Closures con dependencias

**Incluso las funciones anónimas pueden recibir dependencias.** Perfecto para tareas específicas o callbacks.

```php
$processor = function(Order $order, EmailService $emailService) {
    $emailService->sendConfirmation($order);
};

// Resolver dependencias del closure
container()->call($processor, ['order' => $order]);
// El contenedor automáticamente inyecta EmailService
```

**Casos de uso para closures con DI:**
- Callbacks con dependencias
- Tareas específicas
- Procesadores de eventos
- Funciones de filtrado

---

## Configuración Avanzada

**Cuando necesitas más control sobre cómo se crean tus servicios,** el contenedor te ofrece opciones avanzadas para casos específicos.

### Binding con parámetros personalizados

**A veces necesitas pasar parámetros específicos** que no están en el contenedor.

```php
class DatabaseService
{
    public function __construct(
        private readonly string $host,
        private readonly int $port,
        private readonly string $database
    ) {}
}

// Binding con parámetros específicos
bind(DatabaseService::class, function($container) {
    return new DatabaseService(
        host: 'localhost',
        port: 3306,
        database: 'myapp'
    );
});
```

### Binding condicional

**A veces necesitas diferentes implementaciones según el entorno** o configuración.

```php
class PaymentServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        $container->bind(PaymentInterface::class, function($container) {
            $environment = $container->make('config')['environment'];
            
            return match($environment) {
                'production' => new StripePayment(),    // Producción: Stripe real
                'testing' => new MockPayment(),          // Testing: Mock
                default => new SandboxPayment()          // Desarrollo: Sandbox
            };
        });
    }
}
```

**Casos de uso para binding condicional:**
- Diferentes servicios según entorno
- Configuraciones específicas por usuario
- Servicios premium vs gratuitos

### Binding de arrays y configuraciones

**Las configuraciones también pueden ser servicios.** Puedes registrar arrays, objetos de configuración y acceder a ellos fácilmente.

```php
class ConfigServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerInterface $container): void
    {
        // Configuración de la aplicación
        $container->instance('config', [
            'app' => [
                'name' => 'Mi Aplicación',
                'debug' => true,
                'timezone' => 'UTC'
            ],
            'database' => [
                'host' => 'localhost',
                'port' => 3306
            ]
        ]);

        // Configuración específica como servicio
        $container->bind('app.config', function($container) {
            return $container->get('config')['app'];
        });
    }
}

// Usar en cualquier clase
class MyService 
{
    public function __construct(
        private readonly array $config,
        private readonly array $appConfig
    ) {
        // $config contiene toda la configuración
        // $appConfig contiene solo la configuración de la app
    }
}
```

**Ventajas de configuraciones como servicios:**
- Acceso fácil desde cualquier clase
- Configuración centralizada
- Fácil testing con configuraciones mock

---

## Detección de Dependencias Circulares

**Una dependencia circular es como un círculo vicioso:** A necesita B, B necesita A, y nunca se puede resolver. El contenedor detecta esto automáticamente y te avisa.

### ¿Qué es una dependencia circular?

```php
class ServiceA
{
    public function __construct(private readonly ServiceB $serviceB) {}
}

class ServiceB
{
    public function __construct(private readonly ServiceA $serviceA) {}
}

// ❌ Esto crea un círculo infinito:
// ServiceA necesita ServiceB
// ServiceB necesita ServiceA
// ServiceA necesita ServiceB...
```

### El contenedor te protege

```php
// Esto lanzará una excepción automáticamente
try {
    $serviceA = container()->make(ServiceA::class);
} catch (ContainerException $e) {
    echo $e->getMessage(); // "Circular dependency detected while resolving: ServiceA"
}
```

### Soluciones comunes

**1. Usar lazy loading:**
```php
class ServiceA 
{
    public function __construct(
        private readonly ContainerInterface $container
    ) {}
    
    public function getServiceB(): ServiceB {
        return $this->container->make(ServiceB::class);
    }
}
```

**2. Refactorizar la arquitectura:**
```php
// Crear un servicio común que ambos puedan usar
class SharedService {}
class ServiceA { public function __construct(private readonly SharedService $shared) {} }
class ServiceB { public function __construct(private readonly SharedService $shared) {} }
```

---

## Testing con DI

**El DI hace el testing mucho más fácil.** Puedes inyectar mocks fácilmente y probar cada componente de forma aislada.

### Mocking de servicios

**En lugar de usar servicios reales en tus tests,** puedes crear versiones "falsas" que simulen el comportamiento.

```php
class UserControllerTest
{
    public function testStoreUser(): void
    {
        // Crear mocks
        $mockUserService = $this->createMock(UserService::class);
        $mockEmailService = $this->createMock(EmailService::class);
        
        // Configurar expectativas
        $mockUserService->expects($this->once())
            ->method('create')
            ->willReturn(new User(['name' => 'Test User']));
        
        // Registrar mocks en el contenedor
        $container = new Container();
        $container->instance(UserService::class, $mockUserService);
        $container->instance(EmailService::class, $mockEmailService);
        
        // Crear controlador con dependencias mockeadas
        $controller = new UserController($mockUserService, $mockEmailService, $container);
        
        // Ejecutar test
        $request = new Request('POST', '/users', [], ['name' => 'Test User']);
        $response = $controller->store($request);
        
        $this->assertEquals(201, $response->status());
    }
}
```

### Testing de Service Providers

**Puedes probar que tus Service Providers registran correctamente los servicios.**

```php
class AppServiceProviderTest
{
    public function testRegistersServices(): void
    {
        $container = new Container();
        $provider = new AppServiceProvider();
        
        $provider->register($container);
        
        // Verificar que los servicios están registrados
        $this->assertTrue($container->has(EmailService::class));
        $this->assertTrue($container->has('email'));
        
        // Verificar que son singletons
        $service1 = $container->make(EmailService::class);
        $service2 = $container->make(EmailService::class);
        $this->assertSame($service1, $service2);
    }
}
```

**Ventajas del testing con DI:**
- Tests más rápidos (no servicios reales)
- Tests más confiables (comportamiento predecible)
- Tests aislados (cada componente por separado)
- Fácil debugging (sabes exactamente qué está pasando)

---

## Integración con el Framework

**El DI está integrado en todos los componentes de Syverum.** Cada parte del framework puede usar servicios inyectados automáticamente.

### En controladores

**Los controladores son el lugar más común para usar DI.** El framework resuelve automáticamente todas las dependencias.

```php
class ApiController
{
    public function __construct(
        private readonly UserService $userService,
        private readonly CacheService $cacheService,
        private readonly Logger $logger
    ) {}

    public function index(): Response
    {
        $users = $this->cacheService->remember('users', 3600, function() {
            return $this->userService->getAll();
        });
        
        return Response::json($users);
    }
}
```

### En middleware

**Los middleware también pueden usar servicios inyectados.** Perfecto para autenticación, logging, y validaciones.

```php
class AuthMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly AuthService $authService,
        private readonly Logger $logger
    ) {}

    public function process(callable $next): mixed
    {
        if (!$this->authService->isAuthenticated()) {
            $this->logger->warning('Unauthorized access attempt');
            return Response::html('Unauthorized', 401);
        }
        
        return $next();
    }
}
```

**Ventajas en middleware:**
- Servicios disponibles automáticamente
- Fácil testing de middleware
- Lógica de negocio separada

### En modelos

**Los modelos también pueden recibir servicios inyectados.** Útil para eventos, logging, y servicios de notificación.

```php
class User extends Model
{
    public function __construct(
        array $attributes = [],
        bool $exists = false,
        private readonly ?EventDispatcher $events = null
    ) {
        parent::__construct($attributes, $exists);
    }
    
    public function save(): bool
    {
        $saved = parent::save();
        
        if ($saved && $this->events) {
            $this->events->dispatch('user.saved', $this);
        }
        
        return $saved;
    }
}
```

**Casos de uso en modelos:**
- Disparar eventos cuando se guarda
- Logging de cambios
- Servicios de notificación
- Validaciones complejas

---

## Mejores Prácticas

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-blue-700">
                <strong>💡 Consejos para inyección de dependencias:</strong>
            </p>
            <ul class="text-sm text-blue-700 mt-2 list-disc list-inside">
                <li><strong>Interfaces:</strong> Usa interfaces para desacoplar implementaciones</li>
                <li><strong>Singletons:</strong> Usa singletons para servicios costosos (DB, Cache)</li>
                <li><strong>Service Providers:</strong> Organiza bindings en Service Providers</li>
                <li><strong>Constructor injection:</strong> Prefiere inyección por constructor</li>
                <li><strong>Testing:</strong> Usa el contenedor para facilitar testing</li>
                <li><strong>Configuración:</strong> Registra configuraciones como servicios</li>
            </ul>
        </div>
    </div>
</div>

---

## Debugging y Troubleshooting

**Cuando algo no funciona con DI, aquí tienes las herramientas para diagnosticar el problema.**

### Verificar bindings

**Antes de resolver un servicio, verifica que esté registrado:**

```php
// Verificar si un servicio está registrado
if (container()->has(MyService::class)) {
    echo "✅ Servicio registrado";
} else {
    echo "❌ Servicio NO registrado";
}

// Obtener información de debug
$container = container();
// El contenedor interno mantiene información de bindings e instancias
```

### Errores comunes

**Error: "No entry found or resolvable"**
```php
// ❌ Clase no existe o no está registrada
$service = container()->make('NonExistentClass');

// ✅ Verificar que la clase existe
if (class_exists('NonExistentClass')) {
    $service = container()->make('NonExistentClass');
}
```

**Error: "Circular dependency detected"**
```php
// ❌ Dependencia circular
class A { public function __construct(B $b) {} }
class B { public function __construct(A $a) {} }

// ✅ Usar lazy loading o refactorizar
class A { 
    public function __construct(
        private readonly ContainerInterface $container
    ) {}
    
    public function getB(): B {
        return $this->container->make(B::class);
    }
}
```

### Consejos de debugging

- **Usa `container()->has()`** para verificar registros
- **Revisa los Service Providers** para asegurar que están cargados
- **Verifica las interfaces** si usas binding de interfaces
- **Comprueba las dependencias circulares** si tienes errores de resolución

---

<div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-lg p-6 text-center">
    <p class="text-gray-700">
        <strong>💡 Tip:</strong> El sistema de DI de Syverum es muy potente. Úsalo para crear aplicaciones modulares, testeables y mantenibles.
    </p>
</div>
