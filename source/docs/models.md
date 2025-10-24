---
title: Modelos
description: Trabaja con modelos Eloquent para interactuar con tu base de datos de forma elegante.
extends: _layouts.documentation
section: content
---

# Modelos

<div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-green-700">
                <strong>ORM Completo:</strong> Syverum incluye un sistema de modelos robusto que te permite trabajar con tu base de datos de forma elegante y segura, similar a Eloquent de Laravel pero más ligero.
            </p>
        </div>
    </div>
</div>

Los modelos en Syverum representan las tablas de tu base de datos y proporcionan una interfaz orientada a objetos para realizar operaciones CRUD. Actúan como una capa de abstracción entre tu aplicación y la base de datos, permitiéndote trabajar con datos de forma intuitiva.

---

## Crear un modelo

Para crear un modelo en Syverum, puedes usar el comando Artisan que genera automáticamente la estructura básica de la clase con todas las propiedades necesarias. Este comando crea un archivo PHP en la carpeta `app/Models/` con el namespace correcto y la herencia de la clase base `Model`.

El comando `make:model` es la forma más rápida y segura de crear modelos, ya que garantiza que sigan las convenciones del framework y tengan la estructura correcta desde el inicio. También puedes especificar un directorio personalizado si quieres organizar tus modelos en subcarpetas.

<div class="bg-gray-900 rounded-lg p-6 mb-8">
    <div class="flex items-center mb-4">
        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <span class="text-gray-300 font-medium">Terminal</span>
    </div>
    <pre><code class="language-bash"># Crear un modelo básico
syverum make:model User


# Crear modelo en directorio específico
syverum make:model Models/Product</code></pre>
</div>

---

## Estructura básica de un modelo

Un modelo en Syverum extiende de la clase base `Model` y contiene todas las configuraciones necesarias para interactuar con tu tabla de base de datos. La estructura incluye propiedades para definir el nombre de la tabla, clave primaria, campos protegidos, y conversiones de tipos de datos.

Cada propiedad tiene un propósito específico: `$table` define qué tabla usar, `$fillable` especifica qué campos se pueden asignar masivamente, `$casts` convierte automáticamente tipos de datos, y `$primaryKey` define la clave primaria si no es el estándar 'id'.

Esta configuración te permite trabajar con cualquier estructura de base de datos de forma consistente, manteniendo la seguridad y proporcionando conversiones automáticas de tipos para una mejor experiencia de desarrollo.

<div class="bg-gray-900 rounded-lg p-6 mb-8">
    <div class="flex items-center mb-4">
        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <span class="text-gray-300 font-medium">app/Models/User.php</span>
    </div>
    <pre><code class="language-php">&lt;?php
declare(strict_types=1);

namespace App\Models;

use Core\Support\Database\Model;

class User extends Model
{
    // Nombre de la tabla (opcional - se infiere del nombre de la clase)
    protected $table = 'users';
    
    // Clave primaria (por defecto es 'id')
    protected $primaryKey = 'id';
    
    // Campos que se pueden asignar masivamente
    protected $fillable = ['name', 'email', 'password'];
    
    // Conversión automática de tipos de datos
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'settings' => 'json'
    ];
    
    // Si la clave primaria es auto-incremental (por defecto true)
    protected $incrementing = true;
}</code></pre>
</div>

---

## Propiedades del modelo

Las propiedades del modelo te permiten configurar cómo se comporta tu modelo con la base de datos. Estas configuraciones son fundamentales para la seguridad, el rendimiento y la funcionalidad de tu aplicación.

### Configuración de tabla

La configuración de tabla te permite personalizar cómo tu modelo se conecta con la base de datos. Puedes especificar nombres de tabla personalizados, cambiar la clave primaria, o deshabilitar el auto-incremento según las necesidades de tu esquema de base de datos.

Estas configuraciones son especialmente útiles cuando trabajas con bases de datos existentes que no siguen las convenciones estándar, o cuando necesitas integrar con sistemas legacy que tienen estructuras específicas.

```php
class User extends Model
{
    // Especificar nombre de tabla personalizado
    protected $table = 'usuarios';
    
    // Cambiar clave primaria
    protected $primaryKey = 'user_id';
    
    // Deshabilitar auto-incremento
    protected $incrementing = false;
}
```

