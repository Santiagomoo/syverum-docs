---
title: Controladores
description: Crea controladores delgados y retorna vistas o respuestas simples.
extends: _layouts.documentation
section: content
---

# Controladores

<div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-green-700">
                <strong>Controladores delgados:</strong> Syverum te permite crear controladores simples y eficientes que organizan la lógica de tu aplicación de forma clara y mantenible.
            </p>
        </div>
    </div>
</div>

Los controladores en Syverum son clases que manejan la lógica de negocio de tu aplicación. Actúan como intermediarios entre las rutas y las vistas, procesando datos y retornando respuestas apropiadas.

---

## Crear un controlador

Para crear un controlador en Syverum, puedes usar el comando Artisan que genera automáticamente la estructura básica de la clase. Este comando crea un archivo PHP en la carpeta `app/Http/Controllers/` con el namespace correcto y la estructura mínima necesaria.

El comando `make:controller` es la forma más rápida y segura de crear controladores, ya que garantiza que sigan las convenciones del framework y tengan la estructura correcta desde el inicio.

<div class="bg-gray-900 rounded-lg p-6 mb-8">
    <div class="flex items-center mb-4">
        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <span class="text-gray-300 font-medium">Terminal</span>
    </div>
    <pre><code class="language-bash"># Crear un controlador básico
syverum make:controller UserController</code></pre>
</div>
---
## Estructura básica de un controlador

Un controlador en Syverum es una clase PHP simple que extiende de ninguna clase base específica. La estructura básica incluye el namespace correcto, las importaciones necesarias y métodos públicos que manejan las diferentes acciones de tu aplicación.

Cada método del controlador representa una acción específica que puede ser llamada desde una ruta. Los métodos pueden recibir parámetros de la URL, datos del request y servicios inyectados automáticamente por el contenedor de dependencias.

<div class="bg-gray-900 rounded-lg p-6 mb-8">
    <div class="flex items-center mb-4">
        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <span class="text-gray-300 font-medium">app/Http/Controllers/UserController.php</span>
    </div>
    <pre><code class="language-php">&lt;?php

namespace App\Http\Controllers;

use Core\Support\Http\Request;

class UserController
{

    public function index()
    {
        // Lógica para obtener usuarios desde la base de datos
        $users = ['Juan', 'María', 'Carlos'];
        
        // Retorna una vista con los datos para mostrar
        return view('users.index', ['users' => $users]);
    }
}</code></pre>
</div>

## Tipos de respuestas

### 1. Retornar vistas

Las vistas son la forma más común de retornar contenido en aplicaciones web.

```php
use Core\Support\Http\Response;

public function index(): Response
{
    $users = ['Juan', 'María', 'Carlos'];
    
    // Retorna una vista Blade con datos
    return view('users.index', ['users' => $users]);
    
    // O usando compact() para pasar variables
    return view('users.index', compact('users'));
}
```

### 2. Retornar JSON

Perfecto para APIs o respuestas AJAX.

```php
use Core\Support\Http\JsonResponse;

public function api(): JsonResponse
{
    $data = [
        'users' => ['Juan', 'María', 'Carlos'],
        'total' => 3
    ];
    
    // Usando el helper json()
    return json($data);
    
    // O usando la clase directamente
    return Response::json($data);
}
```

### 3. Retornar texto plano o HTML

Para respuestas simples o contenido HTML básico.

```php
public function welcome(): Response
{
    // Retorna texto plano
    return Response::text('¡Bienvenido a Syverum!');
    
    // O HTML
    return Response::html('<h1>Hola Mundo</h1>');
}
```

### 4. Respuestas automáticas

El framework puede convertir automáticamente ciertos tipos de datos:

```php
public function simple(): string
{
    // Se convierte automáticamente a Response::text()
    return 'Texto simple';
}

public function data(): array
{
    // Se convierte automáticamente a JsonResponse
    return ['message' => 'Datos JSON'];
}

public function nullResponse(): null
{
    // Se convierte automáticamente a Response con status 204
    return null;
}
```

---

## Inyección de dependencias

Syverum resuelve automáticamente las dependencias de tus controladores usando el contenedor DI.

### Inyección automática

```php
use Core\Support\Http\Request;
use Core\Support\Routing\UrlGenerator;
use Core\Support\DI\Contracts\ContainerInterface;

class PostController
{
    // Las dependencias se inyectan automáticamente
    public function __construct(
        private readonly Request $request,
        private readonly UrlGenerator $urlGenerator,
        private readonly ContainerInterface $container
    ) {}

    public function store(): Response
    {
        $data = $this->request->body();
        
        // Procesar datos...
        
        $editUrl = $this->urlGenerator->route('posts.edit', ['id' => 123]);
        
        return Response::html("Redirigir a: {$editUrl}");
    }
}
```

