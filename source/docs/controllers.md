---
title: Controladores
description: Crea controladores delgados y retorna vistas o respuestas simples.
extends: _layouts.documentation
section: content
---

# Controladores

Los controladores concentran la orquestación de la solicitud: leen datos del request, invocan servicios y devuelven una vista.

## Ejemplo básico

```php
<?php
namespace App\Http\Controllers;

class HomeController
{
    public function index()
    {
        return view('welcome', ['name' => 'SyverumX']);
    }
}
```

El helper `view()` es provisto por `Core\Support\Controllers\Helpers` y renderiza con Jenssegers\Blade.

## Respuestas JSON

```php
public function api()
{
    header('Content-Type: application/json');
    echo json_encode(['status' => 'ok']);
}
```

## Buenas prácticas

- Controladores delgados; mueve reglas de negocio al dominio o servicios.
- Valida entradas antes de llamar al servicio.
- Nombra métodos por intención (`index`, `show`, `store`, `update`, `destroy`).