### Protección de datos

La protección de datos es crucial para la seguridad de tu aplicación. La propiedad `$fillable` define qué campos pueden ser asignados masivamente (por ejemplo, desde formularios), mientras que `$guarded` especifica qué campos están protegidos contra asignación masiva.

Esta protección previene ataques de asignación masiva donde un usuario malicioso podría intentar modificar campos sensibles como `id`, `role`, o `is_admin` enviando datos adicionales en formularios. Siempre define explícitamente qué campos son seguros para asignación masiva.

```php
class User extends Model
{
    // Campos que SÍ se pueden asignar masivamente
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'role'
    ];
    
    // Campos que NO se pueden asignar masivamente
    protected $guarded = [
        'id', 
        'created_at', 
        'updated_at'
    ];
}
```

### Conversión de tipos (Casting)

El casting automático de tipos te permite especificar cómo deben convertirse los datos cuando se obtienen de la base de datos o se guardan en ella. Esto es especialmente útil para campos JSON, booleanos, fechas y otros tipos de datos que necesitan conversión específica.

Con el casting puedes trabajar con tipos de datos complejos de forma transparente: los arrays se convierten automáticamente a JSON para almacenamiento, los booleanos se manejan correctamente independientemente de cómo se almacenen en la base de datos, y las fechas se convierten a objetos DateTime para facilitar su manipulación.

```php
class User extends Model
{
    protected $casts = [
        // Conversión a boolean
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
        
        // Conversión a enteros
        'age' => 'integer',
        'login_count' => 'integer',
        
        // Conversión a float
        'rating' => 'float',
        'score' => 'double',
        
        // Conversión a array
        'preferences' => 'array',
        'tags' => 'array',
        
        // Conversión a JSON
        'settings' => 'json',
        'metadata' => 'json'
    ];
}
```

---

## Métodos estáticos para consultas

Los métodos estáticos te permiten realizar consultas directamente sobre el modelo sin necesidad de crear una instancia. Estos métodos son ideales para operaciones de lectura y búsqueda de datos, proporcionando una interfaz intuitiva para obtener información de la base de datos.

### Obtener registros

Los métodos básicos de obtención de registros incluyen `all()` para obtener todos los registros, `first()` para el primer registro, `find()` para buscar por ID, y `findOrFail()` que lanza una excepción si no encuentra el registro. Estos métodos son la base para la mayoría de operaciones de consulta en tu aplicación.

El método `findOrFail()` es especialmente útil porque maneja automáticamente el caso cuando un registro no existe, evitando que tengas que verificar manualmente si el resultado es null y proporcionando un manejo de errores consistente.

```php
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
```

### Consultas con condiciones

Las consultas con condiciones te permiten filtrar los datos según criterios específicos usando el método `where()`. Puedes encadenar múltiples condiciones para crear consultas complejas que devuelvan exactamente los datos que necesitas.

El método `where()` acepta diferentes tipos de operadores como `=`, `>`, `<`, `>=`, `<=`, `like`, `in`, `not in`, entre otros. También puedes usar `orWhere()` para condiciones alternativas y agrupar condiciones con closures para crear lógica más compleja. Estas consultas son especialmente útiles para funcionalidades de búsqueda, filtrado de datos, y cuando necesitas obtener registros que cumplan criterios específicos.

```php
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
```

### Ordenamiento y paginación

El ordenamiento te permite controlar el orden en que se devuelven los registros usando `orderBy()`, mientras que la paginación te ayuda a limitar la cantidad de resultados usando `limit()` y `offset()`. Estas funcionalidades son esenciales para crear interfaces de usuario eficientes y manejar grandes cantidades de datos.

Con `orderBy()` puedes ordenar por una o múltiples columnas en orden ascendente (`asc`) o descendente (`desc`). Los métodos `limit()` y `offset()` te permiten implementar paginación manual, obteniendo solo una porción específica de los resultados totales. Estas técnicas son fundamentales para mejorar el rendimiento de tu aplicación, especialmente cuando trabajas con tablas que contienen miles o millones de registros.

```php
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
```

### Agregaciones y conteos

