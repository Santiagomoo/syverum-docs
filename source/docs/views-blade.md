---
title: Vistas (Blade)
description: Usa plantillas Blade con Jenssegers\Blade y helpers.
extends: _layouts.documentation
section: content
---

# Vistas (Blade)

Syverum utiliza el paquete **`jenssegers/blade`** para renderizar plantillas al estilo **Blade** de Laravel. Las vistas viven en `resources/views`.

---

## Ejemplo básico de vista

Archivo de ejemplo: **`resources/views/welcome.blade.php`**

```html
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Bienvenido</title>
</head>
<body>
  <h1>Hola, {{ $name }}</h1>

  <p>Gracias por usar SyverumX.</p>

  <a href="{{ route('home') }}">Ir al inicio</a>
</body>
</html>
```
---

## Render desde el controlador

```php
<?php

namespace App\Http\Controllers;

class HomeController
{
    public function index()
    {
        return view('welcome', ['name' => 'Syverum']);
    }
}
```
---

## Layouts y parciales

Para evitar repetir estructuras comunes (como `<head>` o `<footer>`), puedes crear layouts y parciales.

### Layout principal

Archivo de ejemplo: **`resources/views/layouts/app.blade.php`**

```html
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'SyverumX')</title>
</head>
<body>
  <header>
    <h1>SyverumX</h1>
    <nav>
      <a href="{{ route('home') }}">Inicio</a>
      <a href="{{ route('contact') }}">Contacto</a>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <p>SyverumX</p>
  </footer>
</body>
</html>
```

### Vista que extiende del layout
Archivo de ejemplo: **`resources/views/home.blade.php`**

---

### Parcial reutilizable
Archivo de ejemplo: **`resources/views/home.blade.php`**

```html
<div class="alert alert-{{ $type }}">
  {{ $slot }}
</div>
```

Y lo incluyes así:

```php
@include('components.alert', ['type' => 'success', 'slot' => 'Operación completada con éxito'])
```