### Servicios disponibles

<div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Servicios del framework</h3>
        
        <div class="space-y-3">
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-3">
                    Request
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Datos de la petición</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mr-3">
                    Response
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Crear respuestas</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 mr-3">
                    UrlGenerator
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Generar URLs</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mr-3">
                    ContainerInterface
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Acceso al DI</code>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Servicios adicionales</h3>
        
        <div class="space-y-3">
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 mr-3">
                    Database
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Conexión DB</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 mr-3">
                    ViewRendererInterface
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Motor vistas</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 mr-3">
                    Personalizados
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Tus servicios</code>
            </div>
            
            <div class="flex items-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 mr-3">
                    Cualquier clase
                </span>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Registrada en DI</code>
            </div>
        </div>
    </div>
</div>

---

## Trabajar con datos de la petición

### Datos del formulario

```php
use Core\Support\Http\Request;

class UserController
{
    public function store(Request $request): Response
    {
        // Obtener todos los datos del cuerpo
        $data = $request->body();
        
        // Obtener parámetros de consulta
        $queryParams = $request->query();
        
        // Obtener headers
        $headers = $request->headers();
        
        // Obtener cookies
        $cookies = $request->cookies();
        
        // Obtener archivos subidos
        $files = $request->files();
        
        // Obtener método HTTP
        $method = $request->method();
        
        // Obtener ruta
        $path = $request->path();
        
        return Response::json(['message' => 'Usuario creado']);
    }
}
```

### Parámetros de ruta

```php
// Ruta: /users/{id}/posts/{postId}
public function showPost(Request $request, string $id, string $postId): Response
{
    // Los parámetros se pasan automáticamente como argumentos del método
    return Response::html("Usuario {$id}, Post {$postId}");
}
```

---

## Controladores RESTful

Los controladores RESTful siguen convenciones estándar para operaciones CRUD.

### Métodos estándar

<div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Métodos básicos</h3>
        
        <div class="space-y-3">
            <div>
                <p class="text-sm text-gray-600 mb-1">Listar recursos</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">index()</code>
            </div>
            
            <div>
                <p class="text-sm text-gray-600 mb-1">Mostrar recurso</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">show($id)</code>
            </div>
            
            <div>
                <p class="text-sm text-gray-600 mb-1">Formulario crear</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">create()</code>
            </div>
            
            <div>
                <p class="text-sm text-gray-600 mb-1">Guardar recurso</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">store()</code>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Métodos de edición</h3>
        
        <div class="space-y-3">
            <div>
                <p class="text-sm text-gray-600 mb-1">Formulario editar</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">edit($id)</code>
            </div>
            
            <div>
                <p class="text-sm text-gray-600 mb-1">Actualizar recurso</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">update($id)</code>
            </div>
            
            <div>
                <p class="text-sm text-gray-600 mb-1">Eliminar recurso</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">destroy($id)</code>
            </div>
        </div>
    </div>
</div>

### Ejemplo completo

```php
<?php

namespace App\Http\Controllers;

use Core\Support\Http\Request;
use Core\Support\Http\Response;
use Core\Support\Http\JsonResponse;

class PostController
{
    public function index(): Response
    {
        $posts = ['Post 1', 'Post 2', 'Post 3'];
        return view('posts.index', compact('posts'));
    }

    public function show(string $id): Response
    {
        $post = "Post con ID: {$id}";
        return view('posts.show', compact('post'));
    }

    public function create(): Response
    {
        return view('posts.create');
    }

    public function store(Request $request): Response
    {
        $data = $request->body();
        // Guardar post...
        
        return Response::html('Post creado exitosamente');
    }

    public function edit(string $id): Response
    {
        $post = "Post con ID: {$id}";
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, string $id): Response
    {
        $data = $request->body();
        // Actualizar post...
        
        return Response::html('Post actualizado');
    }

    public function destroy(string $id): Response
    {
        // Eliminar post...
        
        return Response::html('Post eliminado');
    }
}
```

---

## Trabajar con modelos

Syverum incluye un **ORM (Object-Relational Mapping)** completo que te permite trabajar con bases de datos de forma elegante y segura. Los modelos representan las tablas de tu base de datos y proporcionan métodos para realizar operaciones CRUD.

Los modelos en Syverum te permiten interactuar con tu base de datos usando una sintaxis orientada a objetos, eliminando la necesidad de escribir SQL manual en la mayoría de los casos. Cada modelo representa una tabla específica y proporciona métodos tanto estáticos como de instancia para realizar consultas y manipular datos.