Las funciones de agregación te permiten realizar cálculos estadísticos sobre tus datos sin necesidad de obtener todos los registros. Los métodos más comunes incluyen `count()` para contar registros, `exists()` para verificar existencia, y `value()` para obtener un valor específico de una columna.

Estas funciones son muy eficientes porque se ejecutan directamente en la base de datos, evitando transferir grandes cantidades de datos a tu aplicación. Son ideales para crear dashboards, estadísticas, validaciones de existencia, y cualquier operación que requiera información resumida sobre tus datos. Los métodos de agregación son especialmente útiles cuando necesitas mostrar contadores en tu interfaz o validar que existen registros antes de realizar operaciones.

```php
// Contar registros
$totalUsers = User::count();
$activeUsers = User::where('active', true)->count();

// Verificar si existe
$hasUsers = User::exists();
$hasActiveUsers = User::where('active', true)->exists();

// Obtener un valor específico
$oldestUser = User::orderBy('created_at', 'asc')->value('name');
$latestEmail = User::orderBy('created_at', 'desc')->value('email');
```

---

## Query Builder avanzado

El Query Builder avanzado te permite crear consultas complejas usando el método `query()` que devuelve una instancia del constructor de consultas. Esto es especialmente útil cuando necesitas construir consultas dinámicas, usar subconsultas, o implementar lógica condicional compleja en tus consultas.

Con el Query Builder puedes usar closures para agrupar condiciones, implementar consultas anidadas, y crear consultas que se adapten dinámicamente según los parámetros recibidos. También puedes obtener el SQL generado usando `toSql()` para debugging y optimización. Esta funcionalidad es ideal para reportes complejos, sistemas de filtrado avanzado, y cualquier situación donde las consultas simples no sean suficientes.

### Consultas complejas

Las consultas complejas te permiten construir lógica de filtrado avanzada usando closures para agrupar condiciones y crear subconsultas. Esto es especialmente útil cuando necesitas implementar filtros dinámicos o lógica de negocio compleja que requiere múltiples condiciones anidadas.

El método `toSql()` es invaluable para debugging, ya que te permite ver exactamente qué consulta SQL se está generando, lo cual es esencial para optimizar el rendimiento y resolver problemas de consultas complejas.

```php
// Consultas con ModelQuery
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
echo $sql; // SELECT * FROM users WHERE active = :w0
```

### Métodos disponibles en ModelQuery

El ModelQuery proporciona una interfaz fluida para construir consultas paso a paso. Puedes encadenar múltiples métodos para crear consultas complejas de forma legible y mantenible. Cada método devuelve una nueva instancia del query builder, permitiendo el encadenamiento de métodos.

Esta interfaz fluida hace que las consultas sean más fáciles de leer y mantener, especialmente cuando necesitas construir consultas dinámicas basadas en parámetros de usuario o condiciones de negocio complejas.

```php
$query = User::query();

// Condiciones
$query->where('column', 'value');
$query->orWhere('column', 'value');
$query->where('column', '>', 10);

// Ordenamiento
$query->orderBy('name', 'asc');
$query->orderBy('created_at', 'desc');

// Límites
$query->limit(10);
$query->offset(20);

// Ejecución
$users = $query->get();
$user = $query->first();
$count = $query->count();
$exists = $query->exists();
$value = $query->value('column');

// Debugging
$sql = $query->toSql();
```

---

## Operaciones CRUD

Las operaciones CRUD (Create, Read, Update, Delete) son las operaciones fundamentales para manipular datos en cualquier aplicación. Syverum proporciona métodos intuitivos para realizar estas operaciones de forma segura y eficiente.

Estas operaciones te permiten crear nuevos registros, leer datos existentes, actualizar información y eliminar registros cuando ya no son necesarios. Cada operación tiene métodos específicos que manejan automáticamente la validación, sanitización y persistencia de los datos en la base de datos.

### Crear registros

Para crear nuevos registros en la base de datos, puedes usar el método `create()` que acepta un array de datos y los inserta directamente, o crear una nueva instancia del modelo y usar `save()`. El método `create()` es más directo para datos simples, mientras que crear una instancia te da más control sobre el proceso.

