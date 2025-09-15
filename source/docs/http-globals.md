---
title: HTTP / Globals
description: Lee información de la solicitud con la fachada Request y la clase Globals.
extends: _layouts.documentation
section: content
---

# HTTP / Globals

El núcleo expone `Core\Http\Globals` para capturar datos del request (URL, endpoint, método, query, body, cookies, files). La fachada `Core\Facades\Request` simplifica el acceso.

## Capturar método y endpoint

```php
use Core\Facades\Request;

$request = Request::capture();
// ['endpoint' => '/contact', 'method' => 'POST']
```

## Leer todo el contexto

```php
// método protegido en la fachada; ejemplificado para referencia
// $data = Request::all();
```

`Globals` también calcula `PREVIOUS_URL`. Estos datos se exponen en el Panel cuando `APP_DEBUG=true`.

