---
title: Estructura del proyecto
description: Recorrido por carpetas y módulos de SyverumX.
extends: _layouts.documentation
section: content
---

# Estructura del proyecto

La siguiente guía ofrece un recorrido por las carpetas principales y los módulos del núcleo de **SyverumX**, para que te ubiques rápidamente en la arquitectura del framework.

---

## Raíz del proyecto

- **`app/`**  
  Código de tu aplicación: controladores, modelos de dominio, etc.

- **`resources/`**  
  Vistas Blade y assets propios del proyecto.

- **`routes/`**  
  Definición de rutas (archivo `web.php`).

- **`public/`**  
  Punto de entrada público: `index.php` y assets compilados.

- **`storage/`**  
  Caché de vistas, logs y otros archivos temporales.

- **`vendor/`**  
  Dependencias instaladas con Composer.

---

## Núcleo (`syverum/framework`)

### `core/Boot`
- **`Application.php`**: carga `.env`, helpers, servicios y rutas; gestiona el ciclo de vida de la app.  
- **`Enviroment/EnvValidator.php`**: acceso seguro a variables de entorno; incluye helpers como `isDebugEnabled()`.  
- **`Services/DatabaseService.php`**: prepara la conexión a base de datos usando `.env`.  
- **`Services/PanelService.php`**: registra los módulos a monitorear.

### `core/Routing`
- **`RouteManager.php`**: registro de rutas (`addRoute`, `name`, `middleware`).  
- **`RouteResolver.php`**: resuelve endpoints por método y por nombre.  
- **`Redirector.php`**: utilitario para redirecciones.

### `core/Http`
- **`Globals.php`**: snapshot de parámetros, cuerpo, archivos, método y URL del request.  
- **`Middleware/*`**: contrato `MiddlewareInterface` y ejecución con `MiddlewareRunner`.

### `core/Database`
- **`Connection.php`**: configuración e instancia PDO (con información de debug).  
- **`Database.php`**: helpers para `query()` y `execute()`.

### `core/Facades`
- **`Route.php`**: fachada estática hacia el `RouteManager` (encadenable con `name()`, `middleware()`).  
- **`Request.php`**: lectura rápida del request (`capture()`, `all()`).

### `core/Support`
- **`Controllers/*`**: helpers como `view()` y render con **Jenssegers\Blade**.  
- **`Views/*`**: helpers `route()` y `asset()`.

### `core/Panel`
- **`Monitoring.php`** y **`resources/views/panel.blade.php`**: panel de depuración visible cuando `APP_DEBUG=true`.

---

## Notas finales

La carpeta **`resources/`** es el lugar recomendado para tus layouts y vistas.  
Por ejemplo, el helper:

```php
view('home', ['name' => 'SyverumX'])
```