También puedes usar `fill()` para asignar datos masivamente a una instancia existente antes de guardarla. Todos estos métodos manejan automáticamente la protección contra asignación masiva y la validación de datos según las reglas definidas en tu modelo.

```php
// Crear con datos específicos
$user = User::create([
    'name' => 'Juan Pérez',
    'email' => 'juan@ejemplo.com',
    'password' => password_hash('secret', PASSWORD_DEFAULT)
]);

// Crear instancia y luego guardar
$user = new User();
$user->name = 'María García';
$user->email = 'maria@ejemplo.com';
$user->save();

// Llenar con datos del request
$user = new User();
$user->fill($request->body());
$user->save();
```

### Actualizar registros

Para actualizar registros existentes, primero necesitas encontrar el registro usando `find()` o `findOrFail()`, y luego usar el método `update()` o modificar las propiedades directamente y llamar `save()`. El método `update()` es más eficiente para cambios masivos, mientras que modificar propiedades individuales te da más control granular.

El método `fill()` también es útil para actualizaciones, ya que te permite asignar múltiples atributos de una vez antes de guardar. Todos estos métodos respetan las reglas de asignación masiva definidas en tu modelo y ejecutan automáticamente los eventos del modelo si están configurados.

```php
$user = User::findOrFail(1);

// Actualizar con método update()
$user->update([
    'name' => 'Juan Actualizado',
    'email' => 'juan.nuevo@ejemplo.com'
]);

// Actualizar propiedades individuales
$user->name = 'Juan Actualizado';
$user->email = 'juan.nuevo@ejemplo.com';
$user->save();

// Actualizar con fill()
$user->fill($request->body());
$user->save();
```

### Eliminar registros

La eliminación de registros se puede realizar de dos formas: eliminando una instancia específica usando `delete()` en el objeto, o eliminando múltiples registros usando consultas con `delete()`. El primer método es más seguro ya que trabajas con una instancia específica, mientras que el segundo es más eficiente para eliminaciones masivas.

Es importante tener en cuenta que la eliminación es permanente por defecto, aunque puedes implementar soft deletes si necesitas mantener los registros para auditoría o recuperación. También puedes usar transacciones de base de datos para asegurar que las eliminaciones complejas se completen correctamente o se reviertan en caso de error.

```php
$user = User::findOrFail(1);

// Eliminar registro
$user->delete();

// Eliminar múltiples registros con consulta
$deletedCount = User::where('active', false)->delete();
```

---

## Métodos de instancia

Los métodos de instancia te permiten trabajar con objetos específicos del modelo una vez que los has obtenido de la base de datos. Estos métodos te dan acceso a información sobre el estado del modelo, sus atributos, y te permiten realizar operaciones específicas sobre esa instancia.

Los métodos más útiles incluyen `exists()` para verificar si el modelo existe en la base de datos, `getAttribute()` y `setAttribute()` para acceder a los datos, `toArray()` para convertir el modelo a array, y `refresh()` para actualizar los datos desde la base de datos. Estos métodos son especialmente útiles cuando necesitas manipular datos específicos, verificar el estado de un modelo antes de realizar operaciones, o cuando trabajas con formularios que requieren acceso granular a los atributos del modelo.

### Trabajar con atributos

Los métodos de atributos te permiten acceder y modificar los datos del modelo de forma controlada. Puedes usar `getAttribute()` y `setAttribute()` para acceso programático, o acceder directamente a las propiedades como `$user->name`. El método `getOriginal()` te permite obtener los valores originales antes de cualquier modificación, lo cual es útil para detectar cambios o implementar lógica de auditoría.

El método `refresh()` es especialmente útil cuando necesitas asegurarte de que tienes los datos más actualizados de la base de datos, por ejemplo, después de que otro proceso haya modificado el registro.

```php
$user = User::findOrFail(1);

// Obtener atributos
$name = $user->getAttribute('name');
$allAttributes = $user->getAttributes();

// Establecer atributos
$user->setAttribute('name', 'Nuevo nombre');

// Acceso directo a propiedades
$name = $user->name;
$user->name = 'Nuevo nombre';

// Verificar si existe
if ($user->exists()) {
    // El usuario existe en la base de datos
}

// Obtener datos originales (antes de cambios)
$originalName = $user->getOriginal('name');
$allOriginal = $user->getOriginal();

// Refrescar desde la base de datos
$user->refresh();
```