Con los modelos puedes realizar operaciones complejas de base de datos de manera intuitiva, mantener la seguridad contra inyección SQL automáticamente, y trabajar con relaciones entre tablas de forma sencilla.


## Métodos estáticos para consultas

Los métodos estáticos te permiten realizar consultas directamente sobre el modelo sin necesidad de crear una instancia. Estos métodos son ideales para operaciones de lectura y búsqueda de datos. Los métodos más comunes incluyen `all()`, `find()`, `first()` y `where()`, que te permiten obtener registros de diferentes maneras.

Estos métodos devuelven colecciones de modelos o instancias individuales, dependiendo del método utilizado. Son especialmente útiles cuando necesitas obtener datos para mostrar en listas, buscar registros específicos, o realizar consultas rápidas sin necesidad de crear objetos primero.

Obtener registros

```php
class UserController
{
    public function index(): Response
    {
        // Obtener todos los usuarios
        $users = User::all();
        
        // Obtener usuarios con columnas específicas
        $users = User::all(['name', 'email']);
        
        // Obtener el primer registro
        $firstUser = User::first();
        
        // Buscar por ID
        $user = User::find(1);
        
        // Buscar por ID o lanzar excepción si no existe
        $user = User::findOrFail(1);
        
        // Buscar múltiples IDs
        $users = User::find([1, 2, 3]);
        
        return view('users.index', compact('users'));
    }
}
```

## Consultas con condiciones

Las consultas con condiciones te permiten filtrar los datos según criterios específicos usando el método `where()`. Puedes encadenar múltiples condiciones para crear consultas complejas que devuelvan exactamente los datos que necesitas.

El método `where()` acepta diferentes tipos de operadores como `=`, `>`, `<`, `>=`, `<=`, `like`, `in`, `not in`, entre otros. También puedes usar `orWhere()` para condiciones alternativas y agrupar condiciones con closures para crear lógica más compleja.

Estas consultas son especialmente útiles para funcionalidades de búsqueda, filtrado de datos, y cuando necesitas obtener registros que cumplan criterios específicos antes de procesarlos o mostrarlos al usuario.

```php
public function search(Request $request): Response
{
    // Consultas básicas con where
    $activeUsers = User::where('active', true)->get();
    $adminUsers = User::where('role', 'admin')->get();
    
    // Múltiples condiciones
    $users = User::where('active', true)
                ->where('age', '>', 18)
                ->get();
    
    // Condiciones OR
    $users = User::where('role', 'admin')
                ->orWhere('role', 'moderator')
                ->get();
    
    // Condiciones con operadores
    $users = User::where('age', '>=', 21)
                ->where('age', '<=', 65)
                ->get();
    
    // Condiciones LIKE
    $users = User::where('name', 'like', '%Juan%')->get();
    
    // Condiciones IN
    $users = User::whereIn('role', ['admin', 'user', 'guest'])->get();
    
    // Condiciones NOT IN
    $users = User::whereNotIn('status', ['banned', 'suspended'])->get();
    
    return json($users);
}
```

## Ordenamiento y paginación

El ordenamiento te permite controlar el orden en que se devuelven los registros usando `orderBy()`, mientras que la paginación te ayuda a limitar la cantidad de resultados usando `limit()` y `offset()`. Estas funcionalidades son esenciales para crear interfaces de usuario eficientes y manejar grandes cantidades de datos.

Con `orderBy()` puedes ordenar por una o múltiples columnas en orden ascendente (`asc`) o descendente (`desc`). Los métodos `limit()` y `offset()` te permiten implementar paginación manual, obteniendo solo una porción específica de los resultados totales.

Estas técnicas son fundamentales para mejorar el rendimiento de tu aplicación, especialmente cuando trabajas con tablas que contienen miles o millones de registros, ya que evitas cargar todos los datos en memoria de una sola vez.

```php
public function index(): Response
{
    // Ordenar por una columna
    $users = User::orderBy('name', 'asc')->get();
    
    // Ordenar por múltiples columnas
    $users = User::orderBy('created_at', 'desc')
                ->orderBy('name', 'asc')
                ->get();
    
    // Limitar resultados
    $users = User::limit(10)->get();
    
    // Saltar registros (offset)
    $users = User::offset(20)->limit(10)->get();
    
    // Combinar ordenamiento y límites
    $recentUsers = User::orderBy('created_at', 'desc')
                      ->limit(5)
                      ->get();
    
    return view('users.index', compact('users'));
}
```

## Agregaciones y conteos

Las funciones de agregación te permiten realizar cálculos estadísticos sobre tus datos sin necesidad de obtener todos los registros. Los métodos más comunes incluyen `count()` para contar registros, `exists()` para verificar existencia, y `value()` para obtener un valor específico de una columna.

Estas funciones son muy eficientes porque se ejecutan directamente en la base de datos, evitando transferir grandes cantidades de datos a tu aplicación. Son ideales para crear dashboards, estadísticas, validaciones de existencia, y cualquier operación que requiera información resumida sobre tus datos.

Los métodos de agregación son especialmente útiles cuando necesitas mostrar contadores en tu interfaz, validar que existen registros antes de realizar operaciones, o obtener valores únicos para formularios de selección.

```php
public function stats(): Response
{
    // Contar registros
    $totalUsers = User::count();
    
    $activeUsers = User::where('active', true)->count();
    
    // Verificar si existe
    $hasUsers = User::exists();
    $hasActiveUsers = User::where('active', true)->exists();
    
    // Obtener un valor específico
    $oldestUser = User::orderBy('created_at', 'asc')->value('name');
    $latestEmail = User::orderBy('created_at', 'desc')->value('email');
    
    return json([
        'total' => $totalUsers,
        'active' => $activeUsers,
        'has_users' => $hasUsers,
        'oldest_user' => $oldestUser
    ]);
}
```

# Operaciones CRUD

Las operaciones CRUD (Create, Read, Update, Delete) son las operaciones fundamentales para manipular datos en cualquier aplicación. Syverum proporciona métodos intuitivos para realizar estas operaciones de forma segura y eficiente.

Estas operaciones te permiten crear nuevos registros, leer datos existentes, actualizar información y eliminar registros cuando ya no son necesarios. Cada operación tiene métodos específicos que manejan automáticamente la validación, sanitización y persistencia de los datos en la base de datos.

## Crear registros

Para crear nuevos registros en la base de datos, puedes usar el método `create()` que acepta un array de datos y los inserta directamente, o crear una nueva instancia del modelo y usar `save()`. El método `create()` es más directo para datos simples, mientras que crear una instancia te da más control sobre el proceso.

También puedes usar `fill()` para asignar datos masivamente a una instancia existente antes de guardarla. Todos estos métodos manejan automáticamente la protección contra asignación masiva y la validación de datos según las reglas definidas en tu modelo.

```php
public function store(Request $request): Response
{
    // Crear con datos específicos
    $user = User::create([
        'name' => $request->body()['name'],
        'email' => $request->body()['email'],
        'password' => bcrypt($request->body()['password'])
    ]);
    
    // Crear instancia y luego guardar
    $user = new User();
    $user->name = 'Juan Pérez';
    $user->email = 'juan@ejemplo.com';
    $user->save();
    
    // Llenar con datos del request
    $user = new User();
    $user->fill($request->body());
    $user->save();
    
    return json($user, 201);
}
```

## Actualizar registros

Para actualizar registros existentes, primero necesitas encontrar el registro usando `find()` o `findOrFail()`, y luego usar el método `update()` o modificar las propiedades directamente y llamar `save()`. El método `update()` es más eficiente para cambios masivos, mientras que modificar propiedades individuales te da más control granular.

El método `fill()` también es útil para actualizaciones, ya que te permite asignar múltiples atributos de una vez antes de guardar. Todos estos métodos respetan las reglas de asignación masiva definidas en tu modelo y ejecutan automáticamente los eventos del modelo si están configurados.

```php
public function update(Request $request, string $id): Response
{
    $user = User::findOrFail($id);
    
    // Actualizar con método update()
    $user->update([
        'name' => $request->body()['name'],
        'email' => $request->body()['email']
    ]);
    
    // Actualizar propiedades individuales
    $user->name = $request->body()['name'];
    $user->email = $request->body()['email'];
    $user->save();
    
    // Actualizar con fill()
    $user->fill($request->body());
    $user->save();
    
    return json($user);
}
```

## Eliminar registros

La eliminación de registros se puede realizar de dos formas: eliminando una instancia específica usando `delete()` en el objeto, o eliminando múltiples registros usando consultas con `delete()`. El primer método es más seguro ya que trabajas con una instancia específica, mientras que el segundo es más eficiente para eliminaciones masivas.

Es importante tener en cuenta que la eliminación es permanente por defecto, aunque puedes implementar soft deletes si necesitas mantener los registros para auditoría o recuperación. También puedes usar transacciones de base de datos para asegurar que las eliminaciones complejas se completen correctamente o se reviertan en caso de error.