### Conversión de datos

Los métodos de conversión te permiten transformar el modelo en diferentes formatos según las necesidades de tu aplicación. El método `toArray()` convierte el modelo en un array asociativo, mientras que la implementación de `JsonSerializable` permite que el modelo se serialice automáticamente a JSON cuando uses `json_encode()`.

La implementación de `ArrayAccess` te permite acceder al modelo como si fuera un array, usando sintaxis como `$user['name']` en lugar de `$user->name`. Esto es especialmente útil cuando trabajas con código que espera arrays o cuando necesitas compatibilidad con funciones que operan sobre arrays.

```php
$user = User::findOrFail(1);

// Convertir a array
$userArray = $user->toArray();

// Convertir a JSON (implementa JsonSerializable)
$json = json_encode($user);

// Acceso como array (implementa ArrayAccess)
$name = $user['name'];
$user['name'] = 'Nuevo nombre';
```

---

## Integración con controladores

Los modelos se integran perfectamente con los controladores que viste en la sección anterior. Esta integración te permite crear aplicaciones robustas donde los controladores manejan la lógica de presentación y los modelos se encargan de la persistencia de datos.

La separación de responsabilidades es clara: los controladores procesan las peticiones HTTP, validan datos, y coordinan las operaciones, mientras que los modelos encapsulan la lógica de acceso a datos y las reglas de negocio específicas de cada entidad. Esta arquitectura hace que tu código sea más mantenible, testeable y escalable.

### Controlador básico con modelo

Los controladores utilizan los métodos estáticos de los modelos para realizar consultas y operaciones CRUD. Los métodos como `where()`, `orderBy()`, `limit()` y `get()` te permiten construir consultas complejas de forma fluida, mientras que `create()`, `update()` y `delete()` manejan las operaciones de escritura de forma segura.

Esta integración es especialmente poderosa porque puedes encadenar múltiples métodos para crear consultas expresivas que son fáciles de leer y mantener, y que se ejecutan de forma eficiente en la base de datos.

```php
class UserController
{
    public function index(): Response
    {
        // Usar métodos estáticos del modelo
        $users = User::where('active', true)
                    ->orderBy('created_at', 'desc')
                    ->limit(20)
                    ->get();
        
        return view('users.index', compact('users'));
    }

    public function store(Request $request): Response
    {
        // Crear usuario usando el modelo
        $user = User::create($request->body());
        
        return json($user, 201);
    }

    public function show(string $id): Response
    {
        // Buscar usuario con manejo de errores
        $user = User::findOrFail($id);
        
        return view('users.show', compact('user'));
    }
}
```

### Validación y protección

La integración entre controladores y modelos incluye protección automática contra asignación masiva a través de la propiedad `$fillable` del modelo. Esto significa que cuando usas `create()` o `fill()` en el controlador, solo se asignarán los campos que están explícitamente permitidos en el modelo.

Esta protección es crucial para la seguridad de tu aplicación, ya que previene que usuarios maliciosos modifiquen campos sensibles enviando datos adicionales en formularios. Siempre define explícitamente qué campos son seguros para asignación masiva en tus modelos, especialmente cuando trabajas con datos de usuarios.

```php
class UserController
{
    public function store(Request $request): Response
    {
        $data = $request->body();
        
        // Solo campos fillable se asignarán
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
            // 'role' => 'admin' // Esto se ignorará si no está en $fillable
        ]);
        
        return json($user);
    }
}
```

---

## Ejemplo completo: Modelo de Blog

```php
<?php
declare(strict_types=1);

namespace App\Models;

use Core\Support\Database\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content', 
        'author_id',
        'published',
        'tags'
    ];
    
    protected $casts = [
        'published' => 'boolean',
        'tags' => 'array',
        'created_at' => 'datetime'
    ];
    
    // Métodos personalizados
    public function isPublished(): bool
    {
        return $this->published;
    }
    
    public function publish(): void
    {
        $this->update(['published' => true]);
    }
    
    public function unpublish(): void
    {
        $this->update(['published' => false]);
    }
    
    public function addTag(string $tag): void
    {
        $tags = $this->tags ?? [];
        if (!in_array($tag, $tags)) {
            $tags[] = $tag;
            $this->update(['tags' => $tags]);
        }
    }
}
```