```php
public function destroy(string $id): Response
{
    $user = User::findOrFail($id);
    
    // Eliminar registro
    $user->delete();
    
    // Eliminar múltiples registros con consulta
    $deletedCount = User::where('active', false)->delete();
    
    return Response::html("Usuario eliminado");
}
```

## Query Builder avanzado

El Query Builder avanzado te permite crear consultas complejas usando el método `query()` que devuelve una instancia del constructor de consultas. Esto es especialmente útil cuando necesitas construir consultas dinámicas, usar subconsultas, o implementar lógica condicional compleja en tus consultas.

Con el Query Builder puedes usar closures para agrupar condiciones, implementar consultas anidadas, y crear consultas que se adapten dinámicamente según los parámetros recibidos. También puedes obtener el SQL generado usando `toSql()` para debugging y optimización.

Esta funcionalidad es ideal para reportes complejos, sistemas de filtrado avanzado, y cualquier situación donde las consultas simples no sean suficientes para obtener los datos que necesitas.

```php
public function advancedQueries(): Response
{
    // Consultas complejas con ModelQuery
    $users = User::query()
        ->where('active', true)
        ->where(function($query) {
            $query->where('role', 'admin')
                  ->orWhere('role', 'moderator');
        })
        ->orderBy('created_at', 'desc')
        ->limit(20)
        ->get();
    
    // Obtener SQL para debugging
    $sql = User::where('active', true)->toSql();
    
    // Consultas con joins (si tu base de datos lo soporta)
    $users = User::query()
        ->where('users.active', true)
        ->orderBy('users.created_at', 'desc')
        ->get();
    
    return json($users);
}
```

## Métodos de instancia

Los métodos de instancia te permiten trabajar con objetos específicos del modelo una vez que los has obtenido de la base de datos. Estos métodos te dan acceso a información sobre el estado del modelo, sus atributos, y te permiten realizar operaciones específicas sobre esa instancia.

Los métodos más útiles incluyen `exists()` para verificar si el modelo existe en la base de datos, `getAttribute()` y `setAttribute()` para acceder a los datos, `toArray()` para convertir el modelo a array, y `refresh()` para actualizar los datos desde la base de datos.

Estos métodos son especialmente útiles cuando necesitas manipular datos específicos, verificar el estado de un modelo antes de realizar operaciones, o cuando trabajas con formularios que requieren acceso granular a los atributos del modelo.

```php
public function show(string $id): Response
{
    $user = User::findOrFail($id);
    
    // Verificar si el modelo existe en la base de datos
    if ($user->exists()) {
        // El usuario existe
    }
    
    // Obtener atributos
    $name = $user->getAttribute('name');
    $allAttributes = $user->getAttributes();
    
    // Establecer atributos
    $user->setAttribute('name', 'Nuevo nombre');
    
    // Convertir a array
    $userArray = $user->toArray();
    
    // Obtener datos originales (antes de cambios)
    $originalName = $user->getOriginal('name');
    $allOriginal = $user->getOriginal();
    
    // Refrescar desde la base de datos
    $user->refresh();
    
    return view('users.show', compact('user'));
}
```
---

## Helpers disponibles

<div class="grid md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Helpers de vistas</h3>
        
        <div class="space-y-3">
            <div>
                <p class="text-sm text-gray-600 mb-1">Renderizar vista Blade</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">view('users.index', $data)</code>
            </div>
            
            <div>
                <p class="text-sm text-gray-600 mb-1">Generar URL por nombre</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">route('users.show', ['id' => 123])</code>
            </div>
            
            <div>
                <p class="text-sm text-gray-600 mb-1">URL para archivos estáticos</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">asset('css/app.css')</code>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Helpers de respuesta</h3>
        
        <div class="space-y-3">
            <div>
                <p class="text-sm text-gray-600 mb-1">Crear respuesta JSON</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">json($data, $status)</code>
            </div>
            
            <div>
                <p class="text-sm text-gray-600 mb-1">Respuesta HTML</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Response::html($content)</code>
            </div>
            
            <div>
                <p class="text-sm text-gray-600 mb-1">Respuesta de texto</p>
                <code class="bg-gray-100 px-2 py-1 rounded text-sm">Response::text($content)</code>
            </div>
        </div>
    </div>
</div>


## Siguiente paso

<div class="text-center">
    <a href="/docs/models" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-colors duration-200">
        Modelos
        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>

---

<div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-lg p-6 text-center">
    <p class="text-gray-700">
        <strong>💡 Tip:</strong> Los controladores en Syverum son clases PHP simples. Usa la inyección de dependencias para acceder a servicios del framework y mantén la lógica de negocio separada de la presentación.
    </p>
</div>