### Uso en controlador

```php
class PostController
{
    public function index(): Response
    {
        $posts = Post::where('published', true)
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();
        
        return view('posts.index', compact('posts'));
    }
    
    public function publish(string $id): Response
    {
        $post = Post::findOrFail($id);
        $post->publish();
        
        return Response::html('Post publicado');
    }
}
```

---

## Debugging y desarrollo

El debugging es una parte esencial del desarrollo con modelos, especialmente cuando trabajas con consultas complejas o necesitas optimizar el rendimiento de tu aplicación. Syverum proporciona herramientas útiles para inspeccionar las consultas SQL generadas y verificar el estado de tus modelos.

### Obtener consultas SQL

El método `toSql()` es invaluable para debugging y optimización, ya que te permite ver exactamente qué consulta SQL se está generando. Esto es especialmente útil cuando necesitas optimizar consultas lentas, verificar que las condiciones se están aplicando correctamente, o cuando trabajas con consultas complejas que involucran múltiples condiciones y joins.

Ver las consultas SQL también te ayuda a entender cómo el ORM traduce tus métodos PHP a consultas de base de datos, lo cual es fundamental para escribir código eficiente y evitar problemas de rendimiento.

```php
// Ver la consulta SQL generada
$sql = User::where('active', true)->toSql();
echo $sql; // SELECT * FROM users WHERE active = :w0

// Ver consultas con parámetros
$query = User::where('name', 'like', '%Juan%');
echo $query->toSql(); // SELECT * FROM users WHERE name LIKE :w0
```

### Verificar existencia de modelos

La verificación de existencia es crucial para manejar casos donde los registros pueden no existir. El método `find()` devuelve `null` cuando no encuentra un registro, mientras que `findOrFail()` lanza una excepción, lo cual es útil para manejo automático de errores.

Usar `findOrFail()` es especialmente recomendado en controladores porque proporciona un manejo de errores consistente y automático. Cuando un registro no existe, puedes capturar la excepción y devolver una respuesta HTTP apropiada (como 404 Not Found) sin tener que verificar manualmente si el resultado es null.

```php
$user = User::find(1);

if ($user) {
    // Usuario encontrado
    echo "Usuario: " . $user->name;
} else {
    // Usuario no encontrado
    echo "Usuario no existe";
}

// O usar findOrFail para manejo automático de errores
try {
    $user = User::findOrFail(999);
} catch (RuntimeException $e) {
    // Usuario no encontrado - manejar error
    return Response::html('Usuario no encontrado', 404);
}
```

---

## Mejores prácticas

<div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
    <div class="flex">
        <div class="ml-3">
            <p class="text-sm text-blue-700">
                <strong>💡 Consejos para trabajar con modelos:</strong>
            </p>
            <ul class="text-sm text-blue-700 mt-2 list-disc list-inside">
                <li><strong>Siempre define $fillable:</strong> Protege contra asignación masiva no deseada</li>
                <li><strong>Usa $casts:</strong> Para conversión automática de tipos de datos</li>
                <li><strong>Prefiere findOrFail():</strong> Para manejo automático de errores</li>
                <li><strong>Métodos encadenados:</strong> Para consultas más legibles y mantenibles</li>
                <li><strong>Validación:</strong> Implementa validación de datos antes de guardar</li>
                <li><strong>Métodos personalizados:</strong> Agrega lógica de negocio específica a tus modelos</li>
            </ul>
        </div>
    </div>
</div>

---

## Siguiente paso

<div class="text-center">
    <a href="/docs/vistas" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-colors duration-200">
        Vistas
        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </a>
</div>

---

<div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-lg p-6 text-center">
    <p class="text-gray-700">
        <strong>💡 Tip:</strong> Los modelos en Syverum proporcionan una interfaz elegante para trabajar con tu base de datos. Combínalos con los controladores para crear aplicaciones robustas y mantenibles.
    </p>
</div>